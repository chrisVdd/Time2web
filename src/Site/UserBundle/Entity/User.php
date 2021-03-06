<?php

namespace Site\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use FOS\UserBundle\Model\User as BaseUser;


/**
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Site\UserBundle\Entity\UserRepository")
 * @ORM\Table(name="user")
 */

class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @Assert\Regex(
     *  pattern="/[a-zA-Z]|\d{7,20}/",
     *  message="Le mot de passe doit contenir entre 7 et 20 caractères alphanumériques dont un chiffre."
     * )
     */
    protected $plainPassword;
    
    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    protected $type;
    
    /**
     * @ORM\OneToOne(targetEntity="Site\UserBundle\Entity\Reader", cascade={"persist", "remove"}, mappedBy="user")
     */
    private $reader;
    
    /**
     * @ORM\OneToOne(targetEntity="Site\UserBundle\Entity\Author", cascade={"persist", "remove"}, mappedBy="user")
     */
    private $author;
    
    /**
     * @ORM\OneToMany(targetEntity="Site\FrontBundle\Entity\Tutorial", mappedBy="user")
     */
    private $tutorials;
    
    /**
     * @ORM\OneToOne(targetEntity="Site\FrontBundle\Entity\Image", cascade={"persist", "remove"})
     * @Assert\Valid
     */
    private $image;
    
    public function __construct()
    {
        parent::__construct();
        $this->tutorials= new ArrayCollection();
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
     * Set type
     *
     * @param string $type
     * @return User
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set reader
     *
     * @param \Site\UserBundle\Entity\Reader $reader
     * @return User
     */
    public function setReader(\Site\UserBundle\Entity\Reader $reader = null)
    {
        $this->reader = $reader;
        $reader->setUser($this);

        return $this;
    }

    /**
     * Get reader
     *
     * @return \Site\UserBundle\Entity\Reader 
     */
    public function getReader()
    {
        return $this->reader;
    }

    /**
     * Set author
     *
     * @param \Site\UserBundle\Entity\Author $author
     * @return User
     */
    public function setAuthor(\Site\UserBundle\Entity\Author $author = null)
    {
        $this->author = $author;
        $author->setUser($this);
        return $this;
    }

    /**
     * Get author
     *
     * @return \Site\UserBundle\Entity\Author 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Add tutorials
     *
     * @param \Site\FrontBundle\Entity\Tutorial $tutorials
     * @return User
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
     * @return User
     */
    public function setImage(\Site\FrontBundle\Entity\Image $image = null)
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
}
