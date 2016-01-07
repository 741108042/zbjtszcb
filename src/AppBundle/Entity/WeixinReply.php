<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WeixinReply
 *
 * @ORM\Table(name="weixin_reply")
 * @ORM\Entity
 */
class WeixinReply
{
    /**
     * @var boolean
     *
     * @ORM\Column(name="actiontype", type="boolean", nullable=true)
     */
    private $actiontype = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="msgtype", type="string", length=50, nullable=false)
     */
    private $msgtype;

    /**
     * @var string
     *
     * @ORM\Column(name="keywords", type="string", length=255, nullable=true)
     */
    private $keywords;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", length=65535, nullable=true)
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="voice", type="string", length=255, nullable=true)
     */
    private $voice;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set actiontype
     *
     * @param boolean $actiontype
     *
     * @return WeixinReply
     */
    public function setActiontype($actiontype)
    {
        $this->actiontype = $actiontype;

        return $this;
    }

    /**
     * Get actiontype
     *
     * @return boolean
     */
    public function getActiontype()
    {
        return $this->actiontype;
    }

    /**
     * Set msgtype
     *
     * @param string $msgtype
     *
     * @return WeixinReply
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
     * Set keywords
     *
     * @param string $keywords
     *
     * @return WeixinReply
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
     * Set title
     *
     * @param string $title
     *
     * @return WeixinReply
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
     * @return WeixinReply
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
     * Set photo
     *
     * @param string $photo
     *
     * @return WeixinReply
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return WeixinReply
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
     * Set voice
     *
     * @param string $voice
     *
     * @return WeixinReply
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
