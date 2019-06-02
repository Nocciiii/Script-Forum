<html >
    <head>
  		<meta charset="utf-8">
  		<title>Navigation Beispiel 1</title>
  		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
          <link rel="stylesheet" href="../css/bootstrap.min.css" />
          <link rel="stylesheet" href="tutorial.css" />
  		<script src="../js/jquery-3.1.1.min.js"></script>
  		<script src="../js/bootstrap.min.js"></script>
      <?php include ("Startseite_Datenbankauslesen.php"); ?>

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
    			$username = $_POST['username'];
    			$password = $_POST['password'];
    			$statement = $pdo->prepare("SELECT * FROM Nutzer WHERE Nutzername = :username OR Email = :username");
    			$user = $statement->fetch();
    			$hash = $user['Passwort'];
        	//ueberpruefung des Passworts
    			if($user !== false && password_verify($password, $hash))
    			{
    				$_SESSION['userid'] = $user['ID'];
    				$_SESSION['email'] = $user['Email'];
    				$_SESSION['passwort'] = $user['Passwort'];
    				$_SESSION['benutzername'] = $user['Nutzername'];
    				$_SESSION['admin'] = $user['Admin'];
    				$errorMessage = "Login erfolgreich!";
    			}
          else
          {
    					$errorMessage = "E-Mail oder Passwort war ung�ltig<br>";
    			}
    		}

    		if(isset($_GET["registrieren"]))
    		{
    			$error = false;
    			$email = $_POST['email'];
    			$username = $_POST['username'];
    			$password = $_POST['password'];

    			if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    			{
    				$errorMessage = "Bitte eine g�ltige E-Mail-Adresse eingeben";
    			}

    			if(strlen($password) <= 7)
    			{
    				$errorMessage = "Passwort muss 7 zeichen lang sein";
    			}

    			if(!$error)
    			{
      			$statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
      			$result = $statement->execute(array('email' => $email));
      			$user = $statement->fetch();

    				if($user !== false)
    				{
    					$errorMessage = "Diese E-Mail-Adresse ist bereits vergeben";
    				}
    			}
    			if(!$error)
    			{
    				$password_hash = password_hash($password, PASSWORD_DEFAULT);
    				$admin = 0;
    				$statement = $pdo->prepare("INSERT INTO Nutzer (Nutzername, Passwort, Email) VALUES (:username, :password, :email)");
    				$result = $statement->execute(array('username' =>$username, 'password' => $password_hash, 'email' => $email));

    				if($result)
            {
    					$_SESSION['email'] = $email;
    					$_SESSION['passwort'] = $password;
    					$_SESSION['benutzername'] = $username;
    					$_SESSION['admin'] = 0;
    					$showFormular = false;
    					//die(header ("LOCATION: Startseite.php"));
    				}
            else
            {
    					echo 'Beim Registrieren gab es einen Fehler';
    				}
    			}
    		}

        if(isset ($_Get["Post"]))
        {
          $email = $_POST['email'];
    			$username = $_POST['username'];

          posten
        }
    	?>
  </head>

  <div id="ModalRegister" class="modal">
  <!-- Modal content -->
    <div class="modal-content">
  		<div class="modal-header">
  		    <span class="close">&times;</span>
          <h2>Registrieren</h2>
          <p>Bitte melden Sie sich mit ihren Daten an.</p>
  		</div>
  		<div class="modal-body">
        <form action="?registrieren=1" method="post">
          <div class="form-group">
              <label>Username</label>
              <input type="text" name="username" class="form-control">
          </div>
          <div class="form-group">
              <label>E-Mail</label>
              <input type="email" name="email" class="form-control">
          </div>
          <div class="form-group">
              <label>Passwort</label>
              <input type="password" name="password" class="form-control">
          </div>
          <div class="form-group">
              <input type="submit" class="btn btn-primary" value="Registrieren">
          </div>
		      <div class="form-group">
            <?php
    					if(isset($errorMessage))
              {
        					echo $errorMessage;
    					}
  				  ?>
          </div>
  		  </form>
  		</div>
  		<div class="modal-footer">
              <p></p>
  		</div>
    </div>
</div>

<!-- The Modal -->
<div id="ModalLogin" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
		<div class="modal-header">
  		<span class="close2">&times;</span>
          <h2>Login</h2>
          <p>Bitte melden Sie sich mit ihren Daten an.</p>
  	</div>
		<div class="modal-body">
      <form action="?login=1" method="post">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control">
        </div>
        <div class="form-group">
            <label>Passwort</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Login">
        </div>
		  </form>
		</div>
		<div class="modal-footer">
            <p></p>
		</div>
  </div>
