<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MovieSection
 *
 * @ORM\Table(name="movie_section", indexes={@ORM\Index(name="node_id", columns={"node_id"})})
 * @ORM\Entity
 */
class MovieSection
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
     * @ORM\Column(name="title", type="string", length=100, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", length=65535, nullable=true)
     */
    private $content;

    /**
     * @var integer
     *
     * @ORM\Column(name="section", type="integer", nullable=true)
     */
    private $section = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="sohu", type="string", length=255, nullable=true)
     */
    private $sohu;

    /**
     * @var string
     *
     * @ORM\Column(name="pptv", type="string", length=255, nullable=true)
     */
    private $pptv;

    /**
     * @var string
     *
     * @ORM\Column(name="qiyi", type="string", length=255, nullable=true)
     */
    private $qiyi;

    /**
     * @var string
     *
     * @ORM\Column(name="pps", type="string", length=255, nullable=true)
     */
    private $pps;

    /**
     * @var string
     *
     * @ORM\Column(name="tudou", type="string", length=255, nullable=true)
     */
    private $tudou;

    /**
     * @var string
     *
     * @ORM\Column(name="youku", type="string", length=255, nullable=true)
     */
    private $youku;

    /**
     * @var string
     *
     * @ORM\Column(name="letv", type="string", length=200, nullable=true)
     */
    private $letv;

    /**
     * @var string
     *
     * @ORM\Column(name="xunlei", type="string", length=200, nullable=true)
     */
    private $xunlei;

    /**
     * @var integer
     *
     * @ORM\Column(name="created", type="integer", nullable=true)
     */
    private $created = '0';

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
     * @return MovieSection
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
     * @return MovieSection
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
     * Set content
     *
     * @param string $content
     *
     * @return MovieSection
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set section
     *
     * @param integer $section
     *
     * @return MovieSection
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
     * Set sohu
     *
     * @param string $sohu
     *
     * @return MovieSection
     */
    public function setSohu($sohu)
    {
        $this->sohu = $sohu;

        return $this;
    }

    /**
     * Get sohu
     *
     * @return string
     */
    public function getSohu()
    {
        return $this->sohu;
    }

    /**
     * Set pptv
     *
     * @param string $pptv
     *
     * @return MovieSection
     */
    public function setPptv($pptv)
    {
        $this->pptv = $pptv;

        return $this;
    }

    /**
     * Get pptv
     *
     * @return string
     */
    public function getPptv()
    {
        return $this->pptv;
    }

    /**
     * Set qiyi
     *
     * @param string $qiyi
     *
     * @return MovieSection
     */
    public function setQiyi($qiyi)
    {
        $this->qiyi = $qiyi;

        return $this;
    }

    /**
     * Get qiyi
     *
     * @return string
     */
    public function getQiyi()
    {
        return $this->qiyi;
    }

    /**
     * Set pps
     *
     * @param string $pps
     *
     * @return MovieSection
     */
    public function setPps($pps)
    {
        $this->pps = $pps;

        return $this;
    }

    /**
     * Get pps
     *
     * @return string
     */
    public function getPps()
    {
        return $this->pps;
    }

    /**
     * Set tudou
     *
     * @param string $tudou
     *
     * @return MovieSection
     */
    public function setTudou($tudou)
    {
        $this->tudou = $tudou;

        return $this;
    }

    /**
     * Get tudou
     *
     * @return string
     */
    public function getTudou()
    {
        return $this->tudou;
    }

    /**
     * Set youku
     *
     * @param string $youku
     *
     * @return MovieSection
     */
    public function setYouku($youku)
    {
        $this->youku = $youku;

        return $this;
    }

    /**
     * Get youku
     *
     * @return string
     */
    public function getYouku()
    {
        return $this->youku;
    }

    /**
     * Set letv
     *
     * @param string $letv
     *
     * @return MovieSection
     */
    public function setLetv($letv)
    {
        $this->letv = $letv;

        return $this;
    }

    /**
     * Get letv
     *
     * @return string
     */
    public function getLetv()
    {
        return $this->letv;
    }

    /**
     * Set xunlei
     *
     * @param string $xunlei
     *
     * @return MovieSection
     */
    public function setXunlei($xunlei)
    {
        $this->xunlei = $xunlei;

        return $this;
    }

    /**
     * Get xunlei
     *
     * @return string
     */
    public function getXunlei()
    {
        return $this->xunlei;
    }

    /**
     * Set created
     *
     * @param integer $created
     *
     * @return MovieSection
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
