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
            $user = $this->service->checkUsernamePassword($postedUser->username, $postedUser->password);

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
                    "id" => $user->id,
                    "username" => $user->username,
                    "email" => $user->email
                )

            );

            $jwt = JWT::encode($payload, $key, 'HS256');

            $this->respond([ 
                "token" => $jwt,
                "username" => $postedUser->username
            ]);

        } catch (Exception $e) {
            $this->respondWithError(500, $e->getMessage());
        }
    }
}
