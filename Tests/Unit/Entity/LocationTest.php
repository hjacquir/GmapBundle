<?php

/* Created by Hatim Jacquir
 * User: Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\GmapBundle\Tests\Unit\Entity;

use \Hj\GmapBundle\Entity\Location;
use \Hj\GmapBundle\Tests\Unit\UnitTestCase;

require '../../../../../../vendor/autoload.php';

/**
 * @covers \Hj\GmapBundle\Entity\Location
 */
class LocationTest extends UnitTestCase
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
       $this->assertIfTheMethodExist($this->location, $setMethod);
       
       $getMethod = 'get' . $appendedAttribute;
       $this->assertIfTheMethodExist($this->location, $getMethod);
       
       $this->location->{$setMethod}($expectedValue);
       
       $this->assertSame($expectedValue, $this->location->{$getMethod}());
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
