<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hospoda
 *
 * @ORM\Table(name="lokace")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LokaceRepository")
 * 
 */
class Lokace {

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
     * @ORM\OneToMany(targetEntity="Hospoda", mappedBy="lokace")
     */
    private $hospody;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->hospody = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set jmeno
     *
     * @param string $jmeno
     * @return Lokace
     */
    public function setJmeno($jmeno)
    {
        $this->jmeno = $jmeno;

        return $this;
    }

    /**
     * Get jmeno
     *
     * @return string 
     */
    public function getJmeno()
    {
        return $this->jmeno;
    }

    /**
     * Add hospody
     *
     * @param \AppBundle\Entity\Hospoda $hospody
     * @return Lokace
     */
    public function addHospody(\AppBundle\Entity\Hospoda $hospody)
    {
        $this->hospody[] = $hospody;

        return $this;
    }

    /**
     * Remove hospody
     *
     * @param \AppBundle\Entity\Hospoda $hospody
     */
    public function removeHospody(\AppBundle\Entity\Hospoda $hospody)
    {
        $this->hospody->removeElement($hospody);
    }

    /**
     * Get hospody
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getHospody()
    {
        return $this->hospody;
    }
}
