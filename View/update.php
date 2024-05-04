<?php

include "../Controller/ClientC.php";
$fname=$_POST["Fname"];
$lname=$_POST["Lname"];
$adress=$_POST["Adress"];
$dtn=$_POST["dtn"];
$id = $_POST['idClient'];

if((!isset($fname) || empty($fname))
    || (!isset($lname) || empty($lname))
    || (!isset($adress) || empty($adress))
    || (!isset($dtn) || empty($dtn)))
    {
        echo("FILL ALL THE FIELDS !!!");
    }
    else
    {
        $client = new Client($fname,$lname,$adress,$dtn);
        $clientC = new ClientC();
        $clientC->updateClient($id,$client);
        Header('Location: listeClient.php');
        exit();
    }

?>