<?php
            require 'connectionforum.php';
        

    if(isset($_POST['title']) && isset($_POST['descrep']) && isset($_POST['name'])) {
        $title=$_POST['title'];
        $descrep=$_POST['descrep'];
        $name=$_POST['name'];
        
        $req="INSERT INTO FORUM(title,descrep,username) VALUES('$title','$descrep','$name');";
        $stmt = $pdo->prepare($req);
        if($stmt->execute()){
            echo "Inserted successfully";
        } else {
            echo "erreur";
        }
    } else {
        echo "Missing input data";
    }

?>
