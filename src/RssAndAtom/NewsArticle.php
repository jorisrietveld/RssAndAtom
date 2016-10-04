<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 04-10-2016 15:12
 */
declare(strict_types = 1);

namespace JorisRietveld\RssAndAtom;


class NewsArticle
{
    protected $title;
    protected $link;
    protected $description;

    /**
     * NewsArticle constructor.
     *
     * Initiate the NewsArticle object.
     * 
     * @param string $title
     * @param string $link
     * @param string $description
     */
    public function __construct( string $title = '', string $link = '', string $description = '' )
    {
        $this->title = $title;
        $this->link = $link;
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param string $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }



}