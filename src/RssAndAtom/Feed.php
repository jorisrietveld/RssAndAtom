<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 04-10-2016 13:05
 */
declare(strict_types = 1);

namespace JorisRietveld\RssAndAtom;


class Feed
{
    private $title;
    private $link;
    private $description;

    private $newsItems;

    public function __construct( string $title = '', string $link = '', string $description = '', array $newsItems = [] )
    {
        $this->title = $title;
        $this->link = $link;
        $this->description = $description;
        $this->newsItems = $newsItems;
    }

    /**
     * @return string
     */
    public function getTitle() : string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle( string $title )
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getLink() : string
    {
        return $this->link;
    }

    /**
     * @param string $link
     */
    public function setLink( string $link )
    {
        $this->link = $link;
    }

    /**
     * @return string
     */
    public function getDescription() : string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription( string $description )
    {
        $this->description = $description;
    }

    /**
     * @return array
     */
    public function getNewsElements() : array
    {
        return $this->newsItems;
    }

    /**
     * @param array $elements
     */
    public function setNewsElements( array $newsItems = [] )
    {
        $this->newsItems = $newsItems;
    }



}