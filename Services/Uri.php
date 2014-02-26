<?php

/* Created by Hatim Jacquir
 * User: Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\GmapBundle\Services;

/**
 * Model to provide a URI to call the API 
 */
abstract class Uri
{
    /**
     * @var string
     */
    protected $baseUrl = 'http://maps.googleapis.com/maps/api/';
    
    /**
     * Return a formatted url used to call the api
     * 
     * @param array $adressComponents An array of adress components
     * @param array $mapComponents    An array of map components
     * @param string $label           The label of the point
     * @param string $lat             The latitude of a place
     * @param string $lng             The longitude of a place
     * 
     * @return string The formatted URI
     */
    public function getUri(
            array $adressComponents, 
            array $mapComponents = null, 
            $label = null, 
            $lat = null, 
            $lng = null
    ) {
        $uri = $this->baseUrl . $this->getSuffixBaseUrl() . $this->encodeAdressComponentsAsUrl($adressComponents);
        
        if (null !== $mapComponents) {
            $uri .= $this->encodeMapComponentsAsUrl($mapComponents, $label, $lat, $lng);
        }
        
        $uri .= '&sensor=true';
        
        return $uri;
    }

    /**
     * Return the formatted string 
     * 
     * @param array $parameters An array of address components 
     * 
     * @return string A formatted string with implode
     */
    private function formatParameters($parameters)
    {
        return implode(' ', $parameters);
    }
    
    /**
     * Return the encoded url of adress components
     * 
     * @param string $adressComponents The address components parameters formatted to string
     * 
     * @return string The encoded url
     */
    private function encodeAdressComponentsAsUrl($adressComponents)
    {
        return urlencode($this->formatParameters($adressComponents));
    }
    
    /**
     * Return a formatted url with map components
     * 
     * @param array  $mapComponents An array of map components
     * @param string $label         The label of the point
     * @param string $lat           The latitude of a place
     * @param string $lng           The longitude of a place
     * 
     * @return string The formatted url
     */
    private function encodeMapComponentsAsUrl(array $mapComponents, $label, $lat, $lng)
    {
        return '&' . http_build_query($mapComponents) . 
            $label . 
            $lat . ',' . $lng;
    }
    
    /**
     * Returns the suffix pasted immediately after the base url
     * 
     * @return string The suffix appended
     */
    abstract public function getSuffixBaseUrl();
}
