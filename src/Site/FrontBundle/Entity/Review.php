<?php

namespace Site\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Review
 *
 * @ORM\Entity(repositoryClass="Site\FrontBundle\Entity\ReviewRepository")
 * @ORM\Table(name="review")
 * 
 */
class Review
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
     * @var integer
     *
     * @ORM\Column(name="value", type="integer")
     * @Assert\NotBlank()
     */
    private $value;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", nullable=true)
     * @Assert\Length(min=10)
     */
    private $comment;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     * @Assert\DateTime()
     */
    private $createdAt;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean")
     */
    private $status;
    
    /**
     * @ORM\ManyToOne(targetEntity="Site\UserBundle\Entity\User")
     */
    private $user;
    
    /**
     * @ORM\ManyToOne(targetEntity="Site\FrontBundle\Entity\Tutorial", inversedBy="reviews", cascade={"persist"})
     */
    private $tutorial;

    
    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->status = true;  
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
     * Set value
     *
     * @param integer $value
     * @return Review
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return integer 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return Review
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Review
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
     * Set status
     *
     * @param boolean $status
     * @return Review
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
     * Set user
     *
     * @param \Site\UserBundle\Entity\User $user
     * @return Review
     */
    public function setUser(\Site\UserBundle\Entity\User $user)
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

    /**
     * Set tutorial
     *
     * @param \Site\FrontBundle\Entity\Tutorial $tutorial
     * @return Review
     */
    public function setTutorial(\Site\FrontBundle\Entity\Tutorial $tutorial)
    {
        $this->tutorial = $tutorial;

        return $this;
    }

    /**
     * Get tutorial
     *
     * @return \Site\FrontBundle\Entity\Tutorial 
     */
    public function getTutorial()
    {
        return $this->tutorial;
    }
}
