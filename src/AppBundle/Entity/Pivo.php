<?php

namespace AppBundle\Entity;

use AppBundle\Repository\PivoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Pivo
 *
 * @ORM\Table(name="piva")
 * @ORM\Entity()
 * 
 */
class Pivo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *      
     */
    private $id;

    /**
     * @var string
     *  
     * @ORM\ManyToOne(targetEntity="ZnackaPiva", inversedBy="piva")
     * @ORM\JoinColumn(name="znacka_id", referencedColumnName="id")
     */
    private $znacka;
    
    
    
    /**
     * 
     * @ORM\ManyToOne(inversedBy="piva", targetEntity="Hospoda")
     * @ORM\JoinColumn(name="hospoda_id", referencedColumnName="id")
     */
    private $hospoda;

    /**
     *
     * @ORM\Column(name="cena", type="integer")
     */
    private $cena;
    

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
     * Set cena
     *
     * @param integer $cena
     * @return Pivo
     */
    public function setCena($cena)
    {
        $this->cena = $cena;

        return $this;
    }

    /**
     * Get cena
     *
     * @return integer 
     */
    public function getCena()
    {
        return $this->cena;
    }

    /**
     * Set znacka
     *
     * @param \AppBundle\Entity\ZnackaPiva $znacka
     * @return Pivo
     */
    public function setZnacka(\AppBundle\Entity\ZnackaPiva $znacka = null)
    {
        $this->znacka = $znacka;

        return $this;
    }

    /**
     * Get znacka
     *
     * @return \AppBundle\Entity\ZnackaPiva 
     */
    public function getZnacka()
    {
        return $this->znacka;
    }

    /**
     * Set hospoda
     *
     * @param \AppBundle\Entity\Hospoda $hospoda
     * @return Pivo
     */
    public function setHospoda(\AppBundle\Entity\Hospoda $hospoda = null)
    {
        $this->hospoda = $hospoda;

        return $this;
    }

    /**
     * Get hospoda
     *
     * @return \AppBundle\Entity\Hospoda 
     */
    public function getHospoda()
    {
        return $this->hospoda;
    }
}
