<?php 
include_once '../../../config.php';
include_once '../../../controller/iptv_channelC.php';

include_once '../../../model/iptv_channel.php';
if(!isset($_POST['id'])||!isset($_POST['nom'])||!isset($_POST['url'])||!isset($_POST['frame']))
{
	echo "erreur de ";
}




$chan=new channel($_POST['id'],$_POST['nom'],$_POST['url'],$_POST['frame'],"","",0);

$categoryC=new channelC();

$prod=$categoryC->Modifierchannel($chan);

header('location:http://localhost/wajih/view/back/theme/channel-list.php');




?>
