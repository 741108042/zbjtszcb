<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
 
use Symfony\Component\HttpFoundation\File\UploadedFile;
/**
 * Book
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\BookRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Book
{
    /*
     * @ORM\ManyToOne(targetEntity="Category",inversedBy="books")
     * @ORM\JoinColumn(name="categoryid", referencedColumnName="id")
     */
     public $category;
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
     * @ORM\Column(name="categoryid", type="integer")
     */
    private $categoryid;
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
     * @ORM\Column(name="intro", type="text")
     */
    private $intro;

    /**
     * @var integer
     *
     * @ORM\Column(name="sortid", type="integer")
     */
    private $sortid;

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
     * @var integer
     *
     * @ORM\Column(name="editor", type="integer")
     */
    private $editor;

    /**
     * @var integer
     *
     * @ORM\Column(name="rel", type="integer")
     */
    private $rel;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer")
     */
    private $status;

    /**
     * @var integer
     *
     * @ORM\Column(name="pub", type="integer")
     */
    private $pub;
    /**
     * @var string
     *
     */
    private $relName;

    /**
     * @var string
     *
      */
    private $statusName;

    /**
     * @var string
     *
      */
    private $pubName;
    /**
     * @Assert\File(maxSize="6000000")
     */
    private $coverfile;
    /**
     * @var string
     *
     * @ORM\Column(name="link", type="text")
     */
    private $link;
    /**
     * @var string
     *
     * @ORM\Column(name="bookid", type="string" ,length=255)
     */
    private $bookid;
    /**
      *
     * @return integer
     */
    public function getRelName()
    {
        return ($this->rel==0)?"":"推荐";
    }
    /**
      *
     * @return integer
     */
    public function getStatusName()
    {
        $status='未审核';
        switch($this->status){
            case 1:
                $status='未审核';
            break;
            case 2:
                $status='审核通过';
            break;
            case 3:
                $status='审核不通过';
            break;
            case 4:
                $status='已下架';
            break;
            case 5:
                $status='已删除';
            break;
        }
        return $status;
    }
    /**
      *
     * @return integer
     */
    public function getPubName()
    {
        return ($this->pub==0)?"未发布":"已发布";
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
/**
     * Set title
     *
     * @param string $categoryid
     *
     * @return Book
     */
    public function setCategoryid($categoryid)
    {
        $this->categoryid = $categoryid;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getBookid()
    {
        return $this->bookid;
    }
    /**
     * Set title
     *
     * @param string $title
     *
     * @return Book
     */
    public function setBookid($bookid)
    {
        $this->bookid = $bookid;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getCategoryid()
    {
        return $this->categoryid;
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
    public function getLink()
    {
        return $this->link;
    }
/**
     * Set title
     *
     * @param string $link
     *
     * @return Book
     */
    public function setLink($link)
    {
        if(strpos($link,'http://')===0){
            $this->link = $link;
        }else{
            $this->link='';
        }

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
     * @return Book
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
     * @return Book
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
     * Set intro
     *
     * @param string $intro
     *
     * @return Book
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
     * Set sortid
     *
     * @param integer $sortid
     *
     * @return Book
     */
    public function setSortid($sortid)
    {
        $this->sortid = $sortid;

        return $this;
    }

    /**
     * Get sortid
     *
     * @return integer
     */
    public function getSortid()
    {
        return $this->sortid;
    }

    /**
     * Set created
     *
     * @param integer $created
     *
     * @return Book
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
     * @return Book
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
     * Set editor
     *
     * @param integer $editor
     *
     * @return Book
     */
    public function setEditor($editor)
    {
        $this->editor = $editor;

        return $this;
    }

    /**
     * Get editor
     *
     * @return integer
     */
    public function getEditor()
    {
        return $this->editor;
    }

    /**
     * Set rel
     *
     * @param integer $rel
     *
     * @return Book
     */
    public function setRel($rel)
    {
        $this->rel = $rel;

        return $this;
    }

    /**
     * Get rel
     *
     * @return integer
     */
    public function getRel()
    {
        return $this->rel;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Book
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set pub
     *
     * @param integer $pub
     *
     * @return Book
     */
    public function setPub($pub)
    {
        $this->pub = $pub;

        return $this;
    }

    /**
     * Get pub
     *
     * @return integer
     */
    public function getPub()
    {
        return $this->pub;
    }
    /**
     * @ORM\PrePersist
     */
    public function setCreatetimeValue()
    {
        if(!$this->getCreated()) {
            $this->created = time();
        }
        if(!$this->getUpdated()){
            $this->updated=time();
        }
        if(!$this->getEditor()){
            $this->editor=0;
        }
        if(!$this->getRel()){
            $this->rel=0;
        }
        if(!$this->getStatus()){
            $this->status=0;
        }
        if(!$this->getPub()){
            $this->pub=0;
        }
        if(!$this->getSortid()){
            $this->sortid=1;
        }
    }
 
    /**
     * @ORM\PreUpdate
     */
    public function setUpdatetimeValue()
    {
        $this->updated = time();
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

        if (null !== $this->getCoverfile()) {
            $this->cover = '/upload/'.$this->created.'.'.$this->getCoverfile()->guessExtension();
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
        $this->getCoverfile()->move('/project/zjnews/web/upload/',$this->created.'.'.$this->getCoverfile()->guessExtension());
 
        $this->setCoverfile(null);
    }
 

    /**
     * Set category
     *
     * @param \AppBundle\Entity\Category $category
     *
     * @return Book
     */
    public function setCategory(\AppBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \AppBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }
}
