<?php


include "../config.php";
include "../Model/Client.php";

class ClientC
{
    
    public function listClients()
    {
        $sql = "SELECT * FROM client";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch(Exception $e){
            die("Error: ". $e->getMessage());
        }
    }

    public function addClient($client)
    {
        $db = config::getConnexion();
        try
        {
            $sql = $db->prepare("INSERT INTO client (idClient,nom,prenom,tel,address,password,email)
                    VALUES(:idClient,:nom,:prenom,:tel,:address,:password,:email)");
        
            $sql->execute([
                'idClient' => ':idClient',
                'nom' => $client->getNom(),
                'prenom' => $client->getPrenom(),
                'tel' => $client->getTel(),
                'address' => $client->getAddress(),
                'password' => $client->getPwd(),
                'email' => $client->getEmail()
            ]);
        }
        catch(PDOException $e) {
            $e->getMessage();
        }
    }

    public function deleteClient($id)
    {
        $db = config::getConnexion();
        try
        {
            $sql = $db->prepare("DELETE FROM client where idClient = :idClient");
            $sql->execute([
            'idClient' => $id
        ]);
        }catch(PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function updateClient($id, $client)
    {
        $db = config::getConnexion();
        try
        {
            $sql = $db->prepare('UPDATE client SET nom = :nom, prenom = :prenom, tel = :tel, address = :address, password = :password, email = :email where idClient = :idClient');
            $sql->execute([
                'nom' => $client->getNom(),
                'prenom' => $client->getPrenom(),
                'tel' => $client->getTel(),
                'address' => $client->getAddress(),
                'pwd' => $client->getPwd(),
                'email' => $client->getEmail(),
                'idClient' => $id
            ]);
            //echo $sql->rowCount() . " records UPDATED successfully";
        }catch (PDOException $e)
        {
            $e->getMessage();
        }
    }


    public function getClientById($id)
    {
        $sql = "SELECT * FROM client where idClient = $id";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch(Exception $e){
            die("Error: ". $e->getMessage());
        }

    }
    
    public function getClientByEmail($email)
    {
        $db = config::getConnexion();
        try {
            $sql = $db->prepare("SELECT * FROM `client` WHERE email = ?");
            $sql->execute([$email]);
            return $sql->fetch();
        } catch(Exception $e){
            die("Error: ". $e->getMessage());
        }

    }

    public function getClientByEmailPwd($email,$pwd)
    {
        $db = config::getConnexion();
        try {
            $sql = $db->prepare("SELECT * FROM `client` WHERE (email = ? and password = ?)");
            $sql->execute([$email,$pwd]);
            return $sql->fetch();
        } catch(Exception $e){
            die("Error: ". $e->getMessage());
        }

    }
}




?>