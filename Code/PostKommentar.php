<html >
    <head>
  		<meta charset="utf-8">
  		<title>Navigation Beispiel 1</title>
  		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
          <link rel="stylesheet" href="../css/bootstrap.min.css" />
          <link rel="stylesheet" href="tutorial.css" />
  		<script src="../js/jquery-3.1.1.min.js"></script>
  		<script src="../js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <?php include ("ControllKommentare.php"); ?>
      <?php include ("PostDeleteAdmin.php"); ?>

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



 <body id="span">
   <?php
   while(true)
   {
         ErmitelungDesKommentars();
         sleep(5);
   }
   ?>

      <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="navbar-header">
          <img src="../Bilder/logo.png"></img>
          <span class="navbarText">Nero's Burning Paradise</span>
          <br class="d-md-none">
          <button class="navbar-toggler navbar-left" type="button" data-toggle="collapse" data-target="#navbarText" >
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav ml-auto">
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
          <button class="btn d-md-none" data-toggle="collapse" data-target="#multiCollapseExample1" aria-expanded="false">
            <i class="fa fa-bars"></i>
          </button>
          <div class="row show" id="multiCollapseExample1">
            <h3>Eigene Posts</h3>
          </div>
        </div>

        <div class='col-md-6' id="table">
          <span id="tabelle"></span>
        </div>

        <div class="col-md-3">
          <button class="btn d-md-none" data-toggle="collapse" data-target="#Collapsright" aria-expanded="false" aria-controls="collapseOne">
            <i class="fa fa-bars"></i>
          </button>
          <div class="row show" id="Collapsright">
            <h3>Top Posts</h3>
            <span id="topPosts"></span>
          </div>
        </div>

      </div>
    </div>

    <footer class="page-footer">
      HTML, CSS & JS: Florian Schmidt / PHP: Jamie Kümmert & Timo Adelman
      <br class="d-md-none">
      <a class="float-sm-left float-md-right" href="impresum.html">impresum</a>
      <a class="float-sm-left float-md-right" href="datenschutz.html">datenschutz</a>
    </footer>
   <script src="../js/ControllStrart.js"></script>
</body>
</html>
