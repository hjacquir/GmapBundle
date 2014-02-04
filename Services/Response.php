<?php

/* Created by Hatim Jacquir
 * User: Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\GmapBundle\Services;

use \Exception;

/**
 * Handle and format the response returned by the API
 */
class Response
{
    const STATUS_ZERO_RESULTS = 'ZERO_RESULTS';

    /**
     * Return the latitude and longitude of the place
     * 
     * @param string $uri The uri use to call the API
     * 
     * @return array An associative array which contain the latitude and longitude
     * 
     * @throws Exception
     */
    public function getLocation($uri)
    {
        $jsonResponse = file_get_contents($uri);
        $arrayResponse = json_decode($jsonResponse, true);
        
        if (false === $this->isFound($arrayResponse)) {
            throw new Exception('It seems that the location you requested does not exist');
        }
        
        return array(
            'lat' => (string) $arrayResponse['results'][0]['geometry']['location']['lat'],
            'lng' => (string) $arrayResponse['results'][0]['geometry']['location']['lng'],
        );
        
    }
    
    /**
     * Return the status of the request
     * 
     * @param array $arrayResponse An array that contain the response of API
     * 
     * @return string The status of response
     */
    private function getStatus($arrayResponse)
    {
        return $arrayResponse['status'];
    }
    
    /**
     * Return true if the result exist
     * 
     * @param array $arrayResponse An array that contain the response of API
     * 
     * @return boolean
     */
    private function isFound($arrayResponse)
    {
        $isFound = true;
        // return 'OK' or 'ZERO_RESULTS'
        $status = $this->getStatus($arrayResponse);
        if (self::STATUS_ZERO_RESULTS === $status) {
            $isFound = false;
        }
        
        return $isFound;
    }
}
