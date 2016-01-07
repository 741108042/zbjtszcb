<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsComment
 *
 * @ORM\Table(name="cms_comment")
 * @ORM\Entity
 */
class CmsComment
{
    /**
     * @var string
     *
     * @ORM\Column(name="domain", type="string", length=100, nullable=true)
     */
    private $domain = 'www.cztv.com';

    /**
     * @var string
     *
     * @ORM\Column(name="columnid", type="string", length=100, nullable=true)
     */
    private $columnid;

    /**
     * @var string
     *
     * @ORM\Column(name="targetid", type="string", length=255, nullable=true)
     */
    private $targetid = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="rid", type="integer", nullable=true)
     */
    private $rid = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="uid", type="integer", nullable=true)
     */
    private $uid = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="uname", type="string", length=50, nullable=true)
     */
    private $uname = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="avatar", type="string", length=255, nullable=true)
     */
    private $avatar;

    /**
     * @var integer
     *
     * @ORM\Column(name="up", type="integer", nullable=true)
     */
    private $up = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="down", type="integer", nullable=true)
     */
    private $down = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="deep", type="integer", nullable=true)
     */
    private $deep = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255, nullable=false)
     */
    private $path = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=20, nullable=true)
     */
    private $ip;

    /**
     * @var integer
     *
     * @ORM\Column(name="state", type="integer", nullable=true)
     */
    private $state = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="created", type="integer", nullable=true)
     */
    private $created = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", length=65535, nullable=true)
     */
    private $content;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set domain
     *
     * @param string $domain
     *
     * @return CmsComment
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;

        return $this;
    }

    /**
     * Get domain
     *
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * Set columnid
     *
     * @param string $columnid
     *
     * @return CmsComment
     */
    public function setColumnid($columnid)
    {
        $this->columnid = $columnid;

        return $this;
    }

    /**
     * Get columnid
     *
     * @return string
     */
    public function getColumnid()
    {
        return $this->columnid;
    }

    /**
     * Set targetid
     *
     * @param string $targetid
     *
     * @return CmsComment
     */
    public function setTargetid($targetid)
    {
        $this->targetid = $targetid;

        return $this;
    }

    /**
     * Get targetid
     *
     * @return string
     */
    public function getTargetid()
    {
        return $this->targetid;
    }

    /**
     * Set rid
     *
     * @param integer $rid
     *
     * @return CmsComment
     */
    public function setRid($rid)
    {
        $this->rid = $rid;

        return $this;
    }

    /**
     * Get rid
     *
     * @return integer
     */
    public function getRid()
    {
        return $this->rid;
    }

    /**
     * Set uid
     *
     * @param integer $uid
     *
     * @return CmsComment
     */
    public function setUid($uid)
    {
        $this->uid = $uid;

        return $this;
    }

    /**
     * Get uid
     *
     * @return integer
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Set uname
     *
     * @param string $uname
     *
     * @return CmsComment
     */
    public function setUname($uname)
    {
        $this->uname = $uname;

        return $this;
    }

    /**
     * Get uname
     *
     * @return string
     */
    public function getUname()
    {
        return $this->uname;
    }

    /**
     * Set avatar
     *
     * @param string $avatar
     *
     * @return CmsComment
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set up
     *
     * @param integer $up
     *
     * @return CmsComment
     */
    public function setUp($up)
    {
        $this->up = $up;

        return $this;
    }

    /**
     * Get up
     *
     * @return integer
     */
    public function getUp()
    {
        return $this->up;
    }

    /**
     * Set down
     *
     * @param integer $down
     *
     * @return CmsComment
     */
    public function setDown($down)
    {
        $this->down = $down;

        return $this;
    }

    /**
     * Get down
     *
     * @return integer
     */
    public function getDown()
    {
        return $this->down;
    }

    /**
     * Set deep
     *
     * @param integer $deep
     *
     * @return CmsComment
     */
    public function setDeep($deep)
    {
        $this->deep = $deep;

        return $this;
    }

    /**
     * Get deep
     *
     * @return integer
     */
    public function getDeep()
    {
        return $this->deep;
    }

    /**
     * Set path
     *
     * @param string $path
     *
     * @return CmsComment
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set ip
     *
     * @param string $ip
     *
     * @return CmsComment
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set state
     *
     * @param integer $state
     *
     * @return CmsComment
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
     * Set created
     *
     * @param integer $created
     *
     * @return CmsComment
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
     * Set content
     *
     * @param string $content
     *
     * @return CmsComment
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
