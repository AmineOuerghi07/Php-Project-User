<?php

include "../Controller/ClientC.php";

if(isset($_GET['idClient']))
{
    $clientC = new ClientC();
    $clientC->confirmAccount($_GET['idClient']);
    header("location: login.php");
}



?>