<?php

/**
 * Created by Hatim Jacquir
 * @author : Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\GmapBundle\Tests\Functional\Services;


use Hj\GmapBundle\Entity\Location;
use Hj\GmapBundle\Services\LocationSerializer;
use Hj\GmapBundle\Services\LocationUri;
use Hj\GmapBundle\Services\Response;

class LocationSerializerTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldDeserialize()
    {
        $response = new Response();
        $locationUri = new LocationUri();

        $serializer = new LocationSerializer($response, $locationUri);

        $location = $serializer->deserialize(
            array(
                221,
                'baker street',
                'London',
                'United Kingdom',
            )
        );

        $this->assertInstanceOf(Location::CLASS_NAME, $location);
        $this->assertSame('51.523507', $location->getLat());
        $this->assertSame('-0.1581793', $location->getLng());
    }
}