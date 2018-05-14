<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Leverancier
 *
 * @ORM\Table(name="leverancier")
 * @ORM\Entity
 */
class Leverancier
{
    /**
     * @var string
     *
     * @ORM\Column(name="naam", type="string", length=100, nullable=false, unique=false)
     */
    private $naam;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}

