<?php

/* Created by Hatim Jacquir
 * User: Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\GmapBundle\Entity;

/**
 * Contain the address of the place
 */
class Address
{
    const CLASS_NAME = __CLASS__;
    const DOUBLE_SEPARATOR = '__';
    const SIMPLE_SEPARATOR = '_';

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $uniqueId;

    /**
     * @var string
     */
    private $country;

    /**
     * @var string
     */
    private $locality;

    /**
     * @var int
     */
    private $streetNumber;

    /**
     * @var string
     */
    private $streetName;

    /**
     * @var Location
     */
    private $location;

    /**
     * @var StaticMap
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