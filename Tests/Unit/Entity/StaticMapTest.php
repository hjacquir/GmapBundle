<?php

/* Created by Hatim Jacquir
 * User: Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\GmapBundle\Tests\Unit\Entity;

use \Hj\GmapBundle\Entity\StaticMap;
use \Hj\GmapBundle\Tests\Unit\HjUnitTestCase;

/**
 * @covers \Hj\GmapBundle\Entity\StaticMap
 */
class StaticMapTest extends HjUnitTestCase
{
    /**
     * @var StaticMap
     */
    private $staticMap;

    public function setUp()
    {
        $this->staticMap = new StaticMap();
    }

    /**
     * @dataProvider provideSupportedAttributeNameData
     *
     * @param string $attributeName
     */
    public function testAddressClassShouldHaveAttributes($attributeName)
    {
        $this->assertClassHasAttribute($attributeName, StaticMap::CLASS_NAME);
    }

    /**
     * @return array
     */
    public function provideSupportedAttributeNameData()
    {
        return array(
            array('id'),
            array('zoom'),
            array('width'),
            array('height'),
            array('type'),
            array('markerColor'),
            array('label'),
        );
    }

    /**
     * @dataProvider provideSupportedAttributeAndValueData
     *
     * @param string $expectedAttribute
     * @param mixed $expectedValue
     */
    public function testShouldHaveGetterAndSetterForAttributes($expectedAttribute, $expectedValue)
    {
        $this->hjAssertThatObjectHaveGetAndSetMethods($this->staticMap, $expectedAttribute, $expectedValue);
    }

    public function provideSupportedAttributeAndValueData()
    {
        return array(
            array('zoom', 21),
            array('width', 785),
            array('height', 500),
            array('type', 'hgfhgsf'),
            array('markerColor', 'fhfg'),
            array('label', 'dfgf'),
        );
    }

    public function testShouldMapAnArrayToStaticMap()
    {
        $staticMap = new StaticMap();

        $staticMapFromArray = $staticMap::fromArray(array(
            'zoom' => 15,
            'height' => 14,
            'width' => 500,
            'type' => 'foo',
            'markerColor' => 'bar',
            'label' => 'fooBar',
        ));

        $this->assertInstanceOf(StaticMap::CLASS_NAME, $staticMapFromArray);
        $this->assertSame(15, $staticMapFromArray->getZoom());
        $this->assertSame(14, $staticMapFromArray->getHeight());
        $this->assertSame(500, $staticMapFromArray->getWidth());
        $this->assertSame('foo', $staticMapFromArray->getType());
        $this->assertSame('bar', $staticMapFromArray->getMarkerColor());
        $this->assertSame('fooBar', $staticMapFromArray->getLabel());
    }
}