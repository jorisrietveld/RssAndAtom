<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 04-10-2016 14:41
 */
declare(strict_types = 1);

/**
 * Register an php autoloader for auto including missing class files.
 */
spl_autoload_register( function ( $className ){
    $vendorPrefix = 'JorisRietveld\\';

    if( strpos( $className, $vendorPrefix ) !== 0 )
    {
        // class not from this vendor move to next registered autoloader.
        return;
    }

    $baseDir = __DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR;

    // Replace the prefix with the srcDirecory and the slashes with the directory separator.
    $className = str_replace( [ $vendorPrefix, '\\' ] , [ $baseDir, DIRECTORY_SEPARATOR ], $className );

    include $className . '.php';
});


if( !empty( $_GET[ 'feed' ] ))
{
    $feed = [
        'thehackersnews' => 'http://feeds.feedburner.com/TheHackersNews?format=xml',
        'googlenews' => 'http://news.google.com/news?ned=us&topic=h&output=rss'
    ];

    /**
     * Create an new parser and parse the rss feed.
     */
    $rssParser = new \JorisRietveld\RssAndAtom\RssParser();
    $feedUrl = $feed[ (string)$_GET['feed'] ];
    $feed = $rssParser->getFeed( $feedUrl );

    /**
     * Show the meta data of the rss feed.
     */
    echo '<h4>' . $feed->getTitle() . '</h4>';
    echo '<a href="' . $feed->getLink() . '"/>Ga naar website</a>';
    echo '<div>' . $feed->getDescription() . '</div>';

    echo '<hr/>';

    /**
     * Show all the news items in tables because tables are the way to go in modern web development.
     */
    foreach ( $feed->getNewsElements() as $newsElement )
    {
        echo '<table style="width: 600px; margin-left: auto; margin-right: auto">';

        echo '<thead>';
        echo '<tr>';
        echo '<th>';
        echo '<a href="' . $newsElement->getLink() . '">'. $newsElement->getTitle() . '</a>';
        echo '</th>';
        echo '<tr>';
        echo '</thead>';

        echo '<tbody>';
        echo '<tr>';
        echo '<td>';
        echo strlen( $newsElement->getDescription() ) > 200 ? substr( $newsElement->getDescription(), 0, 200). '...........' : $newsElement->getDescription();
        echo '</td>';
        echo '</tr>';
        echo '</tbody>';

        echo '</table>';
    }
}