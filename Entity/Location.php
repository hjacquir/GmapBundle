<?php

/* Created by Hatim Jacquir
 * User: Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\GmapBundle\Entity;

/**
 * Contains the latitude and longitude of a place
 */
class Location
{
    const CLASS_NAME = __CLASS__;

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $lat;

    /**
     * @var string
     */
    private $lng;
    
    /**
     * Return the latitude of a place
     * 
     * @return string
     */
    public function getLat()
    {
        return $this->lat;
    }
    
    /**
     * Return the longitude of a place
     * 
     * @return string
     */
    public function getLng()
    {
        return $this->lng;
    }
    
    /**
     * Define the latitude of a place
     * 
     * @param string $lat
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
    }
    
    /**
     * Define the longitude of a place
     * 
     * @param string $lng
     */
    public function setLng($lng)
    {
        $this->lng = $lng;
    }
}