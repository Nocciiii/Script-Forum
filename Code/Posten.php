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
function kommentarPosten($nutzerID, $Text, $postID)
{
	$Veroeffentlichung=new DateTime;
	$pdo->query("INSERT INTO
        kommentar
        (Inhalt,Veroeffentlichung)
        VALUES
        (
          '.$Textt',
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
           WHERE k.Inhalt ='.$text'
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
           WHERE k.Inhalt ='.$text'
           AND k.Veroeffentlichung='.$Veroeffentlichung'
          )
        )"
      );
}


?>