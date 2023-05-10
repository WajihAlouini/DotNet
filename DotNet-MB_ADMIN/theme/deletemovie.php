<?PHP
include "../core/MovieC.php";
$MovieC = new MovieC();

if (isset($_POST["id"])){
    $MovieC->deletemovie($_POST["id"]);
    header('Location: MovieL.php');
}

?>