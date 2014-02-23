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
}
