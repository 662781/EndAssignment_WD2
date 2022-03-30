<?php

namespace Controllers;

use Exception;
use Services\OrderService;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Models\Order;
use Models\OrderLine;

class OrderController extends Controller
{
    private $service;
    private Order $order;
    private OrderLine $orderLine;

    //Initialize services
    function __construct()
    {
        $this->service = new OrderService();
        $this->order = new Order();
        $this->orderLine = new OrderLine();
    }

    public function createOrder(){
        $this->order = $this->createObjectFromPostedJson("Models\\Order");
    }

    public function placeOrder(){
        $this->orderLine = $this->createObjectFromPostedJson("Models\\OrderLine");
        //Amount is always 1, I couldn't add a counter...
        $this->orderLine->setAmount(1);

        $this->service->insertOrder($this->order, $this->orderLine);
    }


}
