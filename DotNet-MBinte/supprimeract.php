<?PHP
include "./core/actorC.php";
$actorC = new actorC();

if (isset($_POST["id"])){
    $actorC->deleteActor($_POST["id"]);
    header('Location: movies-load-more.php');
}

?>