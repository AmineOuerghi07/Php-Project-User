<?php

include "../Controller/ClientC.php";

$clientC = new ClientC();

$list = $clientC->listClients();

$liste = $list->fetchALL();


?>



<!DOCTYPE html>

<head>
    <title>Liste Clients</title>
</head>

<body>

<a href="inscription.php">Ajout Client</a>
<br />

<table border="2">
<tr>
    <td>ID Client</td>
    <td>Nom</td>
    <td>Prenom</td>
    <td>Telephone</td>
    <td>Address</td>
    <td>Delete Client</td>
    <td>Update Client</td>
</tr>
<?php

foreach($liste as $client)
{
    ?>
    <tr>
    <td><?php echo $client["idClient"]?></td>
    <td><?php echo $client["nom"]?></td>
    <td><?php echo $client['prenom']?></td>
    <td><?php echo $client['tel']?></td>
    <td><?php echo $client['address']?></td>
    <td><a href="deleteClient.php?idClient=<?php echo $client["idClient"] ?>">Delete</a></td>
    <td><form method ="POST" action="updateClient.php">
            <input type ="submit" value="Update">
            <input type ="hidden" name="idClient" value="<?php echo $client['idClient']?>">
        </form>
    </td>
    </tr>
<?php 
}
?>




</table>


</body>

</html>