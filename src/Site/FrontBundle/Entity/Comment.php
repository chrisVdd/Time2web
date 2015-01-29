<?php

namespace Site\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Comment
 *
 * @ORM\Entity(repositoryClass="Site\FrontBundle\Entity\CommentRepository")
 * @ORM\Table(name="comment")
 * 
 */
class Comment
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
     * @ORM\Column(name="content", type="text")
     * @Assert\Length(min=10)
     */
    private $content;

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
     * @Assert\Valid()
     */
    private $user;
    
    /**
     * @ORM\ManyToOne(targetEntity="Site\FrontBundle\Entity\Tutorial", inversedBy="comments", cascade={"persist"})
     * @Assert\Valid()
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
     * Set content
     *
     * @param string $content
     * @return Comment
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Comment
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
     * @return Comment
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
     * @return Comment
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
     * @return Comment
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
