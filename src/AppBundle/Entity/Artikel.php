<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Artikel
 *
 * @ORM\Table(name="artikel")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ArtikelRepository")
 */
class Artikel
{

    /**
     * @ORM\Id
     * @ORM\Column(name="artikelnr", type="integer")
     * @ORM\OneToMany(targetEntity="Bestelopdracht", mappedBy="artikel")
     */
    private $artikelnr;

    /**
     * @var string
     *
     * @ORM\Column(name="naam", type="string", length=255)
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
     * @ORM\Column(name="locatie", type="string", length=6, nullable=false)
     * @Assert\Regex(
     *    pattern = "/^20|[0-1]{1}[0-9]{1}\/[A-Z][0]{1}[0-9]{1}|10$/i",
     *    match=true,
     *    message="De magazijnlocatie moet tussen de volgende waarde in liggen: 01/A01 - 20/Z10")
     * @Assert\Regex(
     *    pattern = "/^[2]{1}[1-9]{1}\/[A-Z]{1}[0-9]{1}$/i",
     *    match=false,
     *    message="De eerste 2 cijfers van magzijnlocatie mag maximaal 20 zijn.")
     * @Assert\Regex(
     *    pattern = "/^[3-9]{1}[0-9]{1}\/[A-Z][0-9]{1}$/i",
     *    match=false,
     *    message="De eerste 2 cijfers van magzijnlocatie mag maximaal 20 zijn.")
     * @Assert\Regex(
     *    pattern = "/^[0-1]{1}[0-9]{1}\/[A-Z][1]{1}[1-9]{1}$/i",
     *    match=false,
     *    message="De laatste 2 cijfers van magzijnlocatie mag maximaal 10 zijn.")
     * @Assert\Regex(
     *    pattern = "/^[0-1]{1}[0-9]{1}\/[A-Z][2-9]{1}[0-9]{1}$/i",
     *    match=false,
     *    message="De laatste 2 cijfers van magzijnlocatie mag maximaal 10 zijn.")
     * @Assert\Regex(
     *    pattern = "/^[0-9A-Za-z]+$/i",
     *    match=false,
     *    message="De magazijnlocatie mag alleen uit letters en cijfers bestaan")
     */
     //de locatie kan maximaal uit 6 karakters bestaan en een bepaalde volgorde anders zal er een foutmelding opduiken.
    private $locatie;
    /**
     * @var integer
     *
     * @ORM\Column(name="inkoopprijs", type="decimal", precision=10, scale=2)
     * @Assert\Range(
     *  max = 9999)
     *      maxMessage = "You cannot be taller than {{ 9999 }}cm to enter"
     *)
     */
     //de inkoopprijs kan maximaal 5000 zijn en er zal een bericht opduiken zodra dit niet aan deze criteria voldoet.
    private $inkoopprijs;

    /**
    * @var integer
    * @ORM\Column(name="verkoopprijs", type="decimal", precision=10, scale=2)
    * )
    */
    private $verkoopprijs;

    /**
     * @var integer
     *
     * @ORM\Column(name="minVoorraad", type="integer", length=255)
     * @Assert\Length(
     *      min = 0,
     *      max = 6,
     *      minMessage = "De minimale voorraad moet minimaal 0 zijn",
     *      maxMessage = "De minimale voorraad mag maximaal uit 6 cijfers bestaan"
     * )
     */
     //de minimale voorraad kan maximaal 999999 zijn en er zal een bericht opduiken zodra dit niet aan deze criteria voldoet.
    private $minVoorraad;

    /**
     * @var integer
     *
     * @ORM\Column(name="voorraad", type="integer", length=6)
     * @Assert\Length(
     *      max = 6,
     *      maxMessage = "De voorraad mag maximaal uit 6 cijfers bestaan"
     * )
     */
      //de voorraad kan maximaal 999999 zijn en er zal een bericht opduiken zodra dit niet aan deze criteria voldoet.
    private $voorraad;

    /**
     * @var integer
     *
     * @ORM\Column(name="bestelserie", type="integer", length=255)
     * @Assert\Length(
     *      max = 6,
     *      maxMessage = "Ongeldige bestelserie"
     * )
     */
      //de betselserie kan maximaal 999999 zijn en er zal een bericht opduiken zodra dit niet aan deze criteria voldoet.
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
     * @param integer $inkoopprijs
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
     * @return int
     */
    public function getInkoopprijs()
    {
        return $this->inkoopprijs;
    }


    /**
     * Set verkoopprijs
     *
     * @param integer $verkoopprijs
     *
     * @return Artikel
     */
    public function setVerkoopprijs($verkoopprijs)
    {
        $this->verkoopprijs = $verkoopprijs;

        return $this;
    }

    /**
     * Get verkoopprijs
     *
     * @return int
     */
    public function getVerkoopprijs()
    {
        return $this->verkoopprijs;
    }

      /**
     * Set minVoorraad
     *
     * @param integer $minVoorraad
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
     * @return integer
     */
    public function getMinVoorraad()
    {
        return $this->minVoorraad;

    }

    /**
     * Set voorraad
     *
     * @param integer $voorraad
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
     * @return int
     */
    public function getVoorraad()
    {
        return $this->voorraad;
    }

    /**
     * Set bestelserie
     *
     * @param integer $bestelserie
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
     * @return int
     */
    public function getBestelserie()
    {
        return $this->bestelserie;
    }
}
