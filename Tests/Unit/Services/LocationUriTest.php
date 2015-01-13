<?php

/* Created by Hatim Jacquir
 * User: Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\GmapBundle\Tests\Unit\Services;

use \Hj\GmapBundle\Services\LocationUri;
use \Hj\GmapBundle\Tests\Unit\HjUnitTestCase;

/**
 * @covers Hj\GmapBundle\Services\LocationUri
 */
class LocationUriTest extends HjUnitTestCase
{
    /**
     * @var LocationUri
     */
    private $locationUri;

    public function setUp()
    {
        $this->locationUri = new LocationUri();
    }

    public function testShouldBeAnUri()
    {
        $this->hjAssertInstanceOfUri($this->locationUri);
    }

    public function testGetSuffixBaseUrlShouldReturnTheAppendedSuffix()
    {
        $this->assertSame('geocode/json?address=', $this->locationUri->getSuffixBaseUrl());
    }

    public function testShouldReturnTheCorrectUrlToCallTheApi()
    {
        $addressComponents = array(
            '221',
            'Baker street',
            'London',
            'England',
        );

        $expectedUri = 'http://maps.googleapis.com/maps/api/geocode/json?address=221+Baker+street+London+England' .
            '&sensor=true';

        $this->assertSame($expectedUri, $this->locationUri->getUri($addressComponents));
    }
}