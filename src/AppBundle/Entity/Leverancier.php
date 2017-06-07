<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Leverancier
 *
 * @ORM\Table(name="leverancier")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LeverancierRepository")
 */
class Leverancier
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
     *
     * @ORM\Column(name="naam", type="string")
     * @ORM\OneToMany(targetEntity="Bestelopdracht", mappedBy="leverancier")
     */
    private $naam;

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
     * Set naam
     *
     * @param string $naam
     *
     * @return Leverancier
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
    * Get Naam
    *@return string
    */
   public function __toString()
    {
      return $this->getNaam();
    }

    public function __construct()
      {
          $this->namen = new ArrayCollection();
      }
}
