<?php

/**
 * Created by Hatim Jacquir
 * @author : Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\GmapBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Templating\EngineInterface;

/**
 * Class DefaultController
 * @package Hj\GmapBundle\Controller
 */
class DefaultController
{
    const INDEX_TEMPLATE_NAME = 'HjGmapBundle:Default:index.html.twig';

    /**
     * @var Response
     */
    private $response;

    /**
     * @var EngineInterface
     */
    private $template;

    /**
     * @param Response $response
     * @param EngineInterface $template
     */
    public function __construct(Response $response, EngineInterface $template)
    {
        $this->response = $response;
        $this->template = $template;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @return \Symfony\Component\Templating\EngineInterface
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @return Response
     */
    public function index()
    {
        $content = $this->template->render(static::INDEX_TEMPLATE_NAME);

        $this->response->setContent($content);

        return $this->response;
    }
}