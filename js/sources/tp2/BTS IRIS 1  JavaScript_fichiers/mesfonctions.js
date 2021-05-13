// Auteur:??
      //date:??
      var test;
      function HexToDec(objetN)
      {
        //affiche une valeur Hexa en décimal
        var reste;
        var n=objetN.value;
        var retour=0;
        
        
        if (isNaN(n))
          alert("ce n'est pas un nombre");
        else
        {
          retour=parseInt(n,16);
          alert("conversion hexadécimal en décimal de 0x"+n+": ="+ retour );
        }
        return retour;
      }
      
      //---------------------------------------------------------
      
      function form3Radio(objetMessage,formulaire)
      {
        if ( formulaire.Radio[0].checked)
        {
          //appel de HexToDec avec message comme paramètre et lecture du résultat dans une variable
          test= HexToDec(objetMessage);
        
          alert("conversion hexa vers décimal de 0x"+objetMessage.value+" = "+test);
        }
        
        if( formulaire.Radio[1].checked)
        {
          //A modifier afin d'appeler la fonction parite
          
          //appel de parite avec message comme paramètre
          //??
          test = parite(objetMessage);
          if(test == 0) alert("Le nombre est impair");
          else if(test == 1) alert("Le nombre est pair");
          else alert("Ce n'est pas un nombre")
        
        }
      }
      
      //---------------------------------------------------------
      
      function parite(objetMessage)
      {
        if(isNaN(objetMessage.value))
          return 2;
        else
        {
          if(objetMessage.value%2==1) return 0;
          else return 1;
        }
      }
      
      //---------------------------------------------------------
      
      function form2CheckBox(objetMessage,formulaire)
      {
      
        if (formulaire.parite.checked)
        {
          test = parite(objetMessage);
          if (test==1) alert(objetMessage.value+" est un nombre pair");
          else if(test == 0) alert(objetMessage.value+" est nombre impair");
          else alert("Ce n'est pas un nombre");
        }
        
         if (formulaire.convHexaToDec.checked)
        {
          test = HexToDec(objetMessage);
          alert("conversion hexadécimal en décimal de 0x"+n+": ="+test );
        }
      }
      
      //---------------------------------------------------------
      
      function form4Radio(formulaire)
{
var a=formulaire.a.value;
var b=formulaire.b.value;
var rho=formulaire.rho.value;
var phi=formulaire.phi.value;
//A modifier afin d'appeler la fonction demandée par le Radio Bouton
    if(formulaire.Complexe[0].checked)
    {
    // appel de  Module(a,b) en mettant le résultat de la fonction dans une variable
     test=Module(a,b);
     // affichage du résultat
     alert("Le module du nombre complexe "+a+ "+ i "+b+" = "+test);

    }
if(formulaire.Complexe[1].checked)
  {
   // appel de  Argument(a,b) en mettant le résultat de la fonction dans une variable
     // et affichage du résultat
     test = Argument(a,b);
    alert("arg("+a+"+ i"+b+") = "+test+"rad = "+RadToDegre(test)+"°");

   }
if(formulaire.Complexe[2].checked)
  {
   // appel de PartieReelle(rho,phi)
   //   et affichage
   test=PartieReelle(rho, phi);
   alert("La partie réelle du nombre complexe "+test);
   }
if(formulaire.Complexe[3].checked)
  {
   // appel de PartieImaginaire(rho,phi)
   // et affichage
   test=PartieImaginaire(rho, phi);
   alert("La partie imaginaire du nombre complexe "+test);
   }
//??
}

//---------------------------------------------------------

function Jour()
{
var da=new Date();
var m=["janvier","février","mars","avril","mai","juin","juillet","août","septembre","octobre","novembre","décembre"];
var j=["dimanche","lundi","mardi","mercredi","jeudi","vendredi","samedi"]
var mois=da.getMonth();
var jour=da.getDay();
var an=da.getFullYear();

return j[jour]+" "+da.getDate()+" "+ m[mois]+" "+an;
}
//---------------------------------------------------------
 
function Module(a,b)
{
// retourne le module du complexe a + i b
var ret=Math.sqrt(a^2+b^2);

 return ret;
}
//---------------------------------------------------------
 
function Argument(a,b)
{
// retourne l'argument du complexe a + i b

  var ret=Math.atan(b/a);
  if(a<0 && b<0) ret-=Math.PI;
  if(a<0 && b>0) ret+=Math.PI;
 return ret;
}
//---------------------------------------------------------
 
function RadToDegre(phi)
{
// reçoit phi en degré
// retourne phi en degré

phi=phi*180/Math.PI;

 return  phi;
}
//---------------------------------------------------------
 
function PartieReelle(rho,phi)
{
// 1) retourne la partie réeele du complexe rho exp (i phi )
// attention phi est à convertir en radians avant tout calcul

//2) si le resultat est < |0.OOOO1| retourner 0
// afin d'éviter 1122E-16 par exemple

phi=phi*Math.PI/180
var ret=rho*Math.sin(phi);
if(ret<0.00001)return 0;
else return ret;
}

//---------------------------------------------------------
 
function PartieImaginaire(rho,phi)
{
// 1) retourne la partie imaginaire du complexe rho exp (i phi )
// attention phi est à convertir en radians avant tout calcul

//2) si le resultat est < |0.OOOO1| retourner 0
// afin d'éviter 1122E-16 par exemple

phi=phi*Math.PI/180
var ret=rho*Math.cos(phi);
if(ret<0.00001)return 0;
else return ret;
}
