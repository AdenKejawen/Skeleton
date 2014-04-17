<?php
/**
 * @author Aden Kejawen <surya.kejawen@gmail.com>
 *
 * This file is part of Aden Kejawen Bundle
 **/
namespace Aden\Kejawen\Bundle\Controller;

use \Symfony\Component\HttpFoundation\Request;
use \Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use \Aden\Kejawen\Bundle\AdenKejawenEvents;
use \Aden\Kejawen\Bundle\Event\ActivityLogEvent;

class TestController extends Controller
{
    /**
     * @Route("/test")
     **/
    public function registerAction(Request $request)
    {
        $dispatcher = $this->container->get('event_dispatcher');
        $dispatcher->dispatch(AdenKejawenEvents::ACTIVITY_LOG, new ActivityLogEvent($this->container->get('adenkejawen.provider.logger'), 'Test'));
    }
}
