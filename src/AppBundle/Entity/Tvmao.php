<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tvmao
 *
 * @ORM\Table(name="tvmao", indexes={@ORM\Index(name="douban", columns={"sourceid"}), @ORM\Index(name="node_id", columns={"node_id"}), @ORM\Index(name="created", columns={"created"}), @ORM\Index(name="updated", columns={"updated"}), @ORM\Index(name="douban_photo", columns={"info"}), @ORM\Index(name="info", columns={"info"}), @ORM\Index(name="total_section", columns={"total_section"}), @ORM\Index(name="section", columns={"section"}), @ORM\Index(name="actor", columns={"actor"})})
 * @ORM\Entity
 */
class Tvmao
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
     * @var string
     *
     * @ORM\Column(name="sourceid", type="string", length=20, nullable=true)
     */
    private $sourceid;

    /**
     * @var integer
     *
     * @ORM\Column(name="total_section", type="integer", nullable=false)
     */
    private $totalSection = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="last_update_section", type="integer", nullable=false)
     */
    private $lastUpdateSection = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="info", type="integer", nullable=false)
     */
    private $info = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="section", type="integer", nullable=false)
     */
    private $section = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="video_section", type="integer", nullable=false)
     */
    private $videoSection = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="actor", type="integer", nullable=false)
     */
    private $actor = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="photo", type="integer", nullable=false)
     */
    private $photo = '0';

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
     * @return Tvmao
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
     * @return Tvmao
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
     * @return Tvmao
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
     * Set title
     *
     * @param string $title
     *
     * @return Tvmao
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
     * @return Tvmao
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
     * Set sourceid
     *
     * @param string $sourceid
     *
     * @return Tvmao
     */
    public function setSourceid($sourceid)
    {
        $this->sourceid = $sourceid;

        return $this;
    }

    /**
     * Get sourceid
     *
     * @return string
     */
    public function getSourceid()
    {
        return $this->sourceid;
    }

    /**
     * Set totalSection
     *
     * @param integer $totalSection
     *
     * @return Tvmao
     */
    public function setTotalSection($totalSection)
    {
        $this->totalSection = $totalSection;

        return $this;
    }

    /**
     * Get totalSection
     *
     * @return integer
     */
    public function getTotalSection()
    {
        return $this->totalSection;
    }

    /**
     * Set lastUpdateSection
     *
     * @param integer $lastUpdateSection
     *
     * @return Tvmao
     */
    public function setLastUpdateSection($lastUpdateSection)
    {
        $this->lastUpdateSection = $lastUpdateSection;

        return $this;
    }

    /**
     * Get lastUpdateSection
     *
     * @return integer
     */
    public function getLastUpdateSection()
    {
        return $this->lastUpdateSection;
    }

    /**
     * Set info
     *
     * @param integer $info
     *
     * @return Tvmao
     */
    public function setInfo($info)
    {
        $this->info = $info;

        return $this;
    }

    /**
     * Get info
     *
     * @return integer
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * Set section
     *
     * @param integer $section
     *
     * @return Tvmao
     */
    public function setSection($section)
    {
        $this->section = $section;

        return $this;
    }

    /**
     * Get section
     *
     * @return integer
     */
    public function getSection()
    {
        return $this->section;
    }

    /**
     * Set videoSection
     *
     * @param integer $videoSection
     *
     * @return Tvmao
     */
    public function setVideoSection($videoSection)
    {
        $this->videoSection = $videoSection;

        return $this;
    }

    /**
     * Get videoSection
     *
     * @return integer
     */
    public function getVideoSection()
    {
        return $this->videoSection;
    }

    /**
     * Set actor
     *
     * @param integer $actor
     *
     * @return Tvmao
     */
    public function setActor($actor)
    {
        $this->actor = $actor;

        return $this;
    }

    /**
     * Get actor
     *
     * @return integer
     */
    public function getActor()
    {
        return $this->actor;
    }

    /**
     * Set photo
     *
     * @param integer $photo
     *
     * @return Tvmao
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
     * Set mtimePhoto
     *
     * @param integer $mtimePhoto
     *
     * @return Tvmao
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
     * @return Tvmao
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
     * @return Tvmao
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
     * @return Tvmao
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
