<?php

class Client
{

    private string $nom;
    private string $prenom;
    private string $tel;
    private string $address;
    private string $pwd;
    private string $email;


    function __construct($nom,$prenom,$tel,$address,$pwd,$email)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->tel = $tel;
        $this->address = $address;
        $this->pwd = $pwd;
        $this->email = $email;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getTel()
    {
        return $this->tel;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getPwd()
    {
        return $this->pwd;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    public function setPrenom($pre)
    {
        $this->prenom = $pre;
        return $this;
    }

    public function setTel($tel)
    {
        $this->tel = $tel;
        return $this;
    }

    public function setAddress($ad)
    {
        $this->address = $ad;
        return $this;
    }

    public function setPwd($pwd)
    {
        $this->pwd = $pwd;
        return $this;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
}


?>