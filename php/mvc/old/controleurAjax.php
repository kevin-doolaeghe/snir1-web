<?php
include("view.php");
include("model.php");

if ($_REQUEST["champ"]=="ville")
{
	$maquette=new Model();
	$t=$maquette->getVilleByVilleStartWith($_REQUEST["term"]);
	$maVue= new Vue();
	$maVue->afficheMessJson($t);
}
if ($_REQUEST["champ"]=="nom")
{
	$maquette=new Model();
	$t=$maquette->getVilleByVilleStartWith($_REQUEST["term"]);
	$maVue= new Vue();
	$maVue->afficheMessJson($t);
}

?>
