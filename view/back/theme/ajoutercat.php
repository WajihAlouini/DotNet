<?php 
include_once '../../../config.php';
include_once '../../../controller/categoryC.php';

include_once '../../../model/category.php';
if(!isset($_POST['id'])||!isset($_POST['nom']))
{
	echo "erreur de ";
}




$categoryC=new categoryC();
$ser=new category($_POST['id'],$_POST['nom']);
$prod=$categoryC->Ajoutercategory($ser);

header('location:http://localhost/wajih/view/back/theme/category-list.php');




?>
