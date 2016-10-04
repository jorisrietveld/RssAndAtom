<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 04-10-2016 12:34
 */
declare(strict_types = 1);

namespace JorisRietveld\RssAndAtom;


abstract class Parser
{
    protected $xmlDocument;
    protected $xmlSource;

    /**
     * Parser constructor.
     * @param string $xmlSource
     */
    public function __construct( string $xmlSource = '' )
    {
        $this->setXmlSource( $xmlSource );
        $this->xmlDocument = new \DOMDocument();
    }

    /**
     * Load an feed as an DOMDocument
     *
     * @param string $source
     */
    protected function loadXML( string $xmlSource = '' )
    {
        $this->setXmlSource( $xmlSource );

        if( strlen( $this->xmlSource ) < 1 )
        {
            throw new \LogicException( 'De bron van de rss feed moet gedefineerd zijn' );
        }

        $this->xmlDocument->load( $this->xmlSource );
    }

    /**
     * Set an new source url for loading the DOMElement.
     *
     * @param string $xmlSource
     */
    protected function setXmlSource( string $xmlSource = '' )
    {
        $this->xmlSource =  strlen( $xmlSource ) > 0 ? $xmlSource : $this->getXmlSource();
    }

    /**
     * Get the current configured source url of the DOMElement.
     *
     * @return string
     */
    protected function getXmlSource()
    {
        return $this->xmlSource;
    }

    /**
     * This method is for parsing the DOMElement into feed elements.
     * @return mixed
     */
    protected abstract function buildFeed();

    /**
     * Function that will return the finished feed.
     *
     * @return mixed
     */
    protected abstract function getFeed();
}