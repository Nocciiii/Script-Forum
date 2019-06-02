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
	
	catch(Exception $e)
	{
	   die("Errpr!:".$e->getMessage());
	}

	if(isset($_GET['logout']))
	{
	  session_destroy();
	  header("Refresh:0; url=Startseite.php");
	}
  }


  //Senden der Posts in forgegebener form an index zur ausgabe
  function Textausgeben()
  {
    foreach ($post_array as $key => $post)
    {
      $("#post").detach();
    }

    foreach ($post_array as $key => $post)
    {
<<<<<<< HEAD
      var ueberschrift = "<a href='http://172.16.5.55/bsz/fi11_1/ ?post=".$komentar.getId()."'> //Todo passender link einfügen
                          <div class='col-md-12' id="komentar">
                          <h1>" $komentar.getUeberschrift()"</h1>"
      var inhalt = $kommentar.getInhalt()"</div></a>"
=======
      var ueberschrift = "<a href='http://172.16.5.55/bsz/fi11_1/ ?post=".$post."'> //Todo passender link einfügen
                          <div class='col-md-12' id="post">
                          <h1>" $post.getUeberschrift()"</h1>"
      var inhalt = $post.getInhalt()"</div></a>"
>>>>>>> ad7958cf43a342760ac2f6d057789ed9b0cd1e52

      $("#table").append(ueberschrift, inhalt);
    }
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
