<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
 
use Symfony\Component\HttpFoundation\File\UploadedFile;
/**
 * Book
 *
 * @ORM\Table()
 * @ORM\Entity()
 * @ORM\HasLifecycleCallbacks()
 */
class Image
{
     
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;
/**
     * @var string
     *
     * @ORM\Column(name="type", type="string")
     */
    private $type;
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;
    /**
     * @var integer
     *
     * @ORM\Column(name="width", type="integer")
     */
    private $width;
    /**
     * @var integer
     *
     * @ORM\Column(name="height", type="integer")
     */
    private $height;
    /**
     * @var integer
     *
     * @ORM\Column(name="size", type="integer")
     */
    private $size;
    
    private $alt;
  
  	private $file;
  	private $ext;
  	private $tempImage;
  	private $originalImage;
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
/**
     * Set title
     *
     * @param string $image
     *
     * @return Book
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }
    /**
     * Get title
     *
     * @return image
     */
    public function getWidth()
    {
        return $this->width;
    }
    /**
     * Set title
     *
     * @param string $title
     *
     * @return image
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }
     /**
     * Get title
     *
     * @return image
     */
    public function getHeight()
    {
        return $this->height;
    }
    /**
     * Set height
     *
     * @param string $height
     *
     * @return image
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }
     /**
     * Get size
     *
     * @return image
     */
    public function getSize()
    {
        return $this->size;
    }
    /**
     * Set height
     *
     * @param string $size
     *
     * @return image
     */
    public function setSize($size)
    {
        $this->size = $size;

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
     * Set title
     *
     * @param string $title
     *
     * @return Book
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
    public function getType()
    {
        return $this->type;
    }
/**
     * Set title
     *
     * @param string $type
     *
     * @return Book
     */
    public function setType($type)
    {
         $this->type=$type;
                 return $this;

    }

    
    /**
     * Set author
     *
     * @param string $author
     *
     * @return Book
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;

        return $this;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getAlt()
    {
        return $this->alt;
    }

   
      /**
     * Sets photofile.
     *
     * @param UploadedFile $photofile
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }
 
    /**
     * Get photofile.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }
     /**
     * @ORM\PostRemove
     */
    public function removeUpload(){
    	if($this->image!=null&&file_exists($this->getUploadRootDir().$this->image)){
    		unlink($this->getUploadRootDir().$this->image);
    	}
    }
	public function getUploadRootDir(){
		return '/project/zjnews/web';
	}
 
}
