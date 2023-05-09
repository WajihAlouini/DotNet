<?php 
include_once 'C:\xampp\htdocs\Dotnet\DotNet-MB_ADMIN\entites\category.php';
include_once 'C:\xampp\htdocs\Dotnet\DotNet-MB_ADMIN\core\configiptv.php';
include_once 'C:\xampp\htdocs\Dotnet\DotNet-MB_ADMIN\core\categoryC.php';
if(!isset($_POST['id'])||!isset($_POST['nom']))
{
	echo "erreur de ";
}




$categoryC=new categoryC();
$ser=new category($_POST['id'],$_POST['nom']);
$prod=$categoryC->Ajoutercategory($ser);

header('location:http://localhost/wajih/view/back/theme/category-list.php');




?>
