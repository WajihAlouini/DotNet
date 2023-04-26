<?PHP
include "../core/writerC.php";
$writerC=new writerC();

if (isset($_POST["id"])){
    $writerC->deleteWriter($_POST["id"]);
    header('Location: movie-list.php');
}

?>