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
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="naam", type="string", length=255, unique=true)
     */
    private $naam;

    /**
     * @var string
     * @ORM\OneToMany(targetEntity="Bestelopdracht", mappedBy="naamleverancier")
     */
    private $bestelopdracht;

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
}
