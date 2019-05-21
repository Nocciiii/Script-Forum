<?php
function postDelete($nutzerID, $Ueberschrift, $Text)
{
	$pdo->query("DELETE FROM nutzer_post
        WHERE
          nutzerID='$nutzerID',
          AND PostID=
          (SELECT p.ID
           FROM Post p
           WHERE p.Inhalt ='.$text'
           AND p.Ueberschrift = '.$Ueberschrift'
          )"
      );
      
      $pdo->query("DELETE FROM kommentar k
        WHERE
    	JOIN post_kommentar pk
    	ON k.ID=pk.KommentarID
    	AND pk.PostID='.$postID'"
      );
      
      $pdo->query("DELETE FROM post_kommentar
        WHERE
        postID='$postID'"
      );
      
	$pdo->query("DELETE From POST WHERE
          Ueberschrift='.$Ueberschrift'
          AND 
          Text='.$Text'"
      );
      
}
function kommentarDelete($nutzerID, $Text, $postID)
{
	$pdo->query("DELETE FROM nutzer_kommentar
        WHERE
          nutzerID='$nutzerID'
          AND
          kommentarID=(SELECT k.ID
           FROM Kommentar k
           WHERE k.Inhalt ='.$text'
        )"
      );
      
      $pdo->query("DELETE FROM post_kommentar
        WHERE
        postID='$postID'
        AND
    	kommentarID=(SELECT k.ID
        FROM Kommentar k
           WHERE k.Inhalt ='.$text'
           AND k.Veroeffentlichung='.$Veroeffentlichung'
          )"
      );
      
	$pdo->query("DELETE FROM kommentar k
        WHERE
        Text='.$Textt'
        AND
    	JOIN post_kommentar pk
    	ON k.ID=pk.KommentarID
    	AND pk.PostID='.$postID'"
      );
      
      
}
?>