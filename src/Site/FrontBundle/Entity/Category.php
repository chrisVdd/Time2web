<?php

namespace Site\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Category
 *
 * @ORM\Entity(repositoryClass="Site\FrontBundle\Entity\CategoryRepository")
 * @ORM\Table(name="category")
 * 
 */
class Category
{
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
     * @ORM\Column(name="name", type="string", length=64)
     * @Assert\Length(min=5)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     * @Assert\Length(min=30)
     */
    private $description;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean")
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     * @Assert\DateTime()
     */
    private $createdAt;
    
    /**
     * @ORM\OneToMany(targetEntity="Site\FrontBundle\Entity\Tutorial", mappedBy="category")
     * @Assert\Valid()
     */
    protected $tutorials;
    
    /**
     * @ORM\OneToOne(targetEntity="Site\FrontBundle\Entity\Image", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotNull()
     */
    private $image;
    
    /**
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(length=128, unique=true)
     * @Assert\Length(min=5)
     */
    private $slug;
    
    /**
     * Construct
     */
    public function __construct()
    {   
        $this->tutorials = new \Doctrine\Common\Collections\ArrayCollection();
        $this->createdAt = new \DateTime();
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

    /**
     * Set description
     *
     * @param string $description
     * @return Category
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
     * Set status
     *
     * @param boolean $status
     * @return Category
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Category
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Add tutorials
     *
     * @param \Site\FrontBundle\Entity\Tutorial $tutorials
     * @return Category
     */
    public function addTutorial(\Site\FrontBundle\Entity\Tutorial $tutorials)
    {
        $this->tutorials[] = $tutorials;

        return $this;
    }

    /**
     * Remove tutorials
     *
     * @param \Site\FrontBundle\Entity\Tutorial $tutorials
     */
    public function removeTutorial(\Site\FrontBundle\Entity\Tutorial $tutorials)
    {
        $this->tutorials->removeElement($tutorials);
    }

    /**
     * Get tutorials
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTutorials()
    {
        return $this->tutorials;
    }

    /**
     * Set image
     *
     * @param \Site\FrontBundle\Entity\Image $image
     * @return Category
     */
    public function setImage(\Site\FrontBundle\Entity\Image $image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \Site\FrontBundle\Entity\Image 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Category
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }
}
