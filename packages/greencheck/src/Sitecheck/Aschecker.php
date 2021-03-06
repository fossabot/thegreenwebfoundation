<?php

namespace TGWF\Greencheck\Sitecheck;

use TGWF\Greencheck\SitecheckResult;
use TGWF\Greencheck\Entity;

/**
 * Sitecheck class
 *
 * The sitecheck handles all actions with regard to the Green Web Foundation greencheck.
 *
 * Flow :
 * - Check the cached records for an url, if found return
 * - Check the customer records for an url, if found return
 * - Check the ip records for an url, if found return
 * - Check the as records for an url, if found return
 * - None found, then return url = grey
 *
 * @author Arend-Jan Tetteroo <aj@arendjantetteroo.nl>
 */
class Aschecker
{
    /**
     * @var Sitecheck\Cache
     */
    protected $cache = null;

    /**
     * Construct the sitecheck
     *
     */
    public function __construct($cache)
    {
        // Setup the cache
        $this->cache = $cache;
    }
    
    private function parseAsOutput($asoutput)
    {
        $data = explode('|', str_replace('"', '', $asoutput['txt']));
        $as   = explode(' ', trim($data[0])); // It's possible to have multiple as numbers in the return, store them in an array

        $result['raw']     = $asoutput;
        $result['as']      = $as;
        $result['iprange'] = trim($data[1]);
        $result['country'] = trim($data[2]);
        $result['rir']     = trim($data[3]);
        $result['date']    = trim($data[4]);
        return $result;
    }

    private function getAsFromOutput($output, $ip, $type)
    {
        $result = array();
        if (count($output) > 0) {
            foreach ($output as $asoutput) {
                $data = $this->parseAsOutput($asoutput);
                if ($type == 'ipv4') {
                    $data['ip']   = $ip;
                } else {
                    $data['ip']   = false;
                    $data['ipv6'] = $ip;
                }
                foreach ($data['as'] as $as) {
                    if (isset($result[$as])) {
                        $oldrange = explode('/', $result[$as]['iprange']);
                        $newrange = explode('/', $data['iprange']);
                        if ($newrange[1] > $oldrange[1]) {
                            $result[$as] = $data;
                        }
                    } else {
                        $result[$as] = $data;
                    }
                }
            }
            $results = count($result);
            if ($results == 1) {
                return $result[$as];
            }
            if ($results > 1) {
                foreach ($result as $as) {
                    $range = explode('/', $as['iprange']);
                    $iprange = $range[1];
                    $ipranges[$iprange] = $as;
                }
                return max($ipranges);
            }
        } else {
            $result = null;
        }

        return $result;
    }

    /**
     * Do a dig as lookup for the given ip
     *
     * @param  string $ip
     * @return array
     */
    public function getAsForIpv4($ip)
    {
        if ($result = $this->getCache('aslookups')->fetch(sha1('as'.$ip))) {
            $result['cached'] = true;
            return $result;
        }
        $asresult = @dns_get_record($this->ipv4ToReverseDnsAdressNotation($ip).'.origin.asn.cymru.com', DNS_TXT);
        
        $result = $this->getAsFromOutput($asresult, $ip, 'ipv4');
        if (count($asresult) > 0) {
            $result['cached'] = false;
        }
        $this->cache->setItem('aslookups', 'as'.$ip, $result);
        return $result;
    }
    
    /**
    * Do a dig as lookup for the given ip
    *
    * @param  string $ip
    * @return array
    */
    public function getAsForIpv6($ip)
    {
        if ($result = $this->getCache('aslookups')->fetch(sha1('as'.$ip))) {
            $result['cached'] = true;
            return $result;
        }
        $asresult = @dns_get_record($this->ipv6ToReverseDnsAdressNotation($ip).'.origin6.asn.cymru.com', DNS_TXT);

        $result = $this->getAsFromOutput($asresult, $ip, 'ipv6');
        if (count($asresult) > 0) {
            $result['cached'] = false;
        }
        $this->cache->setItem('aslookups', 'as'.$ip, $result);
        return $result;
    }

    private function ipv4ToReverseDnsAdressNotation($ip)
    {
        $ip_arr = explode('.', $ip);
        return $ip_arr[3].'.'.$ip_arr[2].'.'.$ip_arr[1].'.'.$ip_arr[0];
    }

    private function ipv6ToReverseDnsAdressNotation($ipaddr)
    {
        $addr = inet_pton($ipaddr);

        $string = '';
        foreach (str_split($addr) as $char) {
            $string .= str_pad(dechex(ord($char)), 2, '0', STR_PAD_LEFT);
        }
        $arr = str_split(strrev($string));
        $ipv6 = implode('.', $arr);
        return $ipv6;
    }

    private function getCache($key = 'default')
    {
        return $this->cache->getCache($key);
    }
}
