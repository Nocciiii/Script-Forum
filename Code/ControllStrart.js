//Das fenster für die Login Funktionen wird erstelt und den Buttons werden die Funktionen zugewisen
// Alle Modale bekommen
var modalRegister = document.getElementById('ModalRegister');
var modalLogin = document.getElementById('ModalLogin');
var modelPost = document.getElementById('ModelPost');

// Beide Button für jeweils beide Modale
var btnRegister = document.getElementById("btnRegister");
var btnLogin = document.getElementById("btnLogin");
var btnPost = document.getElementById("btPost")

// Hier bekommt man das <span> element welches zum Schließen der Modale da ist
var span = document.getElementsByClassName("close")[0];
var span2 = document.getElementsByClassName("close2")[0];

// Modale bei bestimmten button öffnen
btnRegister.onclick = function()
{
  modalRegister.style.display = "block";
}

btnLogin.onclick = function()
{
  modalLogin.style.display = "block";
}

btnPost.onclick = function()
{
  modelPost.style.display = "block";
}

// "schließt" beide modale wenn man auf das X klickt
span.onclick = function()
{
  modalRegister.style.display = "none";

}
span2.onclick = function()
{
  modalLogin.style.display = "none";

}
// Wenn der User irgendwo außerhalb des Modals klickt, schließt sich dieses
window.onclick = function(event)
{
  if (event.target == modalLogin)
  {
    modalLogin.style.display = "none";
  }
  else if(event.target == modalRegister)
  {
    modalRegister.style.display = "none";
  }
  else if(event.target == modelPost)
  {
    modelPost.style.display = "none";
  }
}
