<?php

/* Created by Hatim Jacquir
 * User: Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\GmapBundle\Entity;

use \Doctrine\ORM\Mapping as ORM;

/**
 * Store the parameter of your static map
 * 
 * @ORM\Entity()
 * @ORM\Table(name="gmap_static_map")
 */
class StaticMap
{
    const CLASS_NAME = __CLASS__;
    
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
     * @ORM\Column(type="smallint", name="zoom")
     */
    private $zoom;
    
    /**
     * @ORM\Column(type="smallint", name="width")
     */
    private $width;
    
    /**
     * @ORM\Column(type="smallint", name="height")
     */
    private $height;
    
    /**
     * @ORM\Column(type="string", name="type", length=50)
     */
    private $type;
    
    /**
     * @ORM\Column(type="string", name="marker_color", length=50)
     */
    private $markerColor;
    
    /**
     * @ORM\Column(type="string", name="label", length=255)
     */
    private $label;
}
