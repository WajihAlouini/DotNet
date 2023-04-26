<?PHP
include "../core/typeC.php";
$typeC=new typeC();

if (isset($_POST["id"])){
    $typeC->deletetype($_POST["id"]);
    header('Location: type-list.php');
}

?>