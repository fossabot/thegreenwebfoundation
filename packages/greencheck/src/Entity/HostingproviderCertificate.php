<?php

namespace TGWF\Greencheck\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * TGWF\Grencheck\Entity\Certificate
 *
 * @Gedmo\Loggable
 * @ORM\Table(name="hostingprovider_certificates")
 * @ORM\Entity
 */
class HostingproviderCertificate
{
    const ENERGYSOURCE_SOLAR   = 'solar';
    const ENERGYSOURCE_WIND    = 'wind';
    const ENERGYSOURCE_WATER   = 'water';
    const ENERGYSOURCE_BIOMASS = 'biomass';
    const ENERGYSOURCE_MIXED   = 'mixed';

    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string $url
     *
     * @Gedmo\Versioned
     * @Assert\Url()
     * @ORM\Column(name="url", type="string", length=255)
     */
    protected $url;

    /**
     * @var date $valid_from
     *
     * @Gedmo\Versioned
     * @ORM\Column(name="valid_from", type="date")
     */
    protected $valid_from;

    /**
     * @var date $valid_to
     *
     * @Gedmo\Versioned
     * @ORM\Column(name="valid_to", type="date")
     */
    protected $valid_to;

    /**
     * @var string $mainenergytype
     * @Gedmo\Versioned
     * @ORM\Column(name="mainenergytype", type="string", length=255)
     */
    protected $mainenergytype;

    /**
     * @var string $energyprovider
     * @Gedmo\Versioned
     * @ORM\Column(name="energyprovider", type="string", length=255)
     */
    protected $energyprovider;

    /**
     * @ORM\ManyToOne(targetEntity="Hostingprovider", inversedBy="certificates")
     * @ORM\JoinColumn(name="id_hp", referencedColumnName="id")
     * @Gedmo\Versioned
     */
    protected $hostingprovider;

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
     * @return Certificate
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
     * @param datetime $validFrom
     * @return Certificate
     */
    public function setValidFrom($validFrom)
    {
        $this->valid_from = $validFrom;
        return $this;
    }

    /**
     * Get valid_from
     *
     * @return datetime
     */
    public function getValidFrom()
    {
        return $this->valid_from;
    }

    /**
     * Set valid_to
     *
     * @param datetime $validTo
     * @return Certificate
     */
    public function setValidTo($validTo)
    {
        $this->valid_to = $validTo;
        return $this;
    }

    /**
     * Get valid_to
     *
     * @return datetime
     */
    public function getValidTo()
    {
        return $this->valid_to;
    }

    /**
     * Set mainenergytype
     *
     * @param string $mainenergytype
     * @return Certificate
     */
    public function setMainenergytype($mainenergytype)
    {
        if (!in_array($mainenergytype, array(self::ENERGYSOURCE_BIOMASS,self::ENERGYSOURCE_MIXED,self::ENERGYSOURCE_SOLAR,  self::ENERGYSOURCE_WATER,self::ENERGYSOURCE_WIND))) {
            throw new \InvalidArgumentException("Invalid energy source");
        }
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
     * @return Certificate
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
     * Set hostingprovider
     *
     * @param TGWF\Greencheck\Entity\Hostingprovider $hostingprovider
     * @return Certificate
     */
    public function setHostingprovider($hostingprovider = null)
    {
        $this->hostingprovider = $hostingprovider;
        return $this;
    }

    /**
     * Get hostingprovider
     *
     * @return TGWF\Greencheck\Entity\Hostingprovider
     */
    public function getHostingprovider()
    {
        return $this->hostingprovider;
    }
}
