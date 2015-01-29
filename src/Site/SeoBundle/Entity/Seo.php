<?php

namespace Site\SeoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Seo
 *
 * @ORM\Entity(repositoryClass="Site\SeoBundle\Entity\SeoRepository")
 * @ORM\Table(name="seo")
 * 
 */
class Seo
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;
    
    /**
     * @var string
     *
     * @ORM\Column(name="suffix", type="string", length=255)
     */
    private $suffix;

    /**
     * @var string
     *
     * @ORM\Column(name="h1", type="string", length=255)
     */
    private $h1;

    /**
     * @var string
     *
     * @ORM\Column(name="metaDescription", type="text")
     */
    private $metaDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="metaRobot", type="text")
     */
    private $metaRobot;


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
     * Set h1
     *
     * @param string $h1
     * @return Seo
     */
    public function setH1($h1)
    {
        $this->h1 = $h1;

        return $this;
    }

    /**
     * Get h1
     *
     * @return string 
     */
    public function getH1()
    {
        return $this->h1;
    }

    /**
     * Set metaDescription
     *
     * @param string $metaDescription
     * @return Seo
     */
    public function setMetaDescription($metaDescription)
    {
        $this->metaDescription = $metaDescription;

        return $this;
    }

    /**
     * Get metaDescription
     *
     * @return string 
     */
    public function getMetaDescription()
    {
        return $this->metaDescription;
    }

    /**
     * Set metaRobot
     *
     * @param string $metaRobot
     * @return Seo
     */
    public function setMetaRobot($metaRobot)
    {
        $this->metaRobot = $metaRobot;

        return $this;
    }

    /**
     * Get metaRobot
     *
     * @return string 
     */
    public function getMetaRobot()
    {
        return $this->metaRobot;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Seo
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
     * Set suffix
     *
     * @param string $suffix
     * @return Seo
     */
    public function setSuffix($suffix)
    {
        $this->suffix = $suffix;

        return $this;
    }

    /**
     * Get suffix
     *
     * @return string 
     */
    public function getSuffix()
    {
        return $this->suffix;
    }
}
