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
}
