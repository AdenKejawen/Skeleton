<?php
/**
 * @author Aden Kejawen <surya.kejawen@gmail.com>
 *
 * This file is part of Aden Kejawen Bundle
 **/

namespace Aden\Kejawen\Bundle\Provider;

use \Symfony\Component\DependencyInjection\ContainerInterface;

class ModelProvider
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function __call($name, $arguments)
    {
        $name = preg_replace('@^(?:get)?([^/]+)@i', "$1", $name);//replace get
        $name = preg_replace('/(?<=\\w)(?=[A-Z])/i', ".$1", $name);//replace camel case to _
        $name = strtolower($name);

        try {
            return $this->container->get($this->container->getParameter('initial').'.model.'.strtolower($name));
        } catch (\Exception $e) {
            throw new \Exception("Model not found");
        }
    }
}
