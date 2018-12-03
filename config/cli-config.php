<?php

use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Setup;
use TestCase\Type\CustomIdType;

require __DIR__ . '/../vendor/autoload.php';

/*
 * Initialize EntityManager
 */
$config = Setup::createAnnotationMetadataConfiguration([
    __DIR__ . '/../src/Entity',
], true, null, null, false);

$entityManager = EntityManager::create([
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => '',
    'dbname'   => 'doctrine_unsigned_testcase',
], $config);

/*
 * Register custom type
 */
Type::addType('custom_id', CustomIdType::class);

$connection = $entityManager->getConnection();
$connection->getDatabasePlatform()->registerDoctrineTypeMapping('custom_id', 'custom_id');

return ConsoleRunner::createHelperSet($entityManager);