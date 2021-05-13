<HTML> 
<HEAD>
<TITLE> Kevin </TITLE> </HEAD> 
<BODY style="color:white; font-family: 'Segoe UI'; font-size: 150%; text-align: center; padding: 50px, 50px, 50px, 50px;background-color: grey">
 <br> 
 <form>
 <p>Normal<input type='radio' name='radio1' checked><br></p>
 <p>Cookie<input type='radio' name='radio1'><br></p>
<p>Session<input type='radio' name='radio1'><br></p>
 <input onclick="start(radio1)" style='border: hidden; font-size:120%;' type=submit value=Jouer>
 </form>
 <script type="text/javascript">
 	
function start(choix)
{
	if(choix[0].checked) window.open('./default/index.php');
	if(choix[1].checked) window.open('./cookie/index.php');
	if(choix[2].checked) window.open('./session/index.php');
}


 </script>
<a href="../../../index.php">Retourner au menu</a>
</BODY>
</HTML>	