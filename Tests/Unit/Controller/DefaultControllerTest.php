<?php

/**
 * Created by Hatim Jacquir
 * @author : Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\GmapBundle\Tests\Unit\Controller;

use Hj\GmapBundle\Controller\DefaultController;
use Hj\GmapBundle\Tests\Unit\HjUnitTestCase;

/**
 * Class DefaultControllerTest
 * @package Hj\GmapBundle\Tests\Unit\Controller
 *
 * @covers Hj\GmapBundle\Controller\DefaultController
 */
class DefaultControllerTest extends HjUnitTestCase
{
    public function testIndexShouldReturnAnResponse()
    {
        $content = 'foo';

        $template = $this->getMockBuilder('Symfony\Component\Templating\EngineInterface')->getMock();
        $template
            ->expects($this->once())
            ->method('render')
            ->with('HjGmapBundle:Default:index.html.twig')
            ->will($this->returnValue($content));

        $response = $this->getMockBuilder('\Symfony\Component\HttpFoundation\Response')
            ->disableOriginalConstructor()
            ->getMock();
        $response
            ->expects($this->once())
            ->method('setContent')
            ->with($content);

        $controller = new DefaultController($response, $template);

        $this->assertInstanceOf('\Symfony\Component\HttpFoundation\Response', $controller->index());
    }
}