<?php
	class Bild
	{
  		private $id;
  		private $pfad;

  		public function getId()
  		{
   			return $this->id;
  		}
  		public function setId($id)
  		{
    		$this->id=$id;
  		}
  		public function getPfad()
  		{
   			return $this->pfad;
  		}
  		public function setPfad($pfad)
  		{
    		$this->pfad=$pfad;
  		}
  	}

  	class Kommentar
	{
  		private $id;
  		private $text;
  		private $veroeffentlichung;

  		public function getId()
  		{
   			return $this->id;
  		}
  		public function setId($id)
  		{
    		$this->id=$id;
  		}
  		public function getText()
  		{
   			return $this->text;
  		}
  		public function setText($text)
  		{
    		$this->text=$text;
  		}
  		public function getVeroeffentlichung()
  		{
   			return $this->veroeffentlichung;
  		}
  		public function setVeroeffentlichung($veroeffentlichung)
  		{
    		$this->veroeffentlichung=$veroeffentlichung;
  		}
  	}

  	class Nutzer
	{
  		private $id;
  		private $nutzername;
  		private $passwort;
  		private $email;

  		public function getId()
  		{
   			return $this->id;
  		}
  		public function setId($id)
  		{
    		$this->id=$id;
  		}
  		public function getNutzername()
  		{
   			return $this->nutzername;
  		}
  		public function setNutzername($nutzername)
  		{
    		$this->nutzername=$nutzername;
  		}
  		public function getPasswort()
  		{
   			return $this->passwort;
  		}
  		public function setPasswort($passwort)
  		{
    		$this->passwort=$passwort;
  		}
  		public function getEmail()
  		{
   			return $this->email;
  		}
  		public function setEmail($email)
  		{
    		$this->email=$email;
  		}
  	}

  	class Kommentar
	{
  		private $id;
  		private $ueberschrift;
  		private $inhalt;
  		private $veroeffentlichung;
			private $kommentare;

  		public function getId()
  		{
   			return $this->id;
  		}
  		public function setId($id)
  		{
    		$this->id=$id;
  		}
  		public function getInhalt()
  		{
   			return $this->inhalt;
  		}
  		public function setInhalt($inhalt)
  		{
    		$this->inhalt=$inhalt;
  		}
  		public function getVeroeffentlichung()
  		{
   			return $this->veroeffentlichung;
  		}
  		public function setVeroeffentlichung($veroeffentlichung)
  		{
    		$this->veroeffentlichung=$veroeffentlichung;
  		}
  		public function getUeberschrift()
  		{
   			return $this->ueberschrift;
  		}
  		public function setUeberschrift($ueberschrift)
  		{
    		$this->ueberschrift=$ueberschrift;
  		}
			public function getKommentare()
  		{
   			return $this->kommentare;
  		}
  		public function setKommentare($kommentare)
  		{
    		$this->kommentare=$kommentare;
  		}
  	}
?>
