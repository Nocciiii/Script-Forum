<html >
    <head>
  		<meta charset="utf-8">
  		<title>Navigation Beispiel 1</title>
  		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
          <link rel="stylesheet" href="../css/bootstrap.min.css" />
          <link rel="stylesheet" href="tutorial.css" />
  		<script src="../js/jquery-3.1.1.min.js"></script>
  		<script src="../js/bootstrap.min.js"></script>

  </head>

  <div id="ModalRegister" class="modal w-100">
  <!-- Modal content -->
    <div class="modal-content w-100">
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
<div id="ModalLogin" class="modal w-100">

  <!-- Modal content -->
  <div class="modal-content w-100">
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
<div id="ModelPost" class="modal w-100">

<!-- Modal content -->
<div class="modal-content w-100">
  <div class="modal-header">
        <h2>Post</h2>
  </div>
  <div class="modal-body">
    <form action="?erstellePost=1" method="post">
      <div class="form-group">
          <label>Ueberschrift</label>
          <input type="text" name="ueberschrift" class="form-control">
      </div>
      <div class="form-group">
          <label>Inhalt</label>
          <input type="text" name="inhalt" class="form-control">
      </div>
	  <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Post">
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

 <body id="span" onload="DatenbankAuslesen()">


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
        				<?php
        					if(!isset($_SESSION['benutzername']))
        					{
        						?>
        							<input type="button" id="btnLogin" value="Login" class="login"/>
        							<input type="button" id="btnRegister" value="Registrieren" class="login"/>
        						<?php
        					}
        					else
        					{
        						?>
        								<form action="?logout=1" method="post">
                          <input type="button" id="btnPost" value="Post erstellen" class="login float-md-left"/>
            							<span>Sie sind angemeldet als <?= $_SESSION['admin'];?></span>
            							<input type="submit" value="Logout" class="login"/>
        								</form>
        						<?php
        					}
        				?>


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

        <div class="col-md-3 d-md-block">
          <button class="btn d-md-none" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2"></button>
          <div class="row multi-collapse show" id="multiCollapseExample1">
            <div class='col-md-12' id="komentar">
              <h5>" $post.getUeberschrift()"</h5>";
              <h5>" $post.getUeberschrift()"</h5>";
            </div>
          </div>
          <div class="row multi-collapse show" id="multiCollapseExample2">
            <div class='col-md-12' id="komentar">
              <h5>" $post.getUeberschrift()"</h5>";
              <h5>" $post.getUeberschrift()"</h5>";
            </div>
          </div>
        </div>

        <div class='col-md-6' id="table">
          <a href='http://172.16.5.55/bsz/fi11_1/?post='>
            <div class='col-md-12' id="komentar">
              <div style="height:auto;">
                <h5>
                  "$post.getUeberschrift()"
                </h5>
                "$post.getInhalt()"
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                hallo
              </div>
              <div style="height: auto; bottom: 0;">
                <form action="postDelete($_SESSION['userid'], $post.getUeberschrift(), $post.getInhalt())">
                  <input type="submit" class="delet" value="Posten Deleten"></input>
                </form>
                <form action="ControllKommentare.php" method="post">
                  <input class="eingabein"  type="text" name="inhalt"></input>
                  <input class="eingabebu" type="submit" value="Posten"></input>
                </form>
              </div>
            </div>
          </a>
          <a href='http://172.16.5.55/bsz/fi11_1/?post='>
            <div class='col-md-12' id="komentar">
              <div style="height:auto;">
                <h5>
                  "$post.getUeberschrift()"
                </h5>
                "$post.getInhalt()"
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                hallo
              </div>
              <div style="height: auto; bottom: 0;">
                <form action="postDelete($_SESSION['userid'], $post.getUeberschrift(), $post.getInhalt())">
                  <input type="submit" class="delet" value="Posten Deleten"></input>
                </form>
                <form action="ControllKommentare.php" method="post">
                  <input class="eingabein"  type="text" name="inhalt"></input>
                  <input class="eingabebu" type="submit" value="Posten"></input>
                </form>
              </div>
            </div>
          </a>
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
        HTML, CSS & JS: Florian Schmidt / PHP: Jamie Kümmert & Timo Adelman
        <br class="d-md-none">
        <a class="float-sm-left float-md-right" href="impresum.html">impresum</a>
        <a class="float-sm-left float-md-right" href="datenschutz.html">datenschutz</a>
      </footer>
   <script src="ControllStrart.js"></script>
</body>
</html>

<script>
async function DatenbankAuslesen()
{
	while(true)
	{
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function()
		{
			if(this.readyState == 4 && this.status == 200)
			{
				document.getElementById("tabelle").innerHTML = this.responseText;
			}
		}
		xmlhttp.open("GET","Startseite_Datenbankauslesen.php",true);
		xmlhttp.send();
		await Sleep(1000);
	}
}
function Sleep(millisconds)
{
	return new Promise(resolve => setTimeout(resolve, millisconds));
}
</script>
