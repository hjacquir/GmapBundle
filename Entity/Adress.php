<?php

/* Created by Hatim Jacquir
 * User: Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\GmapBundle\Entity;

use \Doctrine\ORM\Mapping\Entity;
use \Doctrine\ORM\Mapping\Id;
use \Doctrine\ORM\Mapping\GeneratedValue;
use \Doctrine\ORM\Mapping\Column;
use \Doctrine\ORM\Mapping\OneToOne;
use \Doctrine\ORM\Mapping\Table;
use \Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use \Doctrine\ORM\Mapping\PrePersist;
use \Doctrine\ORM\Mapping\PreUpdate;
use \Symfony\Component\Validator\Constraints as Assert;

/**
 * Contain the adress of the place
 * 
 * @Entity()
 * @Table(name="gmap_adress")
 * @HasLifecycleCallbacks()
 */
class Adress
{
    const CLASS_NAME = __CLASS__;
    const DOUBLE_SEPARATOR = '__';
    const SIMPLE_SEPARATOR = '_';
    
    /**
     * @Id()
     * @GeneratedValue()
     * @Column(type="integer")
     */
    private $id;
    
    /**
     * @Column(name="unique_id", type="string", unique=true)
     */
    private $uniqueId;
    
    /**
     * @Column(type="string", name="country", length=100)
     * 
     * @Assert\NotBlank()
     * @Assert\Length(max=100)
     * @Assert\Country()
     */
    private $country;
    
    /**
     * @Column(type="string", name="locality", length=100)
     * 
     * @Assert\Length(max=100)
     */
    private $locality;
    
    /**
     * @Column(type="smallint", name="street_number")
     */
    private $streetNumber;
    
    /**
     * @Column(type="string", name="street_name", length=255)
     * 
     * @Assert\NotBlank()
     * @Assert\Length(max=255)
     */
    private $streetName;
    
    /**
     * @OneToOne(targetEntity="Location")
     */
    private $location;
    
    /**
     * @OneToOne(targetEntity="StaticMap")
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
    
    /**
     * Define the adress unique id
     * 
     * @PrePersist()
     * @PreUpdate()
     */
    public function setUniqueId()
    {
        $uniqueId = $this->generateAnUniqueId();
        
        $this->uniqueId = $uniqueId;
    }
    
    /**
     * Return a formatted unique id
     * 
     * @return string
     */
    public function generateAnUniqueId()
    {
        return $this->streetNumber . 
                self::DOUBLE_SEPARATOR . 
                $this->formatString($this->streetName) . 
                self::DOUBLE_SEPARATOR . 
                $this->formatString($this->locality) . 
                self::DOUBLE_SEPARATOR . 
                $this->formatString($this->country);
    }
    
    /**
     * Return a formatted string used into unique id
     * 
     * @param string $initialString
     * 
     * @return string $formattedString
     */
    private function formatString($initialString)
    {
        $formattedString = trim($initialString);
        $formattedString = strtolower($formattedString);
        $formattedString = str_replace(' ', self::SIMPLE_SEPARATOR, $formattedString);
        
        return $formattedString;
    }
}
