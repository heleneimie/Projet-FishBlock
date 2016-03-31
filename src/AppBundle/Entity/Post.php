<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Post
 *
 * @ORM\Table(name="post")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PostRepository")
 */
class Post
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     * @Assert\Length(
     *      min = 4,
     *      max = 250,
     *      minMessage = "Votre commentaire doit comporter au moins {{ limit }} caractères",
     *      maxMessage = "Désolé, pas plus de 250 {{ limit }} caractères"
     * )
     * @ORM\Column(name="content", type="text")
     */
    private $content;

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
     * @var string
     *
     * @ORM\Column(name="language", type="string", options={"default":"fr"})
     */
    private $language;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="comments")
     * @ORM\JoinColumn(name="author_id", referencedColumnName="id")
     */
    private $author;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Serie", inversedBy="posts")
     * @ORM\JoinColumn(name="serie_id", referencedColumnName="id")
     */
    private $serie;


    public function __construct()
    {
        $this->date = new \DateTime();
        $this->language = "fr";
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
     * Set date
     *
     * @param  \Datetime $date
     * @return Post
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date->format("d-m H:i");
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Post
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
     * Set note
     *
     * @param integer $note
     * @return Post
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
     * Set serie
     *
     * @param string $serie
     * @return Serie
     */
    public function setSerie($serie)
    {
        $this->serie = $serie;
        return $this;
    }

    /**
     * Get serie
     *
     * @return string
     */
    public function getSerie()
    {
        return $this->serie;
    }

    /**
     * Set language
     *
     * @param string $language
     * @return Post
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set author
     *
     * @param string $author
     * @return User
     */
    public function setAuthor($author)
    {
        $this->author = $author;
        return $this;
    }

    public function __toString()
    {
        return $this->getContent();
    }

}
