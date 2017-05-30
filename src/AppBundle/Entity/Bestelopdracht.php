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
    * @var string
    * @ORM\Id
    * @ORM\Column(name="naamleverancier", type="string", unique=true)
    * @ORM\ManyToOne(targetEntity="naamleverancier", inversedBy="Bestelopdracht")
    */
    private $naamleverancier;

    /**
     * @var int
     *
     * @ORM\Column(name="bestelordernummer", type="integer", unique=true)
     */
    private $bestelordernummer;

    /**
     * @var int
     *
     * @ORM\Column(name="artikelnummer", type="integer")
     */
    private $artikelnummer;


    /**
     * @var int
     *
     * @ORM\Column(name="hoeveelheidBestelling", type="integer")
     */
    private $hoeveelheidBestelling;


    /**
     * Set naamleverancier
     *
     * @param string $naamleverancier
     *
     * @return Bestelopdracht
     */
    public function setnaamleverancier($naamleverancier)
    {
        $this->naamleverancier = $naamleverancier;

        return $this;
    }

    /**
     * Get naamleverancier
     *
     * @return string
     */
    public function getnaamleverancier()
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
    public function setbestelordernummer($bestelordernummer)
    {
        $this->bestelordernummer = $bestelordernummer;

        return $this;
    }

    /**
     * Get bestelordernummer
     *
     * @return int
     */
    public function getbestelordernummer()
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
    public function setartikelnummer($artikelnummer)
    {
        $this->artikelnummer = $artikelnummer;

        return $this;
    }

    /**
     * Get artikelnummer
     *
     * @return string
     */
    public function getartikelnummer()
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
    public function sethoeveelheidBestelling($hoeveelheidBestelling)
    {
        $this->hoeveelheidBestelling = $hoeveelheidBestelling;

        return $this;
    }

    /**
     * Get hoeveelheidBestelling
     *
     * @return int
     */
    public function gethoeveelheidBestelling()
    {
        return $this->hoeveelheidBestelling;
    }
}
