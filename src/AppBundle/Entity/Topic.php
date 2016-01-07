<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;
 
use Symfony\Component\HttpFoundation\File\UploadedFile;
/**
 * Topic
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\TopicRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Topic
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=255)
     */
    private $author;

    /**
     * @var string
     *
     * @ORM\Column(name="cover", type="string", length=255)
     */
    private $cover;

    /**
     * @var string
     *
     * @ORM\Column(name="video", type="string", length=255, nullable=true)
     */
    private $video;

    /**
     * @var integer
     *
     * @ORM\Column(name="created", type="integer")
     */
    private $created;
    /**
     * @var integer
     *
     * @ORM\Column(name="updated", type="integer")
     */
    private $updated;
    /**
     * @Assert\File(maxSize="6000000")
     */
    private $coverfile;
    /**
    * @var string
    */
    private $filename;
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
     * @param string $title
     *
     * @return Topic
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
     * Set author
     *
     * @param string $author
     *
     * @return Topic
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
     * Set cover
     *
     * @param string $cover
     *
     * @return Topic
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
     * Set video
     *
     * @param string $video
     *
     * @return Topic
     */
    public function setVideo($video)
    {
        $this->video = $video;

        return $this;
    }

    /**
     * Get video
     *
     * @return string
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * Set created
     *
     * @param integer $created
     *
     * @return Topic
     */
    public function setCreated($created)
    {
        $this->created = $created;

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
     * Set created
     *
     * @param integer $updated
     *
     * @return Topic
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

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
     * Sets photofile.
     *
     * @param UploadedFile $photofile
     */
    public function setCoverfile(UploadedFile $file = null)
    {
        $this->coverfile = $file;
    }
 
    /**
     * Get photofile.
     *
     * @return UploadedFile
     */
    public function getCoverfile()
    {
        return $this->coverfile;
    }
    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function preUpload()
    {             
        $target_url=$this->getUploadDir();
        $this->filename=time();
        if (null !== $this->getCoverfile()) {
            $this->cover = $target_url.'/'.$this->filename.'.'.$this->getCoverfile()->guessExtension();
        } 
    }
 
    /**
     * @ORM\PostPersist
     * @ORM\PostUpdate
     */
    public function saveCover()
    {
        if (null === $this->getCoverfile()) {
            return;
        } 
        $target=$this->getUploadRootDir();
        $this->getCoverfile()->move($target,$this->filename.'.'.$this->getCoverfile()->guessExtension());
 
        $this->setCoverfile(null);
    }
    /**
    *  getrootDir
    */
    private function getRootDir(){
        return __DIR__.'/../../../web';
    }
    private function getUploadRootDir()
    {
        $uploaddir=$this->getRootDir().$this->getUploadDir();
        if(!file_exists($uploaddir)){
            @mkdir($uploaddir,0777,true);
        }
        // the absolute directory path where uploaded
        // documents should be saved
        return $this->getRootDir().$this->getUploadDir();
    }
    private function getUploadDir()
    { 
        $now=time();
        $subfold=date("Y",$now)."/".date("Ymd",$now);
        return '/upload/images/'.$subfold;
    }
}
