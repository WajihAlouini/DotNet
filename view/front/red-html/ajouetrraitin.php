<?php 
include_once '../../../config.php';
include_once '../../../controller/iptv_channelC.php';


if(!isset($_POST['id'])||!isset($_POST['rating']))
{
	echo "erreur de ";
}




$channelC=new channelC();

$prod=$channelC->ModifierRaiting($_POST['id'],$_POST['rating']);

header('location:http://localhost/wajih/view/front/red-html/index.php');




?>
