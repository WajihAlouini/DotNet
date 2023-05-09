<?php 
include_once '../../../configiptv.php';
include_once '../../../core/iptv_channelC.php';


if(!isset($_POST['id'])||!isset($_POST['rating']))
{
	echo "erreur de ";
}




$channelC=new channelC();

$prod=$channelC->ModifierRaiting($_POST['id'],$_POST['rating']);

header('location:http://localhost/DotNet-MBinte/index.php');




?>
