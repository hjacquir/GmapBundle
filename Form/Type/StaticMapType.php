<?php

/* Created by Hatim Jacquir
 * User: Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\GmapBundle\Form\Type;

use \Hj\GmapBundle\Entity\StaticMap;
use \Symfony\Component\Form\AbstractType;
use \Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use \Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Build a form to persist or update static map object
 */
class StaticMapType extends AbstractType
{
    const NAME = 'staticMapType';

    /**
     * @var OptionsResolver
     */
    private $resolver;

    /**
     * @param OptionsResolver $resolver
     */
    public function __construct(OptionsResolver $resolver)
    {
        $this->resolver = $resolver;
    }

    /**
     * @return string $name The name of form
     */
    public function getName()
    {
        return self::NAME;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('zoom', 'integer', array(
            'label' => 'Zoom : '
        ))
            ->add('width', 'integer', array(
                'label' => 'Width : '
            ))
            ->add('height', 'integer', array(
                'label' => 'Height : '
            ))
            ->add('type', 'choice',
                array(
                    'label' => 'Type : ',
                    'choices' => array(
                        'roadmap' => 'Road map',
                        'streetview' => 'Street view',
                    ),
                )
            )
            ->add('markerColor', 'choice', array(
                'label' => 'Color of marker : ',
                'choices' => array(
                    'black' => 'Black',
                    'brown' => 'Brown',
                    'green' => 'Green',
                    'purple' => 'Purple',
                    'yellow' => 'Yellow',
                    'blue' => 'Blue',
                    'gray' => 'Gray',
                    'orange' => 'Orange',
                    'red' => 'Red',
                    'white' => 'White',
                ),
            ))

            ->add('label', 'choice', array(
                'label' => 'Label of the point : ',
                'choices' => $this->getAlphabeticalArray(),
            ))
            ->add('Save', 'submit')
            ->add('Reset', 'reset');
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $defaults = array(
            'data_class' => StaticMap::CLASS_NAME,
        );

        $this->resolver->setDefaults($defaults);
    }

    /**
     * @return array
     */
    private function getAlphabeticalArray()
    {
        $alphabet = range('A', 'Z');

        return array_combine($alphabet, $alphabet);
    }
}