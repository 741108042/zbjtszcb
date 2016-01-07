<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity
 */
class Category
{
    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=255, nullable=false)
     */
    private $category;
    /**
     * @var integer
     *
     * @ORM\Column(name="sortid", type="integer")
     */
    private $sortid;
     /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer")
     */
    private $status;
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
   /**
     * @ORM\OneToMany(targetEntity="Book",mappedBy="category")
     */
    public  $books;
 
    public function __toString()
    {
        return $this->getCategory()?$this->getCategory() : '无类别数据';
    }
     

    /**
     * Set category
     *
     * @param string $category
     *
     * @return Category
     */
    public function setCategory($category)
    {
        $this->category = $category;

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
     * Set category
     *
     * @param string $sortid
     *
     * @return Category
     */
    public function setSortid($sortid)
    {
        $this->sortid = $sortid;

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
     * Set category
     *
     * @param string $status
     *
     * @return Category
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }
    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
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
     * Constructor
     */
    public function __construct()
    {
        $this->books = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add book
     *
     * @param \AppBundle\Entity\Book $book
     *
     * @return Category
     */
    public function addBook(\AppBundle\Entity\Book $book)
    {
        $this->books[] = $book;

        return $this;
    }

    /**
     * Remove book
     *
     * @param \AppBundle\Entity\Book $book
     */
    public function removeBook(\AppBundle\Entity\Book $book)
    {
        $this->books->removeElement($book);
    }

    /**
     * Get books
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBooks()
    {
        return $this->books;
    }
}
