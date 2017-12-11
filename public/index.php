<?php

namespace ApiDoc;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/doctrine.php';

// Test file.
$file = __DIR__ . '/../public/test.json';

// Parse file and save to database.
$service = new Service\GenerateService($entityManager);
$service->generateFromFile($file);

//TODO: render