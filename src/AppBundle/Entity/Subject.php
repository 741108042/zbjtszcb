<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Subject
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\SubjectRepository")
 */
class Subject
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
     * @var integer
     *
     * @ORM\Column(name="topic_id", type="integer")
     */
    private $topicId;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="source", type="string", length=255, nullable=true)
     */
    private $source;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=255, nullable=true)
     */
    private $author;

    /**
     * @var string
     *
     * @ORM\Column(name="picids", type="string", length=255, nullable=true)
     */
    private $picids;

    /**
     * @var string
     *
     * @ORM\Column(name="intro", type="string", length=255, nullable=true)
     */
    private $intro;

    /**
     * @var string
     *
     * @ORM\Column(name="created", type="string", length=255, nullable=true)
     */
    private $created;

    /**
     * @var integer
     *
     * @ORM\Column(name="istop", type="integer")
     */
    private $istop;
    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer")
     */
    private $status;


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
     * Set topicId
     *
     * @param integer $topicId
     *
     * @return Subject
     */
    public function setTopicId($topicId)
    {
        $this->topicId = $topicId;

        return $this;
    }

    /**
     * Get topicId
     *
     * @return integer
     */
    public function getTopicId()
    {
        return $this->topicId;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Subject
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
     * Set source
     *
     * @param string $source
     *
     * @return Subject
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source
     *
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Set author
     *
     * @param string $author
     *
     * @return Subject
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
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
     * Set picids
     *
     * @param string $picids
     *
     * @return Subject
     */
    public function setPicids($picids)
    {
        $this->picids = $picids;

        return $this;
    }

    /**
     * Get picids
     *
     * @return string
     */
    public function getPicids()
    {
        return $this->picids;
    }

    /**
     * Set intro
     *
     * @param string $intro
     *
     * @return Subject
     */
    public function setIntro($intro)
    {
        $this->intro = $intro;

        return $this;
    }

    /**
     * Get intro
     *
     * @return string
     */
    public function getIntro()
    {
        return $this->intro;
    }

    /**
     * Set created
     *
     * @param string $created
     *
     * @return Subject
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return string
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set istop
     *
     * @param integer $istop
     *
     * @return Subject
     */
    public function setIstop($istop)
    {
        $this->istop = $istop;

        return $this;
    }

    /**
     * Get istop
     *
     * @return integer
     */
    public function getIstop()
    {
        return $this->istop;
    }
    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Subject
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }
}
