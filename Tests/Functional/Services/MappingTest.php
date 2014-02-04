<?php

/* Created by Hatim Jacquir
 * User: Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\GmapBundle\Tests\Functional\Services;

use \Hj\GmapBundle\Entity\Location;
use \Hj\GmapBundle\Services\Mapping;
use \Hj\GmapBundle\Services\Response;
use \PHPUnit_Framework_TestCase;
use \Symfony\Component\Serializer\Encoder\JsonEncoder;
use \Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

require '../../../../../../vendor/autoload.php';

/**
 * @covers \Hj\GmapBundle\Services\Mapping
 */
class MappingTest extends PHPUnit_Framework_TestCase
{
    public function testShouldReturnAnLocationObject()
    {
        $mapping = new Mapping();
        $response = new Response('fixtures.json');
        $encoder = new JsonEncoder();
        $normalizer = new GetSetMethodNormalizer();
        /**
         * @var Location
         */
        $location = $mapping->deserializeLocation($response, $encoder, $normalizer);
        
        $this->assertInstanceOf(Location::CLASS_NAME, $location);
        $this->assertSame('46.8147221', $location->getLat());
        $this->assertSame('-71.2269929', $location->getLng());
    }
}