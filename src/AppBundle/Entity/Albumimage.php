<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Albumimage
 *
 * @ORM\Table(name="albumimage", indexes={@ORM\Index(name="album_id", columns={"album_id"}), @ORM\Index(name="source_file", columns={"source_file"})})
 * @ORM\Entity
 */
class Albumimage
{
    /**
     * @var integer
     *
     * @ORM\Column(name="album_id", type="integer", nullable=false)
     */
    private $albumId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="intro", type="text", length=65535, nullable=true)
     */
    private $intro;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255, nullable=true)
     */
    private $path;

    /**
     * @var string
     *
     * @ORM\Column(name="path_small", type="string", length=255, nullable=true)
     */
    private $pathSmall;

    /**
     * @var string
     *
     * @ORM\Column(name="path_mobile", type="string", length=255, nullable=true)
     */
    private $pathMobile;

    /**
     * @var string
     *
     * @ORM\Column(name="cdn_file", type="string", length=255, nullable=true)
     */
    private $cdnFile;

    /**
     * @var string
     *
     * @ORM\Column(name="source_file", type="string", length=255, nullable=true)
     */
    private $sourceFile;

    /**
     * @var integer
     *
     * @ORM\Column(name="width", type="integer", nullable=false)
     */
    private $width = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="height", type="integer", nullable=false)
     */
    private $height = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="created", type="integer", nullable=false)
     */
    private $created = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="sort", type="integer", nullable=false)
     */
    private $sort = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set albumId
     *
     * @param integer $albumId
     *
     * @return Albumimage
     */
    public function setAlbumId($albumId)
    {
        $this->albumId = $albumId;

        return $this;
    }

    /**
     * Get albumId
     *
     * @return integer
     */
    public function getAlbumId()
    {
        return $this->albumId;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Albumimage
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
     * Set intro
     *
     * @param string $intro
     *
     * @return Albumimage
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
     * Set path
     *
     * @param string $path
     *
     * @return Albumimage
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
     * Set pathSmall
     *
     * @param string $pathSmall
     *
     * @return Albumimage
     */
    public function setPathSmall($pathSmall)
    {
        $this->pathSmall = $pathSmall;

        return $this;
    }

    /**
     * Get pathSmall
     *
     * @return string
     */
    public function getPathSmall()
    {
        return $this->pathSmall;
    }

    /**
     * Set pathMobile
     *
     * @param string $pathMobile
     *
     * @return Albumimage
     */
    public function setPathMobile($pathMobile)
    {
        $this->pathMobile = $pathMobile;

        return $this;
    }

    /**
     * Get pathMobile
     *
     * @return string
     */
    public function getPathMobile()
    {
        return $this->pathMobile;
    }

    /**
     * Set cdnFile
     *
     * @param string $cdnFile
     *
     * @return Albumimage
     */
    public function setCdnFile($cdnFile)
    {
        $this->cdnFile = $cdnFile;

        return $this;
    }

    /**
     * Get cdnFile
     *
     * @return string
     */
    public function getCdnFile()
    {
        return $this->cdnFile;
    }

    /**
     * Set sourceFile
     *
     * @param string $sourceFile
     *
     * @return Albumimage
     */
    public function setSourceFile($sourceFile)
    {
        $this->sourceFile = $sourceFile;

        return $this;
    }

    /**
     * Get sourceFile
     *
     * @return string
     */
    public function getSourceFile()
    {
        return $this->sourceFile;
    }

    /**
     * Set width
     *
     * @param integer $width
     *
     * @return Albumimage
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get width
     *
     * @return integer
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set height
     *
     * @param integer $height
     *
     * @return Albumimage
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return integer
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set created
     *
     * @param integer $created
     *
     * @return Albumimage
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
     * Set sort
     *
     * @param integer $sort
     *
     * @return Albumimage
     */
    public function setSort($sort)
    {
        $this->sort = $sort;

        return $this;
    }

    /**
     * Get sort
     *
     * @return integer
     */
    public function getSort()
    {
        return $this->sort;
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
