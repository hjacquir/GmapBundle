<?php

/* Created by Hatim Jacquir
 * User: Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\GmapBundle\Entity;

use \Doctrine\ORM\Mapping as ORM;

/**
 * Contains the latitude and longitude of a place
 * 
 * @ORM\Entity()
 * @ORM\Table(name="gmap_location")
 */
class Location
{
    const CLASS_NAME = __CLASS__;
    
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string", name="latitude", length = 255)
     */
    private $lat;
    
    /**
     * @ORM\Column(type="string", name="longitude", length = 255)
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