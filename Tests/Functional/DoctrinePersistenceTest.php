<?php

/* Created by Hatim Jacquir
 * User: Hatim Jacquir <jacquirhatim@gmail.com>
 */

namespace Hj\GmapBundle\Tests\Functional;

use \Doctrine\ORM\EntityManager;
use \Doctrine\ORM\Tools\Setup;
use \Hj\GmapBundle\Entity\Adress;
use \Hj\GmapBundle\Entity\Location;
use \Hj\GmapBundle\Entity\StaticMap;
use \PHPUnit_Framework_TestCase;

/**
 * Functional test to improve the persistence of doctrine entitys
 */
class DoctrinePersistenceTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var EntityManager
     */
    private $em;
    
    public function setUp()
    {
        $conn = array(
            'driver'   => 'pdo_mysql',
            'host'     => 'localhost',
            'user'     => 'root',
            'password' => 'root',
            'dbname'   => 'gmap',
        );
        
        $paths = array('../../../Entity/');
        $config = Setup::createAnnotationMetadataConfiguration($paths, true);
        $this->em = EntityManager::create($conn, $config);
        $this->cleanDatabase();
    }
    
    private function cleanDatabase()
    {
        $connection = $this->em->getConnection();
        $platform   = $connection->getDatabasePlatform();
        
        $adress    = $platform->getTruncateTableSQL('gmap_adress');
        $location  = $platform->getTruncateTableSQL('gmap_location');
        $staticMap = $platform->getTruncateTableSQL('gmap_static_map');
        
        $connection->executeQuery('SET FOREIGN_KEY_CHECKS = 0;');
        $connection->executeUpdate($adress);
        $connection->executeUpdate($location);
        $connection->executeUpdate($staticMap);
        $connection->executeQuery('SET FOREIGN_KEY_CHECKS = 1;');
    }
    
    public function testShouldPersistAdress()
    {
        $adress = new Adress();
        $adress->setUniqueId('adress_sdfds');
        $adress->setCountry('sdfds');
        $adress->setLocality('sdfd');
        $adress->setStreetName('dfdsf');
        $adress->setStreetNumber(452);
        
        $location = new Location();
        $location->setUniqueId('location_4522');
        $location->setLat(4522.255);
        $location->setLng(896.55);
        
        $staticMap = new StaticMap();
        $staticMap->setUniqueId('staticMap_455');
        $staticMap->setHeight(455);
        $staticMap->setWidth(885);
        $staticMap->setMarkerColor('sdfsd');
        $staticMap->setLabel('sdsdf');
        $staticMap->setZoom(245);
        $staticMap->setType('sdfds');
        
        $adress->setLocation($location);
        $adress->setStaticMap($staticMap);
        
        $this->em->persist($adress);
        $this->em->persist($location);
        $this->em->persist($staticMap);
        $this->em->flush();
        $this->em->clear();
        
        $this->assertPersistenceOfAdress(
                'adress_sdfds', 
                'location_4522', 
                'staticMap_455', 
                'sdfds', 
                'sdfd', 
                'dfdsf', 
                452
        );
    }
    
    /**
     * @param string $adressUniqueId
     * @param string $locationUniqueId
     * @param string $staticMapUniqueId
     * @param string $country
     * @param string $locality
     * @param string $streetName
     * @param string $streetNumber
     */
    private function assertPersistenceOfAdress(
            $adressUniqueId, 
            $locationUniqueId,
            $staticMapUniqueId, 
            $country, 
            $locality, 
            $streetName, 
            $streetNumber
    ) {
        /**
         * @var Adress
         */
        $adress = $this->em->getRepository(Adress::CLASS_NAME)
                ->findOneBy(array('uniqueId' => $adressUniqueId));
        
        $location = $this->em->getRepository(Location::CLASS_NAME)
                ->findOneBy(array('uniqueId' => $locationUniqueId));
        
        $staticMap = $this->em->getRepository(StaticMap::CLASS_NAME)
                ->findOneBy(array('uniqueId' => $staticMapUniqueId));
        
        $this->assertSame($location, $adress->getLocation(), 'The adress location is not as expected');
        $this->assertSame($staticMap, $adress->getStaticMap(), 'The adress static map is not as expected');
        $this->assertSame($country, $adress->getCountry(), 'The adress country is not as expected');
        $this->assertSame($locality, $adress->getLocality(), 'The adress locality is not as expected');
        $this->assertSame($streetName, $adress->getStreetName(), 'The adress street name is not as expected');
        $this->assertSame($streetNumber, $adress->getStreetNumber(), 'The adress street number is not as expected');
    }
}
