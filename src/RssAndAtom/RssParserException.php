<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 04-10-2016 13:36
 */
declare(strict_types = 1);

namespace JorisRietveld\RssAndAtom;


class RssParserException extends \Exception
{
    public function __construct( string $message = '', int $code = 0, \Exception $previous = null  )
    {
        parent::__construct( $message, $code, $previous );
    }
}