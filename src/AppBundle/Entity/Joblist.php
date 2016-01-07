<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Joblist
 *
 * @ORM\Table(name="joblist")
 * @ORM\Entity
 */
class Joblist
{
    /**
     * @var integer
     *
     * @ORM\Column(name="coming", type="integer", nullable=true)
     */
    private $coming = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="tags", type="integer", nullable=true)
     */
    private $tags = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="movie", type="integer", nullable=false)
     */
    private $movie = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="video", type="integer", nullable=true)
     */
    private $video = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="video_step2", type="integer", nullable=true)
     */
    private $videoStep2 = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="photo", type="integer", nullable=true)
     */
    private $photo = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="udate", type="date", nullable=true)
     */
    private $udate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="utime", type="datetime", nullable=true)
     */
    private $utime;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set coming
     *
     * @param integer $coming
     *
     * @return Joblist
     */
    public function setComing($coming)
    {
        $this->coming = $coming;

        return $this;
    }

    /**
     * Get coming
     *
     * @return integer
     */
    public function getComing()
    {
        return $this->coming;
    }

    /**
     * Set tags
     *
     * @param integer $tags
     *
     * @return Joblist
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get tags
     *
     * @return integer
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set movie
     *
     * @param integer $movie
     *
     * @return Joblist
     */
    public function setMovie($movie)
    {
        $this->movie = $movie;

        return $this;
    }

    /**
     * Get movie
     *
     * @return integer
     */
    public function getMovie()
    {
        return $this->movie;
    }

    /**
     * Set video
     *
     * @param integer $video
     *
     * @return Joblist
     */
    public function setVideo($video)
    {
        $this->video = $video;

        return $this;
    }

    /**
     * Get video
     *
     * @return integer
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * Set videoStep2
     *
     * @param integer $videoStep2
     *
     * @return Joblist
     */
    public function setVideoStep2($videoStep2)
    {
        $this->videoStep2 = $videoStep2;

        return $this;
    }

    /**
     * Get videoStep2
     *
     * @return integer
     */
    public function getVideoStep2()
    {
        return $this->videoStep2;
    }

    /**
     * Set photo
     *
     * @param integer $photo
     *
     * @return Joblist
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return integer
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set udate
     *
     * @param \DateTime $udate
     *
     * @return Joblist
     */
    public function setUdate($udate)
    {
        $this->udate = $udate;

        return $this;
    }

    /**
     * Get udate
     *
     * @return \DateTime
     */
    public function getUdate()
    {
        return $this->udate;
    }

    /**
     * Set utime
     *
     * @param \DateTime $utime
     *
     * @return Joblist
     */
    public function setUtime($utime)
    {
        $this->utime = $utime;

        return $this;
    }

    /**
     * Get utime
     *
     * @return \DateTime
     */
    public function getUtime()
    {
        return $this->utime;
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
}
