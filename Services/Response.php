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
     * @var array
     */
    private $arrayResponse;
    
    /**
     * Return an array response
     * 
     * @param string $uri The url with parameters use to call the API
     * 
     * @return array $arrayResponse The decoded json response in array format
     */
    public function __construct($uri)
    {
        $jsonResponse = file_get_contents($uri);
        $this->arrayResponse = json_decode($jsonResponse, true);
        
        return $this->arrayResponse;
    }
    
    /**
     * Return the latitude and longitude of the place
     * 
     * @return array An associative array which contain the latitude and longitude
     * 
     * @throws Exception
     */
    public function getLocation()
    {
        if (false === $this->isFound()) {
            throw new Exception('It seems that the location you requested does not exist');
        }
        
        return array(
            'lat' => $this->arrayResponse['results'][0]['geometry']['location']['lat'],
            'lng' => $this->arrayResponse['results'][0]['geometry']['location']['lng'],
        );
        
    }
    
    /**
     * Return the status of the request
     * 
     * @return string The status of response
     */
    private function getStatus()
    {
        return $this->arrayResponse['status'];
    }
    
    /**
     * Return true if the result exist
     * 
     * @return boolean
     */
    private function isFound()
    {
        $isFound = true;
        // return 'OK' or 'ZERO_RESULTS'
        $status = $this->getStatus();
        if (self::STATUS_ZERO_RESULTS === $status) {
            $isFound = false;
        }
        
        return $isFound;
    }
}
