<?php

namespace Controllers;

use Exception;
use Services\ProductService;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class ProductController extends Controller
{
    private $service;

    //Initialize services
    function __construct()
    {
        $this->service = new ProductService();
    }

    public function getAll()
    {
        // $jwt = $this->checkToken();
        // if(!$jwt){
        //     return;
        // }

        // $offset = NULL;
        // $limit = NULL;

        // if (isset($_GET["offset"]) && is_numeric($_GET["offset"])) {
        //     $offset = $_GET["offset"];
        // }
        // if (isset($_GET["limit"]) && is_numeric($_GET["limit"])) {
        //     $limit = $_GET["limit"];
        // }

        $products = $this->service->getAll();

        $this->respond($products);
    }

    public function getOne($id)
    {
        $product = $this->service->getById($id);

        if (!$product) {
            $this->respondWithError(404, "Product not found");
            return;
        }

        $this->respond($product);
    }

    public function create()
    {
        try {
            $product = $this->createObjectFromPostedJson("Models\\Product");
            if ($this->service->getById($product->getId())) {
                $this->respondWithError(401, "Product with this ID already exists!");
                return;
            }
            $this->service->insert($product);
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }

        $this->respond($product);
    }

    public function update()
    {
        try {
            $product = $this->createObjectFromPostedJson("Models\\Product");
            $this->service->update($product);
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }

        $this->respond($product);
    }

    public function delete($id)
    {
        try {
            $this->service->deleteById($id);
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }

        $this->respond(true);
    }
}
