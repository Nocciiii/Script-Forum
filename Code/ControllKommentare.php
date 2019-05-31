<?php
  function ErmitelungDesKommentars()
  {
    if(isset($_GET['post'])) //Checks if "book" is in the URL parameters
    {
      $selectedKommentar = $_GET['post'];

      foreach($pdo->query('SELECT * FROM post WHERE PostID = '$selectedKommentar) as $row)
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
            AND kp.PostID = '$selectedKommentar)
        {
          $kommentar= new Kommentar();
          $kommentar->setId($row[0]);
          $kommentar->setText($row[1]);
          $kommentar->setVeroeffentlichung($row[0]);
          $kommentar_array[]=$kommentar;
          $post->setKommentaranzahl($post->getKommentaranzahl()+1);
        }
      //todo abgleichen der Datenbank mit dem Post
      //todo ausgeben des Posts mit Kommentaren auf der neuen Seite
    }
  }
?>
