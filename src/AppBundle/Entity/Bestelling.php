<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bestelling
 *
 * @ORM\Table(name="bestelling")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BestellingRepository")
 */
class Bestelling
{


    /**
     * @var int
     *
     * @ORM\Column(name="bestelordernummer", type="integer", unique=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $bestelordernummer;

    /**
     * @var int
     *
     * @ORM\Column(name="datum", type="integer", unique=false, nullable=true)
     */
    private $datum;



    /**
     * @var int
     *
     * @ORM\Column(name="zendingsnummer", type="integer", unique=true, nullable=true)
     */
    private $zendingsnummer;

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
     * @ORM\Column(name="artikelnaam", type="string", length=255, nullable=true)
     */
    private $artikelnaam;

    /**
     * @var int
     *
     * @ORM\Column(name="aantal", type="integer")
     */
    private $aantal;

    /**
     * @var string
     *
     * @ORM\Column(name="notities", type="string", length=255, nullable=true)
     */
    private $notities;

    /**
     * @var string
     *
     * @ORM\Column(name="locatie", type="string", length=255, nullable=true)
     */
    private $locatie;

    /**
     * @var string
     *
     * @ORM\Column(name="kwaliteit", type="string", length=255, nullable=true)
     */
    private $kwaliteit;

    /**
     * @var string
     *
     * @ORM\Column(name="keuringseisen", type="string", length=255, nullable=true)
     */
    private $keuringseisen;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255, nullable=true)
     */
    private $status;




    /**
     * Set bestelordernummer
     *
     * @param integer $bestelordernummer
     *
     * @return Bestelling
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
     * Set datum
     *
     * @param integer $datum
     *
     * @return Bestelling
     */
    public function setDatum($datum)
    {
        $this->datum = $datum;

        return $this;
    }

    /**
     * Get datum
     *
     * @return int
     */
    public function getDatum()
    {
        return $this->datum;
    }

    /**
     * Set zendingsnummer
     *
     * @param integer $zendingsnummer
     *
     * @return Bestelling
     */
    public function setZendingsnummer($zendingsnummer)
    {
        $this->zendingsnummer = $zendingsnummer;

        return $this;
    }

    /**
     * Get zendingsnummer
     *
     * @return int
     */
    public function getZendingsnummer()
    {
        return $this->zendingsnummer;
    }

    /**
     * Set leverancier
     *
     * @param string $leverancier
     *
     * @return Bestelling
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
     * @return Bestelling
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
     * Set artikelnaam
     *
     * @param string $artikelnaam
     *
     * @return Bestelling
     */
    public function setArtikelnaam($artikelnaam)
    {
        $this->artikelnaam = $artikelnaam;

        return $this;
    }

    /**
     * Get artikelnaam
     *
     * @return string
     */
    public function getArtikelnaam()
    {
        return $this->artikelnaam;
    }

    /**
     * Set aantal
     *
     * @param integer $aantal
     *
     * @return Bestelling
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

    /**
     * Set notities
     *
     * @param string $notities
     *
     * @return Bestelling
     */
    public function setNotities($notities)
    {
        $this->notities = $notities;

        return $this;
    }

    /**
     * Get notities
     *
     * @return string
     */
    public function getNotities()
    {
        return $this->notities;
    }

    /**
     * Set locatie
     *
     * @param string $locatie
     *
     * @return Bestelling
     */
    public function setLocatie($locatie)
    {
        $this->locatie = $locatie;

        return $this;
    }

    /**
     * Get locatie
     *
     * @return string
     */
    public function getLocatie()
    {
        return $this->locatie;
    }

    /**
     * Set kwaliteit
     *
     * @param string $kwaliteit
     *
     * @return Bestelling
     */
    public function setKwaliteit($kwaliteit)
    {
        $this->kwaliteit = $kwaliteit;

        return $this;
    }

    /**
     * Get kwaliteit
     *
     * @return string
     */
    public function getKwaliteit()
    {
        return $this->kwaliteit;
    }

    /**
     * Set keuringseisen
     *
     * @param string $keuringseisen
     *
     * @return Bestelling
     */
    public function setKeuringseisen($keuringseisen)
    {
        $this->keuringseisen = $keuringseisen;

        return $this;
    }

    /**
     * Get keuringseisen
     *
     * @return string
     */
    public function getKeuringseisen()
    {
        return $this->keuringseisen;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Bestelling
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
}
