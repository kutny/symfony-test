<?php

namespace Kutny\FormTest;

use Doctrine\ORM\EntityManager;

class InsertTestEntityFacade
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function saveTestEntity(TestEntity $testEntity)
    {
        $this->entityManager->persist($testEntity);
        $this->entityManager->flush();
    }

}