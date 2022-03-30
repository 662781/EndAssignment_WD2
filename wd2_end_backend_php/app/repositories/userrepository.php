<?php

namespace Repositories;

use PDO;
use PDOException;
use Repositories\Repository;

class UserRepository extends Repository
{
    function checkUsernamePassword($username, $password)
    {
        try {
            //Get the user with the given username from the DB
            $user = $this->getByUsername($username);

            //Verify the given password by comparing it to the hash in the DB
            $result = $this->verifyPassword($password, $user->password);

            if (!$result)
                return false;

            //Empty the password variable for the caller
            $user->password = "";

            return $user;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    //Hash the password with BCRYPT
    function hashPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    //Verify the password hash
    function verifyPassword($input, $hash)
    {
        return password_verify($input, $hash);
    }

    function getByUsername($username)
    {
        try {
            $stmt = $this->connection->prepare("SELECT id, username, email, `password`, created_at FROM user WHERE username = ?");
            $stmt->execute([$username]);
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\User');
            $user = $stmt->fetch();
            return $user;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getById($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT id, username, email, `password`, created_at FROM user WHERE id = ?");
            $stmt->execute([$id]);
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\User');
            $user = $stmt->fetch();
            return $user;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function insert($user)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO user (username, email, `password`, created_at) VALUES (?,?,?, NOW())");

            $stmt->execute([$user->getUsername(), $user->getEmail(), $this->hashPassword($user->getPassword())]);
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
