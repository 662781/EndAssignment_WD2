<?php
namespace Services;

use Repositories\ProductRepository;

class ProductService {

    private $repository;

    function __construct()
    {
        $this->repository = new ProductRepository();
    }

    public function getAll() {
        return $this->repository->getAll();
    }

    public function getById($id) {
        return $this->repository->getById($id);
    }

    public function insert($product) {       
        $this->repository->insert($product);        
    }

    public function update($product) {       
        $this->repository->update($product);        
    }

    public function deleteById($product) {       
        $this->repository->deleteById($product);        
    }
}

?>