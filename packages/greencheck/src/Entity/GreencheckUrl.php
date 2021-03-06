<?php

namespace TGWF\Greencheck\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TGWF\Greencheck\Entity\GreencheckUrl
 *
 * @ORM\Table(name="greencheck_url")
 * @ORM\Entity(repositoryClass="TGWF\Greencheck\Repository\GreencheckUrlRepository")
 */
class GreencheckUrl
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var integer $idCleanbit
     *
     * @ORM\Column(name="id_cleanbit", type="integer", nullable=true)
     */
    protected $idCleanbit;

    /**
     * @var string $url
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=false)
     */
    protected $url;

    /**
     * @var date $datumBegin
     *
     * @ORM\Column(name="datum_begin", type="date", nullable=false)
     */
    protected $datumBegin;

    /**
     * @var date $datumEind
     *
     * @ORM\Column(name="datum_eind", type="date", nullable=false)
     */
    protected $datumEind;



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
     * Set idCleanbit
     *
     * @param integer $idCleanbit
     */
    public function setIdCleanbit($idCleanbit)
    {
        $this->idCleanbit = $idCleanbit;
    }

    /**
     * Get idCleanbit
     *
     * @return integer
     */
    public function getIdCleanbit()
    {
        return $this->idCleanbit;
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
     * Set datumBegin
     *
     * @param date $datumBegin
     */
    public function setDatumBegin($datumBegin)
    {
        $this->datumBegin = $datumBegin;
    }

    /**
     * Get datumBegin
     *
     * @return date
     */
    public function getDatumBegin()
    {
        return $this->datumBegin;
    }

    /**
     * Set datumEind
     *
     * @param date $datumEind
     */
    public function setDatumEind($datumEind)
    {
        $this->datumEind = $datumEind;
    }

    /**
     * Get datumEind
     *
     * @return date
     */
    public function getDatumEind()
    {
        return $this->datumEind;
    }
}
