<?php

include "../entites/writer.php";
include "../core/writerC.php";

if (isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['daten']) and isset($_FILES['img'])) {
    $writer = new writer($_POST['nom'],$_POST['prenom'],$_POST['daten'],$_FILES['img']['name']);

    $target_dir = "uploads/"; // Directory where the image file will be saved
    $target_file = $target_dir . basename($_FILES["img"]["name"]);

    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
        // File was successfully uploaded and saved
        $writerC = new writerC();
        $writerC->ajouterwriter($writer);
        // header('Location: movies-load-more.php');
    } else {
        // There was an error uploading the file
        echo "Error uploading file.";
    }
    header('Location: movie-list.php');
} else {
    echo "Verify all fields are filled";

}

?>
