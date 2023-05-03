<?PHP
include "./Core/writerC.php";
$writerC=new writerC();

if (isset($_POST["id"])){
    $writerC->deleteWriter($_POST["id"]);
    header('Location: video-load-more.php');
}

?>