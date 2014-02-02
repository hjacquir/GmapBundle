<?php

/* Created by Hatim Jacquir
 * User: Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\GmapBundle\Tests\Unit\Entity;

use \Hj\GmapBundle\Entity\Adress;
use \Hj\GmapBundle\Tests\Unit\UnitTestCase;

require '../../../../../../vendor/autoload.php';

/**
 * @covers \Hj\GmapBundle\Entity\Adress
 */
class AdressTest extends UnitTestCase
{
    /**
     * @var Adress
     */
   private $adress;
    
   public function setUp()
   {
       $this->adress = new Adress();
   }

   /**
    * @dataProvider provideSupportedAttributeNameData
    * 
    * @param string $attributeName
    */
   public function testAdressClassShouldHaveAttributes($attributeName)
   {
       $this->assertClassHasAttribute($attributeName, Adress::CLASS_NAME);
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
       $this->assertIfTheMethodExist($this->adress, $setMethod);
       
       $getMethod = 'get' . $appendedAttribute;
       $this->assertIfTheMethodExist($this->adress, $getMethod);
       
       $this->adress->{$setMethod}($expectedValue);
       
       $this->assertSame($expectedValue, $this->adress->{$getMethod}());
   }
   
   /**
    * @return array
    */
   public function provideGetterAndSetterData()
   {
       return array(
           array('country', 'Québec'),
           array('locality', 'Limoilou'),
           array('streetNumber', 2),
           array('streetName', 'rue dorchester'),
           array('location', $this->getMock('Hj\GmapBundle\Entity\Location')),
       );
   }
}