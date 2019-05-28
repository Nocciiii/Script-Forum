<?php
 session_start();
  include("klassen.php");

  $server  ='mysql:dbname=fi2017_gruppe1_projekt_adelmann_kuemmert_schmidt ;
  host=localhost';
  $user='fi11';
  $options =array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

  try
  {
    $pdo = new PDO ($server, $user,'',$options);
    global $post_array;
	$post_array=array();
    foreach($pdo->query('SELECT * from post') as $row)
    {
      $post = new Post();
	  $post->setId($row[0]);
      $post->setUeberschrift($row[1]);
      $post->setInhalt($row[2]);
      $post->setVeroeffentlichung($row[3]);
      $kommentar_array=array();
      $post->setKommentaranzahl(0);
      foreach($pdo->query('SELECT *
          FROM kommentar k
          JOIN kommentar_post kp
          ON k.ID = kp.KommentarID
          AND kp.PostID='$row[0])
      {
        $kommentar= new Kommentar();
        $kommentar->setId($row[0]);
        $kommentar->setText($row[1]);
        $kommentar->setVeroeffentlichung($row[0]);
        $kommentar_array[]=$kommentar;
        $post->setKommentaranzahl($post->getKommentaranzahl()+1);
      }
      $post->setKommentare($kommentar_array);
      $post_array[]=$post;
    }
    usort($post_arraym, "cmp");
  }


  //Senden der Posts in forgegebener form an index zur ausgabe
  function Textausgeben
  {
    foreach ($post_array as $key => $kommentar)
    {
      //ToDo ArrayElement pasend ausgeben
      var ueberschrift = "<div class='col-md-12'><h1>" $komentar.getUeberschrift"</h1>"
      var inhalt = $kommentar.getText"</div>"

      $("#table").append(ueberschrift, inhalt);
    }
  }

  catch(Exception $e)
  {
	   die("Errpr!:".$e->getMessage());
  }

  if(isset($_GET['logout']))
  {
	  session_destroy();
	  header("Refresh:0; url=Startseite.php");
  }

  function cmp($time1, $time2)
  {
  	if($time1<$time2)
  	{
		return 1;
	}
	else
	{
		if($time1>$time2)
		{
			return -1;
		}
		else
		{
			return 0;
		}
	}

  }
?>
