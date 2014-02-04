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
    /**
     * @var Response
     */
    private $response;
    
    public function setUp()
    {
        $this->response = new Response();
    }
    
    public function testShouldReturnTheLatitudeAndLongitudeOfAPlace()
    {
        $uri = 'fixturesForExistingPlace.json';
        $location = $this->response->getLocation($uri);
        
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
        $location = $this->response->getLocation($uri);
    }
}
