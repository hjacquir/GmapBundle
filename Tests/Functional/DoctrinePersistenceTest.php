<?php

/* Created by Hatim Jacquir
 * User: Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\GmapBundle\Tests\Functional;

use \Doctrine\ORM\EntityManager;
use \Doctrine\ORM\Tools\Setup;
use \Hj\GmapBundle\Entity\Address;
use \Hj\GmapBundle\Entity\Location;
use \Hj\GmapBundle\Entity\StaticMap;
use \PHPUnit_Framework_TestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Finder\Finder;

/**
 * Functional test to improve the persistence of doctrine entities
 *
 * @todo add functional test for validation of entities see validation.xml file
 */
class DoctrinePersistenceTest extends WebTestCase
{
    const NUMBER_OF_ENTITIES = 3;

    /**
     * @var EntityManager
     */
    private static $entityManager;

    /**
     * @var string
     */
    private static $entityMappingPath;

    public static function setUpBeforeClass()
    {
        self::$entityMappingPath = __DIR__ . '/../../Resources/config/doctrine/mapping/';
        $client = static::createClient();
        $container = $client->getContainer();
        $conn = array(
            'driver' => $container->getParameter('database_driver'),
            'host' => $container->getParameter('database_host'),
            'user' => $container->getParameter('database_user'),
            'password' => $container->getParameter('database_password'),
            'dbname' => $container->getParameter('database_name'),
        );

        $paths = array(self::$entityMappingPath);
        $config = Setup::createXMLMetadataConfiguration($paths);

        self::$entityManager = EntityManager::create($conn, $config);
        self::$entityManager->getMetadataFactory();
    }

    public function setUp()
    {
        $this->cleanDatabase();
    }

    public function testShouldAllEntitiesHaveBeenTested()
    {
        $finder = new Finder();
        $finder->files()->in(self::$entityMappingPath);

        $this->assertSame(self::NUMBER_OF_ENTITIES, $finder->count());
    }

    public function testShouldPersistAnLocation()
    {
        $location = $this->giveAnLocation();
        self::$entityManager->persist($location);
        self::$entityManager->flush();
        self::$entityManager->clear();

        $locationFromDataBase = self::$entityManager->find(Location::CLASS_NAME, 1);

        $this->assertSame('4522.255', $locationFromDataBase->getLat());
        $this->assertSame('896.55', $locationFromDataBase->getLng());
    }

    public function testShouldPersistAnStaticMap()
    {
        $staticMap = $this->giveAStaticMap();
        self::$entityManager->persist($staticMap);
        self::$entityManager->flush();

        $staticMapDataBase = self::$entityManager->find(StaticMap::CLASS_NAME, 1);

        $this->assertSame(245, $staticMapDataBase->getZoom());
        $this->assertSame(885, $staticMapDataBase->getWidth());
        $this->assertSame(455, $staticMapDataBase->getHeight());
        $this->assertSame('Hello World !', $staticMapDataBase->getType());
        $this->assertSame('foo', $staticMapDataBase->getMarkerColor());
        $this->assertSame('bar', $staticMapDataBase->getLabel());
    }

    public function testShouldPersistAddress()
    {
        $location = $this->giveAnLocation();
        $staticMap = $this->giveAStaticMap();

        self::$entityManager->persist($location);
        self::$entityManager->persist($staticMap);

        $address = new Address();
        $address->setLocality('foo');
        $address->setCountry('bla');
        $address->setStreetName('bar');
        $address->setStreetNumber(5);
        $address->setLocation($location);
        $address->setStaticMap($staticMap);

        self::$entityManager->persist($address);
        self::$entityManager->flush();

        $addressDatabase = self::$entityManager->find(Address::CLASS_NAME, 1);

        $this->assertSame('foo', $addressDatabase->getLocality());
        $this->assertSame('bla', $addressDatabase->getCountry());
        $this->assertSame('bar', $addressDatabase->getStreetName());
        $this->assertSame(5, $addressDatabase->getStreetNumber());
        $this->assertSame($location, $addressDatabase->getLocation());
        $this->assertSame($staticMap, $addressDatabase->getStaticMap());
    }

    private function cleanDatabase()
    {
        $connection = self::$entityManager->getConnection();
        $platform = $connection->getDatabasePlatform();

        $address = $platform->getTruncateTableSQL('gmap_address');
        $location = $platform->getTruncateTableSQL('gmap_location');
        $staticMap = $platform->getTruncateTableSQL('gmap_static_map');

        $connection->executeQuery('SET FOREIGN_KEY_CHECKS = 0;');
        $connection->executeUpdate($address);
        $connection->executeUpdate($location);
        $connection->executeUpdate($staticMap);
        $connection->executeQuery('SET FOREIGN_KEY_CHECKS = 1;');
    }

    /**
     * @return Location
     */
    private function giveAnLocation()
    {
        $location = new Location();
        $location->setLat(4522.255);
        $location->setLng(896.55);

        return $location;
    }

    /**
     * @return StaticMap
     */
    private function giveAStaticMap()
    {
        $staticMap = new StaticMap();
        $staticMap->setHeight(455);
        $staticMap->setWidth(885);
        $staticMap->setMarkerColor('foo');
        $staticMap->setLabel('bar');
        $staticMap->setZoom(245);
        $staticMap->setType('Hello World !');

        return $staticMap;
    }
}