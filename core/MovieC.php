<?php
 include "../core/config.php";
 class MovieC{
    function ajoutermovie($movie)
    {
        $v1 = $movie->getnom();
        $v2 = $movie->getDescF();
        $v3 = $movie->gettrailer();
        $v4 = $movie->getUrlF();
        $v5 = $movie->getduree();
        $v6 = $movie->getReleased();
        $v7 = $movie->getimgF();

    
        // SQL query to check if table exists in database
        $sqlCheckTable = "SELECT 1 FROM movie LIMIT 1";
        $db = Database::getConnexion();
    
        try {
            $reqCheckTable = $db->query($sqlCheckTable);
        } catch (Exception $e) {
            // If the query throws an exception, it means that the table does not exist
            // Therefore, create the table
            $sqlCreateTable = "CREATE TABLE movie (
                id INT(11) AUTO_INCREMENT PRIMARY KEY,
                nom VARCHAR(50) NOT NULL,
                DescF VARCHAR(50) NOT NULL,
                trailer VARCHAR(255) NOT NULL,
                UrlF VARCHAR(255) NOT NULL,
                duree VARCHAR(255) NOT NULL,
                Released  DATE NOT NULL,
                img  VARCHAR(255) NOT NULL,
                actor_id INT(11) NOT NULL,
                genre_id INT(11) NOT NULL,
                FOREIGN KEY (actor_id) REFERENCES actor(id),
                FOREIGN KEY (genre_id) REFERENCES genre(id)
            )";
    
            $reqCreateTable = $db->query($sqlCreateTable);
        }
    
        // Check if actor_id exists in actor table
        $sqlCheckActor = "SELECT id FROM actor WHERE id = '$v8'";
    
        try {
            $reqCheckActor = $db->query($sqlCheckActor);
            $result = $reqCheckActor->fetch(PDO::FETCH_ASSOC);
            if (!$result) {
                echo 'Error: actor_id does not exist in actor table';
                return false;
            }
        } catch (Exception $e) {
            echo 'Erreur: '.$e->getMessage();
            return false;
        }
        
        // Check if genre_id exists in genre table
        $sqlCheckGenre = "SELECT id FROM genre WHERE id = '$v9'";
    
        try {
            $reqCheckGenre = $db->query($sqlCheckGenre);
            $result = $reqCheckGenre->fetch(PDO::FETCH_ASSOC);
            if (!$result) {
                echo 'Error: genre_id does not exist in genre table';
                return false;
            }
        } catch (Exception $e) {
            echo 'Erreur: '.$e->getMessage();
            return false;
        }
    
        // Insert data into table
        $sqlInsert = "INSERT INTO movie (nom, DescF, trailer , UrlF, duree, Released, img, actor_id, genre_id)
            VALUES ('$v1', '$v2', '$v3', '$v4', '$v5', '$v6', '$v7', :actor_id , :genre_id)";
    
        try {
            $reqInsert = $db->prepare($sqlInsert);
            $reqInsert->execute();
            return true;
        } catch (Exception $e) {
            echo 'Erreur: '.$e->getMessage();
            return false;
        }
    }
    

    function Affichermovie()
{
    $sql = "SELECT movie.*, genre.nomg AS genre_name 
            FROM movie 
            INNER JOIN genre ON movie.genre_id = genre.id";
    $db = Database::getConnexion();
    try {
        $liste = $db->query($sql);
        return $liste;
    } catch (Exception $e) {
        die('Erreur: '.$e->getMessage());
    }   
}
function deletemovie($id)
{
    $sql = "DELETE FROM movie WHERE id =:id";
    $db = Database::getConnexion();
    $req = $db->prepare($sql);
    $req->bindValue(':id', $id);
    try {
        $req->execute();
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}
    
function recupermovie($id)
{
    $sql = "SELECT movie.*, genre.nomg as genre_name, actor.nom as actor_name
            FROM movie
            INNER JOIN genre ON movie.genre_id = genre.id
            INNER JOIN actor ON movie.actor_id = actor.id
            WHERE movie.id = $id";
    $db = Database::getConnexion();
    try {
        $liste = $db->query($sql);
        return $liste;
    } catch (Exception $o) {
        die('Erreur: ' . $o->getMessage());
    }
}




function Afficheractors()
	{
		$sql="SElECT * From actor";
		$db = Database::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}

    function Affichergenre()
	{
		$sql="SElECT * From genre";
		$db = Database::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}

   
    
    function searchMovie($searchQuery)
    {
        $sql = "SELECT movie.*, genre.nomg as genre_name, actor.nom as actor_name
                FROM movie
                INNER JOIN genre ON movie.genre_id = genre.id
                INNER JOIN actor ON movie.actor_id = actor.id
                WHERE movie.nom LIKE '$searchQuery%'";
        $db = Database::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $o) {
            die('Erreur: ' . $o->getMessage());
        }
    }
    
    
    


    function afficherDESC()
     {
        $sql = "SELECT movie.*, genre.nomg AS genre_name 
        FROM movie 
        INNER JOIN genre ON movie.genre_id = genre.id
        ORDER BY movie.nom DESC";
$db = Database::getConnexion();
try {
    $liste = $db->query($sql);
    return $liste;
} catch (Exception $e) {
    die('Erreur: '.$e->getMessage());
}  
     }

   function afficherASC()
   {
    $sql = "SELECT movie.*, genre.nomg AS genre_name 
            FROM movie 
            INNER JOIN genre ON movie.genre_id = genre.id
            ORDER BY movie.nom ASC";
    $db = Database::getConnexion();
    try {
        $liste = $db->query($sql);
        return $liste;
    } catch (Exception $e) {
        die('Erreur: '.$e->getMessage());
    }  
    }

	
	


 
}
?>