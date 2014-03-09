<?php

/* Created by Hatim Jacquir
 * User: Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\GmapBundle\Tests\Unit\Entity;

use \Hj\GmapBundle\Entity\Location;
use \Hj\GmapBundle\Tests\Unit\HjUnitTestCase;

/**
 * @covers \Hj\GmapBundle\Entity\Location
 */
class LocationTest extends HjUnitTestCase
{
    /**
     * @var Location
     */
    private $location;
    
    public function setUp()
    {
        $this->location = new Location();
    }
    
     /**
    * @dataProvider provideSupportedAttributeNameData
    * 
    * @param string $attributeName
    */
   public function testAdressClassShouldHaveAttributes($attributeName)
   {
       $this->assertClassHasAttribute($attributeName, Location::CLASS_NAME);
   }
   
   /**
    * @return array
    */
   public function provideSupportedAttributeNameData()
   {
       return array(
           array('id'),
           array('lat'),
           array('lng'),
           array('uniqueId'),
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
       $this->hjAssertThatObjectHaveGetAndSetMethods($this->location, $expectedAttribute, $expectedValue);
   }
   
   /**
    * @return array
    */
   public function provideGetterAndSetterData()
   {
       return array(
           array('lat', '4452.255'),
           array('lng', '-47558.25'),
       );
   }
}
