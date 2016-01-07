<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * h5 project
 *
 * @ORM\Table(name="pageitem")
 * @ORM\Entity
 */
class PageItem
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pageid", type="integer", nullable=true)
     */
    private $pageid = '0';
 
    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", nullable=true)
     */
    private $content = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
 
 
 

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
     * Set pageid
     *
     * @param integer $pageid
     *
     * @return PageItem
     */
    public function setPageid($pageid)
    {
        $this->pageid = $pageid;

        return $this;
    }

    /**
     * Get pageid
     *
     * @return integer
     */
    public function getPageid()
    {
        return $this->pageid;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return PageItem
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
}
