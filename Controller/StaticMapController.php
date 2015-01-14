<?php

/**
 * Created by Hatim Jacquir
 * @author : Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\GmapBundle\Controller;

use Hj\GmapBundle\Entity\StaticMap;
use Hj\GmapBundle\Form\Type\StaticMapType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class StaticMapController
 * @package Hj\GmapBundle\Controller
 */
class StaticMapController
{
    const INDEX_TEMPLATE_NAME = 'HjGmapBundle:StaticMap:index.html.twig';

    /**
     * @var DefaultController
     */
    private $defaultController;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var StaticMapType
     */
    private $staticMapType;

    /**
     * @var StaticMap
     */
    private $staticMap;

    /**
     * @param DefaultController $defaultController
     * @param FormFactoryInterface $formFactory
     * @param StaticMapType $staticMapType
     * @param StaticMap $staticMap
     */
    public function __construct(
        DefaultController $defaultController,
        FormFactoryInterface $formFactory,
        StaticMapType $staticMapType,
        StaticMap $staticMap
    ) {
        $this->defaultController = $defaultController;
        $this->formFactory = $formFactory;
        $this->staticMapType = $staticMapType;
        $this->staticMap = $staticMap;
    }

    /**
     * @return Response
     */
    public function index()
    {
        $response = $this->defaultController->getResponse();
        $template = $this->defaultController->getTemplate();

        $form = $this->formFactory->create($this->staticMapType, $this->staticMap);

        $content = $template->render(
            self::INDEX_TEMPLATE_NAME,
            array(
                'form' => $form->createView(),
            )
        );

        $response->setContent($content);

        return $response;
    }
}