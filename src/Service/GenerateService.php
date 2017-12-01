<?php

namespace ApiDoc\Service;

use ApiDoc\Entity\Collection;
use Doctrine\ORM\EntityManager;
use Exception;
use RuntimeException;

class GenerateService
{
    protected $entityManager;
    
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    
    public function generateFromFile($file)
    {
        if (!file_exists($file)) {
            throw new RuntimeException(sprintf('Source file %s does not exist.', $file));
        }
        
        try {
            $obj = json_decode(file_get_contents($file));
        } catch (Exception $e){
            throw new RuntimeException('Malformed source file.');
        }
        
        $collection = new Collection();
        $collection->name = $obj->name;
        
        $this->entityManager->persist($collection);
        $this->entityManager->flush();
    }
}