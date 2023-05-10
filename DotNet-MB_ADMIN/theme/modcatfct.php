<?php 
include_once '../../../config.php';
include_once '../../../controller/categoryC.php';

include_once '../../../model/category.php';
if(!isset($_POST['id'])||!isset($_POST['nom']))
{
	echo "erreur de ";
}




$categoryC=new categoryC();

$prod=$categoryC->Modifiercategory($_POST['id'],$_POST['nom']);

header('location:http://localhost/wajih/view/back/theme/category-list.php');




?>
