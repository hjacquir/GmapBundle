<?php

/* Created by Hatim Jacquir
 * User: Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\GmapBundle\Tests\Unit;

use \PHPUnit_Framework_TestCase;
use \ReflectionClass;

/**
 * Description of UnitTestCase
 */
class UnitTestCase extends PHPUnit_Framework_TestCase
{
     /**
    * @param Object $object
    * @param string $expectedMethodName
    */
   protected function assertIfTheMethodExist($object, $expectedMethodName)
   {
       $class = new ReflectionClass($object);
       $method = $class->getMethod($expectedMethodName);
       $message = 'The method : ' . $expectedMethodName . ' does not exist into ' . $method->class;
       $this->assertSame($expectedMethodName, $method->name, $message);
   }
}
