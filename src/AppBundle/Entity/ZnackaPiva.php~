<?php

namespace AppBundle\Entity;

use AppBundle\Repository\PivoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;

/**
 * Pivo
 *
 * @ORM\Table(name="ZnackaPiva")
 * @ORM\Entity()
 * 
 */
class ZnackaPiva
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
     * @ORM\Column(name="nazev", type="string", length=255)
     */
    private $nazev;
    
    
    
    /**
     *
     *  @OneToMany(targetEntity="Pivo", mappedBy="znacka")
     * 
     */
    private $piva;

    
    
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
     * Set nazev
     *
     * @param string $nazev
     * @return Pivo
     */
    public function setNazev($nazev)
    {
        $this->nazev = $nazev;

        return $this;
    }

    /**
     * Get nazev
     *
     * @return string 
     */
    public function getNazev()
    {
        return $this->nazev;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->hospody = new ArrayCollection();
    }

    /**
     * Add hospody
     *
     * @param Hospoda $hospody
     * @return Pivo
     */
    public function addHospody(Hospoda $hospody)
    {
        $this->hospody[] = $hospody;

        return $this;
    }

    /**
     * Remove hospody
     *
     * @param Hospoda $hospody
     */
    public function removeHospody(Hospoda $hospody)
    {
        $this->hospody->removeElement($hospody);
    }

    /**
     * Get hospody
     *
     * @return Collection 
     */
    public function getHospody()
    {
        return $this->hospody;
    }

    /**
     * Add piva
     *
     * @param \AppBundle\Entity\Pivo $piva
     * @return ZnackaPiva
     */
    public function addPiva(\AppBundle\Entity\Pivo $piva)
    {
        $this->piva[] = $piva;

        return $this;
    }

    /**
     * Remove piva
     *
     * @param \AppBundle\Entity\Pivo $piva
     */
    public function removePiva(\AppBundle\Entity\Pivo $piva)
    {
        $this->piva->removeElement($piva);
    }

    /**
     * Get piva
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPiva()
    {
        return $this->piva;
    }
}
