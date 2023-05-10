<?php

include "../core/MovieC.php";

if(isset($_POST['id']) && isset($_POST['nom']) && isset($_POST['DescF']) && isset($_POST['trailer']) && isset($_POST['UrlF']) && isset($_POST['duree']) && isset($_POST['Released']) && isset($_POST['actor_id']) && isset($_POST['genre_id']) && isset($_FILES['imgs'])) {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $DescF = $_POST['DescF'];
    $trailer = $_POST['trailer'];
    $UrlF = $_POST['UrlF'];
    $duree = $_POST['duree'];
    $Released = $_POST['Released'];
    $imgs = $_FILES['imgs']['name'];
    $actor_id = $_POST['actor_id'];
    $genre_id = $_POST['genre_id'];

    $MovieC = new MovieC();
    $db = Database::getConnexion();

    // Update the corresponding row in the "movie" table
    $query = "UPDATE movie 
              SET nom = :nom, DescF = :DescF, trailer = :trailer, UrlF = :UrlF, duree = :duree, Released = :Released, imgs = :imgs, actor_id = :actor_id, genre_id = :genre_id 
              WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindValue(":id", $id);
    $stmt->bindValue(":nom", $nom);
    $stmt->bindValue(":DescF", $DescF);
    $stmt->bindValue(":trailer", $trailer);
    $stmt->bindValue(":UrlF", $UrlF);
    $stmt->bindValue(":duree", $duree);
    $stmt->bindValue(":Released", $Released);
    $stmt->bindValue(":imgs", $imgs);
    $stmt->bindValue(":actor_id", $actor_id);
    $stmt->bindValue(":genre_id", $genre_id);
    $result = $stmt->execute();

    if($result) {
        header('Location: MovieL.php');
    } else {
        echo "Error updating movie.";
    }
} else {
    echo "Invalid request.";
}

?> 