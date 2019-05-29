<?php
  function ErmitelungDesKommentars()
  {
    if(isset($_GET['post'])) //Checks if "book" is in the URL parameters
    {
      //$selectedKommentar ist die ID des ausgewählten posts
      $selectedKommentar = $_GET['post'];

      //todo abgleichen der Datenbank mit dem Post
      //todo ausgeben des Posts mit Kommentaren auf der neuen Seite
    }
  }
?>
