<?php

namespace Controllers;

use Exception;
use Services\UserService;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class UserController extends Controller
{
    private $service;

    // initialize services
    function __construct()
    {
        $this->service = new UserService();
    }

    public function login()
    {
        try {
            $postedUser = $this->createObjectFromPostedJson("Models\\User");
            $user = $this->service->checkUsernamePassword($postedUser->getUsername(), $postedUser->getPassword());

            if (!$user) {
                $this->respondWithError(401, "Invalid Credentials");
                return;
            }

            $key = "MustBeSecret";

            $payload = array(
                "iss" => "http://localhost",
                "aud" => "http://localhost",
                "iat" => time(),
                "nbf" => time(),
                "exp" => time() + 600,
                "data" => array(
                    "id" => $user->getId(),
                    "username" => $user->getUsername(),
                    "email" => $user->getEmail()
                )

            );

            $jwt = JWT::encode($payload, $key, 'HS256');

            $this->respond([
                "token" => $jwt,
                "username" => $postedUser->getUsername(),
                "id" => $user->getId()
            ]);
        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }
    }

    public function register()
    {
        try {
            $postedUser = $this->createObjectFromPostedJson("Models\\User");
            $user = $this->service->getByUsername($postedUser->getUsername());

            if ($user) {
                $this->respondWithError(401, "User already exists!");
                return;
            }

            $this->service->insert($postedUser);

        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }
    }

    public function getOne($id)
    {
        $user = $this->service->getById($id);

        if (!$user) {
            $this->respondWithError(404, "User not found");
            return;
        }

        $this->respond($user);
    }
}
