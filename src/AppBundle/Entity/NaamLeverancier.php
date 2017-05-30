<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * naamleverancier
 *
 * @ORM\Table(name="naamleverancier")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\NaamLeverancierRepository")
 */
class naamleverancier
{
    /**
     * @var string
     * @ORM\Column(name="id", type="string", length=255, unique=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $Id;

    /**
     * @var string
     *
     * @ORM\Column(name="naam", type="string", length=255, unique=true)
     * @ORM\OneToMany(targetEntity="naam", mappedBy="naamleverancier")
     */

    private $naam;



    /**
     * Get Id
     *
     * @return int
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * Set naam
     *
     * @param string $naam
     *
     * @return naamleverancier
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

    public function __construct()
        {
            $this->producten = new ArrayCollection();
        }
      /**
      * @return string
      */
        public function __toString()
        {
            try {
                return (string) $this->naam;
            } catch (Exception $exception) {
                return '';
            }
        }
}
