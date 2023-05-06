<?php


include "../core/MovieC.php";

if(isset($_POST['nom']) and isset($_POST['DescF']) and isset($_POST['trailer']) and isset($_POST['UrlF']) and isset($_POST['duree']) and isset($_POST['Released'])
and isset($_POST['actor_id']) and isset($_POST['genre_id']) and isset($_FILES['imgs'])) {
    $nom = $_POST['nom'];
    $DescF = $_POST['DescF'];
    $trailer = $_POST['trailer'];
    $UrlF = $_POST['UrlF'];
    $duree = $_POST['duree'];
    $Released = $_POST['Released'];
    $imgs = $_FILES['imgs']['name'];
    $actor_id = $_POST['actor_id'];
    $genre_id = $_POST['genre_id'];


    $target_dir = "uploads/"; // Directory where the image file will be saved
    $target_file = $target_dir . basename($_FILES["imgs"]["name"]);

    $MovieC = new MovieC();
    $db = Database::getConnexion();

    try {
        // Check if table "panier" exists
        $sqlCheckTable = "SELECT 1 FROM movie LIMIT 1";
        $reqCheckTable = $db->query($sqlCheckTable);
    } catch (Exception $e) {
        $sqlCreateTable = "CREATE TABLE movie (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            nom VARCHAR(50) NOT NULL,
            DescF VARCHAR(50) NOT NULL,
            trailer VARCHAR(255) NOT NULL,
            UrlF VARCHAR(255) NOT NULL,
            duree VARCHAR(255) NOT NULL,
            Released  DATE NOT NULL,
            imgs  VARCHAR(255) NOT NULL,
            actor_id INT(11) NOT NULL,
            genre_id INT(11) NOT NULL,
            FOREIGN KEY (actor_id) REFERENCES actor(id),
            FOREIGN KEY (genre_id) REFERENCES genre(id)
        )";
        $reqCreateTable = $db->query($sqlCreateTable);
    }

   if (move_uploaded_file($_FILES["imgs"]["tmp_name"], $target_file)) {
    // Insert the movie into the "movies" table
    $query = "INSERT INTO movie (nom, DescF, trailer, UrlF, duree, Released, imgs, actor_id, genre_id) 
              VALUES (:nom, :DescF, :trailer, :UrlF, :duree, :Released, :imgs, :actor_id, :genre_id)";
    $stmt = $db->prepare($query);
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
}   else {
    // There was an error uploading the file
    echo "Error uploading file.";
}
    if($result) {
        header('Location: MovieL.php');
    } else {
        echo "Error adding movie.";
    }
} else {
    echo "Invalid request.";
}

?> 


