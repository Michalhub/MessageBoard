<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ad
 *
 * @ORM\Table(name="ad")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AdRepository")
 */
class Ad
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
     * @ORM\ManyToOne(
     *     targetEntity="User",
     *     inversedBy="ad"
     * )
     * @ORM\JoinColumn(
     *     name="user",
     *     referencedColumnName="id",
     *     nullable=false
     * )
     */
    private $user;

    /**
     ** @ORM\ManyToOne(targetEntity="Category", inversedBy="ad")
     *  @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $category;

    /**
     * @ORM\OneToMany(
     *     targetEntity="Picture",
     *     mappedBy="ad"
     * )
     */
    private $picture;

    /**
     * @ORM\OneToMany(
     *     targetEntity="Comment",
     *     mappedBy="ad"
     * )
     */
    private $comment;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=100)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expireDate", type="datetime")
     *
     */
    private $expireDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creationDate", type="datetime")
     *
     */
    private $creationDate;

    /**
     * @var string
     *
     * @ORM\Column(name="picture_path", type="string", length=255, nullable=true)
     */
    private $picturePath;


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
     * Set title
     *
     * @param string $title
     * @return Ad
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }


    /**
     * Set description
     *
     * @param string $description
     * @return Ad
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set expireDate
     *
     * @param \DateTime $expireDate
     * @return Ad
     */
    public function setExpireDate($expireDate)
    {
        $this->expireDate = $expireDate;

        return $this;
    }

    /**
     * Get expireDate
     *
     * @return \DateTime 
     */
    public function getExpireDate()
    {
        return $this->expireDate;
    }

    /**
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * @param \DateTime $creationDate
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->picturePath = new \Doctrine\Common\Collections\ArrayCollection();
        $this->comment = new \Doctrine\Common\Collections\ArrayCollection();
        $this->creationDate = new \Datetime();


    }

    /**
     * Set picturePath
     *
     * @param string $picturePath
     * @return Ad
     */
    public function setPicturePath($picturePath)
    {
        $this->picturePath = $picturePath;

        return $this;
    }

    /**
     * Get picturePath
     *
     * @return string 
     */
    public function getPicturePath()
    {
        return $this->picturePath;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     * @return Ad
     */
    public function setUser(\AppBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add picture
     *
     * @param \AppBundle\Entity\Picture $picture
     * @return Ad
     */
    public function addPicture(\AppBundle\Entity\Picture $picture)
    {
        $this->picture[] = $picture;

        return $this;
    }

    /**
     * Remove picture
     *
     * @param \AppBundle\Entity\Picture $picture
     */
    public function removePicture(\AppBundle\Entity\Picture $picture)
    {
        $this->picture->removeElement($picture);
    }

    /**
     * Add comment
     *
     * @param \AppBundle\Entity\Comment $comment
     * @return Ad
     */
    public function addComment(\AppBundle\Entity\Comment $comment)
    {
        $this->comment[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \AppBundle\Entity\Comment $comment
     */
    public function removeComment(\AppBundle\Entity\Comment $comment)
    {
        $this->comment->removeElement($comment);
    }

    /**
     * Get comment
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set category
     *
     * @param \AppBundle\Entity\Category $category
     * @return Ad
     */
    public function setCategory(\AppBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \AppBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }

    public function __tostring()
    {
        return $this->ad;
    }

}
