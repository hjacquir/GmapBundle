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
use \Symfony\Component\Validator\Constraints as Assert;

/**
 * Contain the adress of the place
 * 
 * @Entity()
 * @Table(name="gmap_adress")
 */
class Adress
{
    const CLASS_NAME = __CLASS__;
    
    /**
     * @Id()
     * @GeneratedValue()
     * @Column(type="integer")
     */
    private $id;
    
    /**
     * @Column(name="unique_id", type="string", length=255, unique=true)
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
     * @Column(type="string", name="locality", length=100, nullable=true)
     * 
     * @Assert\Length(max=100)
     */
    private $locality;
    
    /**
     * @Column(type="smallint", name="street_number", nullable=true)
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
     * @param string $uniqueId
     */
    public function setUniqueId($uniqueId)
    {
        $this->uniqueId = $uniqueId;
    }
}
