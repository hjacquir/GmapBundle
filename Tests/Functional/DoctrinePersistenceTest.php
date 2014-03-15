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
 * Functional test to improve the persistence of doctrine entities
 * 
 * @medium
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
        $adress    = $this->giveAnAdress();
        $location  = $this->giveAnLocation();
        $staticMap = $this->giveAStaticMap();

        $adress->setLocation($location);
        $adress->setStaticMap($staticMap);
        
        $this->em->persist($adress);
        $this->em->persist($location);
        $this->em->persist($staticMap);
        $this->em->flush();
        $this->em->clear();
        
        $adressUniqueId = '452' . 
                Adress::DOUBLE_SEPARATOR . 
                'a_street_name' . 
                Adress::DOUBLE_SEPARATOR . 
                'a_locality_name' . 
                Adress::DOUBLE_SEPARATOR . 
                'a_country_name';
        
        $this->assertAdressPersistence(
                $adressUniqueId, 
                'a country name', 
                'a locality name', 
                'a street name', 
                452
        );
        
        return $adress;
    }
    
    /**
     * @param string $adressUniqueId
     * @param string $country
     * @param string $locality
     * @param string $streetName
     * @param string $streetNumber
     */
    private function assertAdressPersistence(
            $adressUniqueId, 
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
        
        $this->assertSame($country, $adress->getCountry(), 'The adress country is not as expected');
        $this->assertSame($locality, $adress->getLocality(), 'The adress locality is not as expected');
        $this->assertSame($streetName, $adress->getStreetName(), 'The adress street name is not as expected');
        $this->assertSame($streetNumber, $adress->getStreetNumber(), 'The adress street number is not as expected');
    }
    
    /**
     * @depends testShouldPersistAdress
     * 
     * @param Adress $adress
     */
    public function testShouldPersistAnLocation(Adress $adress)
    {
        $location = $adress->getLocation();
        
        $this->assertSame(4522.255, $location->getLat(), 'The latitude of the place is not as expected');
        $this->assertSame(896.55, $location->getLng(), 'The longitude of the place is not as expected');
    }
    
    /**
     * @depends testShouldPersistAdress
     * 
     * @param Adress $adress
     */
    public function testShouldPersistAnStaticMap(Adress $adress)
    {
        $staticMap = $adress->getStaticMap();
        
        $this->assertSame(245, $staticMap->getZoom(), 'The zoom is not as expecte');
        $this->assertSame(455, $staticMap->getHeight(), 'The height is not as expected');
        $this->assertSame('sdsdf', $staticMap->getLabel(), 'The label is not as expected');
        $this->assertSame('sdfsd', $staticMap->getMarkerColor(), 'The marker color is not as expected');
        $this->assertSame('sdfds', $staticMap->getType(), 'The type is not as expected');
        $this->assertSame(885, $staticMap->getWidth(), 'The width is not as expecte');
    }

    /**
     * @return Adress
     */
    private function giveAnAdress()
    {
        $adress = new Adress();
        $adress->setCountry('a country name');
        $adress->setLocality('a locality name');
        $adress->setStreetName('a street name');
        $adress->setStreetNumber(452);
        
        return $adress;
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
        $staticMap->setMarkerColor('sdfsd');
        $staticMap->setLabel('sdsdf');
        $staticMap->setZoom(245);
        $staticMap->setType('sdfds');
        
        return $staticMap;
    }
}
