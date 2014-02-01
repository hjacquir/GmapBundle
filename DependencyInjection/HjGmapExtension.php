<?php

/* Created by Hatim Jacquir
 * User: Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\GmapBundle\DependencyInjection;

use \Symfony\Component\DependencyInjection\ContainerBuilder;
use \Symfony\Component\DependencyInjection\Extension\Extension;
use \Symfony\Component\HttpKernel\Config\FileLocator;
use \Symfony\Component\Validator\Mapping\Loader\YamlFileLoader;

/**
 * Class to load services
 */
class HjGmapExtension extends Extension
{
    public function load(ContainerBuilder $container)
    {
        $locator = new FileLocator(array(__DIR__ . '/../Resources/config'));
        $loader = new YamlFileLoader($container, $locator);
        $loader->load('services.yml');
    }
}
