<?php
	if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
  include("klassen.php");

  $server  ='mysql:dbname=fi2017_gruppe1_projekt_adelmann_kuemmert_schmidt;
  host=localhost';
  $user='root';
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


  //Senden der Posts in forgegebener form an index zur ausgabe
  function Textausgeben()
  {
    foreach ($post_array as $key => $post)
    {
	?>
	 <script>
      $("#komentar").detach();
	 </script>
	 <?php
    }

    foreach ($post_array as $key => $post)
    {
      if($_SESSION['Admin'] == true)
      {
		?>
		<script>
        //auslesen der Überschrift des Posts sowie zuwiesung einer Post funktion als Link um die Kommentare zur seite anzuzeigen
        var ueberschrift = "<a href='http://172.16.5.55/bsz/fi11_1/ ?post=".$post.getId()."'>
          //Todo passender link einfügen!!!!!!!!!!!!!!!!!!!!!!
                            <div class='col-md-12' id="komentar">
                            <h1>" $post.getUeberschrift()"</h1>";
        //auslesen des inhalts eines Posts
        var inhalt = $post.getInhalt()"</div></a>";
        var button = "<form action="postDelete($_SESSION['userid'], $post.getUeberschrift(), $post.getInhalt())">"
                        "<input type="submit" value="Posten Deleten"></input>"
                      "</form>";

        $("#table").append(ueberschrift, inhalt, button);
		</script>
		<?php
      }
      else
      {
		?>
		<script>
        //auslesen der Überschrift des Posts sowie zuwiesung einer Post funktion als Link um die Kommentare zur seite anzuzeigen
        var ueberschrift = "<a href='http://172.16.5.55/bsz/fi11_1/ ?post=".$post.getId()."'>
          //Todo passender link einfügen!!!!!!!!!!!!!!!!!!!!!!
                            <div class='col-md-12' id="komentar">
                            <h1>" $post.getUeberschrift()"</h1>";
        //auslesen des inhalts eines Posts
        var inhalt = $post.getInhalt()"</div></a>";

        $("#table").append(ueberschrift, inhalt);
		</script>
		<?php
      }
		?>
		<script>
//toDo Posts gewünscht sotieren
      var uebershriftr = "<div class="col col-md-12">"$post.getUeberschrift()"</div>"

//toDo selbes wie obendrüber
      var uebershriftl = "<div class="col col-md-12">"$post.getUeberschrift()"</div>"

      //Ausgabe der Überschrift und des Inhalts auf der Seite
      $("#multiCollapseExample1").append(ueberschriftr);
      $("#multiCollapseExample2").append(ueberschriftr);
      $("#Collapsright").append(ueberschriftl);
	  </script>
	  <?php
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
