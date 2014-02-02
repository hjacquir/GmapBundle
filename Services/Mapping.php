<?php

/* Created by Hatim Jacquir
 * User: Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\GmapBundle\Services;

use \Hj\GmapBundle\Entity\Location;
use \Symfony\Component\Serializer\Encoder\JsonEncoder;
use \Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use \Symfony\Component\Serializer\Serializer;

/**
 * This class is used to convert the json response into Location object
 */
class Mapping
{
    /**
     * Return an Location object
     * 
     * @param Response               $response   The response in array format return by the api
     * @param JsonEncoder            $encoder    The type of encoder needed by the serializer component
     * @param GetSetMethodNormalizer $normalizer The normalizer needed by the serializer component
     * @param string                 $format     The format of data
     * 
     * @return Location The serialized latitude and longitude
     */
    public function deserializeLocation(
            Response $response, 
            JsonEncoder $encoder, 
            GetSetMethodNormalizer $normalizer,
            $format = 'json'
    ) {
        $location = $response->getLocation();
        $serializer = new Serializer(array($normalizer), array($encoder));
        
        return $serializer->deserialize(json_encode($location), Location::CLASS_NAME, $format); 
    }
}
