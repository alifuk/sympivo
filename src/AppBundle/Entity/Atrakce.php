<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hospoda
 *
 * @ORM\Table(name="atrakce")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AtrakceRepository")
 * 
 */
class Atrakce {

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
     * @ORM\ManyToMany(targetEntity="Hospoda", mappedBy="atrakce")
     */
    private $hospody;

    /**
     * @var string
     *
     * @ORM\Column(name="icon", type="string", length=255)
     */
    private $icon;

    /**
     * Constructor
     */
    public function __construct() {
        $this->hospody = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * @return Atrakce
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
     * Add hospody
     *
     * @param \AppBundle\Entity\Hospoda $hospody
     * @return Atrakce
     */
    public function addHospody(\AppBundle\Entity\Hospoda $hospody) {
        $this->hospody[] = $hospody;

        return $this;
    }

    /**
     * Remove hospody
     *
     * @param \AppBundle\Entity\Hospoda $hospody
     */
    public function removeHospody(\AppBundle\Entity\Hospoda $hospody) {
        $this->hospody->removeElement($hospody);
    }

    /**
     * Get hospody
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getHospody() {
        return $this->hospody;
    }


    /**
     * Set icon
     *
     * @param string $icon
     * @return Atrakce
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Get icon
     *
     * @return string 
     */
    public function getIcon()
    {
        return $this->icon;
    }
}
