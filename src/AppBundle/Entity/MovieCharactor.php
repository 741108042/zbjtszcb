<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MovieCharactor
 *
 * @ORM\Table(name="movie_charactor", indexes={@ORM\Index(name="node_id", columns={"node_id"})})
 * @ORM\Entity
 */
class MovieCharactor
{
    /**
     * @var integer
     *
     * @ORM\Column(name="node_id", type="integer", nullable=false)
     */
    private $nodeId;

    /**
     * @var string
     *
     * @ORM\Column(name="charactor", type="string", length=100, nullable=false)
     */
    private $charactor;

    /**
     * @var string
     *
     * @ORM\Column(name="voice", type="string", length=100, nullable=false)
     */
    private $voice;

    /**
     * @var string
     *
     * @ORM\Column(name="actor", type="string", length=100, nullable=false)
     */
    private $actor;

    /**
     * @var string
     *
     * @ORM\Column(name="intro", type="text", length=65535, nullable=true)
     */
    private $intro;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set nodeId
     *
     * @param integer $nodeId
     *
     * @return MovieCharactor
     */
    public function setNodeId($nodeId)
    {
        $this->nodeId = $nodeId;

        return $this;
    }

    /**
     * Get nodeId
     *
     * @return integer
     */
    public function getNodeId()
    {
        return $this->nodeId;
    }

    /**
     * Set charactor
     *
     * @param string $charactor
     *
     * @return MovieCharactor
     */
    public function setCharactor($charactor)
    {
        $this->charactor = $charactor;

        return $this;
    }

    /**
     * Get charactor
     *
     * @return string
     */
    public function getCharactor()
    {
        return $this->charactor;
    }

    /**
     * Set voice
     *
     * @param string $voice
     *
     * @return MovieCharactor
     */
    public function setVoice($voice)
    {
        $this->voice = $voice;

        return $this;
    }

    /**
     * Get voice
     *
     * @return string
     */
    public function getVoice()
    {
        return $this->voice;
    }

    /**
     * Set actor
     *
     * @param string $actor
     *
     * @return MovieCharactor
     */
    public function setActor($actor)
    {
        $this->actor = $actor;

        return $this;
    }

    /**
     * Get actor
     *
     * @return string
     */
    public function getActor()
    {
        return $this->actor;
    }

    /**
     * Set intro
     *
     * @param string $intro
     *
     * @return MovieCharactor
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
