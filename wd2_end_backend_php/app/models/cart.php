<?php
namespace Models;

use Models\CartItem;

class Cart{

    //Variables
    private $items = array();

    //Getters
    public function getItems(): array
    {
        return $this->items;
    }

    public function addItem(CartItem $newItem){
        array_push($this->items, $newItem);
    }

    public function delItem(CartItem $oldItem){
        if (($key = array_search($oldItem, $this->items)) !== false) {
            unset($this->items[$key]);
        }
    }

    


}