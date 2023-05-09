<?php 
include_once '../../../config.php';
include_once '../../../controller/iptv_channelC.php';






$channelC=new channelC();

$prod=$channelC->supprimerchanel($_GET['id']);

header('location:http://localhost/wajih/view/back/theme/channel-list.php');




?>
