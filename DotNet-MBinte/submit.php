<?php
    include "./core/MovieC.php";

    if(isset($_GET['id']) and isset($_GET['rating']) and isset($_GET['genre_id'])) {
        $id = $_GET['id'];
        $rating = $_GET['rating'];
        $genre = $_GET['genre_id'];
        $MovieC = new MovieC();
        $movie = $MovieC->recuperemovie($id);
        if(!$movie) {
            echo "movie not found.";
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
                movie_id INT(11) NOT NULL,
                genre_id INT(11) NOT NULL,
           
                FOREIGN KEY ( genre_id) REFERENCES genre(id),
                FOREIGN KEY ( movie_id) REFERENCES movie(id)
            )";
            $reqCreateTable = $db->query($sqlCreateTable);
        }
    
        // Insert the rating into the "rate" table
        $query = "INSERT INTO rate (rating,  movie_id,genre_id) 
                  VALUES (:rating, :movie_id, :genre_id)";
        $stmt = $db->prepare($query);
        $stmt->bindValue(":rating", $rating);
        $stmt->bindValue(":movie_id", $id);
        $stmt->bindValue(":genre_id", $genre);
        $result = $stmt->execute();
        
        header("Location: single-movie.php?id=" . $id . "&genre_id=" . $genre);

      
    } else {
        echo "Invalid request.";
    }
    
?>
