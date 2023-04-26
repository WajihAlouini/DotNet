<?php

include "../entites/type.php";
include "../core/typeC.php";

if (isset($_POST['nomt']) ) {
    $type = new type($_POST['nomt']);

    

    // Move the uploaded file to the target directory
   
        // File was successfully uploaded and saved
        $typeC = new typeC();
        $typeC->ajoutertype($type);
        // header('Location: movies-load-more.php');
        // There was an error uploading the file
        echo "Error uploading file.";
    
    header('Location: add-type.php');
} else {
    echo "Verify all fields are filled";

}

?>
