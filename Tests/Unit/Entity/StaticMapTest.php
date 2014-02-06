<?php

/* Created by Hatim Jacquir
 * User: Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\GmapBundle\Tests\Unit\Entity;

use \Hj\GmapBundle\Entity\StaticMap;
use \Hj\GmapBundle\Tests\Unit\UnitTestCase;

require '../../../../../../vendor/autoload.php';

/**
 * @covers \Hj\GmapBundle\Entity\StaticMap
 */
class StaticMapTest extends UnitTestCase
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
       );
   }

   /**
    * @dataProvider provideGetterAndSetterData
    * 
    * @param string $setter
    * @param string $getter
    * @param mixed  $value
    */
   public function testShouldGetAndSet($expectedAttribute, $expectedValue)
   {
       $appendedAttribute = ucfirst($expectedAttribute);
       
       $setMethod = 'set' . $appendedAttribute;
       $this->assertIfTheMethodExist($this->staticMap, $setMethod);
       
       $getMethod = 'get' . $appendedAttribute;
       $this->assertIfTheMethodExist($this->staticMap, $getMethod);
       
       $this->staticMap->{$setMethod}($expectedValue);
       
       $this->assertSame($expectedValue, $this->staticMap->{$getMethod}());
   }
   
   /**
    * @return array
    */
   public function provideGetterAndSetterData()
   {
       return array(
           array('zoom', 13),
           array('width', 300),
           array('height', 700),
           array('type', 'testType'),
           array('markerColor', 'testMarker'),
           array('label', 'testLabel'),
       );
   }
}
