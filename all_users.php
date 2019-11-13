<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>All user</title>
</head>
<body>

	<form action="" method="POST">
		<input type="name" name="lettre" placeholder="entrez une lettre">
		<select name="status">
			<option value="2">Active account</option>
			<option value="1">Waiting for account validation</option>
		</select>

		<input type="submit" name="send" value="OK">
	</form>

	<h1>All users</h1>

	<?php

		$host = 'localhost';	// le serveur ou la bd est stocké
		$db   = 'my_activities';	// la bd
		$user = 'root';		// car on est en local
		$pass = 'root';		// car on est en local
		$charset = 'utf8';	// encodage

		/* Le PDO */
		$dsn = "mysql:host=". $host .";dbname=" . $db . ";charset=" . $charset;

		$options = [
    		PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    		PDO::ATTR_EMULATE_PREPARES   => false,
		];

		try {
			/* on crée l'accès a la bd */
			$pdo = new PDO($dsn, $user, $pass, $options);
		} catch (PDOException $e) {
			throw new PDOException($e->getMessage(), (int)$e->getCode());
		}

		/* On affiche le tableau */
		echo "<table>";
		echo "<tr>";
		echo "<td><strong>Id</strong></td>";
		echo "<td><strong>Username</strong></td>";
		echo "<td><strong>Email</strong></td>";
		echo "<td><strong>Status</strong></td>";
		echo "</tr>";

		if (isset($_POST['send'])) {
			$nom = $_POST['lettre'];
			$id = $_POST['status'];

			$stmt = $pdo -> query("SELECT * FROM status
								   JOIN users
								   ON  users.status_id = status.id
								   WHERE status_id='$id' AND username LIKE'$nom%' ");

			while ($row =$stmt ->fetch()) {
				echo "<tr>";

				echo "<td>". $row['id'] . "</td>";
				echo "<td>". $row['username'] . "</td>";
				echo "<td>". $row['email'] . "</td>";
				echo "<td>". $row['name'] . "</td>";

				echo "</tr>";
			}
		}
		
		echo "</table>";
	?>
</body>
</html>