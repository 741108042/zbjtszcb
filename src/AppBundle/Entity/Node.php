<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Node
 *
 * @ORM\Table(name="node", indexes={@ORM\Index(name="m1905", columns={"m1905"}), @ORM\Index(name="douban", columns={"douban"}), @ORM\Index(name="node_id", columns={"node_id"}), @ORM\Index(name="created", columns={"created"}), @ORM\Index(name="updated", columns={"updated"}), @ORM\Index(name="douban_photo", columns={"douban_photo"})})
 * @ORM\Entity
 */
class Node
{
    /**
     * @var string
     *
     * @ORM\Column(name="module", type="string", length=10, nullable=false)
     */
    private $module = 'movie';

    /**
     * @var string
     *
     * @ORM\Column(name="other_module", type="string", length=255, nullable=true)
     */
    private $otherModule;

    /**
     * @var integer
     *
     * @ORM\Column(name="node_id", type="integer", nullable=false)
     */
    private $nodeId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="coming", type="integer", nullable=false)
     */
    private $coming = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="playing", type="integer", nullable=false)
     */
    private $playing = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="keywords", type="string", length=255, nullable=true)
     */
    private $keywords;

    /**
     * @var integer
     *
     * @ORM\Column(name="douban", type="integer", nullable=false)
     */
    private $douban = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="m1905", type="integer", nullable=false)
     */
    private $m1905 = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="mtime", type="integer", nullable=false)
     */
    private $mtime = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="douban_photo", type="integer", nullable=false)
     */
    private $doubanPhoto = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="m1905_photo", type="integer", nullable=false)
     */
    private $m1905Photo = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="mtime_photo", type="integer", nullable=false)
     */
    private $mtimePhoto = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="douban_video", type="integer", nullable=false)
     */
    private $doubanVideo = '0';

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
     * @var \DateTime
     *
     * @ORM\Column(name="pdate", type="date", nullable=true)
     */
    private $pdate;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set module
     *
     * @param string $module
     *
     * @return Node
     */
    public function setModule($module)
    {
        $this->module = $module;

        return $this;
    }

    /**
     * Get module
     *
     * @return string
     */
    public function getModule()
    {
        return $this->module;
    }

    /**
     * Set otherModule
     *
     * @param string $otherModule
     *
     * @return Node
     */
    public function setOtherModule($otherModule)
    {
        $this->otherModule = $otherModule;

        return $this;
    }

    /**
     * Get otherModule
     *
     * @return string
     */
    public function getOtherModule()
    {
        return $this->otherModule;
    }

    /**
     * Set nodeId
     *
     * @param integer $nodeId
     *
     * @return Node
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
     * Set coming
     *
     * @param integer $coming
     *
     * @return Node
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
     * Set playing
     *
     * @param integer $playing
     *
     * @return Node
     */
    public function setPlaying($playing)
    {
        $this->playing = $playing;

        return $this;
    }

    /**
     * Get playing
     *
     * @return integer
     */
    public function getPlaying()
    {
        return $this->playing;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Node
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
     * Set keywords
     *
     * @param string $keywords
     *
     * @return Node
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;

        return $this;
    }

    /**
     * Get keywords
     *
     * @return string
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * Set douban
     *
     * @param integer $douban
     *
     * @return Node
     */
    public function setDouban($douban)
    {
        $this->douban = $douban;

        return $this;
    }

    /**
     * Get douban
     *
     * @return integer
     */
    public function getDouban()
    {
        return $this->douban;
    }

    /**
     * Set m1905
     *
     * @param integer $m1905
     *
     * @return Node
     */
    public function setM1905($m1905)
    {
        $this->m1905 = $m1905;

        return $this;
    }

    /**
     * Get m1905
     *
     * @return integer
     */
    public function getM1905()
    {
        return $this->m1905;
    }

    /**
     * Set mtime
     *
     * @param integer $mtime
     *
     * @return Node
     */
    public function setMtime($mtime)
    {
        $this->mtime = $mtime;

        return $this;
    }

    /**
     * Get mtime
     *
     * @return integer
     */
    public function getMtime()
    {
        return $this->mtime;
    }

    /**
     * Set doubanPhoto
     *
     * @param integer $doubanPhoto
     *
     * @return Node
     */
    public function setDoubanPhoto($doubanPhoto)
    {
        $this->doubanPhoto = $doubanPhoto;

        return $this;
    }

    /**
     * Get doubanPhoto
     *
     * @return integer
     */
    public function getDoubanPhoto()
    {
        return $this->doubanPhoto;
    }

    /**
     * Set m1905Photo
     *
     * @param integer $m1905Photo
     *
     * @return Node
     */
    public function setM1905Photo($m1905Photo)
    {
        $this->m1905Photo = $m1905Photo;

        return $this;
    }

    /**
     * Get m1905Photo
     *
     * @return integer
     */
    public function getM1905Photo()
    {
        return $this->m1905Photo;
    }

    /**
     * Set mtimePhoto
     *
     * @param integer $mtimePhoto
     *
     * @return Node
     */
    public function setMtimePhoto($mtimePhoto)
    {
        $this->mtimePhoto = $mtimePhoto;

        return $this;
    }

    /**
     * Get mtimePhoto
     *
     * @return integer
     */
    public function getMtimePhoto()
    {
        return $this->mtimePhoto;
    }

    /**
     * Set doubanVideo
     *
     * @param integer $doubanVideo
     *
     * @return Node
     */
    public function setDoubanVideo($doubanVideo)
    {
        $this->doubanVideo = $doubanVideo;

        return $this;
    }

    /**
     * Get doubanVideo
     *
     * @return integer
     */
    public function getDoubanVideo()
    {
        return $this->doubanVideo;
    }

    /**
     * Set created
     *
     * @param integer $created
     *
     * @return Node
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
     * @return Node
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
     * Set pdate
     *
     * @param \DateTime $pdate
     *
     * @return Node
     */
    public function setPdate($pdate)
    {
        $this->pdate = $pdate;

        return $this;
    }

    /**
     * Get pdate
     *
     * @return \DateTime
     */
    public function getPdate()
    {
        return $this->pdate;
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
