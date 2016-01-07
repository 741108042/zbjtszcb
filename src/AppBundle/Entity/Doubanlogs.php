<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Doubanlogs
 *
 * @ORM\Table(name="doubanlogs")
 * @ORM\Entity
 */
class Doubanlogs
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="tags", type="string", length=255, nullable=true)
     */
    private $tags;

    /**
     * @var integer
     *
     * @ORM\Column(name="page", type="integer", nullable=true)
     */
    private $page = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="fin", type="integer", nullable=false)
     */
    private $fin = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="start_time", type="integer", nullable=false)
     */
    private $startTime = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="working", type="integer", nullable=false)
     */
    private $working = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    private $status = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="created", type="integer", nullable=true)
     */
    private $created = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="updated", type="integer", nullable=true)
     */
    private $updated = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set title
     *
     * @param string $title
     *
     * @return Doubanlogs
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
     * Set tags
     *
     * @param string $tags
     *
     * @return Doubanlogs
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get tags
     *
     * @return string
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set page
     *
     * @param integer $page
     *
     * @return Doubanlogs
     */
    public function setPage($page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return integer
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Set fin
     *
     * @param integer $fin
     *
     * @return Doubanlogs
     */
    public function setFin($fin)
    {
        $this->fin = $fin;

        return $this;
    }

    /**
     * Get fin
     *
     * @return integer
     */
    public function getFin()
    {
        return $this->fin;
    }

    /**
     * Set startTime
     *
     * @param integer $startTime
     *
     * @return Doubanlogs
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;

        return $this;
    }

    /**
     * Get startTime
     *
     * @return integer
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * Set working
     *
     * @param integer $working
     *
     * @return Doubanlogs
     */
    public function setWorking($working)
    {
        $this->working = $working;

        return $this;
    }

    /**
     * Get working
     *
     * @return integer
     */
    public function getWorking()
    {
        return $this->working;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Doubanlogs
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

    /**
     * Set created
     *
     * @param integer $created
     *
     * @return Doubanlogs
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return integer
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param integer $updated
     *
     * @return Doubanlogs
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return integer
     */
    public function getUpdated()
    {
        return $this->updated;
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
