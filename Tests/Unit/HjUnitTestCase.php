<?php

/* Created by Hatim Jacquir
 * User: Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\GmapBundle\Tests\Unit;

use \PHPUnit_Framework_MockObject_MockObject;
use \PHPUnit_Framework_TestCase;
use \ReflectionClass;

/**
 * A class that extends phpunit and contains methods common unit test project.
 */
class HjUnitTestCase extends PHPUnit_Framework_TestCase
{
    /**
     * Assert that object have getter and setter
     *
     * @param object $object The expected object
     * @param mixed $expectedAttribute The attribute concerned which one tests the getter and setter
     * @param mixed $expectedValue The expected value returned by the getter
     */
    protected function hjAssertThatObjectHaveGetAndSetMethods($object, $expectedAttribute, $expectedValue)
    {
        $appendedAttribute = ucfirst($expectedAttribute);

        $setMethod = 'set' . $appendedAttribute;
        $this->hjAssertIfTheMethodExist($object, $setMethod);

        $getMethod = 'get' . $appendedAttribute;
        $this->hjAssertIfTheMethodExist($object, $getMethod);

        $object->{$setMethod}($expectedValue);

        $this->assertSame($expectedValue, $object->{$getMethod}());
    }

    /**
     * Assert if the method exist
     *
     * @param Object $object The expected object
     * @param string $expectedMethodName The expected method name
     */
    protected function hjAssertIfTheMethodExist($object, $expectedMethodName)
    {
        $class = new ReflectionClass($object);
        $method = $class->getMethod($expectedMethodName);
        $message = 'The method : ' . $expectedMethodName . ' does not exist into ' . $method->class;
        $this->assertSame($expectedMethodName, $method->name, $message);
    }

    /**
     * Assert that an array has epected key and value
     *
     * @param array $expectedArray
     * @param mixed $expectedKey
     * @param mixed $expectedValue
     */
    protected function hjAssertIfTheArrayHasKeyAndValue(array $expectedArray, $expectedKey, $expectedValue)
    {
        $this->assertArrayHasKey($expectedKey, $expectedArray);
        $this->assertSame($expectedValue, $expectedArray[$expectedKey]);
    }

    /**
     * Assert that the given object is an instance of URI
     *
     * @param object $expectedObject
     */
    protected function hjAssertInstanceOfUri($expectedObject)
    {
        $this->assertInstanceOf('Hj\GmapBundle\Services\Uri', $expectedObject);
    }

    /**
     * @return PHPUnit_Framework_MockObject_MockObject
     */
    protected function getMockLocationEntity()
    {
        return $this->getMockBuilder('Hj\GmapBundle\Entity\Location')
            ->disableOriginalConstructor()
            ->getMock();
    }

    /**
     * @return PHPUnit_Framework_MockObject_MockObject
     */
    protected function getMockStaticMapEntity()
    {
        return $this->getMockBuilder('Hj\GmapBundle\Entity\StaticMap')
            ->disableOriginalConstructor()
            ->getMock();
    }
}