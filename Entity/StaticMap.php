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
    
    /**
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @return integer
     */
    public function getZoom()
    {
        return $this->zoom;
    }
    
    /**
     * @return integer
     */
    public function getWidth()
    {
        return $this->width;
    }
    
    /**
     * @return integer
     */
    public function getHeight()
    {
        return $this->height;
    }
    
    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
    
    /**
     * @return string
     */
    public function getMarkerColor()
    {
        return $this->markerColor;
    }
    
    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }
    
    /**
     * @param integer $zoom
     */
    public function setZoom($zoom)
    {
        $this->zoom = $zoom;
    }
    
    /**
     * @param integer $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }
    
    /**
     * @param integer $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }
    
    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }
    
    /**
     * @param string $markerColor
     */
    public function setMarkerColor($markerColor)
    {
        $this->markerColor = $markerColor;
    }
    
    /**
     * @param string $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }
}
