<?php 
include_once '../../../config.php';
include_once '../../../controller/categoryC.php';






$categoryC=new categoryC();

$prod=$categoryC->supprimercategory($_GET['id']);

header('location:http://localhost/wajih/view/back/theme/category-list.php');




?>
