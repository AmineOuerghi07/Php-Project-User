<?php

include "../Controller/ClientC.php";



if((!isset($nom) || empty($nom))
    || (!isset($pre) || empty($pre))
    || (!isset($ad) || empty($ad))
    || (!isset($tel) || empty($tel))
    || (!isset($cpwd) || empty($cpwd))
    || (!isset($pwd) || empty($pwd))
    || ($pwd != $cpwd))
    {
        echo("FILL ALL THE FIELDS OR CHECK YOUR PASSWORD !!!");
    }
    else
    {
        $pwd = md5($pwd);
        $client = new Client($nom,$pre,$tel,$ad,$pwd,$email);
        //var_dump($client);
        $clientC = new ClientC();
        $clientC->addClient($client);
        Header('Location: index.html');
        exit();
    }


?>