<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fb_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(length=50, nullable=true)
     */
    private $firstname;

    /**
     * @ORM\Column(length=50,nullable=true)
     */
    private $lastname;

    /**
     * @ORM\Column(type="datetime",nullable=true)
     */
    private $birthdate;

    /**
     * @var string
     * @ORM\Column(nullable=true)
     */
    private $picture;

    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="myFriends")
     */
    private $friendsWithMe;

    /**
     * @ORM\ManyToMany(targetEntity="User", inversedBy="friendsWithMe")
     * @ORM\JoinTable(name="friends",
     *      joinColumns={@ORM\JoinColumn(name="user_id",referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="friend_id",referencedColumnName="id")})
     */
    private $myFriends;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Serie", mappedBy="author", cascade={"persist","remove"})
     */
    private $seriesProposed;
    
    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Post", mappedBy="author", cascade={"persist","remove"})
     */
    private $comments;

    /**
     * @ORM\ManyToMany(targetEntity="Serie", inversedBy="followedBy", cascade={"persist", "remove"})
     * @ORM\JoinTable(name="series_followed")
     */
    private $seriesFollowed;


    public function __construct()
    {
        parent::__construct();
        $this->friendsWithMe = new ArrayCollection();
        $this->myFriends = new ArrayCollection();
        $this->seriesProposed = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->created = new \DateTime();
        $this->seriesFollowed = new ArrayCollection();
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set birthdate
     *
     * @param \DateTime $birthdate
     * @return User
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Get birthdate
     *
     * @return \DateTime 
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set picture
     *
     * @param string $picture
     * @return User
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return string 
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Add friendsWithMe
     *
     * @param \AppBundle\Entity\User $user
     * @return User
     */
    public function addFriendsWithMe(\AppBundle\Entity\User $user)
    {
        $this->friendsWithMe[] = $user;

        return $this;
    }

    /**
     * Remove friendsWithMe
     *
     * @param \AppBundle\Entity\User $user
     */
    public function removeFriendsWithMe(\AppBundle\Entity\User $user)
    {
        $this->friendsWithMe->removeElement($user);
    }

    /**
     * Get friendsWithMe
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFriendsWithMe()
    {
        return $this->friendsWithMe;
    }

    /**
     * Add myFriends
     *
     * @param \AppBundle\Entity\User $user
     * @return User
     */
    public function addMyFriend(\AppBundle\Entity\User $user)
    {
        foreach ($this->myFriends as $friend){
            if($friend == $user){
                return false;
            }
        }
        $this->myFriends[] = $user;
        return true;
    }

    /**
     * Remove myFriends
     *
     * @param \AppBundle\Entity\User $user
     */
    public function removeMyFriend(\AppBundle\Entity\User $user)
    {
        $this->myFriends->removeElement($user);
    }

    /**
     * Get myFriends
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMyFriends()
    {
        return $this->myFriends;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return User
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @return mixed
     */
    public function getSeriesProposed()
    {
        return $this->seriesProposed;
    }

    /**
     * @param mixed $seriesProposed
     */
    public function setSeriesProposed($seriesProposed)
    {
        $this->seriesProposed = $seriesProposed;
        return $this;
    }

    /**
     * Add Serie to seriesProposed
     *
     * @param \AppBundle\Entity\Serie $serie
     * @return User
     */
    public function addSeriesProposed(\AppBundle\Entity\Serie $serie)
    {
        $this->seriesProposed[] = $serie;

        return $this;
    }

    /**
     * Remove from seriesProposed
     *
     * @param \AppBundle\Entity\Serie $serie
     */
    public function removeSeriesProposed(\AppBundle\Entity\Serie $serie)
    {
        $this->seriesProposed->removeElement($serie);
    }

    public function addSeriesFollowed($serie)
    {
        foreach ($this->seriesFollowed as $sFollowed){
            if($sFollowed == $serie){
                return false;
            }
        }
        $this->seriesFollowed[] = $serie;
        $serie->setFollowedBy($this);
        return true;
            
    }

    public function removeSeriesFollowed($serie)
    {
        $this->seriesFollowed->removeElement($serie);
        $serie->removeFollowedBy($this);
    }


    public function getSeriesFollowed()
    {
        return $this->seriesFollowed;
    }
    
    
}
