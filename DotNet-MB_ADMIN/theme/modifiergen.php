<?php
include "../entites/genre.php";
include "../core/genreC.php";

if (isset($_POST['nomg'])) {
    $genre = new genre($_POST['nomg']);



    // Move the uploaded file to the target directory
    
        // File was successfully uploaded and saved
        $genreC = new genreC();
        $result=    $genreC->modifiergenre($genre,$_POST['id']);
        // header('Location: movies-load-more.php');
   
        // There was an error uploading the file
        echo "Error uploading file.";
 

    header('Location: genre-list.php');

} else {
    echo "Verify all fields are filled";
//     var_dump($_POST);
// var_dump($_FILES);
}
?>
 