<?php

namespace Repositories;

use Models\Product;
use PDO;
use PDOException;
use Repositories\Repository;

class ProductRepository extends Repository
{
    function getAll()
    {
        try {
            $stmt = $this->connection->prepare("SELECT id, `name`, category_id, price, ingredients, img_path FROM product");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\Product');
            $products = $stmt->fetchAll();
            return $products;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getById($product_id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT id, `name`, category_id, price, ingredients, img_path FROM product WHERE id = ?");
            $stmt->execute([$product_id]);
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\Product');
            $product = $stmt->fetch();
            return $product;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function insert($product)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO `product`(`name`, `category_id`, `price`, `ingredients`, `img_path`) VALUES (?,?,?,?,?)");

            $stmt->execute([$product->getName(), $product->getCatId(), $product->getPrice(), $product->getIngredients(), $product->getImgPath()]);

            $product->id = $this->connection->lastInsertId();

        } catch (PDOException $e) {
            echo $e;
        }
    }


    function update($product)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE `product` SET `name`= ? ,`category_id`= ? ,`price`= ? ,`ingredients`= ? ,`img_path`= ?  WHERE `id` = ?");
            $stmt->execute([$product->getName(), $product->getCatId(), $product->getPrice(),$product->getIngredients(), $product->getImgPath(), $product->getId()]);

        } catch (PDOException $e) {
            echo $e;
        }
    }

    function deleteById($id)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM `product` WHERE `id` = ?");
            $stmt->execute([$id]);
        } catch (PDOException $e) {
            echo $e;
        }
        return true;
    }
}
