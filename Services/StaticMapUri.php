<?php

/* Created by Hatim Jacquir
 * User: Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\GmapBundle\Services;

/**
 * Return a formatted URI to call the API to get the static map
 */
class StaticMapUri extends Uri
{
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
    public function getUri(array $adressComponents, array $mapComponents, $label, $lat, $lng)
    {
        return $this->baseUrl . 
            $this->getSuffixBaseUrl() . 
            $this->encodeAdressComponentsAsUrl($adressComponents) . 
            $this->encodeMapComponentsAsUrl($mapComponents, $label, $lat, $lng) . 
            '&sensor=true';
    }
    
    /**
     * Returns the suffix pasted immediately after the base url
     * 
     * @return string The suffix appended
     */
    public function getSuffixBaseUrl()
    {
        return 'staticmap?center=';
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
}