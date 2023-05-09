<?PHP
include "../core/genreC.php";
$genreC = new genreC();

if (isset($_POST["id"])){
    $genreC->deletegenre($_POST["id"]);
    header('Location: genre-list.php');
}

?>