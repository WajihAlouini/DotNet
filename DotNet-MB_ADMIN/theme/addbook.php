<?php


include "../core/booksC.php";

if(isset($_POST['nomB']) and isset($_POST['DescB'])  and isset($_POST['UrlB']) and isset($_POST['duree']) and isset($_POST['Released'])
and isset($_POST['writer_id']) and isset($_POST['types_id']) and isset($_FILES['imgB'])) {
    $nomB = $_POST['nomB'];
    $DescB = $_POST['DescB'];
    $UrlB= $_POST['UrlB'];
    $duree = $_POST['duree'];
    $Released = $_POST['Released'];
    $imgB= $_FILES['imgB']['name'];
    $types_id = $_POST['types_id'];
    $writer_id = $_POST['writer_id'];


    $target_dir = "uploads/"; // Directory where the image file will be saved
    $target_file = $target_dir . basename($_FILES["imgB"]["name"]);

    $BooksC = new BooksC();
    $db = Database::getConnexion();

    try {
        // Check if table "panier" exists
        $sqlCheckTable = "SELECT 1 FROM books LIMIT 1";
        $reqCheckTable = $db->query($sqlCheckTable);
    } catch (Exception $e) {
        $sqlCreateTable = "CREATE TABLE books (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            nomB VARCHAR(50) NOT NULL,
            DescB VARCHAR(700) NOT NULL,
            UrlB VARCHAR(255) NOT NULL,
            duree VARCHAR(255) NOT NULL,
            Released  DATE NOT NULL,
            imgB  VARCHAR(255) NOT NULL,
            writer_id INT(11) NOT NULL,
            types_id INT(11) NOT NULL,
            FOREIGN KEY (writer_id) REFERENCES writer(id),
            FOREIGN KEY (types_id) REFERENCES types(id)
        )";
        $reqCreateTable = $db->query($sqlCreateTable);
    }

   if (move_uploaded_file($_FILES["imgB"]["tmp_name"], $target_file)) {
    // Insert the movie into the "movies" table
    $query = "INSERT INTO books (nomB, DescB, UrlB, duree, Released, imgB, writer_id, types_id) 
              VALUES (:nomB, :DescB,  :UrlB, :duree, :Released, :imgB, :writer_id, :types_id)";
    $stmt = $db->prepare($query);
    $stmt->bindValue(":nomB", $nomB);
    $stmt->bindValue(":DescB", $DescB);
    $stmt->bindValue(":UrlB", $UrlB);
    $stmt->bindValue(":duree", $duree);
    $stmt->bindValue(":Released", $Released);
    $stmt->bindValue(":imgB", $imgB);
    $stmt->bindValue(":writer_id", $writer_id);
    $stmt->bindValue(":types_id", $types_id);
    $result = $stmt->execute();
}   else {
    // There was an error uploading the file
    echo "Error uploading file.";
}
    if($result) {
        header('Location: BookL.php');
    } else {
        echo "Error adding book.";
    }
} else {
    echo "Invalid request.";
}

?> 


