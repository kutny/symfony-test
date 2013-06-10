<?php

namespace Kutny\FormTest;

use Doctrine\ORM\EntityManager;

class ProductsRepository
{
    const ENTITY_NAME = 'AcmeHelloBundle:Product';

    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @return Product[]
     */
    public function getProducts()
    {
        $query = $this->entityManager->createQueryBuilder()->select('p')->from(self::ENTITY_NAME, 'p')->where(
                'p.id = :id'
            )->setParameter('id', 1)->getQuery();

        return $query->getResult();
    }

}