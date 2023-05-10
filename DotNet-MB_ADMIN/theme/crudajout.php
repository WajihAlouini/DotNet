<?php
include "../entites/actor.php";
include "../core/actorC.php";  


if (isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['dateN']) and isset($_FILES['img'])) {
    $actor = new actor($_POST['nom'],$_POST['prenom'],$_POST['dateN'],$_FILES['img']['name']);

    $target_dir = "uploads/"; // Directory where the image file will be saved
    $target_file = $target_dir . basename($_FILES["img"]["name"]);

    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
        // File was successfully uploaded and saved
        $actorC = new actorC();
        $actorC->ajouterActor($actor);
        // header('Location: movies-load-more.php');
    } else {
        // There was an error uploading the file
        echo "Error uploading file.";
    }
    header('Location: movie-list.php');
} else {
    echo "Verify all fields are filled";
    var_dump($_POST);
var_dump($_FILES);
}
?> 
