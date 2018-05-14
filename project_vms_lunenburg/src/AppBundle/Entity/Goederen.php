<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Goederen
 *
 * @ORM\Table(name="goederen")
 * @ORM\Entity
 */
class Goederen
{
    /**
     * @var integer
     *
     * @ORM\Column(name="hoeveelheid", type="integer", nullable=false, unique=false)
     */
    private $hoeveelheid;

    /**
     * @var string
     *
     * @ORM\Column(name="kwaliteit", type="string", length=100, nullable=false, unique=false)
     */
    private $kwaliteit;

    /**
     * @var string
     *
     * @ORM\Column(name="beschrijving", type="text", length=65535, nullable=false, unique=false)
     */
    private $beschrijving;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ontvangstdatum", type="date", nullable=false, unique=false)
     */
    private $ontvangstdatum;

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
     *   @ORM\JoinColumn(name="id_artikel_id", referencedColumnName="id")
     * })
     */
    private $idArtikel;

    /**
     * @var \AppBundle\Entity\Status
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Status")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="status_id", referencedColumnName="id")
     * })
     */
    private $status;

    /**
     * @var \AppBundle\Entity\Leverancier
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Leverancier")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="leverancier_id", referencedColumnName="id")
     * })
     */
    private $leverancier;


    /**
     * Set hoeveelheid
     *
     * @param integer $hoeveelheid
     *
     * @return Goederen
     */
    public function setHoeveelheid($hoeveelheid)
    {
        $this->hoeveelheid = $hoeveelheid;

        return $this;
    }

    /**
     * Get hoeveelheid
     *
     * @return integer
     */
    public function getHoeveelheid()
    {
        return $this->hoeveelheid;
    }

    /**
     * Set kwaliteit
     *
     * @param string $kwaliteit
     *
     * @return Goederen
     */
    public function setKwaliteit($kwaliteit)
    {
        $this->kwaliteit = $kwaliteit;

        return $this;
    }

    /**
     * Get kwaliteit
     *
     * @return string
     */
    public function getKwaliteit()
    {
        return $this->kwaliteit;
    }

    /**
     * Set beschrijving
     *
     * @param string $beschrijving
     *
     * @return Goederen
     */
    public function setBeschrijving($beschrijving)
    {
        $this->beschrijving = $beschrijving;

        return $this;
    }

    /**
     * Get beschrijving
     *
     * @return string
     */
    public function getBeschrijving()
    {
        return $this->beschrijving;
    }

    /**
     * Set ontvangstdatum
     *
     * @param \DateTime $ontvangstdatum
     *
     * @return Goederen
     */
    public function setOntvangstdatum($ontvangstdatum)
    {
        $this->ontvangstdatum = $ontvangstdatum;

        return $this;
    }

    /**
     * Get ontvangstdatum
     *
     * @return \DateTime
     */
    public function getOntvangstdatum()
    {
        return $this->ontvangstdatum;
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
     * Set idArtikel
     *
     * @param \AppBundle\Entity\Artikel $idArtikel
     *
     * @return Goederen
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

    /**
     * Set status
     *
     * @param \AppBundle\Entity\Status $status
     *
     * @return Goederen
     */
    public function setStatus(\AppBundle\Entity\Status $status = null)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return \AppBundle\Entity\Status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set leverancier
     *
     * @param \AppBundle\Entity\Leverancier $leverancier
     *
     * @return Goederen
     */
    public function setLeverancier(\AppBundle\Entity\Leverancier $leverancier = null)
    {
        $this->leverancier = $leverancier;

        return $this;
    }

    /**
     * Get leverancier
     *
     * @return \AppBundle\Entity\Leverancier
     */
    public function getLeverancier()
    {
        return $this->leverancier;
    }
}

