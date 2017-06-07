<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @var int
     *
     * @ORM\Column(name="zendingsnummer", type="integer")
     */
    private $zendingsnummer;

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
     * @ORM\ManyToOne(targetEntity="leverancier", inversedBy="namen")
     * @ORM\JoinColumn(name="naamleverancier", referencedColumnName="naam")
     * @ORM\Column(name="leverancier", type="string", length=255)
     */
    private $leverancier;

  /**
     * @ORM\ManyToOne(targetEntity="Artikel", inversedBy="artikelnr")
     * @ORM\JoinColumn(name="artikelnummer", referencedColumnName="artikelnr")
      */
    private $artikel;

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
     * @var int
     *
     * @ORM\Column(name="artikelnummer", type="integer")
     */
    private $artikelnummer;

    /**
     * @var string
     *
     * @ORM\Column(name="locatie", type="string", length=255)
     */
    private $locatie;

    /**
     * @var string
     *
     * @ORM\Column(name="keuringseisen", type="string", length=255)
     */
    private $keuringseisen;

    /**
     * @var string
     *
     * @ORM\Column(name="datum", type="string")
     */
    private $datum;

    /**
     * @var string
     *
     * @ORM\Column(name="kwaliteit", type="string", length=255)
     */
    private $kwaliteit;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="integer")
     */
    private $status;


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
     * Set zendingsnummer
     *
     * @param integer $zendingsnummer
     *
     * @return Bestelopdracht
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
    public function setArtikel($artikel)
    {
        $this->artikel = $artikel;

        return $this;
    }

    /**
     * Get artikelnummer
     *
     * @return int
     */
    public function getArtikel()
    {
        return $this->artikel;
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

    /**
     * Set artikelnummer
     *
     * @param integer $Artikelnummer
     *
     * @return artikelnummer
     */
    public function setartikelnummer($artikelnummer)
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
     * Set locatie
     *
     * @param string $locatie
     *
     * @return Bestelopdracht
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
     * Set keuringseisen
     *
     * @param string $keuringseisen
     *
     * @return Bestelopdracht
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
     * Set datum
     *
     * @param string $datum
     *
     * @return Bestelopdracht
     */
    public function setDatum($datum)
    {
        $this->datum = $datum;

        return $this;
    }

    /**
     * Get datum
     *
     * @return string
     */
    public function getDatum()
    {
        return $this->datum;
    }

    /**
     * Set kwaliteit
     *
     * @param string $kwaliteit
     *
     * @return Bestelopdracht
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
     * Set status
     *
     * @param integer $status
     *
     * @return Bestelopdracht
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }


}
