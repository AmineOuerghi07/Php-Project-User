<?php 

include "../Controller/ClientC.php";

$id = $_GET['idClient'];

$clientC = new ClientC();

$clientC->deleteClient($id);

Header("Location: Table Client.php");

?>