</div>

<div id="ModalRegister" class="modal">
<!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
        <span class="close">&times;</span>
        <h2>Registrieren</h2>
        <p>Bitte melden Sie sich mit ihren Daten an.</p>
    </div>
    <div class="modal-body">
      <form action="?registrieren=1" method="post">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control">
        </div>
        <div class="form-group">
            <label>E-Mail</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label>Passwort</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Registrieren">
        </div>
        <div class="form-group">
          <?php
            if(isset($errorMessage))
            {
                echo $errorMessage;
            }
          ?>
        </div>
      </form>
    </div>
    <div class="modal-footer">
            <p></p>
    </div>
  </div>
</div>

<!-- The Modal -->
<div id="ModelPost" class="modal">

<!-- Modal content -->
<div class="modal-content">
  <div class="modal-header">
        <h2>Post</h2>
  </div>
  <div class="modal-body">
    <form action="?Post=1" method="post">
      <div class="form-group">
          <label>Ueberschrift</label>
          <input type="text" name="ueberschrift" class="form-control">
      </div>
      <div class="form-group">
          <label>Inhalt</label>
          <input type="text" name="inhalt" class="form-control">
      </div>
    </form>
  </div>
  <div class="modal-footer">
          <p></p>
  </div>
</div>
</div>

 <body id="span">
   <?php
    DatenbankAuslesen();
   ?>



      <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="navbar-header">
          <span class="navbarText" href="#">M&M</span>
          <button class="navbar-toggler navbar-left" type="button" data-toggle="collapse" data-target="#navbarText" >
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav ml-auto">
            <li>
              	<input type="button" id="btnPost" value="Post werstellen" class="login"/>
            <li>
              <form action="logout.php" method="post">
        				<?php
        					if(!isset($_SESSION['login']))
        					{
        						?>
        							<input type="button" id="btnLogin" value="Login" class="login"/>
        							<input type="button" id="btnRegister" value="Registrieren" class="login"/>
        						<?php
        					}
        					else
        					{
        						?>
        							<span>Sie sind angemeldet als <?= $_SESSION['login']['username'];?></span>
        							<input type="submit" value="Logout" class="login"/>
        						<?php
        					}
        				?>
        			</form>
            </li>
         </ul>
        </div>
      </nav>

      <div id="id01" class="modal">
        <form class="modal-content animate" action="/action_page.php">
          <div class="container" style="width: 90%; margin: auto;">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>
            <br>
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>
            <br>
            <button class="einlogen" type="submit">Login</button>
            <br>
            <label>
              <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
          </div>

          <div class="container" style="background-color:#f1f1f1; width: 90%; margin: auto;">
            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
            <span class="psw">Forgot <a href="#">password?</a></span>
          </div>
        </form>
      </div>


   <div class="container">
      <div class="row">

        <div class="col-md-3">
          <button class="btn d-md-none" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2"></button>
          <div class="row multi-collapse show" id="multiCollapseExample1">
            <div class="col col-md-12">
              col-md-3(Sidbar right top)
            </div>
          </div>
          <div class="row multi-collapse show" id="multiCollapseExample2">
            <div class="col col-md-12">
              col-md-3(Sidbar right botom)
            </div>
          </div>
        </div>

        <div class='col-md-6' id="table">
        </div>

        <div class="col-md-3">
          <button class="btn d-md-none" data-toggle="collapse" data-target="#Collapsright" aria-expanded="false" aria-controls="collapseOne"></button>
          <div class="row show" id="Collapsright">
            <div class="col-md-12 right">
              col-md-3(Sidbar left top)
            </div>
          </div>
        </div>

      </div>
    </div>

      <footer class="page-footer">
            col-md-12(Fu�zeile)
      </footer>
   <script src="../js/ControllStrart.js"></script>
</body>
</html>

<script>
function DatenbankAuslesen()
{
	while(true)
	{
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function()
		{
			if(this.readyState == 4 && this.status == 200)
			{
				Textausgeben();
			}
		};
		xmlhttp.open("GET", "Startseite_Datenbankauslesen.php");
		xmlhttp.send();
		sleep(500);
	}
}

function Sleep(milliseconds) {
   return new Promise(resolve => setTimeout(resolve, milliseconds));
}
</script>
