<?php

/* Created by Hatim Jacquir
 * User: Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\GmapBundle\Tests\Unit\Services;

use \Hj\GmapBundle\Services\StaticMapUri;
use \Hj\GmapBundle\Tests\Unit\HjUnitTestCase;

/**
 * @covers Hj\GmapBundle\Services\StaticMapUri
 */
class StaticMapUriTest extends HjUnitTestCase
{
    /**
     * @var StaticMapUri
     */
    private $staticMapUri;
    
    public function setUp()
    {
        $this->staticMapUri = new StaticMapUri();
    }
    
    public function testShouldBeAnUri()
    {
        $this->hjAssertInstanceOfUri($this->staticMapUri);
    }
    
    public function testShouldHaveASuffixBaseUrl()
    {
        $this->assertSame('staticmap?center=', $this->staticMapUri->getSuffixBaseUrl());
    }
    
    public function testShouldGetTheCorrectUri()
    {
        $adressComponents = array(
            '221',
            'Baker street',
            'London',
            'England',
        );
        
        $size  = '451x78';
        $color = 'red';
        
        $mapComponents = array(
            'zoom'    => 13,
            'size'    => $size,
            'maptype' => 'roadMap',
            'markers' => 'color:' . $color,
        );
        
        $label = '%7Clabel:A%7C';
        $lat   = '44122.255';
        $lng   = '-45885.222';
        
        $expectedUri = 'http://maps.googleapis.com/maps/api/staticmap?center=221+Baker+street+London+England&zoom=13' . 
                '&size=451x78&maptype=roadMap&markers=color%3Ared%7Clabel:A%7C44122.255,-45885.222&sensor=true';
        
        $this->assertSame($expectedUri, $this->staticMapUri->getUri($adressComponents, $mapComponents, $label, $lat, $lng));
    }
}
