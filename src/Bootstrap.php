<?php
namespace AHT;
// bootstrap.php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class Bootstrap
{
	
	public function getEntityManager()
	{
		// Create a simple "default" Doctrine ORM configuration for Annotations
		$isDevMode = true;
		$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/Models"), $isDevMode);
		// or if you prefer yaml or XML
		//$config = Setup::createXMLMestadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);
		//$config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/config/yaml"), $isDevMode);

		// database configuration parameters
		$conn = array(
			'driver'   => 'pdo_mysql',
			'user'     => 'root',
			'password' => '',
			'dbname'   => 'aht_mvc_ex1',
		);
		// $conn = array(
		// 	'driver' => 'pdo_sqlite',
		// 	'path' => __DIR__ . '/db.sqlite',
		// );
		$config->addEntityNamespace('', 'src\Models');
		// obtaining the entity manager
		return $entityManager = EntityManager::create($conn, $config);
	}
}
