<?php
namespace Models;

class User {

    //Fields
    public int $id;
    public string $username;
    public string $email;
    public string $password;
    public string $created_at;

    //Getters
    public function getId(): int
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    //Setters
    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function setPassword(string $password): self
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        // $this->password = $password;

        return $this;
    }
  
}

?>