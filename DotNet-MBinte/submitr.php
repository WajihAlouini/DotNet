
<?php
function recuperemovie($idrec)
{
    $sql = "SELECT * from reclamation where idrec=$idrec";
    $db = Database::reclamation();
    try {
        $liste = $db->query($sql);
        return $liste;
    } catch (Exception $o) {
        die('Erreur: ' . $o->getMessage());
    }
}
    if(isset($_GET['id']) and isset($_GET['rating']) and isset($_GET['rep_id'])) {
        $id = $_GET['id'];
        $rating = $_GET['rating'];
        $genre = $_GET['rep_id'];
        
        $db = Database::reclamation();
        try {
            // Check if table "rate" exists
            $sqlCheckTable = "SELECT 1 FROM rate LIMIT 1";
            $reqCheckTable = $db->query($sqlCheckTable);
        } catch (Exception $e) {
            // If the query throws an exception, it means that the table does not exist
            // Therefore, create the table
            $sqlCreateTable = "CREATE TABLE rate (
                id INT(11) AUTO_INCREMENT PRIMARY KEY,
                rating VARCHAR(50) NOT NULL,
                rec_id INT(11) NOT NULL,
                rep_id INT(11) NOT NULL,
           
                FOREIGN KEY ( rep_id) REFERENCES reponse(idrep),
                FOREIGN KEY ( rec_id) REFERENCES reclamation(idrec)
            )";
            $reqCreateTable = $db->query($sqlCreateTable);
        }
    
        // Insert the rating into the "rate" table
        $query = "INSERT INTO rate (rating,  rec_id, rep_id) 
                  VALUES (:rating, :rec_id, :rep_id)";
        $stmt = $db->prepare($query);
        $stmt->bindValue(":rating", $rating);
        $stmt->bindValue(":rec_id", $id);
        $stmt->bindValue(":rep_id", $genre);
        $result = $stmt->execute();
        
        header("Location: contact-us.php?id=" . $id . "&rep_id=" . $genre);

      
    } else {
        echo "Invalid request.";
    }
    
?>