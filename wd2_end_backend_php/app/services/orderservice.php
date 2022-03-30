<?php
namespace Services;

use Repositories\OrderRepository;

class OrderService {

    private $rep;

    function __construct()
    {
        $this->repo = new OrderRepository();
    }

    function insertOrder($order, $orderLine) {
        $this->repo->insertOrder($order, $orderLine);
    }
}

?>