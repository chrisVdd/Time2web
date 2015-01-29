<?php

namespace Site\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Favorite
 *
 * @ORM\Entity(repositoryClass="Site\FrontBundle\Entity\FavoriteRepository")
 * @ORM\Table(name="favorite")
 */
class Favorite
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
     * @ORM\ManyToOne(targetEntity="Site\FrontBundle\Entity\Tutorial")
     * @ORM\JoinColumn(name="tutorial_id", nullable=false, referencedColumnName="id")
     */
    private $tutorial;
    
    /**
     * @ORM\ManyToOne(targetEntity="Site\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", nullable=false, referencedColumnName="id")
     * 
     */
    private $user;
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }


    /**
     * Set tutorial
     *
     * @param \Site\FrontBundle\Entity\Tutorial $tutorial
     * @return Favorite
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

    /**
     * Set user
     *
     * @param \Site\UserBundle\Entity\User $user
     * @return Favorite
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
