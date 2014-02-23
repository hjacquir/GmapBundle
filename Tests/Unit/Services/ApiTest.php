<?php

/* Created by Hatim Jacquir
 * User: Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\GmapBundle\Tests\Unit\Services;

use \Hj\GmapBundle\Services\Api;
use \Hj\GmapBundle\Tests\Unit\HjUnitTestCase;

/**
 * @covers \Hj\GmapBundle\Services\Api
 */
class ApiTest extends HjUnitTestCase
{
    /**
     * @var Api
     */
    private $api;
    
    /**
     * @var array
     */
    private $parameters;
    
    public function setUp()
    {
        $this->api = new Api();
        
        $this->parameters = array(
            'streetNumber' => '2',
            'streetName'   => 'Lorem ipsum dolor sit amet',
            'locality'     => 'Angers',
            'country'      => 'FRANCE',
        );
    }
    
    public function testMethodGetTheUriShouldReturnTheUriCorrectlyFormatted()
    {
        $expectedUrl = 'http://maps.googleapis.com/maps/api/geocode/json?address=2+Lorem+ipsum+dolor+sit+amet+' . 
                'Angers+FRANCE&sensor=true';
        $this->assertSame($expectedUrl, $this->api->getTheUri($this->parameters));
    }
}
