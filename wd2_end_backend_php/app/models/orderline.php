<?php
namespace Models;

class OrderLine{

    //Fields
    public int $id;
    public int $order_id;
    public int $product_id;
    public int $amount;
    public float $price; 

    
    //Getters
    public function getId(): int
    {
        return $this->id;
    }

    public function getOrderId(): int
    {
        return $this->order_id;
    }

    public function getProductId(): int
    {
        return $this->product_id;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    //Setters
    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function setOrderId(int $order_id)
    {
        $this->order_id = $order_id;
    }

    public function setProductId(int $product_id)
    {
        $this->product_id = $product_id;
    }

    public function setAmount(int $amount)
    {
        $this->amount = $amount;
    }

    public function setPrice(float $price)
    {
        $this->price = $price;
    }

}