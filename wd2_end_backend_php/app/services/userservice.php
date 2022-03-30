<?php
namespace Services;

use Repositories\UserRepository;

class UserService {

    private $repo;

    function __construct()
    {
        $this->repo = new UserRepository();
    }

    function checkUsernamePassword($username, $password){
        return $this->repo->checkUsernamePassword($username, $password);
    }

    function getByUsername($username){
        return $this->repo->getByUsername($username);
    }

    function getById($id){
        return $this->repo->getById($id);
    }

    function insert($user){
        $this->repo->insert($user);
    }
}

?>