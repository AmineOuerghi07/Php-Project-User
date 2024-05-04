<?php


include "../Controller/ClientC.php";

$clientC = new ClientC();

$client = $clientC->getClient($_POST['idClient']);
$client = $client->fetch();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Inscription</title>
</head>
<body>
	<form name="f" action="update.php" method="POST">
		<input type="hidden" name="idClient" value ="<?php echo $_POST['idClient']; ?>">
        <table>
			<tr>
				<td>
					<label for="prenom">First Name:</label>
				</td>
				<td>
					<input type="text" name="Fname" value = "<?php echo $client['firstName'] ?>" required>
				</td>
				<td>
					<div id="NameErr"></div>
				</td>
			</tr>
			<tr>
				<td>
					<label for="nom">Last Name:</label>
				</td>
				<td>
					<input type="text" name="Lname" value = "<?php echo $client['lastName'] ?>" required>
				</td>
				<td>
					<div id="PreErr"></div>
				</td>
			</tr>
            
			<tr>
				<td>
					<label for="adress">Adress:</label>
				</td>
				<td>
					<textarea name="Adress"><?php echo $client['address'] ?></textarea>
				</td>
			</tr>
			<tr>
				<td>
					<label for="Dtn">Date de naissance:</label>
				</td>
				<td>
					<input type="date" name="dtn" value = "<?php echo $client['dob'] ?>">
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" id="Sub" value="Submit">
				</td>
				<td>
					<input type="reset" value="Reset">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>