<?php

namespace Site\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Author
 *  
 * @ORM\Entity(repositoryClass="Site\UserBundle\Entity\AuthorRepository")
 * @ORM\Table(name="author")
 * 
 */
class Author
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
     * @ORM\Column(name="name", type="string", length=45)
     * @Assert\Length(min=5)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="presentation", type="text", nullable=true)
     * @Assert\Length(min=30)
     */
    private $presentation;

    /**
     * @var string
     *
     * @ORM\Column(name="web", type="string", length=45, nullable=true)
     * @Assert\Url()
     */
    private $web;
    
    /**
     * @ORM\OneToOne(targetEntity="Site\UserBundle\Entity\User", cascade={"persist", "remove"}, inversedBy="author")
     */
    private $user;


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
     * @return Author
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
     * Set presentation
     *
     * @param string $presentation
     * @return Author
     */
    public function setPresentation($presentation)
    {
        $this->presentation = $presentation;

        return $this;
    }

    /**
     * Get presentation
     *
     * @return string 
     */
    public function getPresentation()
    {
        return $this->presentation;
    }

    /**
     * Set web
     *
     * @param string $web
     * @return Author
     */
    public function setWeb($web)
    {
        $this->web = $web;

        return $this;
    }

    /**
     * Get web
     *
     * @return string 
     */
    public function getWeb()
    {
        return $this->web;
    }

    /**
     * Set user
     *
     * @param \Site\UserBundle\Entity\User $user
     * @return Author
     */
    public function setUser(\Site\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Site\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
