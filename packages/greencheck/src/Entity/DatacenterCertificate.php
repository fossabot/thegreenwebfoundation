<?php

namespace TGWF\Greencheck\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TGWF\Greencheck\Entity\DatacenterCertificate
 */
class DatacenterCertificate
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $url
     */
    private $url;

    /**
     * @var \DateTime $valid_from
     */
    private $valid_from;

    /**
     * @var \DateTime $valid_to
     */
    private $valid_to;

    /**
     * @var string $mainenergytype
     */
    private $mainenergytype;

    /**
     * @var string $energyprovider
     */
    private $energyprovider;

    /**
     * @var TGWF\Greencheck\Entity\Datacenter
     */
    private $datacenter;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return DatacenterCertificate
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set valid_from
     *
     * @param \DateTime $validFrom
     * @return DatacenterCertificate
     */
    public function setValidFrom($validFrom)
    {
        $this->valid_from = $validFrom;
    
        return $this;
    }

    /**
     * Get valid_from
     *
     * @return \DateTime
     */
    public function getValidFrom()
    {
        return $this->valid_from;
    }

    /**
     * Set valid_to
     *
     * @param \DateTime $validTo
     * @return DatacenterCertificate
     */
    public function setValidTo($validTo)
    {
        $this->valid_to = $validTo;
    
        return $this;
    }

    /**
     * Get valid_to
     *
     * @return \DateTime
     */
    public function getValidTo()
    {
        return $this->valid_to;
    }

    /**
     * Set mainenergytype
     *
     * @param string $mainenergytype
     * @return DatacenterCertificate
     */
    public function setMainenergytype($mainenergytype)
    {
        $this->mainenergytype = $mainenergytype;
    
        return $this;
    }

    /**
     * Get mainenergytype
     *
     * @return string
     */
    public function getMainenergytype()
    {
        return $this->mainenergytype;
    }

    /**
     * Set energyprovider
     *
     * @param string $energyprovider
     * @return DatacenterCertificate
     */
    public function setEnergyprovider($energyprovider)
    {
        $this->energyprovider = $energyprovider;
    
        return $this;
    }

    /**
     * Get energyprovider
     *
     * @return string
     */
    public function getEnergyprovider()
    {
        return $this->energyprovider;
    }

    /**
     * Set datacenter
     *
     * @param TGWF\Greencheck\Entity\Datacenter $datacenter
     * @return DatacenterCertificate
     */
    public function setDatacenter(\TGWF\Greencheck\Entity\Datacenter $datacenter = null)
    {
        $this->datacenter = $datacenter;
    
        return $this;
    }

    /**
     * Get datacenter
     *
     * @return TGWF\Greencheck\Entity\Datacenter
     */
    public function getDatacenter()
    {
        return $this->datacenter;
    }
}
