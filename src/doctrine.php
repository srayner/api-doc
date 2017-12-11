<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;

$config = require(__DIR__ . '/../config/config.php');

// Create Doctrine ORM configuration
$dbParams = $config['db'];
$paths = $config['doctrine']['entityPaths'];

$isDevMode = true;
$doctrineConfig = Setup::createConfiguration($isDevMode);
$driver = new AnnotationDriver(new AnnotationReader(), $paths);

AnnotationRegistry::registerLoader('class_exists');
$doctrineConfig->setMetadataDriverImpl($driver);

$entityManager = EntityManager::create($dbParams, $doctrineConfig);