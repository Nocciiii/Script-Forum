<?php
include ("PostDeleteAdmin.php");
include ("Posten.php");
include("klassen.php");

	$server  ='mysql:dbname=fi2017_gruppe1_projekt_adelmann_kuemmert_schmidt;
	host=localhost';
	$user='root';
	$options =array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
	$pdo = new PDO ($server, $user,'',$options);
	
	
    $post;
    if(isset($_GET['post'])) //Checks if "Post" is in the URL parameters
    {
      //$selectedKommentar ist die ID des ausgewählten posts
      $selectedKommentar = $_GET['post'];

	$temp = $pdo->query('SELECT * FROM post WHERE ID = '.$selectedKommentar);
		
	echo $selectedKommentar;
		
    foreach($temp as $row)
      {
          $post = new Post();
  	      $post->setId($row[0]);
          $post->setUeberschrift($row[1]);
          $post->setInhalt($row[2]);
          $post->setVeroeffentlichung($row[3]);
          $kommentar_array=array();
          $post->setKommentaranzahl(0);

          foreach($pdo->query('SELECT * FROM kommentar k JOIN post_kommentar kp ON k.ID = kp.KommentarID AND kp.PostID = '.$selectedKommentar) as $row)
          {
             $kommentar = new Kommentar();
             $kommentar->setId($row[0]);
             $kommentar->setText($row[1]);
             $kommentar->setVeroeffentlichung($row[0]);
             $kommentar_array[]=$kommentar;
             $post->setKommentaranzahl($post->getKommentaranzahl()+1);
          }
     }
  }
  function ErmitelungDesKommentars()
  {
    //zuerst wird der Post ansich geechot und anschliesent alle Kommentare für den Post durch die foreach schleife
    echo "<div class='col-md-12'><h1>";
    echo $post->getUeberschrift()."</h1>";
    echo $post->getInhalt();
    echo "<form action='ControllKommentare.php' method='post'>";
    echo  "  <input type='text' name='inhalt'></input>";
    echo  "<input type='submit' value='Posten'></input>";
    echo "</form>";

    foreach ($kommentar_array as $key => $komentar)
    {
      if($_SESSION['Admin'] == true)
      {
        echo $komentar.gettext();
        echo "<form action=kommentarDelete($_SESSION[userid],";
		echo $komentar->getText();
		echo ",".$post.getId()."><input type='subimt' value='Delete'></input></form>)";
      }
      else
      {
        echo $komentar.gettext();
      }

    }
    echo "</div>";
  }

  if(isset ($_Get["Post"]))
  {
    $inhalt = $_POST['inhalt'];

    kommentarPosten($_SESSION['userid'], $inhalt, $Post.getId());
  }
?>
