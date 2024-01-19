<?php

class Login{
    private string $username;
    private string $password;

    public function __construct ($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }

    public function getUsername (): string {
        return $this->username;
    }

    public function getPassword (): string {
        return $this->password;
    }

}