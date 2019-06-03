<?php
function posten($nutzerID, $Ueberschrift, $Text)
{
	$server  ='mysql:dbname=fi2017_gruppe1_projekt_adelmann_kuemmert_schmidt;
	host=localhost';
	$user='fi11';
	$options =array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
	$pdo = new PDO ($server, $user,'',$options);
	
	$date=new DateTime;
	$Veroeffentlichung = $date->format('Y-m-d H:i:s');
	
	$pdo->query("INSERT INTO
        post
        (Ueberschrift,Inhalt,Veroeffentlichung)
        VALUES
        (
          '.$Ueberschrift',
          '.$Text',
          '.$Veroeffentlichung'
        )"
      );
      $pdo->query("INSERT INTO
        nutzer_post
        (NutzerID, PostID)
        VALUES
        (
          '$nutzerID',
          (SELECT p.ID
           FROM Post p
           WHERE p.Inhalt ='.$Text'
           AND p.Ueberschrift = '.$Ueberschrift'
          )
        )"
      );
}
function kommentarPosten($nutzerID, $Text, $postID)
{
	$server  ='mysql:dbname=fi2017_gruppe1_projekt_adelmann_kuemmert_schmidt;
	host=localhost';
	$user='fi11';
	$options =array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
	$pdo = new PDO ($server, $user,'',$options);
	
	$Veroeffentlichung=new DateTime;
	$pdo->query("INSERT INTO
        kommentar
        (Inhalt,Veroeffentlichung)
        VALUES
        (
          '.$Text',
          '.$Veroeffentlichung'
        )"
      );
      $pdo->query("INSERT INTO
        nutzer_kommentar
        (NutzerID, KommentarID)
        VALUES
        (
          '$nutzerID',
          (SELECT k.ID
           FROM Kommentar k
           WHERE k.Inhalt ='.$Text'
           AND k.Veroeffentlichung='.$Veroeffentlichung'
          )
        )"
      );
      $pdo->query("INSERT INTO
        post_kommentar
        (PostID, KommentarID)
        VALUES
        (
          '$postID',
          (SELECT k.ID
           FROM Kommentar k
           WHERE k.Inhalt ='.$Text'
           AND k.Veroeffentlichung='.$Veroeffentlichung'
          )
        )"
      );
}


?>