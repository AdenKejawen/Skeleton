<?php
/**
 * @author Aden Kejawen <surya.kejawen@gmail.com>
 *
 * This file is part of Aden Kejawen Bundle
 **/

namespace Aden\Kejawen\Bundle\Event;

use \Symfony\Component\EventDispatcher\Event;
use \Aden\Kejawen\Bundle\Provider\LoggerProvider;

class ActivityLogEvent extends Event
{
    protected $logger;
    
    protected $message;

    public function __construct(LoggerProvider $logger, $message)
    {
        $this->logger   = $logger;
        $this->message  = $message;
    }
    
    public function getLogger()
    {
        return $this->logger;
    }
    
    public function getMessage()
    {
        return $this->message;
    }
}
