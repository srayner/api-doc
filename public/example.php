<?php

namespace ApiDoc;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/doctrine.php';

// Load the item
$itemRepository = $entityManager->getRepository('ApiDoc\Entity\Item');
$item = $itemRepository->findOneById(19);

// Render the output
include __DIR__ . '/../template/item.phtml';
