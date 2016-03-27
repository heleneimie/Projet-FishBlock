<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;

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
     * @var array
     *
     * @ORM\ManyToMany(targetEntity="Actor", inversedBy="series")
     * @ORM\JoinTable(name="series_actors")
     */
    private $actors;

    /**
     * @var string
     *
     * @ORM\Column(name="genre", type="string")
     */
    private $genre;

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
     * @ORM\Column(name="summary", type="text")
     */
    private $summary;

    /**
     *
     * @ORM\OneToOne(targetEntity="Post")
     * @ORM\JoinColumn(name="post_id", referencedColumnName="id")
     */
    private $comments;

    /**
     * @var int
     *
     * @ORM\Column(name="note", type="integer", nullable=true)
     */
    private $note;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", nullable=true)
     */
    private $author;

    /**
     * @var DateTime
     * @ORM\Column(name="date", type="date")
     */
    private $date;

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
     * Get actors
     *
     * @return string
     */
    public function getActors()
    {
        return $this->actors;
    }

    /**
     * Set seasons
     *
     * @param integer $season
     * @return Serie
     */
    public function setSeason($season)
    {
        $this->seasons = $season;

        return $this;
    }

    /**
     * Get seasons
     *
     * @return integer
     */
    public function getSeason()
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
        $this->date = new \DateTime();
        $this->author = "A. Nonyme";
        $this->actors = new ArrayCollection();
        $this->episodes = new ArrayCollection();
    }

    /**
     * Add actor
     *
     * @param \AppBundle\Entity\Actor $actor
     * @return Serie
     */
    public function addActor(Actor $actor)
    {
        $actor->addSerie($this);
        $this->actors[] = $actor;

        return $this;
    }

    /**
     * Set actors
     *
     */
    public function setActors($actors)
    {

        foreach($actors as $actor){
            $actor->addSerie($this);
        }
        $this->actors = $actors;

        return $this;
    }

    /**
     * Remove actor
     *
     * @param \AppBundle\Entity\Actor $actor
     */
    public function removeActor(Actor $actor)
    {
        $this->actors->removeElement($actor);
        $actor->removeSerie($this);
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

    /**
     * Set genre
     *
     * @param string $genre
     * @return Serie
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return string 
     */
    public function getGenre()
    {
        return $this->genre;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getDate()
    {
        return $this->date->format('d-m H:i');
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function getAuthor()
    {
        return $this->author;
    }
}
