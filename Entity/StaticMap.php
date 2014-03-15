<?php

/* Created by Hatim Jacquir
 * User: Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\GmapBundle\Entity;

use \Doctrine\ORM\Mapping\Entity;
use \Doctrine\ORM\Mapping\Table;
use \Doctrine\ORM\Mapping\Id;
use \Doctrine\ORM\Mapping\GeneratedValue;
use \Doctrine\ORM\Mapping\Column;
use \Symfony\Component\Validator\Constraints as Assert;

/**
 * Store the parameter of your static map
 * 
 * @Entity()
 * @Table(name="gmap_static_map")
 */
class StaticMap
{
    const CLASS_NAME = __CLASS__;
    
    /**
     * @Id()
     * @GeneratedValue()
     * @Column(type="integer")
     */
    private $id;
    
    /**
     * @Column(type="smallint", name="zoom")
     * @Assert\NotBlank()
     * @Assert\Range(min=0, max=21)
     */
    private $zoom;
    
    /**
     * @Column(type="smallint", name="width")
     * 
     * @Assert\NotBlank()
     */
    private $width;
    
    /**
     * @Column(type="smallint", name="height")
     * @Assert\NotBlank()
     */
    private $height;
    
    /**
     * @Column(type="string", name="type", length=50)
     */
    private $type;
    
    /**
     * @Column(type="string", name="marker_color", length=50)
     */
    private $markerColor;
    
    /**
     * @Column(type="string", name="label", length=255)
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
     * @param type $width
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
}