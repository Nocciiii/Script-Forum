<?php

function posten($nutzerID, $Ueberschrift, $Text)
{
	$Veroeffentlichung=new DateTime;
	$pdo->query("INSERT INTO
        post
        (Ueberschrift,Inhalt,Veroeffentlichung)
        VALUES
        (
          '.$Ueberschrift',
          '.$Textt',
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
           WHERE p.Inhalt ='.$text'
           AND p.Ueberschrift = '.$Ueberschrift'
          )
        )"
      );
}


?>