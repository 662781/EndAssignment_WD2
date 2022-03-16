<?php
namespace Models;

use Models\Product;

class CartItem{

    //Fields
    private Product $product;
    private int $amount;

    //Constructor
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function setAmount(int $amount)
    {
        $this->amount = $amount;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }



    


}