<?php

namespace TGWF\Greencheck\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TGWF\GreencheckAdminBundle\Entity\Greencheck
 *
 * @ORM\Table(name="greencheck",indexes={
 *  @ORM\Index(name="green", columns={"green"}),
 *  @ORM\Index(name="url", columns={"url"}),
 *  @ORM\Index(name="datum", columns={"datum"}),
 *  }
 * )
 * @ORM\Entity
 */

class Greencheck
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer $idGreencheck
     *
     * @ORM\Column(name="id_greencheck", type="integer", nullable=false)
     */
    private $idGreencheck;

    /**
     * @var integer $idHp
     *
     * @ORM\Column(name="id_hp", type="integer", nullable=true)
     */
    private $idHp;

    /**
     * @var string $type
     *
     * @ORM\Column(name="type", type="string", nullable=false)
     */
    private $type;

    /**
     * @var string $url
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=false)
     */
    private $url;

    /**
     * @var integer $ip
     *
     * @ORM\Column(name="ip", type="integer", nullable=false)
     */
    private $ip;

    /**
     * @var datetime $datum
     *
     * @ORM\Column(name="datum", type="datetime", nullable=false)
     */
    private $datum;

    /**
     * @var string $green
     *
     * @ORM\Column(name="green", type="string", nullable=false)
     */
    private $green;

    /**
      * @var string $tld
      *
      * @ORM\Column(name="tld", type="string", length=64, nullable=true)
      */
    private $tld;

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
     * Set idHp
     *
     * @param integer $idHp
     */
    public function setIdHp($idHp)
    {
        $this->idHp = $idHp;
    }

    /**
     * Get idHp
     *
     * @return integer
     */
    public function getIdHp()
    {
        return $this->idHp;
    }

    /**
     * Set idGreencheck
     *
     * @param integer $idGreencheck
     */
    public function setIdGreencheck($idGreencheck)
    {
        $this->idGreencheck = $idGreencheck;
    }

    /**
     * Get idGreencheck
     *
     * @return integer
     */
    public function getIdGreencheck()
    {
        return $this->idGreencheck;
    }

    /**
     * Set type
     *
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set url
     *
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
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
     * Set ip
     *
     * @param integer $ip
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    }

    /**
     * Get ip
     *
     * @return integer
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set datum
     *
     * @param datetime $datum
     */
    public function setDatum($datum)
    {
        $this->datum = $datum;
    }

    /**
     * Get datum
     *
     * @return datetime
     */
    public function getDatum()
    {
        return $this->datum;
    }

    /**
     * Set green
     *
     * @param string $green
     */
    public function setGreen($green)
    {
        $this->green = $green;
    }

    /**
     * Get green
     *
     * @return string
     */
    public function getGreen()
    {
        return $this->green;
    }

    /**
     * Set tld
     *
     * @param string $tld
     */
    public function setTld($tld)
    {
        $this->tld = $tld;
    }

    /**
     * Get tld
     *
     * @return string
     */
    public function getTld()
    {
        return $this->tld;
    }

    /**
     * Set hostingprovider
     *
     * @param Hostingprovider $hostingprovider
     */
    public function setHostingprovider(Hostingprovider $hostingprovider)
    {
        $this->hostingprovider = $hostingprovider;
    }

    /**
     * Get hostingprovider
     *
     * @return Hostingprovider
     */
    public function getHostingprovider()
    {
        return $this->hostingprovider;
    }
}
