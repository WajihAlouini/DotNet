<?php
            require 'connectionforum.php';
        
            $forum_id = $_POST['forum_id'];
            echo $forum_id;

    if(isset($_POST['comment']) ) {
        $comment=$_POST['comment'];
       
        
        $req="INSERT INTO REPONSES(rep,id_forum) VALUES('$comment',$forum_id)";
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