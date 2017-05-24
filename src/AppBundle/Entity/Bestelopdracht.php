<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bestelopdracht
 *
 * @ORM\Table(name="bestelopdracht")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BestelopdrachtRepository")
 */
class Bestelopdracht
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\ManyToOne(targetEntity="naamleverancier", inversedBy="Bestelopdracht")
     * @ORM\JoinColumn(name="naamleverancier", referencedColumnName="id")
     */
    private $naamleverancier;

    /**
     * @var int
     *
     * @ORM\Column(name="Bestelordernummer", type="integer", unique=true)
     */
    private $bestelordernummer;

    /**
     * @var int
     *
     * @ORM\Column(name="Artikelnummer", type="integer")
     */
    private $artikelnummer;


    /**
     * @var int
     *
     * @ORM\Column(name="HoeveelheidBestelling", type="integer")
     */
    private $hoeveelheidBestelling;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set naamleverancier
     *
     * @param string $naamleverancier
     *
     * @return Bestelopdracht
     */
    public function setNaamLeverancier($naamleverancier)
    {
        $this->naamleverancier = $naamleverancier;

        return $this;
    }

    /**
     * Get naamleverancier
     *
     * @return string
     */
    public function getNaamLeverancier()
    {
        return $this->naamleverancier;
    }

    /**
     * Set bestelordernummer
     *
     * @param integer $bestelordernummer
     *
     * @return Bestelopdracht
     */
    public function setBestelordernummer($bestelordernummer)
    {
        $this->bestelordernummer = $bestelordernummer;

        return $this;
    }

    /**
     * Get bestelordernummer
     *
     * @return int
     */
    public function getBestelordernummer()
    {
        return $this->bestelordernummer;
    }

    /**
     * Set artikelnummer
     *
     * @param integer $artikelnummer
     *
     * @return Bestelopdracht
     */
    public function setArtikelnummer($artikelnummer)
    {
        $this->artikelnummer = $artikelnummer;

        return $this;
    }

    /**
     * Get artikelnummer
     *
     * @return int
     */
    public function getArtikelnummer()
    {
        return $this->artikelnummer;
    }


    /**
     * Set hoeveelheidBestelling
     *
     * @param integer $hoeveelheidBestelling
     *
     * @return Bestelopdracht
     */
    public function setHoeveelheidBestelling($hoeveelheidBestelling)
    {
        $this->hoeveelheidBestelling = $hoeveelheidBestelling;

        return $this;
    }

    /**
     * Get hoeveelheidBestelling
     *
     * @return int
     */
    public function getHoeveelheidBestelling()
    {
        return $this->hoeveelheidBestelling;
    }
}
