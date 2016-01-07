<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Movie
 *
 * @ORM\Table(name="movie", indexes={@ORM\Index(name="created", columns={"created"}), @ORM\Index(name="status", columns={"status"}), @ORM\Index(name="crapimg", columns={"crapimg"}), @ORM\Index(name="score", columns={"score"}), @ORM\Index(name="pubdate", columns={"pubdate"}), @ORM\Index(name="crapimg_2", columns={"crapimg"})})
 * @ORM\Entity
 */
class Movie
{
    /**
     * @var integer
     *
     * @ORM\Column(name="type", type="integer", nullable=false)
     */
    private $type = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="keywords", type="string", length=255, nullable=true)
     */
    private $keywords;

    /**
     * @var string
     *
     * @ORM\Column(name="length", type="string", length=20, nullable=true)
     */
    private $length;

    /**
     * @var string
     *
     * @ORM\Column(name="englishtitle", type="string", length=255, nullable=true)
     */
    private $englishtitle;

    /**
     * @var string
     *
     * @ORM\Column(name="cover", type="string", length=255, nullable=true)
     */
    private $cover;

    /**
     * @var string
     *
     * @ORM\Column(name="cdn_cover", type="string", length=255, nullable=true)
     */
    private $cdnCover;

    /**
     * @var string
     *
     * @ORM\Column(name="tags", type="string", length=255, nullable=true)
     */
    private $tags;

    /**
     * @var string
     *
     * @ORM\Column(name="pubdate", type="string", length=20, nullable=true)
     */
    private $pubdate;

    /**
     * @var string
     *
     * @ORM\Column(name="firstpubdate", type="string", length=20, nullable=true)
     */
    private $firstpubdate;

    /**
     * @var string
     *
     * @ORM\Column(name="kind", type="string", length=200, nullable=true)
     */
    private $kind;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=200, nullable=true)
     */
    private $language;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=200, nullable=true)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="director", type="string", length=100, nullable=true)
     */
    private $director;

    /**
     * @var string
     *
     * @ORM\Column(name="writer", type="string", length=255, nullable=true)
     */
    private $writer;

    /**
     * @var string
     *
     * @ORM\Column(name="actor", type="text", length=65535, nullable=true)
     */
    private $actor;

    /**
     * @var string
     *
     * @ORM\Column(name="intro", type="text", length=65535, nullable=true)
     */
    private $intro;

    /**
     * @var float
     *
     * @ORM\Column(name="score", type="float", precision=10, scale=0, nullable=false)
     */
    private $score = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="hits", type="integer", nullable=false)
     */
    private $hits = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="imdb", type="string", length=20, nullable=true)
     */
    private $imdb;

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
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    private $status = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="coming", type="integer", nullable=false)
     */
    private $coming = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="playing", type="integer", nullable=false)
     */
    private $playing = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="hot", type="integer", nullable=false)
     */
    private $hot = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="crapimg", type="integer", nullable=false)
     */
    private $crapimg = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="scheduled", type="integer", nullable=false)
     */
    private $scheduled = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="node_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nodeId;

    public function getId(){
        return $this->nodeId;
    }

    /**
     * Set type
     *
     * @param boolean $type
     *
     * @return Movie
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return boolean
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Movie
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
     * Set keywords
     *
     * @param string $keywords
     *
     * @return Movie
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;

        return $this;
    }

    /**
     * Get keywords
     *
     * @return string
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * Set length
     *
     * @param string $length
     *
     * @return Movie
     */
    public function setLength($length)
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Get length
     *
     * @return string
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set englishtitle
     *
     * @param string $englishtitle
     *
     * @return Movie
     */
    public function setEnglishtitle($englishtitle)
    {
        $this->englishtitle = $englishtitle;

        return $this;
    }

    /**
     * Get englishtitle
     *
     * @return string
     */
    public function getEnglishtitle()
    {
        return $this->englishtitle;
    }

    /**
     * Set cover
     *
     * @param string $cover
     *
     * @return Movie
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
     * Set cdnCover
     *
     * @param string $cdnCover
     *
     * @return Movie
     */
    public function setCdnCover($cdnCover)
    {
        $this->cdnCover = $cdnCover;

        return $this;
    }

    /**
     * Get cdnCover
     *
     * @return string
     */
    public function getCdnCover()
    {
        return $this->cdnCover;
    }

    /**
     * Set tags
     *
     * @param string $tags
     *
     * @return Movie
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get tags
     *
     * @return string
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set pubdate
     *
     * @param string $pubdate
     *
     * @return Movie
     */
    public function setPubdate($pubdate)
    {
        $this->pubdate = $pubdate;

        return $this;
    }

    /**
     * Get pubdate
     *
     * @return string
     */
    public function getPubdate()
    {
        return $this->pubdate;
    }

    /**
     * Set firstpubdate
     *
     * @param string $firstpubdate
     *
     * @return Movie
     */
    public function setFirstpubdate($firstpubdate)
    {
        $this->firstpubdate = $firstpubdate;

        return $this;
    }

    /**
     * Get firstpubdate
     *
     * @return string
     */
    public function getFirstpubdate()
    {
        return $this->firstpubdate;
    }

    /**
     * Set kind
     *
     * @param string $kind
     *
     * @return Movie
     */
    public function setKind($kind)
    {
        $this->kind = $kind;

        return $this;
    }

    /**
     * Get kind
     *
     * @return string
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * Set language
     *
     * @param string $language
     *
     * @return Movie
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return Movie
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set director
     *
     * @param string $director
     *
     * @return Movie
     */
    public function setDirector($director)
    {
        $this->director = $director;

        return $this;
    }

    /**
     * Get director
     *
     * @return string
     */
    public function getDirector()
    {
        return $this->director;
    }

    /**
     * Set writer
     *
     * @param string $writer
     *
     * @return Movie
     */
    public function setWriter($writer)
    {
        $this->writer = $writer;

        return $this;
    }

    /**
     * Get writer
     *
     * @return string
     */
    public function getWriter()
    {
        return $this->writer;
    }

    /**
     * Set actor
     *
     * @param string $actor
     *
     * @return Movie
     */
    public function setActor($actor)
    {
        $this->actor = $actor;

        return $this;
    }

    /**
     * Get actor
     *
     * @return string
     */
    public function getActor()
    {
        return $this->actor;
    }

    /**
     * Set intro
     *
     * @param string $intro
     *
     * @return Movie
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
     * Set score
     *
     * @param float $score
     *
     * @return Movie
     */
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Get score
     *
     * @return float
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set hits
     *
     * @param integer $hits
     *
     * @return Movie
     */
    public function setHits($hits)
    {
        $this->hits = $hits;

        return $this;
    }

    /**
     * Get hits
     *
     * @return integer
     */
    public function getHits()
    {
        return $this->hits;
    }

    /**
     * Set imdb
     *
     * @param string $imdb
     *
     * @return Movie
     */
    public function setImdb($imdb)
    {
        $this->imdb = $imdb;

        return $this;
    }

    /**
     * Get imdb
     *
     * @return string
     */
    public function getImdb()
    {
        return $this->imdb;
    }

    /**
     * Set created
     *
     * @param integer $created
     *
     * @return Movie
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
     * @return Movie
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
     * Set status
     *
     * @param integer $status
     *
     * @return Movie
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
     * Set coming
     *
     * @param integer $coming
     *
     * @return Movie
     */
    public function setComing($coming)
    {
        $this->coming = $coming;

        return $this;
    }

    /**
     * Get coming
     *
     * @return integer
     */
    public function getComing()
    {
        return $this->coming;
    }

    /**
     * Set playing
     *
     * @param integer $playing
     *
     * @return Movie
     */
    public function setPlaying($playing)
    {
        $this->playing = $playing;

        return $this;
    }

    /**
     * Get playing
     *
     * @return integer
     */
    public function getPlaying()
    {
        return $this->playing;
    }

    /**
     * Set hot
     *
     * @param integer $hot
     *
     * @return Movie
     */
    public function setHot($hot)
    {
        $this->hot = $hot;

        return $this;
    }

    /**
     * Get hot
     *
     * @return integer
     */
    public function getHot()
    {
        return $this->hot;
    }

    /**
     * Set crapimg
     *
     * @param integer $crapimg
     *
     * @return Movie
     */
    public function setCrapimg($crapimg)
    {
        $this->crapimg = $crapimg;

        return $this;
    }

    /**
     * Get crapimg
     *
     * @return integer
     */
    public function getCrapimg()
    {
        return $this->crapimg;
    }

    /**
     * Set scheduled
     *
     * @param integer $scheduled
     *
     * @return Movie
     */
    public function setScheduled($scheduled)
    {
        $this->scheduled = $scheduled;

        return $this;
    }

    /**
     * Get scheduled
     *
     * @return integer
     */
    public function getScheduled()
    {
        return $this->scheduled;
    }

    /**
     * Get nodeId
     *
     * @return integer
     */
    public function getNodeId()
    {
        return $this->nodeId;
    }
}
