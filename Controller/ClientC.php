<?php

use PHPMailer\PHPMailer\PHPMailer;

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
            $sql = $db->prepare('UPDATE `client` SET nom = :nom, prenom = :prenom, tel = :tel, address = :address, password = :password, email = :email where idClient = :idClient');
            $sql->execute([
                'nom' => $client->getNom(),
                'prenom' => $client->getPrenom(),
                'tel' => $client->getTel(),
                'address' => $client->getAddress(),
                'password' => $client->getPwd(),
                'email' => $client->getEmail(),
                'idClient' => $id
            ]);
            //echo $sql->rowCount() . " records UPDATED successfully";
        }catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function updateClientPassword($id, $pass)
    {
        $db = config::getConnexion();
        try
        {
            $sql = $db->prepare('UPDATE `client` SET password = :password where idClient = :idClient');
            $sql->execute([
                'password' => $pass,
                'idClient' => $id
            ]);
            //echo $sql->rowCount() . " records UPDATED successfully";
        }catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function confirmAccount($id)
    {
        $db = config::getConnexion();
        try
        {
            $sql = $db->prepare('UPDATE `client` SET confirme = 1 where idClient = :idClient');
            $sql->execute([
                'idClient' => $id
            ]);
            //echo $sql->rowCount() . " records UPDATED successfully";
        }catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function deleteReset($id)
    {
        $db = config::getConnexion();
        try
        {
            $sql = $db->prepare("DELETE FROM reset_password where idReset = :idReset");
            $sql->execute([
            'idReset' => $id
        ]);
        }catch(PDOException $e)
        {
            $e->getMessage();
        }
    }

    public function getClientById($id)
    {
        $db = config::getConnexion();
        try {
            $sql = $db->prepare("SELECT * FROM `client` WHERE idClient = ?");
            $sql->execute([$id]);
            return $sql->fetch();
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


    public function getResetById($id)
    {
        $db = config::getConnexion();
        try {
            $sql = $db->prepare("SELECT * FROM `reset_password` WHERE idClient = ?");
            $sql->execute([$id]);
            return $sql->fetch();
        } catch(Exception $e){
            die("Error: ". $e->getMessage());
        }

    }


    public function addReset($idClient, $expire)
    {
        $db = config::getConnexion();
        try
        {
            $sql = $db->prepare("INSERT INTO reset_password (idReset, idClient, expire)
                    VALUES(:idReset, :idClient, :expire)");
        
            $sql->execute([
                'idReset' => ':idReset',
                'idClient' => $idClient,
                'expire' => $expire
            ]);
        }
        catch(PDOException $e) {
            $e->getMessage();
        }
    }




    
    public function getClientByBloque($bloque)
    {
        $sql = "SELECT * FROM client where bloque = $bloque";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch(Exception $e){
            die("Error: ". $e->getMessage());
        }

    }

    public function clientBlockUnblock($id, $bloque)
    {
        $db = config::getConnexion();
        try
        {
            $sql = $db->prepare('UPDATE client SET bloque = :bloque where idClient = :idClient');
            $sql->execute([
                'bloque' => $bloque,
                'idClient' => $id
            ]);
            //echo $sql->rowCount() . " records UPDATED successfully";
        }catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function listClientsOrder($champ, $order, $bloque)
    {
        
        $db = config::getConnexion();
        $sql = "SELECT * FROM client where bloque = $bloque order by $champ $order";
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch(Exception $e){
            die("Error: ". $e->getMessage());
        }
    }

    public function sendEmail($cemail,$sub,$bod)
    {
    
        
        
            $name = "Top Gear";  // Name of your website or yours
            $to = $cemail;  // mail of reciever
            $subject = $sub;
            $body = $bod;
            $from = "tgear2023@gmail.com";  // you mail
            $password = "ivaebkwsahnsdhsf";  // your mail password
    
            // Ignore from here
    
            require_once "PHPMailer/PHPMailer.php";
            require_once "PHPMailer/SMTP.php";
            require_once "PHPMailer/Exception.php";
            $mail = new PHPMailer();
    
            // To Here
    
            //SMTP Settings
            $mail->isSMTP();
            // $mail->SMTPDebug = 3;  Keep It commented this is used for debugging                          
            $mail->Host = "smtp.gmail.com"; // smtp address of your email
            $mail->SMTPAuth = true;
            $mail->Username = $from;
            $mail->Password = $password;
            $mail->Port = 587;  // port
            $mail->SMTPSecure = "tls";  // tls or ssl
            $mail->smtpConnect([
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
                ]
            ]);
    
            //Email Settings
            $mail->isHTML(true);
            $mail->setFrom($from, $name);
            $mail->addAddress($to); // enter email address whom you want to send
            $mail->Subject = ("$subject");
            $mail->Body = $body;
            if ($mail->send()) {
              echo '<script> var msg = new SpeechSynthesisUtterance();
              msg.text = "un mail a été envoyé avec succès";
              window.speechSynthesis.speak(msg);alert("un mail a été envoyé avec succès!")</script>' ;
            } else {
                echo "Something is wrong: <br><br>" . $mail->ErrorInfo;
            }
        }
    
            // sendmail();  // call this function when you want to
}





?>