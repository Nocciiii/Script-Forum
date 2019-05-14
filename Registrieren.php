<html>
	<?php
		session_start();

		$server  ='mysql:dbname=fi2017_gruppe1_projekt_adelmann_kuemmert_schmidt;
		host=localhost';
		$user='fi11';
		$pdo = new PDO ($server, $user,'');

		if(isset($_GET["registrieren"]))
		{
			$error = false;
			$email = $_POST['email'];
			$benutzername = $_POST['benutzer'];
			$passwort = $_POST['passwort'];

			if(!filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				$error = "Bitte eine gültige E-Mail-Adresse eingeben";
			}
			if(strlen($passwort) == 0)
			{
				$error = "Bitte ein Passwort angeben";
			}

			if(!$error)
			{
			$statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
			$result = $statement->execute(array('email' => $email));
			$user = $statement->fetch();
				if($user !== false)
				{
					$error = "Diese E-Mail-Adresse ist bereits vergeben";
				}
			}

			if(!$error)
			{
				$passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);
				$admin = 0;
				$statement = $pdo->prepare("INSERT INTO Nutzer (Nutzername, Passwort, Email) VALUES (:benutzer, :passwort, :email)");
				$result = $statement->execute(array('benutzer' =>$benutzername, 'passwort' => $passwort_hash, 'email' => $email));

				if($result) {
					$_SESSION['email'] = $email;
					$_SESSION['passwort'] = $passwort;
					$_SESSION['benutzername'] = $benutzername;
					$_SESSION['admin'] = 0;
					$showFormular = false;
					//die(header ("LOCATION: Startseite.php"));
				} else {
					echo 'Beim Registrieren gab es einen Fehler';
				}
			}
		}
	?>
	<head>
		<title>Registrieren</title>
	</head>
	<main>
		<form action="?registrieren=1" method="post">
			<div class="registerfeld">
				Email: <input type="email" name="email" size="35" value=""> <br>
				Benutzername: <input type="text" name="benutzer" size="35" value=""> <br>
				Passwort: <input type="password" name="passwort" size="35" value=""> <br><br>
				<input type="submit" name="registrierung" value="Registrieren"> <br>
				<?php
					if(isset($error))
					{
						echo $error;
					}
				?>
			</div>
		</form>
	</main>
</html>
