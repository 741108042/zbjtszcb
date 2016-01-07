<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GameJob
 *
 * @ORM\Table(name="game_job")
 * @ORM\Entity
 */
class GameJob
{
    /**
     * @var string
     *
     * @ORM\Column(name="jobtitle", type="string", length=50, nullable=true)
     */
    private $jobtitle;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="pwd", type="string", length=50, nullable=true)
     */
    private $pwd;

    /**
     * @var string
     *
     * @ORM\Column(name="name_vcode", type="string", length=50, nullable=true)
     */
    private $nameVcode;

    /**
     * @var string
     *
     * @ORM\Column(name="pwd_vcode", type="string", length=50, nullable=true)
     */
    private $pwdVcode;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=true)
     */
    private $status = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="created", type="integer", nullable=true)
     */
    private $created = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set jobtitle
     *
     * @param string $jobtitle
     *
     * @return GameJob
     */
    public function setJobtitle($jobtitle)
    {
        $this->jobtitle = $jobtitle;

        return $this;
    }

    /**
     * Get jobtitle
     *
     * @return string
     */
    public function getJobtitle()
    {
        return $this->jobtitle;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return GameJob
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
     * Set pwd
     *
     * @param string $pwd
     *
     * @return GameJob
     */
    public function setPwd($pwd)
    {
        $this->pwd = $pwd;

        return $this;
    }

    /**
     * Get pwd
     *
     * @return string
     */
    public function getPwd()
    {
        return $this->pwd;
    }

    /**
     * Set nameVcode
     *
     * @param string $nameVcode
     *
     * @return GameJob
     */
    public function setNameVcode($nameVcode)
    {
        $this->nameVcode = $nameVcode;

        return $this;
    }

    /**
     * Get nameVcode
     *
     * @return string
     */
    public function getNameVcode()
    {
        return $this->nameVcode;
    }

    /**
     * Set pwdVcode
     *
     * @param string $pwdVcode
     *
     * @return GameJob
     */
    public function setPwdVcode($pwdVcode)
    {
        $this->pwdVcode = $pwdVcode;

        return $this;
    }

    /**
     * Get pwdVcode
     *
     * @return string
     */
    public function getPwdVcode()
    {
        return $this->pwdVcode;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return GameJob
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
     * Set created
     *
     * @param integer $created
     *
     * @return GameJob
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
