<?php

/* Created by Hatim Jacquir
 * User: Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\GmapBundle\Tests\Unit\Entity;

use \Hj\GmapBundle\Entity\Address;
use \Hj\GmapBundle\Tests\Unit\HjUnitTestCase;

/**
 * @covers \Hj\GmapBundle\Entity\Adress
 */
class AddressTest extends HjUnitTestCase
{
    /**
     * @var Address
     */
    private $adress;
    
    public function setUp()
    {
        $this->adress = new Address();
    }

    /**
     * @dataProvider provideSupportedAttributeNameData
     *
     * @param string $attributeName
     */
    public function testAdressClassShouldHaveAttributes($attributeName)
    {
        $this->assertClassHasAttribute($attributeName, Address::CLASS_NAME);
    }

    /**
     * @return array
     */
    public function provideSupportedAttributeNameData()
    {
        return array(
            array('id'),
            array('country'),
            array('locality'),
            array('streetNumber'),
            array('streetName'),
            array('location'),
            array('staticMap'),
            array('uniqueId'),
        );
    }

    /**
     * @dataProvider provideSupportedAttributesAndValues
     *
     * @param string $expectedAttribute
     * @param mixed  $expectedValue
     */
    public function testGetterAndSetterForAttributes($expectedAttribute, $expectedValue)
    {
        $this->hjAssertThatObjectHaveGetAndSetMethods($this->adress, $expectedAttribute, $expectedValue);
    }

    public function provideSupportedAttributesAndValues()
    {
        return array(
            array('country', 'Canada'),
            array('locality', 'Québec'),
            array('streetNumber', 125),
            array('streetName', 'areyghgh'),
            array('location', $this->getMockLocationEntity()),
            array('staticMap', $this->getMockStaticMapEntity()),
        );
    }

    public function testShouldGenerateAnUniqueIdInCorrectFormat()
    {
        $this->adress->setStreetNumber(452);
        $this->adress->setStreetName('a street Name');
        $this->adress->setLocality('a Locality name');
        $this->adress->setCountry('a country Name');

        $expectedUniqueId = '452__a_street_name__a_locality_name__a_country_name';

        $this->assertSame($expectedUniqueId, $this->adress->generateAnUniqueId());
    }
}