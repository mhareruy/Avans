<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Artikel
 *
 * @ORM\Table(name="artikel")
 * @ORM\Entity
 */
class Artikel
{
    /**
     * @var string
     *
     * @ORM\Column(name="naam", type="string", length=100, nullable=false, unique=false)
     */
    private $naam;

    /**
     * @var string
     *
     * @ORM\Column(name="omschrijving", type="text", length=65535, nullable=false, unique=false)
     */
    private $omschrijving;

    /**
     * @var string
     *
     * @ORM\Column(name="technischespecificatie", type="text", length=65535, nullable=false, unique=false)
     */
    private $technischespecificatie;

    /**
     * @var string
     *
     * @ORM\Column(name="inkoopprijs", type="decimal", precision=10, scale=0, nullable=false, unique=false)
     */
    private $inkoopprijs;

    /**
     * @var integer
     *
     * @ORM\Column(name="minimale_voorraad", type="integer", nullable=false, unique=false)
     */
    private $minimaleVoorraad;

    /**
     * @var integer
     *
     * @ORM\Column(name="aantal_voorraad", type="integer", nullable=false, unique=false)
     */
    private $aantalVoorraad;

    /**
     * @var integer
     *
     * @ORM\Column(name="bestelserie", type="integer", nullable=false, unique=false)
     */
    private $bestelserie;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Artikel
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Artikel")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="alternatief_artikel_id", referencedColumnName="id")
     * })
     */
    private $alternatiefArtikel;

    /**
     * @var \AppBundle\Entity\Magazijn
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Magazijn")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="magazijnlocatie_id", referencedColumnName="id")
     * })
     */
    private $magazijnlocatie;


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
     * Set omschrijving
     *
     * @param string $omschrijving
     *
     * @return Artikel
     */
    public function setOmschrijving($omschrijving)
    {
        $this->omschrijving = $omschrijving;

        return $this;
    }

    /**
     * Get omschrijving
     *
     * @return string
     */
    public function getOmschrijving()
    {
        return $this->omschrijving;
    }

    /**
     * Set technischespecificatie
     *
     * @param string $technischespecificatie
     *
     * @return Artikel
     */
    public function setTechnischespecificatie($technischespecificatie)
    {
        $this->technischespecificatie = $technischespecificatie;

        return $this;
    }

    /**
     * Get technischespecificatie
     *
     * @return string
     */
    public function getTechnischespecificatie()
    {
        return $this->technischespecificatie;
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
     * Set minimaleVoorraad
     *
     * @param integer $minimaleVoorraad
     *
     * @return Artikel
     */
    public function setMinimaleVoorraad($minimaleVoorraad)
    {
        $this->minimaleVoorraad = $minimaleVoorraad;

        return $this;
    }

    /**
     * Get minimaleVoorraad
     *
     * @return integer
     */
    public function getMinimaleVoorraad()
    {
        return $this->minimaleVoorraad;
    }

    /**
     * Set aantalVoorraad
     *
     * @param integer $aantalVoorraad
     *
     * @return Artikel
     */
    public function setAantalVoorraad($aantalVoorraad)
    {
        $this->aantalVoorraad = $aantalVoorraad;

        return $this;
    }

    /**
     * Get aantalVoorraad
     *
     * @return integer
     */
    public function getAantalVoorraad()
    {
        return $this->aantalVoorraad;
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
     * @return integer
     */
    public function getBestelserie()
    {
        return $this->bestelserie;
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
     * Set alternatiefArtikel
     *
     * @param \AppBundle\Entity\Artikel $alternatiefArtikel
     *
     * @return Artikel
     */
    public function setAlternatiefArtikel(\AppBundle\Entity\Artikel $alternatiefArtikel = null)
    {
        $this->alternatiefArtikel = $alternatiefArtikel;

        return $this;
    }

    /**
     * Get alternatiefArtikel
     *
     * @return \AppBundle\Entity\Artikel
     */
    public function getAlternatiefArtikel()
    {
        return $this->alternatiefArtikel;
    }

    /**
     * Set magazijnlocatie
     *
     * @param \AppBundle\Entity\Magazijn $magazijnlocatie
     *
     * @return Artikel
     */
    public function setMagazijnlocatie(\AppBundle\Entity\Magazijn $magazijnlocatie = null)
    {
        $this->magazijnlocatie = $magazijnlocatie;

        return $this;
    }

    /**
     * Get magazijnlocatie
     *
     * @return \AppBundle\Entity\Magazijn
     */
    public function getMagazijnlocatie()
    {
        return $this->magazijnlocatie;
    }
}

