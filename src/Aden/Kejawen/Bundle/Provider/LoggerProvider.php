<?php
/**
 * @author Aden Kejawen <surya.kejawen@gmail.com>
 *
 * This file is part of Aden Kejawen Bundle
 **/

namespace Aden\Kejawen\Bundle\Provider;

use \Symfony\Component\DependencyInjection\ContainerInterface;

class LoggerProvider
{
    private $logger;

    public function __construct(ContainerInterface $container)
    {
        if (!$this->logger) {
            $this->logger = $container->get('monolog.logger.'.$container->getParameter('initial'));
        }
    }

    public function log($message)
    {
        $this->logger->info($message);
    }
}
