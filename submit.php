<?php
    include "./Core/booksC.php";

    if(isset($_GET['id']) and isset($_GET['rating']) and isset($_GET['types_id'])) {
        $id = $_GET['id'];
        $rating = $_GET['rating'];
        $types = $_GET['types_id'];
        $BooksC = new BooksC();
        $book = $BooksC->recuperbook($id);
        if(!$book) {
            echo "book not found.";
            die();
        }
    
        $db = Database::getConnexion();
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
                book_id INT(11) NOT NULL,
                types_id INT(11) NOT NULL,
           
                FOREIGN KEY ( types_id) REFERENCES types(id),
                FOREIGN KEY ( book_id) REFERENCES books(id)
            )";
            $reqCreateTable = $db->query($sqlCreateTable);
        }
    
        // Insert the rating into the "rate" table
        $query = "INSERT INTO rate (rating,  book_id,types_id) 
                  VALUES (:rating, :book_id, :types_id)";
        $stmt = $db->prepare($query);
        $stmt->bindValue(":rating", $rating);
        $stmt->bindValue(":book_id", $id);
        $stmt->bindValue(":types_id", $types);
        $result = $stmt->execute();
        
        header("Location: single-movie.php?id=" . $id . "&types_id=" . $types);

      
    } else {
        echo "Invalid request.";
    }
    
?>
