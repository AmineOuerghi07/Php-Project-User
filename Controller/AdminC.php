<?php

include "../config.php";
include "../Model/Admin.php";


class AdminC
{
    public function getAdmin($admin)
    {
        
        $db = config::getConnexion();
        $sql = $db->prepare("SELECT * FROM `admin` where (userName = ? and password = ?)");
        try {
            $sql->execute([$admin->getUserName(),$admin->getPassword()]);
            return $sql->fetch();
        } catch(Exception $e){
            die("Error: ". $e->getMessage());
        }
    }

}


?>