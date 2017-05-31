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

    * @var int
    * @ORM\Id
    * @ORM\Column(name="naamleverancier", type="integer", length=255, unique=true)
    * @ORM\ManyToOne(targetEntity="naamleverancier", inversedBy="naam")
    */
    private $naamleverancier;


    /**
     * @var int
     *
     * @ORM\Column(name="bestelordernummer", type="integer")
     */
    private $bestelordernummer;

    /**
     * @var int
     *
     * @ORM\Column(name="bestelregel", type="integer")
     */
    private $bestelregel;

    /**
     * @var string
     *
     * @ORM\Column(name="leverancier", type="string", length=255)
     */
    private $leverancier;

    /**
     * @var int
     *
     * @ORM\Column(name="artikelnummer", type="integer")
     */
    private $artikelnummer;

    /**
     * @var string
     *
     * @ORM\Column(name="beschrijving", type="string", length=255)
     */
    private $beschrijving;

    /**
     * @var int
     *
     * @ORM\Column(name="aantal", type="integer")
     */
    private $aantal;


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
     * Set bestelregel
     *
     * @param integer $bestelregel
     *
     * @return Bestelopdracht
     */
    public function setBestelregel($bestelregel)
    {
        $this->bestelregel = $bestelregel;

        return $this;
    }

    /**
     * Get bestelregel
     *
     * @return int
     */
    public function getBestelregel()
    {
        return $this->bestelregel;
    }

    /**
     * Set leverancier
     *
     * @param string $leverancier
     *
     * @return Bestelopdracht
     */
    public function setLeverancier($leverancier)
    {
        $this->leverancier = $leverancier;

        return $this;
    }

    /**
     * Get leverancier
     *
     * @return string
     */
    public function getLeverancier()
    {
        return $this->leverancier;
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
     * @return string
     */
    public function getArtikelnummer()
    {
        return $this->artikelnummer;
    }

    /**
     * Set beschrijving
     *
     * @param string $beschrijving
     *
     * @return Bestelopdracht
     */
    public function setBeschrijving($beschrijving)
    {
        $this->beschrijving = $beschrijving;

        return $this;
    }

    /**
     * Get beschrijving
     *
     * @return string
     */
    public function getBeschrijving()
    {
        return $this->beschrijving;
    }

    /**
     * Set aantal
     *
     * @param integer $aantal
     *
     * @return Bestelopdracht
     */
    public function setAantal($aantal)
    {
        $this->aantal = $aantal;

        return $this;
    }

    /**
     * Get aantal
     *
     * @return int
     */
    public function getAantal()
    {
        return $this->aantal;
    }
}
