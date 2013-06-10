<?php

namespace Kutny\FormTest;

class FetchProductsFacade
{
    private $productsRepository;

    public function __construct(ProductsRepository $productsRepository)
    {
        $this->productsRepository = $productsRepository;
    }

    public function getProduct()
    {
        $products = $this->productsRepository->getProducts();

        // some example facade magic
        if (count($products) > 1) {
            throw new \Exception('Too many products!');
        } else {
            if (count($products) === 0) {
                throw new \Exception('No products!');
            }
        }

        return $products[0];
    }

}