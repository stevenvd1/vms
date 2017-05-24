<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Artikel
 *
 * @ORM\Table(name="artikel")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ArtikelRepository")
 */
class Artikel
{

    /**
     * @var int
     *
     * @ORM\Column(name="artikelnr", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $artikelnr;

    /**
     * @var string
     *
     * @ORM\Column(name="naam", type="string", length=255, nullable=true)
     */
    private $naam;

    /**
     * @var string
     *
     * @ORM\Column(name="specs", type="string", length=255)
     */
    private $specs;

    /**
     * @var string
     *
     * @ORM\Column(name="locatie", type="string", length=255)
     */
    private $locatie;

    /**
     * @var string
     *
     * @ORM\Column(name="inkoopprijs", type="decimal", precision=10, scale=2)
     */
    private $inkoopprijs;

    /**
     * @var string
     *
     * @ORM\Column(name="minVoorraad", type="string", length=255)
     */
    private $minVoorraad;

    /**
     * @var string
     *
     * @ORM\Column(name="voorraad", type="string", length=255)
     */
    private $voorraad;

    /**
     * @var string
     *
     * @ORM\Column(name="bestelserie", type="string", length=255)
     */
    private $bestelserie;




    /**
     * Set artikelnr
     *
     * @param integer $artikelnr
     *
     * @return Artikel
     */
    public function setArtikelnr($artikelnr)
    {
        $this->artikelnr = $artikelnr;

        return $this;
    }

    /**
     * Get artikelnr
     *
     * @return int
     */
    public function getArtikelnr()
    {
        return $this->artikelnr;
    }

    /**
     * Set naam
     *
     * @param string $naam
     *
     * @return Artikel
     */
    public function setNaam($naam)
    {
        $this->naam = $naam;

        return $this;
    }

    /**
     * Get naam
     *
     * @return string
     */
    public function getNaam()
    {
        return $this->naam;
    }

    /**
     * Set specs
     *
     * @param string $specs
     *
     * @return Artikel
     */
    public function setSpecs($specs)
    {
        $this->specs = $specs;

        return $this;
    }

    /**
     * Get specs
     *
     * @return string
     */
    public function getSpecs()
    {
        return $this->specs;
    }

    /**
     * Set locatie
     *
     * @param string $locatie
     *
     * @return Artikel
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
     * Set inkoopprijs
     *
     * @param string $inkoopprijs
     *
     * @return Artikel
     */
    public function setInkoopprijs($inkoopprijs)
    {
        $this->inkoopprijs = $inkoopprijs;

        return $this;
    }

    /**
     * Get inkoopprijs
     *
     * @return string
     */
    public function getInkoopprijs()
    {
        return $this->inkoopprijs;
    }

    /**
     * Set minVoorraad
     *
     * @param string $minVoorraad
     *
     * @return Artikel
     */
    public function setMinVoorraad($minVoorraad)
    {
        $this->minVoorraad = $minVoorraad;

        return $this;
    }

    /**
     * Get minVoorraad
     *
     * @return string
     */
    public function getMinVoorraad()
    {
        return $this->minVoorraad;

    }

    /**
     * Set voorraad
     *
     * @param string $voorraad
     *
     * @return Artikel
     */
    public function setVoorraad($voorraad)
    {
        $this->voorraad = $voorraad;

        return $this;
    }

    /**
     * Get voorraad
     *
     * @return string
     */
    public function getVoorraad()
    {
        return $this->voorraad;
    }

    /**
     * Set bestelserie
     *
     * @param string $bestelserie
     *
     * @return Artikel
     */
    public function setBestelserie($bestelserie)
    {
        $this->bestelserie = $bestelserie;

        return $this;
    }

    /**
     * Get bestelserie
     *
     * @return string
     */
    public function getBestelserie()
    {
        return $this->bestelserie;
    }
}
