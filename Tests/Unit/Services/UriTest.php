<?php

/* Created by Hatim Jacquir
 * User: Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\GmapBundle\Tests\Unit\Services;

use \Hj\GmapBundle\Services\Uri;
use \Hj\GmapBundle\Tests\Unit\HjUnitTestCase;

/**
 * @covers Hj\GmapBundle\Services\Uri
 */
class UriTest extends HjUnitTestCase
{
    /**
     * @var Uri
     */
    private $uri;

    public function setUp()
    {
        $this->uri = $this->getMockForAbstractClass('Hj\GmapBundle\Services\Uri');
    }

    public function testShouldHaveABaseUrlByDefault()
    {
        $this->assertAttributeEquals('http://maps.googleapis.com/maps/api/', 'baseUrl', $this->uri);
    }

    public function testShouldGetTheUri()
    {
        $addressComponents = array(
            'streetNumber' => '221',
            'streetName' => 'Baker street',
            'locality' => 'London',
            'country' => 'ENGLAND',
        );

        $expectedUri = 'http://maps.googleapis.com/maps/api/221+Baker+street+London+ENGLAND&sensor=true';

        $this->assertSame($expectedUri, $this->uri->getUri($addressComponents));
    }
}
