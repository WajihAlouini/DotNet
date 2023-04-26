
<?php
include "../entites/type.php";
include "../core/typeC.php";

if (isset($_POST['nomt'])) {
    $type = new type($_POST['nomt']);

   

    // Move the uploaded file to the target directory

        $typeC = new typeC();
        $result=    $typeC->modifiertype($type,$_POST['id']);
        // header('Location: movies-load-more.php');
   
        // There was an error uploading the file
        echo "Error uploading file.";
    

    header('Location:type-list.php');

} else {
    echo "Verify all fields are filled";
    var_dump($_POST);
var_dump($_FILES);
}
?>