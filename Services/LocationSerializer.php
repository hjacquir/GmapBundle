<?php

/* Created by Hatim Jacquir
 * User: Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\GmapBundle\Services;

use \Hj\GmapBundle\Entity\Location;
use \Symfony\Component\Serializer\Encoder\JsonEncoder;
use \Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * This class is used to convert the json response into Location object
 */
class LocationSerializer
{
    /**
     * @var Response
     */
    private $response;

    /**
     * @var LocationUri
     */
    private $locationUri;

    /**
     * @param Response $response
     * @param LocationUri $locationUri
     */
    public function __construct(Response $response, LocationUri $locationUri)
    {
        $this->response = $response;
        $this->locationUri = $locationUri;
    }

    /**
     * @param array $addressComponents
     *
     * @return Location
     */
    public function deserialize(Array $addressComponents)
    {
        $uri = $this->locationUri->getUri($addressComponents);

        $location = $this->response->getLocation($uri);

        $encoder = new JsonEncoder();
        $normalizer = new GetSetMethodNormalizer();
        $serializer = new Serializer(array($normalizer), array($encoder));

        return $serializer->deserialize(json_encode($location), Location::CLASS_NAME, 'json');
    }
}
