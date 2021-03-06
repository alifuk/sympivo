<?php

namespace AppBundle\Entity;

use AppBundle\Repository\HospodaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Hospoda
 *
 * @ORM\Table(name="hospody")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\HospodaRepository")
 * 
 */
class Hospoda {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="jmeno", type="string", length=255)
     */
    private $jmeno;

    /**
     * @var string
     *
     * @ORM\Column(name="adresa", type="string", length=255)
     */
    private $adresa;

    /**
     * @ORM\Column(name="obsluha", type="integer")
     */
    private $obsluha;

    /**
     * @ORM\Column(name="prostredi", type="integer")
     */
    private $prostredi;

    /**
     * @ORM\Column(name="celkem", type="integer")
     */
    private $celkem;
    
    /**
     * @ORM\Column(name="popis", type="string", length=1000)
     */
    private $popis;

    /**
     * @var string
     *
     * @ORM\Column(name="lat", type="string", length=255, nullable=true)
     */
    private $lat;
    
    /**
     * @var string
     *
     * @ORM\Column(name="lon", type="string", length=255, nullable=true)
     */
    private $lon;
    
    /**
     * @ORM\OneToMany(targetEntity="Pivo", mappedBy="hospoda")
     */
    private $piva;

    /**
     * @ORM\ManyToOne(targetEntity="Lokace", inversedBy="hospody")
     * @ORM\JoinColumn(name="lokace_id", referencedColumnName="id")
     */
    private $lokace;
    
    /**
     * 
     * @ORM\ManyToMany(targetEntity="Atrakce", inversedBy="hospody")
     * @ORM\JoinTable()
     */
    private $atrakce;
    
    

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set jmeno
     *
     * @param string $jmeno
     * @return Hospoda
     */
    public function setJmeno($jmeno) {
        $this->jmeno = $jmeno;

        return $this;
    }

    /**
     * Get jmeno
     *
     * @return string 
     */
    public function getJmeno() {
        return $this->jmeno;
    }

    /**
     * Set adresa
     *
     * @param string $adresa
     * @return Hospoda
     */
    public function setAdresa($adresa) {
        $this->adresa = $adresa;

        return $this;
    }

    /**
     * Get adresa
     *
     * @return string 
     */
    public function getAdresa() {
        return $this->adresa;
    }

    /**
     * Constructor
     */
    public function __construct() {
        $this->piva = new ArrayCollection();
    }

    /**
     * Add piva
     *
     * @param Pivo $piva
     * @return Hospoda
     */
    public function addPiva(Pivo $piva) {
        $this->piva[] = $piva;

        return $this;
    }

    /**
     * Remove piva
     *
     * @param Pivo $piva
     */
    public function removePiva(Pivo $piva) {
        $this->piva->removeElement($piva);
    }

    /**
     * Get piva
     *
     * @return Collection 
     */
    public function getPiva() {
        return $this->piva;
    }

    /**
     * Set obsluha
     *
     * @param integer $obsluha
     * @return Hospoda
     */
    public function setObsluha($obsluha) {
        $this->obsluha = $obsluha;

        return $this;
    }

    /**
     * Get obsluha
     *
     * @return integer 
     */
    public function getObsluha() {
        return $this->obsluha;
    }

    /**
     * Set prostredi
     *
     * @param integer $prostredi
     * @return Hospoda
     */
    public function setProstredi($prostredi) {
        $this->prostredi = $prostredi;

        return $this;
    }

    /**
     * Get prostredi
     *
     * @return integer 
     */
    public function getProstredi() {
        return $this->prostredi;
    }

    /**
     * Set celkem
     *
     * @param integer $celkem
     * @return Hospoda
     */
    public function setCelkem($celkem) {
        $this->celkem = $celkem;

        return $this;
    }

    /**
     * Get celkem
     *
     * @return integer 
     */
    public function getCelkem() {
        return $this->celkem;
    }


    /**
     * Set lokace
     *
     * @param Lokace $lokace
     * @return Hospoda
     */
    public function setLokace(Lokace $lokace = null)
    {
        $this->lokace = $lokace;

        return $this;
    }

    /**
     * Get lokace
     *
     * @return Lokace 
     */
    public function getLokace()
    {
        return $this->lokace;
    }

    /**
     * Add atrakce
     *
     * @param \AppBundle\Entity\Atrakce $atrakce
     * @return Hospoda
     */
    public function addAtrakce(\AppBundle\Entity\Atrakce $atrakce)
    {
        $this->atrakce[] = $atrakce;

        return $this;
    }

    /**
     * Remove atrakce
     *
     * @param \AppBundle\Entity\Atrakce $atrakce
     */
    public function removeAtrakce(\AppBundle\Entity\Atrakce $atrakce)
    {
        $this->atrakce->removeElement($atrakce);
    }

    /**
     * Get atrakce
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAtrakce()
    {
        return $this->atrakce;
    }

    /**
     * Set popis
     *
     * @param string $popis
     * @return Hospoda
     */
    public function setPopis($popis)
    {
        $this->popis = $popis;

        return $this;
    }

    /**
     * Get popis
     *
     * @return string 
     */
    public function getPopis()
    {
        return $this->popis;
    }

    /**
     * Set lat
     *
     * @param string $lat
     * @return Hospoda
     */
    public function setLat($lat)
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * Get lat
     *
     * @return string 
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set lon
     *
     * @param string $lon
     * @return Hospoda
     */
    public function setLon($lon)
    {
        $this->lon = $lon;

        return $this;
    }

    /**
     * Get lon
     *
     * @return string 
     */
    public function getLon()
    {
        return $this->lon;
    }
}
