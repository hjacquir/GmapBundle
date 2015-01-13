<?php

/* Created by Hatim Jacquir
 * User: Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\GmapBundle\Tests\Unit\Form\Type;

use \Hj\GmapBundle\Entity\StaticMap;
use \Hj\GmapBundle\Form\Type\StaticMapType;
use \Symfony\Component\Form\Test\TypeTestCase;
use \Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @covers Hj\GmapBundle\Form\Type\StaticMapType
 * 
 * @medium
 */
class StaticMapTypeTest extends TypeTestCase 
{
    /**
     * @var StaticMapType
     */
    private $staticMapType;
    
    public function setUp()
    {
        parent::setUp();
        
        $this->staticMapType = new StaticMapType();
    }
    
    public function testShouldBeAnType()
    {
        $this->assertInstanceOf('Symfony\Component\Form\AbstractType', $this->staticMapType);
    }
    
    public function testShouldHaveAName()
    {
        $this->assertSame('hj_gmapBundle_staticMap', $this->staticMapType->getName());
    }
    
    public function testShouldGetDefaultOptions()
    {
        $resolver = new OptionsResolver();
        
        $this->staticMapType->setDefaultOptions($resolver);
        
        $options = $resolver->resolve();
        
        $this->assertEquals(StaticMap::CLASS_NAME, $options['data_class']);
    }
    
//    public function testShouldSubmitData()
//    {
//        $formData = array(
//            'zoom' => 45,
//        );
//        
//        $form = $this->factory->create($this->staticMapType);
//        $form->submit($formData);
//        
//        $this->assertTrue($form->isSynchronized());
//        
//        $this->assertEquals(StaticMap::fromArray($formData), $form->getData());
//    }
}