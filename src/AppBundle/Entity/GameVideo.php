<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GameVideo
 *
 * @ORM\Table(name="game_video", indexes={@ORM\Index(name="vid", columns={"vid"}), @ORM\Index(name="usecount", columns={"usecount"})})
 * @ORM\Entity
 */
class GameVideo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="vid", type="integer", nullable=false)
     */
    private $vid;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var integer
     *
     * @ORM\Column(name="usecount", type="integer", nullable=false)
     */
    private $usecount = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set vid
     *
     * @param integer $vid
     *
     * @return GameVideo
     */
    public function setVid($vid)
    {
        $this->vid = $vid;

        return $this;
    }

    /**
     * Get vid
     *
     * @return integer
     */
    public function getVid()
    {
        return $this->vid;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return GameVideo
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
     * Set usecount
     *
     * @param integer $usecount
     *
     * @return GameVideo
     */
    public function setUsecount($usecount)
    {
        $this->usecount = $usecount;

        return $this;
    }

    /**
     * Get usecount
     *
     * @return integer
     */
    public function getUsecount()
    {
        return $this->usecount;
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
