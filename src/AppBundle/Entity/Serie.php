<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Serie
 *
 * @ORM\Table(name="serie")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SerieRepository")
 */
class Serie
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
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=75)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="nationality", type="string", length=75)
     */
    private $nationality;

    /**
     * @var string
     *
     * @ORM\Column(name="showrunner", type="string", length=255)
     */
    private $showrunner;

    /**
     * @var string
     *
     * @ORM\Column(name="actors", type="string", length=255)
     */
    private $actors;

    /**
     * @var string
     *
     * @ORM\Column(name="characters", type="string", length=255, nullable=true)
     */
    private $characters;

    /**
     * @var int
     *
     * @ORM\Column(name="seasons", type="integer")
     */
    private $seasons;

    /**
     * @var array
     *
     * @ORM\OneToMany(targetEntity="Episode", mappedBy="serie")
     */
    private $episodes;

    /**
     * @var string
     *
     * @ORM\Column(name="summary", type="string", length=255, nullable=true, unique=true)
     */
    private $summary;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="string", length=255, nullable=true)
     */
    private $comments;

    /**
     * @var int
     *
     * @ORM\Column(name="note", type="integer", nullable=true)
     */
    private $note;

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
     * Set nationality
     *
     * @param string $nationality
     * @return Serie
     */
    public function setNationality($nationality)
    {
        $this->nationality = $nationality;

        return $this;
    }

    /**
     * Get nationality
     *
     * @return string 
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * Set showrunner
     *
     * @param string $showrunner
     * @return Serie
     */
    public function setShowrunner($showrunner)
    {
        $this->showrunner = $showrunner;

        return $this;
    }

    /**
     * Get showrunner
     *
     * @return string 
     */
    public function getShowrunner()
    {
        return $this->showrunner;
    }

    /**
     * Set actors
     *
     * @param string $actors
     * @return Serie
     */
    public function setActors($actors)
    {
        $this->actors = $actors;

        return $this;
    }

    /**
     * Get actors
     *
     * @return string 
     */
    public function getActors()
    {
        return $this->actors;
    }

    /**
     * Set characters
     *
     * @param string $characters
     * @return Serie
     */
    public function setCharacters($characters)
    {
        $this->characters = $characters;

        return $this;
    }

    /**
     * Get characters
     *
     * @return string 
     */
    public function getCharacters()
    {
        return $this->characters;
    }

    /**
     * Set seasons
     *
     * @param integer $seasons
     * @return Serie
     */
    public function setSeasons($seasons)
    {
        $this->seasons = $seasons;

        return $this;
    }

    /**
     * Get seasons
     *
     * @return integer 
     */
    public function getSeasons()
    {
        return $this->seasons;
    }

    /**
     * Set episodes
     *
     * @param string $episodes
     * @return Serie
     */
    public function setEpisodes($episodes)
    {
        $this->episodes = $episodes;

        return $this;
    }

    /**
     * Get episodes
     *
     * @return string 
     */
    public function getEpisodes()
    {
        return $this->episodes;
    }

    /**
     * Set summary
     *
     * @param string $summary
     * @return Serie
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * Get summary
     *
     * @return string 
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Set comments
     *
     * @param string $comments
     * @return Serie
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return string 
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set note
     *
     * @param integer $note
     * @return Serie
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return integer 
     */
    public function getNote()
    {
        return $this->note;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->episodes = new ArrayCollection();
    }

    /**
     * Add episodes
     *
     * @param \AppBundle\Entity\Episode $episodes
     * @return Serie
     */
    public function addEpisode(\AppBundle\Entity\Episode $episodes)
    {
        $this->episodes[] = $episodes;

        return $this;
    }

    /**
     * Remove episodes
     *
     * @param \AppBundle\Entity\Episode $episodes
     */
    public function removeEpisode(\AppBundle\Entity\Episode $episodes)
    {
        $this->episodes->removeElement($episodes);
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Serie
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
}
