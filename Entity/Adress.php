<?php

/* Created by Hatim Jacquir
 * User: Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\GmapBundle\Entity;

use \Doctrine\ORM\Mapping as ORM;

/**
 * Contain the adress of the place
 * 
 * @ORM\Entity()
 * @ORM\Table(name="gmap_adress")
 */
class Adress
{
    const CLASS_NAME = __CLASS__;
    
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string", name="country", length=100)
     */
    private $country;
    
    /**
     * @ORM\Column(type="string", name="locality", length=100, nullable=true)
     */
    private $locality;
    
    /**
     * @ORM\Column(type="string", name="street_number", length=5, nullable=true)
     */
    private $streetNumber;
    
    /**
     * @ORM\Column(type="string", name="street_name", length=255)
     */
    private $streetName;
    
    /**
     * @ORM\OneToOne(targetEntity="Location", cascade={"persist"})
     */
    private $location;
    
    /**
     * @ORM\OneToOne(targetEntity="StaticMap", cascade={"persist"})
     */
    private $staticMap;
    
    /**
     * Return the id
     * 
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Return the country name
     * 
     * @return string $country
     */
    public function getCountry()
    {
        return $this->country;
    }
    
    /**
     * Return the locality name
     * 
     * @return string $locality
     */
    public function getLocality()
    {
        return $this->locality;
    }
    
    /**
     * Return the street number
     * 
     * @return integer $streetNumber
     */
    public function getStreetNumber()
    {
        return $this->streetNumber;
    }
    
    /**
     * Return the street name
     * 
     * @return string $streetName
     */
    public function getStreetName()
    {
        return $this->streetName;
    }
    
    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }
    
    /**
     * @param string $locality
     */
    public function setLocality($locality)
    {
        $this->locality = $locality;
    }
    
    /**
     * @param integer $streetNumber
     */
    public function setStreetNumber($streetNumber)
    {
        $this->streetNumber = $streetNumber;
    }
    
    /**
     * @param string $streetName
     */
    public function setStreetName($streetName)
    {
        $this->streetName = $streetName;
    }
    
    /**
     * Return an Location object
     * 
     * @return Location $location
     */
    public function getLocation()
    {
        return $this->location;
    }
    
    /**
     * @param Location $location
     */
    public function setLocation(Location $location)
    {
        $this->location = $location;
    }
    
    /**
     * Return an static map
     * 
     * @return StaticMap
     */
    public function getStaticMap()
    {
        return $this->staticMap;
    }
    
    /**
     * @param StaticMap $staticMap
     */
    public function setStaticMap(StaticMap $staticMap)
    {
        $this->staticMap = $staticMap;
    }
}
