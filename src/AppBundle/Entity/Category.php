<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="Ad", mappedBy="category")
     */
    private $ad;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;


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
     * Set name
     *
     * @param string $name
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    public function __toString()
    {
        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ad = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add ad
     *
     * @param \AppBundle\Entity\Ad $ad
     * @return Category
     */
    public function addAd(\AppBundle\Entity\Ad $ad)
    {
        $this->ad[] = $ad;

        return $this;
    }

    /**
     * Remove ad
     *
     * @param \AppBundle\Entity\Ad $ad
     */
    public function removeAd(\AppBundle\Entity\Ad $ad)
    {
        $this->ad->removeElement($ad);
    }

    /**
     * Get ad
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAd()
    {
        return $this->ad;
    }
}
