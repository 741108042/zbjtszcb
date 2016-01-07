<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Linkcolumn
 *
 * @ORM\Table(name="linkcolumn")
 * @ORM\Entity
 */
class Linkcolumn
{
    /**
     * @var integer
     *
     * @ORM\Column(name="fatherid", type="integer", nullable=false)
     */
    private $fatherid = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="num", type="integer", nullable=false)
     */
    private $num = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set fatherid
     *
     * @param integer $fatherid
     *
     * @return Linkcolumn
     */
    public function setFatherid($fatherid)
    {
        $this->fatherid = $fatherid;

        return $this;
    }

    /**
     * Get fatherid
     *
     * @return integer
     */
    public function getFatherid()
    {
        return $this->fatherid;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Linkcolumn
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
     * Set num
     *
     * @param integer $num
     *
     * @return Linkcolumn
     */
    public function setNum($num)
    {
        $this->num = $num;

        return $this;
    }

    /**
     * Get num
     *
     * @return integer
     */
    public function getNum()
    {
        return $this->num;
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
