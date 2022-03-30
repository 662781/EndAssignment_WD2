<?php

namespace Repositories;

use Models\OrderLine;
use Models\Order;
use PDO;
use PDOException;
use Repositories\Repository;

class OrderRepository extends Repository{
    function insertOrder($order, $orderLine) {
        try {
            // STR_TO_DATE(?,'%d-%m-%Y %H:%i:%s')
            $stmt = $this->connection->prepare("INSERT INTO `order`(`user_id`, `payment_method`, `total_price`, `date_time`) VALUES (?,?,?,NOW())");            
            $stmt->execute([$order->getUserId(), $order->getPaymentMethod(), $order->getTotalPrice()]);
            $LAST_ID = $this->conn->lastInsertId();
            $orderLine->setId($LAST_ID);
            $this->insertOrderLine($orderLine);


        } catch (PDOException $e) {
            echo $e;
        }
    }

    private function insertOrderLine($orderLine) {
        try {
            $stmt = $this->connection->prepare("INSERT INTO `order_line`(`order_id`, `product_id`, `amount`, `price`) VALUES (?,?,?,?)");            
            
            $stmt->execute([$orderLine->getOrderId(), $orderLine->getProductId(), $orderLine->getAmount(), $orderLine->getPrice()]);

        } catch (PDOException $e) {
            echo $e;
        }
    }
}