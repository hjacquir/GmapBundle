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
     * 
     * @return string The formatted URI
     */
    public function getUri($adressComponents)
    {
        return $this->baseUrl . 
            $this->getSuffixBaseUrl() . 
            $this->encodeAdressComponentsAsUrl($adressComponents) . 
            '&sensor=true';
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
    protected function encodeAdressComponentsAsUrl($adressComponents)
    {
        return urlencode($this->formatParameters($adressComponents));
    }
    
    /**
     * Returns the suffix pasted immediately after the base url
     * 
     * @return string The suffix appended
     */
    abstract public function getSuffixBaseUrl();
}
