<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NaamLeverancier
 *
 * @ORM\Table(name="naam_leverancier")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\NaamLeverancierRepository")
 */
class NaamLeverancier
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
     * @ORM\Column(name="NaamLeverancier", type="string", length=255, unique=true)
     */
    private $naamLeverancier;


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
     * Set naamLeverancier
     *
     * @param string $naamLeverancier
     *
     * @return NaamLeverancier
     */
    public function setNaamLeverancier($naamLeverancier)
    {
        $this->naamLeverancier = $naamLeverancier;

        return $this;
    }

    /**
     * Get naamLeverancier
     *
     * @return string
     */
    public function getNaamLeverancier()
    {
        return $this->naamLeverancier;
    }
}

