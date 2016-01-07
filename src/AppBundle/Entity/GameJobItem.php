<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GameJobItem
 *
 * @ORM\Table(name="game_job_item")
 * @ORM\Entity
 */
class GameJobItem
{
    /**
     * @var integer
     *
     * @ORM\Column(name="job_id", type="integer", nullable=false)
     */
    private $jobId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="num", type="integer", nullable=true)
     */
    private $num;

    /**
     * @var integer
     *
     * @ORM\Column(name="num_fin", type="integer", nullable=true)
     */
    private $numFin = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="created", type="integer", nullable=true)
     */
    private $created = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="updated", type="integer", nullable=true)
     */
    private $updated = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set jobId
     *
     * @param integer $jobId
     *
     * @return GameJobItem
     */
    public function setJobId($jobId)
    {
        $this->jobId = $jobId;

        return $this;
    }

    /**
     * Get jobId
     *
     * @return integer
     */
    public function getJobId()
    {
        return $this->jobId;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return GameJobItem
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set num
     *
     * @param integer $num
     *
     * @return GameJobItem
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
     * Set numFin
     *
     * @param integer $numFin
     *
     * @return GameJobItem
     */
    public function setNumFin($numFin)
    {
        $this->numFin = $numFin;

        return $this;
    }

    /**
     * Get numFin
     *
     * @return integer
     */
    public function getNumFin()
    {
        return $this->numFin;
    }

    /**
     * Set created
     *
     * @param integer $created
     *
     * @return GameJobItem
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
     * @return GameJobItem
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
