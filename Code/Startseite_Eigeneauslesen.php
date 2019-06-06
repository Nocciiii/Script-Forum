<?php
	if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
	}
//Auslesen
	$server  ='mysql:dbname=fi2017_gruppe1_projekt_adelmann_kuemmert_schmidt;
	host=localhost';
	$user='root';
	$options =array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
	include("klassen.php");

	$post_array = array();
	try
	{
	  $pdo = new PDO ($server, $user,'',$options);
	  foreach($pdo->query('SELECT * from post p JOIN nutzer_Post np ON np.NutzerID="'.$_SESSION['userid'].'" AND np.PostID=p.ID') as $row)
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
	}
	catch(Exception $e)
	{
	   die("Errpr!:".$e->getMessage());
	}



//auslesen der Ãberschrift des Posts sowie zuwiesung einer Post funktion als Link um die Kommentare zur seite anzuzeigen
		echo "<div class='col-md-12' id='komentar'><h3>Top Posts</h3>";
		
  //Senden der Posts in forgegebener form an index zur ausgabe
    foreach ($post_array as $key => $post)
    {
		echo "<a href='http://172.16.5.55/bsz/fi11_1/Projekte2/K%C3%BCmmert_Adelmann_Schmidt/Code/PostKommentar.php?post=".$post->getId()."'>";
		echo "<h4>".$post->getUeberschrift()."</h4></a>";
    }
echo "</div>";
?>