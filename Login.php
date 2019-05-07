<!DOCTYPE html>
<html>
	<?php
		session_start();

		$server  ='mysql:dbname=fi2017_gruppe1_projekt_adelmann_kuemmert_schmidt;
		host=localhost';
		//Wechsel zwischen User wenn daheim lol
		$user='fi11';
		//$user='root';
		$pdo = new PDO ($server, $user,'');

		if(isset($_GET['login']))
		{
			$email = $_POST['email'];
			$passwort = $_POST['passwort'];

			$statement = $pdo->prepare("SELECT * FROM Nutzer WHERE Email = :email");
			$result = $statement->execute(array('email' => $email));
			$user = $statement->fetch();
			$hash = $user['Passwort'];

    	//Überprüfung des Passworts
			if($user !== false && password_verify($passwort, $hash))
			{
				$_SESSION['userid'] = $user['ID'];
				$_SESSION['email'] = $user['Email'];
				$_SESSION['passwort'] = $user['Passwort'];
				$_SESSION['benutzername'] = $user['Nutzername'];
				$_SESSION['admin'] = $user['Admin'];
				$errorMessage = "Login test war erfolgreich UmU";
			} else {
					$errorMessage = "E-Mail oder Passwort war ungültig<br>";
			}
		}
	?>
	<head>
		<title>Login</title>
	</head>
	<main>
		<form action="?login=1" method="post">
			<div class="loginfeld">
				Email: <input type="email" name="email" size="35" value=""> <br>
				Passwort: <input type="password" name="passwort" size="35" value=""> <br><br>
				<input type="submit" name="einloggen" value="Einloggen"><br>
				Noch kein Account? <a href="Registrieren.php">Registrieren</a> <br>

				<?php
					if(isset($errorMessage)) {
    					echo $errorMessage;
					}
				?>
			</div>
		</form>
	</main>
</html>
