<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";

$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src"), $isDevMode,null,null,false);

$conn = array(
    'driver'   => 'pdo_mysql',
    'host'     => 'dept-mariadb',
    'dbname'   => 'employees',
    'user'     => 'root',
    'password' => 'dept'
);

$entityManager = EntityManager::create($conn, $config);