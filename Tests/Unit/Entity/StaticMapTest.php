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
   public function testAdressClassShouldHaveAttributes($attributeName)
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
           array('uniqueId'),
       );
   }
   
   /**
    * @dataProvider provideSupportedAttributeandValueData
    * 
    * @param string $expectedAttribute
    * @param mixed  $expectedValue
    */
   public function testShouldHaveGetterAndSetterForAttributes($expectedAttribute, $expectedValue)
   {
       $this->hjAssertThatObjectHaveGetAndSetMethods($this->staticMap, $expectedAttribute, $expectedValue);
   }
   
   public function provideSupportedAttributeandValueData()
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
}
