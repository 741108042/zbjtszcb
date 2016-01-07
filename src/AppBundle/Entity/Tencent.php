<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tencent
 *
 * @ORM\Table(name="tencent", indexes={@ORM\Index(name="douban", columns={"trueurl"}), @ORM\Index(name="node_id", columns={"node_id"}), @ORM\Index(name="created", columns={"created"}), @ORM\Index(name="updated", columns={"updated"}), @ORM\Index(name="info", columns={"info"}), @ORM\Index(name="total_section", columns={"total_section"}), @ORM\Index(name="section", columns={"section"}), @ORM\Index(name="actor", columns={"actor"})})
 * @ORM\Entity
 */
class Tencent
{
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
     * @ORM\Column(name="cover", type="string", length=255, nullable=false)
     */
    private $cover;

    /**
     * @var string
     *
     * @ORM\Column(name="keywords", type="string", length=255, nullable=true)
     */
    private $keywords;

    /**
     * @var string
     *
     * @ORM\Column(name="trueurl", type="string", length=200, nullable=true)
     */
    private $trueurl;

    /**
     * @var string
     *
     * @ORM\Column(name="sourceurl", type="string", length=255, nullable=true)
     */
    private $sourceurl;

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
     * @ORM\Column(name="ind", type="integer", nullable=true)
     */
    private $ind = '1';

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
     * @return Tencent
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
     * @return Tencent
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
     * Set cover
     *
     * @param string $cover
     *
     * @return Tencent
     */
    public function setCover($cover)
    {
        $this->cover = $cover;

        return $this;
    }

    /**
     * Get cover
     *
     * @return string
     */
    public function getCover()
    {
        return $this->cover;
    }

    /**
     * Set keywords
     *
     * @param string $keywords
     *
     * @return Tencent
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
     * Set trueurl
     *
     * @param string $trueurl
     *
     * @return Tencent
     */
    public function setTrueurl($trueurl)
    {
        $this->trueurl = $trueurl;

        return $this;
    }

    /**
     * Get trueurl
     *
     * @return string
     */
    public function getTrueurl()
    {
        return $this->trueurl;
    }

    /**
     * Set sourceurl
     *
     * @param string $sourceurl
     *
     * @return Tencent
     */
    public function setSourceurl($sourceurl)
    {
        $this->sourceurl = $sourceurl;

        return $this;
    }

    /**
     * Get sourceurl
     *
     * @return string
     */
    public function getSourceurl()
    {
        return $this->sourceurl;
    }

    /**
     * Set totalSection
     *
     * @param integer $totalSection
     *
     * @return Tencent
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
     * @return Tencent
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
     * @return Tencent
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
     * @return Tencent
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
     * @return Tencent
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
     * @return Tencent
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
     * Set created
     *
     * @param integer $created
     *
     * @return Tencent
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
     * @return Tencent
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
     * Set ind
     *
     * @param integer $ind
     *
     * @return Tencent
     */
    public function setInd($ind)
    {
        $this->ind = $ind;

        return $this;
    }

    /**
     * Get ind
     *
     * @return integer
     */
    public function getInd()
    {
        return $this->ind;
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
