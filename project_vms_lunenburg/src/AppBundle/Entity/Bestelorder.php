<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bestelorder
 *
 * @ORM\Table(name="bestelorder")
 * @ORM\Entity
 */
class Bestelorder
{
    /**
     * @var integer
     *
     * @ORM\Column(name="aantal", type="integer", nullable=false, unique=false)
     */
    private $aantal;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Leverancier
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Leverancier")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_leverancier_id", referencedColumnName="id")
     * })
     */
    private $idLeverancier;

    /**
     * @var \AppBundle\Entity\Artikel
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Artikel")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_artikel_id", referencedColumnName="id")
     * })
     */
    private $idArtikel;


    /**
     * Set aantal
     *
     * @param integer $aantal
     *
     * @return Bestelorder
     */
    public function setAantal($aantal)
    {
        $this->aantal = $aantal;

        return $this;
    }

    /**
     * Get aantal
     *
     * @return integer
     */
    public function getAantal()
    {
        return $this->aantal;
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

    /**
     * Set idLeverancier
     *
     * @param \AppBundle\Entity\Leverancier $idLeverancier
     *
     * @return Bestelorder
     */
    public function setIdLeverancier(\AppBundle\Entity\Leverancier $idLeverancier = null)
    {
        $this->idLeverancier = $idLeverancier;

        return $this;
    }

    /**
     * Get idLeverancier
     *
     * @return \AppBundle\Entity\Leverancier
     */
    public function getIdLeverancier()
    {
        return $this->idLeverancier;
    }

    /**
     * Set idArtikel
     *
     * @param \AppBundle\Entity\Artikel $idArtikel
     *
     * @return Bestelorder
     */
    public function setIdArtikel(\AppBundle\Entity\Artikel $idArtikel = null)
    {
        $this->idArtikel = $idArtikel;

        return $this;
    }

    /**
     * Get idArtikel
     *
     * @return \AppBundle\Entity\Artikel
     */
    public function getIdArtikel()
    {
        return $this->idArtikel;
    }
}

