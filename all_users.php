<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>All user</title>
</head>
<body>
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

		$stmt = $pdo -> query("SELECT * FROM users
							   JOIN status
							   ON  status.id = users.status_id
							   ORDER BY username ASC");

		/* On affiche le tableau */
		echo "<table>";
		while ($row =$stmt ->fetch()) {
			echo "<tr>";

			echo "<td>". $row['username'] . "</td>";
			echo "<td>". $row['email'] . "</td>";
			echo "<td>". $row['name'] . "</td>";

			echo "</tr>";
		}
		echo "</table>";
	?>
</body>
</html>