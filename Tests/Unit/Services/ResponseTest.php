<?php

/* Created by Hatim Jacquir
 * User: Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\GmapBundle\Tests\Unit\Services;

use \Exception;
use \Hj\GmapBundle\Services\Response;
use \Hj\GmapBundle\Tests\Unit\HjUnitTestCase;

/**
 * @covers \Hj\GmapBundle\Services\Response
 */
class ResponseTest extends HjUnitTestCase
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
        $uri = __DIR__ . '/fixturesForExistingPlace.json';
        $location = $this->response->getLocation($uri);
        
        $this->hjAssertIfTheArrayHasKeyAndValue($location, 'lat', '46.8147221');
        $this->hjAssertIfTheArrayHasKeyAndValue($location, 'lng', '-71.2269929');
    }
    
    /**
     * @expectedException Exception
     * @expectedExceptionMessage It seems that the location you requested does not exist
     */
    public function testShouldThrowAnExceptionWhenThePlaceIsNotFound()
    {
        $uri = __DIR__ . '/fixturesForNotFoundPlace.json';
        
        $location = $this->response->getLocation($uri);
    }
}