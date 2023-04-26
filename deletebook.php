<?PHP
include "../core/booksC.php";
$BooksC = new BooksC();

if (isset($_POST["id"])){
    $BooksC->deletebook($_POST["id"]);
    header('Location: BookL.php');
}

?>