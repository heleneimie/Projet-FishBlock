<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @ORM\Column(name="season", type="integer")
     */
    private $season;

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
     * @Assert\Range(
     *      min = 0,
     *      max = 10,
     *      minMessage = "La note doit être supérieure ou égale à {{ limit }}",
     *      maxMessage = "La note ne peut pas être supérieure à {{ limit }}"
     * )
     */
    private $note;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="seriesProposed")
     * @ORM\JoinColumn(name="author_id", referencedColumnName="id")
     */
    private $author;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Post", mappedBy="serie")
     */
    private $posts;

    /**
     * @var DateTime
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     * @ORM\Column(name="poster", type="string")
     */
    private $poster;

    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="seriesFollowed")
     *
     */
    private $followedBy;


    public function __construct()
    {
        $this->date = new \DateTime();
        $this->actors = new ArrayCollection();
        $this->episodes = new ArrayCollection();
        $this->posts = new ArrayCollection();
        $this->followedBy = new ArrayCollection();
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
     * Get actors
     *
     * @return string
     */
    public function getActors()
    {
        return $this->actors;
    }

    /**
     * Set season
     *
     * @param integer $season
     * @return Serie
     */
    public function setSeason($season)
    {
        $this->season = $season;

        return $this;
    }

    /**
     * Get season
     *
     * @return integer
     */
    public function getSeason()
    {
        return $this->season;
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
        if($note < 0){
            $this->note = 0;
        } else if($note > 10) {
            $this->note = 10;
        } else {
            $this->note = $note;
        }
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
     * Set posts (used for fixtures)
     *
     */
    public function setPosts($posts)
    {
        foreach($posts as $post){
            $post->addSerie($this);
        }
        $this->posts = $posts;
        return $this;
    }

    /**
     * Add post
     *
     * @param \AppBundle\Entity\Post $post
     * @return Post
     */
    public function addPost(Post $post)
    {
        $post->addSerie($this);
        $this->posts[] = $post;

        return $this;
    }


    public function getPosts()
    {
        return $this->posts;
    }

    /**
     * Remove post
     *
     * @param \AppBundle\Entity\Post $post
     */
    public function removePost(Post $post)
    {
        $this->posts->removeElement($post);
        $post->removeSerie($this);
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
        return $this;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setPoster($poster)
    {
        $this->poster = $poster;

        return $this;
    }

    public function getPoster()
    {
        return $this->poster;
    }

    public function setFollowedBy($user)
    {
        $this->followedBy[] = $user;
    }

    public function removeFollowedBy($user)
    {
        $this->followedBy->removeElement($user);
    }

    public function getFollowedBy()
    {
        return $this->followedBy;
    }



}
