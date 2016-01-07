<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tvmaocate
 *
 * @ORM\Table(name="tvmaocate")
 * @ORM\Entity
 */
class Tvmaocate
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=20, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @var integer
     *
     * @ORM\Column(name="curpage", type="integer", nullable=true)
     */
    private $curpage = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="done", type="integer", nullable=false)
     */
    private $done = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated", type="datetime", nullable=true)
     */
    private $updated;

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
     * @return Tvmaocate
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
     * Set url
     *
     * @param string $url
     *
     * @return Tvmaocate
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set curpage
     *
     * @param integer $curpage
     *
     * @return Tvmaocate
     */
    public function setCurpage($curpage)
    {
        $this->curpage = $curpage;

        return $this;
    }

    /**
     * Get curpage
     *
     * @return integer
     */
    public function getCurpage()
    {
        return $this->curpage;
    }

    /**
     * Set done
     *
     * @param integer $done
     *
     * @return Tvmaocate
     */
    public function setDone($done)
    {
        $this->done = $done;

        return $this;
    }

    /**
     * Get done
     *
     * @return integer
     */
    public function getDone()
    {
        return $this->done;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     *
     * @return Tvmaocate
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime
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
