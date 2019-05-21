<html >
    <head>
  		<meta charset="utf-8">
  		<title>Navigation Beispiel 1</title>
  		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
          <link rel="stylesheet" href="../css/bootstrap.min.css" />
          <link rel="stylesheet" href="layout/tutorial.css" />
  		<script src="../js/jquery-3.1.1.min.js"></script>
  		<script src="../js/bootstrap.min.js"></script>
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
      <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="navbar-header">
          <span class="navbarText" href="#">M&M</span>
          <button class="navbar-toggler navbar-left" type="button" data-toggle="collapse" data-target="#navbarText" >
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav">
             <li class="nav-item">
                 <a class="nav-link" href="#">Startseite</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="#">Über mich</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="#">Kontakt</a>
             </li>
          </ul>
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

        <div class="col-md-6">
            <div class="col-md-12">
              col-md-9(Inhalt)
              </br>
              </br>
              </br>
              </br>
              </br>
              </br>
              </br>
              </br>
              </br>
              </br>
              </br>
              </br>
              </br>
              </br>
              </br>
              </br>
              </br>
              </br>
              </br>
              </br>
              </br>
              </br>
              </br>
              </br>
              </br>
              </br>
              </br>
              </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
          </br>
          </br>
          </br>
          </br>
          </br>
          </br>
          </br>
          </br>
          </br>
          </br>
          </br>
          </br>
          </br>
          </br>
          </br>
        </br>
        </br>
        </br>
        </br>
        </br>
        </br>
        </br>
        </br>
        </br>
        </br>
        </br>
        </br>
        </br>
        </br>
        </br>
      </br>
      </br>
      </br>
      </br>
      </br>
      </br>
      </br>
      </br>
      </br>
      </br>
      </br>
      </br>
      </br>
      </br>
      </br>
            </div>
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

            col-md-12(Fußzeile)

      </footer>
   <script src="../js/ControllStrart.js"></script>
</body>
</html>
