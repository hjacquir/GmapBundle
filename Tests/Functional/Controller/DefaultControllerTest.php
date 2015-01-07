<?php

/**
 * Created by Hatim Jacquir
 * @author : Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\GmapBundle\Tests\Functional\Controller;

use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class DefaultControllerTest
 * @package Hj\GmapBundle\Tests\Functional\Controller
 */
class DefaultControllerTest extends WebTestCase
{
    /**
     * @var Client
     */
    private static $client;

    public static function setUpBeForeClass()
    {
         self::$client = static::createClient();
    }

    public function testIndex()
    {
        $crawler = self::$client->request('GET', '/');

        $this->assertContains('Welcome to Gmap Bundle', $crawler->html());
    }
}