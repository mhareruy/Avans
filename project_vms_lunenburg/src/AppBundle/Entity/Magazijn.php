<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Magazijn
 *
 * @ORM\Table(name="magazijn")
 * @ORM\Entity
 */
class Magazijn
{
    /**
     * @var string
     *
     * @ORM\Column(name="locatienummer", type="string", length=100, nullable=false, unique=false)
     */
    private $locatienummer;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * Set locatienummer
     *
     * @param string $locatienummer
     *
     * @return Magazijn
     */
    public function setLocatienummer($locatienummer)
    {
        $this->locatienummer = $locatienummer;

        return $this;
    }

    /**
     * Get locatienummer
     *
     * @return string
     */
    public function getLocatienummer()
    {
        return $this->locatienummer;
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

