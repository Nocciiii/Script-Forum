<?php
	if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
	}
//Auslesen
	$server  ='mysql:dbname=fi2017_gruppe1_projekt_adelmann_kuemmert_schmidt;
	host=localhost';
	$user='fi11';
	$options =array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
	include("klassen.php");
	
	$post_array = array();
	try
	{ 
	  $pdo = new PDO ($server, $user,'',$options);
	  foreach($pdo->query('SELECT * from post') as $row)
	  {
	    $post = new Post();
		$post->setId($row[0]);
	    $post->setUeberschrift($row[1]);
	    $post->setInhalt($row[2]);
	    $post->setVeroeffentlichung($row[3]);
		$post->setVeroeffentlichung(date_create_from_format('Y-m-d H:i:s',$post->getVeroeffentlichung()));
	    $kommentar_array=array();
	    $post->setKommentaranzahl(0);
	    foreach($pdo->query('SELECT *
	        FROM kommentar k
	        JOIN post_kommentar pk
	        ON k.ID =pk.KommentarID
	        AND pk.PostID='.$post->getId()) as $row2)
	    {
	      $kommentar = new Kommentar();
	      $kommentar->setId($row2[0]);
	      $kommentar->setText($row2[1]);
	      $kommentar->setVeroeffentlichung($row2[2]);
	      $kommentar_array[]=$kommentar;
	      $post->setKommentaranzahl($post->getKommentaranzahl()+1);
	    }
	    $post->setKommentare($kommentar_array);
	    $post_array[]=$post;
	  }
	    usort($post_array, "cmp");
	}
	catch(Exception $e)
	{
	   die("Errpr!:".$e->getMessage());
	}
	
	
  echo "<tr>";

  //Senden der Posts in forgegebener form an index zur ausgabe
    foreach ($post_array as $key => $post)
    {
		echo "<td>";

		//auslesen der Überschrift des Posts sowie zuwiesung einer Post funktion als Link um die Kommentare zur seite anzuzeigen
		echo "<a href='http://172.16.5.55/bsz/fi11_1/ ?post=";
		echo $post.getId();
		echo "'> <div class='col-md-12' id='komentar'> <h1>'";
		echo $post.getUeberschrift();
		echo "'</h1>";
		echo "</td>";
    }
	
	echo "</tr>";
  

  function cmp($kommentare1, $kommentare2)
  {
  	if($kommentare1<$kommentare2)
  	{
		return 1;
	}
	else
	{
		if($kommentare1>$kommentare2)
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
