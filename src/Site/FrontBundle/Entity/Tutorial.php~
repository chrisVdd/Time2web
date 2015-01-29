<?php

namespace Site\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Tutorial
 *
 * @ORM\Entity(repositoryClass="Site\FrontBundle\Entity\TutorialRepository")
 * @ORM\Table(name="tutorial")
 */
class Tutorial{

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
     * @ORM\Column(name="title", type="string", length=64)
     * @Assert\Length(min=10)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     * @Assert\Length(min=30)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     * @Assert\Length(min=200)
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
     * @var \DateTime
     *
     * @ORM\Column(name="last_modified", type="datetime")
     * @Assert\DateTime()
     */
    private $lastModified;

    /**
     * @var boolean
     *
     * @ORM\Column(name="difficulty", type="integer")
     * @Assert\NotBlank()
     */
    private $difficulty;

    /**
     * @var string
     *
     * @ORM\Column(name="requirement", type="string", length=64)
     * @Assert\NotBlank()
     */
    private $requirement;

    /**
     * @ORM\ManyToOne(targetEntity="Site\FrontBundle\Entity\Category", inversedBy="tutorials")
     * @ORM\JoinColumn(name="category_id", nullable=false, referencedColumnName="id")
     * @Assert\NotBlank()
     */
    private $category;

    /**
     * @ORM\ManyToMany(targetEntity="Site\FrontBundle\Entity\Programminglanguage")
     * @Assert\NotBlank()
     */
    private $programminglanguages;

    /**
     * @ORM\ManyToOne(targetEntity="Site\UserBundle\Entity\User", inversedBy="tutorials")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(length=128, unique=true)
     * Assert\Length(min=5)
     */
    private $slug;

    /**
     * @ORM\OneToMany(targetEntity="Site\FrontBundle\Entity\Review", mappedBy="tutorial", cascade={"remove"})
     */
    private $reviews;

    /**
     * @ORM\OneToMany(targetEntity="Site\FrontBundle\Entity\Comment", mappedBy="tutorial", cascade={"remove"})
     */
    private $comments;

    /**
     * @ORM\OneToOne(targetEntity="Site\FrontBundle\Entity\Image", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $image;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="promote", type="boolean")
     */
    private $promote;

    /**
     * Construct
     */
    public function __construct() {
        $this->createdAt = new \DateTime();
        $this->lastModified = new \DateTime();
        $this->programminglanguages = new \Doctrine\Common\Collections\ArrayCollection();
        $this->reviews = new ArrayCollection();
        $this->promote = false;
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
     * Set title
     *
     * @param string $title
     * @return Tutorial
     */
    public function setTitle($title) {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Tutorial
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Tutorial
     */
    public function setContent($content) {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent() {
        return $this->content;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Tutorial
     */
    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt() {
        return $this->createdAt;
    }

    /**
     * Set lastModified
     *
     * @param \DateTime $lastModified
     * @return Tutorial
     */
    public function setLastModified($lastModified) {
        $this->lastModified = $lastModified;

        return $this;
    }

    /**
     * Get lastModified
     *
     * @return \DateTime 
     */
    public function getLastModified() {
        return $this->lastModified;
    }

    /**
     * Set difficulty
     *
     * @param boolean $difficulty
     * @return Tutorial
     */
    public function setDifficulty($difficulty) {
        $this->difficulty = $difficulty;

        return $this;
    }

    /**
     * Get difficulty
     *
     * @return boolean 
     */
    public function getDifficulty() {
        return $this->difficulty;
    }

    /**
     * Set requirement
     *
     * @param string $requirement
     * @return Tutorial
     */
    public function setRequirement($requirement) {
        $this->requirement = $requirement;

        return $this;
    }

    /**
     * Get requirement
     *
     * @return string 
     */
    public function getRequirement() {
        return $this->requirement;
    }

    /**
     * Set category
     *
     * @param \Site\FrontBundle\Entity\Category $category
     * @return Tutorial
     */
    public function setCategory(\Site\FrontBundle\Entity\Category $category) {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Site\FrontBundle\Entity\Category 
     */
    public function getCategory() {
        return $this->category;
    }

    /**
     * Add programminglanguage
     *
     * @param \Site\FrontBundle\Entity\Programminglanguage $programminglanguages
     * @return Tutorial
     */
    public function addProgramminglanguage(\Site\FrontBundle\Entity\Programminglanguage $programminglanguages) {
        $this->programminglanguages[] = $programminglanguages;

        return $this;
    }

    /**
     * Remove programminglanguages
     *
     * @param \Site\FrontBundle\Entity\ProgrammingLanguage $programminglanguages
     */
    public function removeProgramminglanguage(\Site\FrontBundle\Entity\Programminglanguage $programminglanguages) {
        $this->programminglanguages->removeElement($programminglanguages);
    }

    /**
     * Get programminglanguages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProgramminglanguages() {
        return $this->programminglanguages;
    }

    /**
     * Set author
     *
     * @param \Site\UserBundle\Entity\Author $author
     * @return Tutorial
     */
    public function setAuthor(\Site\UserBundle\Entity\Author $author) {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return \Site\UserBundle\Entity\Author 
     */
    public function getAuthor() {
        return $this->author;
    }

    /**
     * Set user
     *
     * @param \Site\UserBundle\Entity\User $user
     * @return Tutorial
     */
    public function setUser(\Site\UserBundle\Entity\User $user = null) {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Site\UserBundle\Entity\User 
     */
    public function getUser() {
        return $this->user;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Tutorial
     */
    public function setSlug($slug) {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug() {
        return $this->slug;
    }

    /**
     * Add reviews
     *
     * @param \Site\FrontBundle\Entity\Review $review
     * @return Tutorial
     */
    public function addReview(\Site\FrontBundle\Entity\Review $review) {
        $this->reviews[] = $review;
        $review->setTutorial($this);

        return $this;
    }

    /**
     * Remove reviews
     *
     * @param \Site\FrontBundle\Entity\Review $review
     */
    public function removeReview(\Site\FrontBundle\Entity\Review $review) {
        $this->reviews->removeElement($review);
    }

    /**
     * Get reviews
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getReviews() {
        return $this->reviews;
    }

    /**
     * Set image
     *
     * @param \Site\FrontBundle\Entity\Image $image
     * @return Tutorial
     */
    public function setImage(\Site\FrontBundle\Entity\Image $image = null) {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \Site\FrontBundle\Entity\Image 
     */
    public function getImage() {
        return $this->image;
    }

    /**
     * Add comments
     *
     * @param \Site\FrontBundle\Entity\Comment $comments
     * @return Tutorial
     */
    public function addComment(\Site\FrontBundle\Entity\Comment $comments) {
        $this->comments[] = $comments;

        return $this;
    }

    /**
     * Remove comments
     *
     * @param \Site\FrontBundle\Entity\Comment $comments
     */
    public function removeComment(\Site\FrontBundle\Entity\Comment $comments) {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComments() {
        return $this->comments;
    }


    /**
     * Set promote
     *
     * @param boolean $promote
     * @return Tutorial
     */
    public function setPromote($promote)
    {
        $this->promote = $promote;

        return $this;
    }

    /**
     * Get promote
     *
     * @return boolean 
     */
    public function getPromote()
    {
        return $this->promote;
    }
}
