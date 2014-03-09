<?php

/* Created by Hatim Jacquir
 * User: Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\GmapBundle\Entity;

use \Doctrine\ORM\Mapping as ORM;
use \Symfony\Component\Validator\Constraints as Assert;

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
     * 
     * @Assert\NotBlank()
     * @Assert\Length(max=100)
     * @Assert\Country()
     */
    private $country;
    
    /**
     * @ORM\Column(type="string", name="locality", length=100, nullable=true)
     * 
     * @Assert\Length(max=100)
     */
    private $locality;
    
    /**
     * @ORM\Column(type="smallint", name="street_number", nullable=true)
     */
    private $streetNumber;
    
    /**
     * @ORM\Column(type="string", name="street_name", length=255)
     * 
     * @Assert\NotBlank()
     * @Assert\Length(max=255)
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
     * Return the country name
     * 
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }
    
    /**
     * Return the locality name
     * 
     * @return string
     */
    public function getLocality()
    {
        return $this->locality;
    }
    
    /**
     * Return the street number
     * 
     * @return integer
     */
    public function getStreetNumber()
    {
        return $this->streetNumber;
    }
    
    /**
     * Return the street name
     * 
     * @return string
     */
    public function getStreetName()
    {
        return $this->streetName;
    }
    
    /**
     * Return the location of the adress
     * 
     * @return Location
     */
    public function getLocation()
    {
        return $this->location;
    }
    
    /**
     * Return the static map of the adress
     * 
     * @return StaticMap
     */
    public function getStaticMap()
    {
        return $this->staticMap;
    }
    
    /**
     * Define the country
     * 
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }
    
    /**
     * Define the locality
     * 
     * @param string $locality
     */
    public function setLocality($locality)
    {
        $this->locality = $locality;
    }
    
    /**
     * Set the street number
     * 
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
     * @param Location $location
     */
    public function setLocation(Location $location)
    {
        $this->location = $location;
    }
    
    /**
     * @param StaticMap $staticMap
     */
    public function setStaticMap($staticMap)
    {
        $this->staticMap = $staticMap;
    }
}
