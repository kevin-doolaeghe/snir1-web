function Validation(nom, ville, score, age, passe)
{
    if(nom && ville && score && age && passe) document.formulaire.submit();
    else alert("Veuillez remplir tous les champs !");
}
//-------------------------------------------

function controle(formulaire,var1,var2) 
{
erreur=0;
if (formulaire.name=="form4")
  {
  if (!(formulaire.choix[0].checked)&& !(form4.choix[1].checked))
     {  
     alert(" Un choix svp");
     erreur=1;
     }
  }
if (!(var1.value && var2.value) )
     {alert ("champ vide");
        erreur=1;
     }
if (erreur==0)  formulaire.submit();
}
//-------------------------------------------

function printSheet() 
{
  window.print();
}
//-------------------------------------------

function affFormConnexion()
{
  jQuery(document).ready(function(){
      $('#formConnexion').fadeToggle();
    });
}
//-------------------------------------------

function testConnexion()
{
  var id = document.getElementById('idConnex').value;
  var pass = document.getElementById('passConnex').value;
  if(id == "toto" && pass == "toto")
  {
    jQuery(document).ready(function(){
      $('#formConnexion').fadeToggle();
      $('#boutonConnexion').fadeToggle();
      $('.connexionNecessaire').fadeToggle();
    });
  }
  else
  {
    alert("Mauvais identifiant(s)...");
  }
}
//-------------------------------------------

jQuery(document).ready(function(){
  $('#formConnexion').toggle();
  $('.connexionNecessaire').toggle();
	$('#ville').autocomplete({
	source:  "controleurAjax.php?champ=ville",// variable transmise 'term' à récupérer avec $GET['term']
	minLength: 1,
 		
	}); //fin ville
$('#nom').autocomplete({
  source:  "controleurAjax.php?champ=nom",// variable transmise 'term' à récupérer avec $GET['term']
  minLength: 1,
    
  });
});// fin ready
