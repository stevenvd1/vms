<?php

namespace AppBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Retour
 *
 * @ORM\Table(name="retour")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RetourRepository")
 */
class Retour
{
     /**
      * @ORM\Id
      * @ORM\Column(name="artikelnummer", type="integer")
      * @Assert\Length(
      *      min = 10,
      *      max = 10,
      *      exactMessage = "Het artikelnummer moet uit 10 cijfers bestaan",
      * )
      */
    private $artikelnummer;

    /**
     * @var int
     *
     * @ORM\Column(name="Aantal", type="integer")
     */
    private $aantal;

    /**
     * Set artikelnummer
     *
     * @param integer $artikelnummer
     *
     * @return Retour
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
     * Set aantal
     *
     * @param integer $aantal
     *
     * @return Retour
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
