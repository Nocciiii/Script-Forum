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
	  $anime->setId($row[0]);
      $anime->setUeberschrift($row[1]);

      $post_array[]=$post;
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
?>