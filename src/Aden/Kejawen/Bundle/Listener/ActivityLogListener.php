<?php
/**
 * @author Aden Kejawen <surya.kejawen@gmail.com>
 *
 * This file is part of Aden Kejawen Bundle
 **/

namespace Aden\Kejawen\Bundle\Listener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Aden\Kejawen\Bundle\AdenKejawenEvents;
use Aden\Kejawen\Bundle\Event\ActivityLogEvent;

class ActivityLogListener implements EventSubscriberInterface
{
    public function __construct()
    {
    }
    
    public static function getSubscribedEvents()
    {
        return array(
            AdenKejawenEvents::ACTIVITY_LOG => 'onActivityLog',
        );
    }
    
    public function onActivityLog(ActivityLogEvent $event)
    {
        $logger = $event->getLogger();
        $logger->log($event->getMessage());
    }
}
