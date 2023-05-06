<?php

include "../core/booksC.php";

if(isset($_POST['id']) && isset($_POST['nomB']) && isset($_POST['DescB'])  && isset($_POST['UrlB']) && isset($_POST['duree']) && isset($_POST['Released']) && isset($_POST['writer_id']) && isset($_POST['types_id']) && isset($_FILES['imgB'])) {
    $id = $_POST['id'];
    $nomB = $_POST['nomB'];
    $DescB = $_POST['DescB'];
    $UrlB = $_POST['UrlB'];
    $duree = $_POST['duree'];
    $Released = $_POST['Released'];
    $imgB = $_FILES['imgB']['name'];
    $writer_id = $_POST['writer_id'];
    $types_id = $_POST['types_id'];

    $BooksC = new BooksC();
    $db = Database::getConnexion();

    // Update the corresponding row in the "movie" table
    $query = "UPDATE books 
              SET nomB = :nomB, DescB = :DescB, UrlB = :UrlB, duree = :duree, Released = :Released, imgB = :imgB, writer_id = :writer_id, types_id = :types_id 
              WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindValue(":id", $id);
    $stmt->bindValue(":nomB", $nomB);
    $stmt->bindValue(":DescB", $DescB);
    $stmt->bindValue(":UrlB", $UrlB);
    $stmt->bindValue(":duree", $duree);
    $stmt->bindValue(":Released", $Released);
    $stmt->bindValue(":imgB", $imgB);
    $stmt->bindValue(":writer_id", $writer_id);
    $stmt->bindValue(":types_id", $types_id);
    $result = $stmt->execute();

    if($result) {
        header('Location: BookL.php');
    } else {
        echo "Error updating movie.";
    }
} else {
    echo "Invalid request.";
}

?> 