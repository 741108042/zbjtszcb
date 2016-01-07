<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Weixin
 *
 * @ORM\Table(name="weixin")
 * @ORM\Entity
 */
class Weixin
{
    /**
     * @var string
     *
     * @ORM\Column(name="tousername", type="string", length=200, nullable=true)
     */
    private $tousername;

    /**
     * @var string
     *
     * @ORM\Column(name="fromusername", type="string", length=200, nullable=true)
     */
    private $fromusername;

    /**
     * @var integer
     *
     * @ORM\Column(name="createtime", type="integer", nullable=true)
     */
    private $createtime = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="showtime", type="integer", nullable=false)
     */
    private $showtime = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="msgid", type="string", length=50, nullable=true)
     */
    private $msgid;

    /**
     * @var string
     *
     * @ORM\Column(name="msgtype", type="string", length=50, nullable=true)
     */
    private $msgtype;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", length=65535, nullable=true)
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(name="event", type="string", length=50, nullable=true)
     */
    private $event;

    /**
     * @var string
     *
     * @ORM\Column(name="eventkey", type="string", length=200, nullable=true)
     */
    private $eventkey;

    /**
     * @var string
     *
     * @ORM\Column(name="picurl", type="string", length=255, nullable=true)
     */
    private $picurl;

    /**
     * @var string
     *
     * @ORM\Column(name="picdata", type="blob", nullable=true)
     */
    private $picdata;

    /**
     * @var string
     *
     * @ORM\Column(name="locationx", type="string", length=50, nullable=true)
     */
    private $locationx;

    /**
     * @var string
     *
     * @ORM\Column(name="locationy", type="string", length=50, nullable=true)
     */
    private $locationy;

    /**
     * @var integer
     *
     * @ORM\Column(name="scale", type="integer", nullable=true)
     */
    private $scale = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=255, nullable=true)
     */
    private $label;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=255, nullable=true)
     */
    private $author;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="sourcecontent", type="text", length=65535, nullable=true)
     */
    private $sourcecontent;

    /**
     * @var integer
     *
     * @ORM\Column(name="state", type="integer", nullable=false)
     */
    private $state = '3';

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set tousername
     *
     * @param string $tousername
     *
     * @return Weixin
     */
    public function setTousername($tousername)
    {
        $this->tousername = $tousername;

        return $this;
    }

    /**
     * Get tousername
     *
     * @return string
     */
    public function getTousername()
    {
        return $this->tousername;
    }

    /**
     * Set fromusername
     *
     * @param string $fromusername
     *
     * @return Weixin
     */
    public function setFromusername($fromusername)
    {
        $this->fromusername = $fromusername;

        return $this;
    }

    /**
     * Get fromusername
     *
     * @return string
     */
    public function getFromusername()
    {
        return $this->fromusername;
    }

    /**
     * Set createtime
     *
     * @param integer $createtime
     *
     * @return Weixin
     */
    public function setCreatetime($createtime)
    {
        $this->createtime = $createtime;

        return $this;
    }

    /**
     * Get createtime
     *
     * @return integer
     */
    public function getCreatetime()
    {
        return $this->createtime;
    }

    /**
     * Set showtime
     *
     * @param integer $showtime
     *
     * @return Weixin
     */
    public function setShowtime($showtime)
    {
        $this->showtime = $showtime;

        return $this;
    }

    /**
     * Get showtime
     *
     * @return integer
     */
    public function getShowtime()
    {
        return $this->showtime;
    }

    /**
     * Set msgid
     *
     * @param string $msgid
     *
     * @return Weixin
     */
    public function setMsgid($msgid)
    {
        $this->msgid = $msgid;

        return $this;
    }

    /**
     * Get msgid
     *
     * @return string
     */
    public function getMsgid()
    {
        return $this->msgid;
    }

    /**
     * Set msgtype
     *
     * @param string $msgtype
     *
     * @return Weixin
     */
    public function setMsgtype($msgtype)
    {
        $this->msgtype = $msgtype;

        return $this;
    }

    /**
     * Get msgtype
     *
     * @return string
     */
    public function getMsgtype()
    {
        return $this->msgtype;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Weixin
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
     * Set event
     *
     * @param string $event
     *
     * @return Weixin
     */
    public function setEvent($event)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Get event
     *
     * @return string
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Set eventkey
     *
     * @param string $eventkey
     *
     * @return Weixin
     */
    public function setEventkey($eventkey)
    {
        $this->eventkey = $eventkey;

        return $this;
    }

    /**
     * Get eventkey
     *
     * @return string
     */
    public function getEventkey()
    {
        return $this->eventkey;
    }

    /**
     * Set picurl
     *
     * @param string $picurl
     *
     * @return Weixin
     */
    public function setPicurl($picurl)
    {
        $this->picurl = $picurl;

        return $this;
    }

    /**
     * Get picurl
     *
     * @return string
     */
    public function getPicurl()
    {
        return $this->picurl;
    }

    /**
     * Set picdata
     *
     * @param string $picdata
     *
     * @return Weixin
     */
    public function setPicdata($picdata)
    {
        $this->picdata = $picdata;

        return $this;
    }

    /**
     * Get picdata
     *
     * @return string
     */
    public function getPicdata()
    {
        return $this->picdata;
    }

    /**
     * Set locationx
     *
     * @param string $locationx
     *
     * @return Weixin
     */
    public function setLocationx($locationx)
    {
        $this->locationx = $locationx;

        return $this;
    }

    /**
     * Get locationx
     *
     * @return string
     */
    public function getLocationx()
    {
        return $this->locationx;
    }

    /**
     * Set locationy
     *
     * @param string $locationy
     *
     * @return Weixin
     */
    public function setLocationy($locationy)
    {
        $this->locationy = $locationy;

        return $this;
    }

    /**
     * Get locationy
     *
     * @return string
     */
    public function getLocationy()
    {
        return $this->locationy;
    }

    /**
     * Set scale
     *
     * @param integer $scale
     *
     * @return Weixin
     */
    public function setScale($scale)
    {
        $this->scale = $scale;

        return $this;
    }

    /**
     * Get scale
     *
     * @return integer
     */
    public function getScale()
    {
        return $this->scale;
    }

    /**
     * Set label
     *
     * @param string $label
     *
     * @return Weixin
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Weixin
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
     * Set author
     *
     * @param string $author
     *
     * @return Weixin
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
     * Set title
     *
     * @param string $title
     *
     * @return Weixin
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
     * Set description
     *
     * @param string $description
     *
     * @return Weixin
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set sourcecontent
     *
     * @param string $sourcecontent
     *
     * @return Weixin
     */
    public function setSourcecontent($sourcecontent)
    {
        $this->sourcecontent = $sourcecontent;

        return $this;
    }

    /**
     * Get sourcecontent
     *
     * @return string
     */
    public function getSourcecontent()
    {
        return $this->sourcecontent;
    }

    /**
     * Set state
     *
     * @param integer $state
     *
     * @return Weixin
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return integer
     */
    public function getState()
    {
        return $this->state;
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
