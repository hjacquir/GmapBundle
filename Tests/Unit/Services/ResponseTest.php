<?php

/* Created by Hatim Jacquir
 * User: Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\GmapBundle\Tests\Unit\Services;

use \Hj\GmapBundle\Services\Response;
use \Hj\GmapBundle\Tests\Unit\UnitTestCase;

require '../../../../../../vendor/autoload.php';

/**
 * @covers \Hj\GmapBundle\Services\Response
 */
class ResponseTest extends UnitTestCase
{
    public function testShouldReturnAResponse()
    {
        $uri = 'fixturesForExistingPlace.json';
        
        $response = new Response($uri);
        $this->assertObjectHasAttribute('arrayResponse', $response);
    }
    
    public function testShouldReturnTheLatitudeAndLongitudeOfAPlace()
    {
        $uri = 'fixturesForExistingPlace.json';
        
        $response = new Response($uri);
        $location = $response->getLocation();
        
        $this->assertIfTheArrayHasKeyAndValue($location, 'lat', '46.8147221');
        $this->assertIfTheArrayHasKeyAndValue($location, 'lng', '-71.2269929');
    }
    
    /**
     * @expectedException \Exception
     * @expectedExceptionMessage It seems that the location you requested does not exist
     */
    public function testShouldThrowAnExceptionWhenThePlaceIsNotFound()
    {
        $uri = 'fixturesForNotFoundPlace.json';
        
        $response = new Response($uri);
        $location = $response->getLocation();
    }
}
