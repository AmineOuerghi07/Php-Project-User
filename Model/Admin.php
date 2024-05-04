<?php

class Admin
{
    private string $userName;
    private string $pwd;
    function __construct($userName,$pwd)
    {
        $this->userName = $userName;
        $this->pwd = $pwd;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function getPassword()
    {
        return $this->pwd;
    }
}

?>