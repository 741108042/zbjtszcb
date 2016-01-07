<?php

namespace AppBundle\Entity;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Staff
 *
 * @ORM\Table(name="staff")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class Staff
{
    /**
     * @var string
      * @ORM\Column(name="openid", type="string", length=200, nullable=true)
     */
    private $openid;

    /**
     * @var string
     *
     * @ORM\Column(name="company", type="string", length=50, nullable=false)
     */
    private $company;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=200, nullable=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="job", type="string", length=200, nullable=true)
     */
    private $job;

    /**
     * @var string
     *
     * @ORM\Column(name="depart", type="string", length=200, nullable=true)
     */
    private $depart;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=255, nullable=true)
     */
    private $code;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    private $status = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

 /**
     * @Assert\File(maxSize="6000000")
     */
    private $photo;
  
    /**
     * Sets photofile.
     *
     * @param UploadedFile $photofile
     */
    public function setPhoto(UploadedFile $photofile = null)
    {
        $this->photo = $photofile;
    }
 
    /**
     * Get photofile.
     *
     * @return UploadedFile
     */
    public function getPhoto()
    {
        return $this->photo;
    }
     /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function preUpload()
    {
        file_put_contents("/tmp/log.txt",'pre called at '.time());
    }
    /**
     * @ORM\PostPersist
     * @ORM\PostUpdate
     */
    public function dodododo()
    { file_put_contents("/tmp/log.txt",'called at '.time());
        if (null === $this->getPhoto()) {
            return;
        }
 
        // you must throw an exception here if the file cannot be moved
        // so that the entity is not persisted to the database
        // which the UploadedFile move() method does
        try{
        $this->getPhoto()->move(
           "/tmp/do.jpg"
        );}catch(Exception $e){die($e->getMessage());}
 
        $this->setPhoto(null);
    }
 

    /**
     * Set openid
     *
     * @param string $openid
     *
     * @return Staff
     */
    public function setOpenid($openid)
    {
        $this->openid = $openid;

        return $this;
    }

    /**
     * Get openid
     *
     * @return string
     */
    public function getOpenid()
    {
        return $this->openid;
    }

    /**
     * Set company
     *
     * @param string $company
     *
     * @return Staff
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return Staff
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set job
     *
     * @param string $job
     *
     * @return Staff
     */
    public function setJob($job)
    {
        $this->job = $job;

        return $this;
    }

    /**
     * Get job
     *
     * @return string
     */
    public function getJob()
    {
        return $this->job;
    }

    /**
     * Set depart
     *
     * @param string $depart
     *
     * @return Staff
     */
    public function setDepart($depart)
    {
        $this->depart = $depart;

        return $this;
    }

    /**
     * Get depart
     *
     * @return string
     */
    public function getDepart()
    {
        return $this->depart;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return Staff
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Staff
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
