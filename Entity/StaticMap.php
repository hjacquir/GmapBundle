<?php

/* Created by Hatim Jacquir
 * User: Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\GmapBundle\Entity;

/**
 * Store the parameter of our static map
 */
class StaticMap
{
    const CLASS_NAME = __CLASS__;

    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $zoom;

    /**
     * @var int
     */
    private $width;

    /**
     * @var int
     */
    private $height;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $markerColor;

    /**
     * @var string
     */
    private $label;

    /**
     * Return the zoom of the map
     * 
     * @return integer
     */
    public function getZoom()
    {
        return $this->zoom;
    }
    
    /**
     * Return the width of the map
     * 
     * @return integer
     */
    public function getWidth()
    {
        return $this->width;
    }
    
    /**
     * Return the height of the map
     * 
     * @return integer
     */
    public function getHeight()
    {
        return $this->height;
    }
    
    /**
     * Return the type of the map
     * 
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
    
    /**
     * Return the color used to mark the point on the map
     * 
     * @return string
     */
    public function getMarkerColor()
    {
        return $this->markerColor;
    }
    
    /**
     * Return the label of the point on the map
     * 
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }
    
    /**
     * Set the zoom
     * 
     * @param integer $zoom
     */
    public function setZoom($zoom)
    {
        $this->zoom = $zoom;
    }
    
    /**
     * Set the width
     * 
     * @param integer $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }
    
    /**
     * Set the height
     * 
     * @param integer $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }
    
    /**
     * Set the type
     * 
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }
    
    /**
     * Set the color of the marker
     * 
     * @param string $markerColor
     */
    public function setMarkerColor($markerColor)
    {
        $this->markerColor = $markerColor;
    }
    
    /**
     * Set the label to display the point
     * 
     * @param string $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }
    
    /**
     * @param Array $array
     * 
     * @return StaticMap
     */
    public static function fromArray(Array $array)
    {
        $staticMap = new self();
        
        if (isset($array['zoom'])) {
            $staticMap->setZoom($array['zoom']);
        }
        
        if (isset($array['height'])) {
            $staticMap->setHeight($array['height']);
        }
        
        if (isset($array['label'])) {
            $staticMap->setLabel($array['label']);
        }
        
        if (isset($array['markerColor'])) {
            $staticMap->setMarkerColor($array['markerColor']);
        }
        
        if (isset($array['type'])) {
            $staticMap->setType($array['type']);
        }
        
        if (isset($array['width'])) {
            $staticMap->setWidth($array['width']);
        }
        
        return $staticMap;
    }
}