<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 04-10-2016 13:00
 */
declare(strict_types = 1);

namespace JorisRietveld\RssAndAtom;


class RssParser extends Parser
{
    /**
     * RssParser constructor.
     *
     * Initiate the RssParser class and call its parents constructor.
     *
     * @param string $xmlSource
     */
    public function __construct( string $xmlSource = '' )
    {
        parent::__construct( $xmlSource );
    }

    /**
     * Must be implemented by parent. This will return an feed object with an rss feed.
     *
     * @param string $xmlSource
     * @return Feed
     */
    public function getFeed( string $xmlSource = '' ) : Feed
    {
        $this->setXmlSource( $xmlSource );
        return $this->buildFeed();
    }

    /**
     * Must be implemented by parent. This will build an Feed object and return it.
     *
     * @return Feed
     */
    protected function buildFeed() : Feed
    {
        // Load the xml source.
        $this->loadXML();

        // Grab the channel information and save it to the Feed object.
        $channel = $this->xmlDocument->getElementsByTagName( 'channel' )->item(0);
        $feed = new Feed(
            $channel->getElementsByTagName('title')->item(0)->childNodes->item(0)->nodeValue,
            $channel->getElementsByTagName('link')->item(0)->childNodes->item(0)->nodeValue,
            $channel->getElementsByTagName('description')->item(0)->childNodes->item(0)->nodeValue
        );

        // Grab the news articles and save them as NewsItem objects in the Feed->newsArticle property.
        $xmlItems = $this->xmlDocument->getElementsByTagName('item');
        $items = [];
        for ( $i = 0; $i < $xmlItems->length; $i++)
        {
            $items[$i] = new NewsArticle(
                $xmlItems->item($i)->getElementsByTagName('title')->item(0)->childNodes->item(0)->nodeValue,
                $xmlItems->item($i)->getElementsByTagName('link')->item(0)->childNodes->item(0)->nodeValue,
                $xmlItems->item($i)->getElementsByTagName('description')->item(0)->childNodes->item(0)->nodeValue
            );
        }
        $feed->setNewsElements( $items );

        // Hurray finished building the news feed return it and be happy about it.
        return $feed;
    }
}