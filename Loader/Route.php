<?php

/**
 * Created by Hatim Jacquir
 * @author : Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\GmapBundle\Loader;

use Symfony\Component\Config\Loader\Loader;
use Symfony\Component\Routing\RouteCollection;

/**
 * Load Route
 *
 * Class Route
 * @package Hj\GmapBundle\Loader
 */
class Route extends Loader
{
    const RESOURCE      = '@HjGmapBundle/Resources/config/routing.yml';
    const TYPE          = 'yaml';
    const RESOURCE_TYPE = 'extra';

    /**
     * @var RouteCollection
     */
    private $routeCollection;

    /**
     * @param RouteCollection $routeCollection
     */
    public function __construct(RouteCollection $routeCollection)
    {
        $this->routeCollection = $routeCollection;
    }

    /**
     * @param mixed $resource
     * @param null $type
     *
     * @return RouteCollection
     */
    public function load($resource, $type = null)
    {
        $importedResource = $this->import(self::RESOURCE, self::TYPE);

        $this->routeCollection->addCollection($importedResource);

        return $this->routeCollection;
    }

    /**
     * Returns whether this class supports the given resource.
     *
     * @param mixed $resource A resource
     * @param string|null $type The resource type or null if unknown
     *
     * @return bool True if this class supports the given resource, false otherwise
     */
    public function supports($resource, $type = null)
    {
        return $type === self::RESOURCE_TYPE;
    }
}