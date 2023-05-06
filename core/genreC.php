<?php
include "../core/config.php";

class genreC{

function ajoutergenre($genre)
{
    $v1=$genre->getnomg();
    

    // SQL query to check if table exists in database
    $sqlCheckTable = "SELECT 1 FROM genre LIMIT 1";
    $db = Database::getConnexion();

    try {
        $reqCheckTable = $db->query($sqlCheckTable);
    } catch (Exception $e) {
        // If the query throws an exception, it means that the table does not exist
        // Therefore, create the table
        $sqlCreateTable = "CREATE TABLE genre (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            nomg VARCHAR(50) NOT NULL
          
			
        )";

        $reqCreateTable = $db->query($sqlCreateTable);
    }

    // Insert data into table
    $sqlInsert = "INSERT INTO genre (nomg)
        VALUES ('$v1')";

    try {
        $reqInsert = $db->prepare($sqlInsert);
        $reqInsert->execute();
        return true;
    } catch (Exception $e) {
        echo 'Erreur: '.$e->getMessage();
        return false;
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

    function deletegenre($id)
{
    $sql = "DELETE FROM genre WHERE id =:id";
    $db = Database::getConnexion();
    $req = $db->prepare($sql);
    $req->bindValue(':id', $id);
    try {
        $req->execute();
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}

function recupergenre($id)
{
    $sql = "SELECT * from genre where id=$id";
    $db = Database::getConnexion();
    try {
        $liste = $db->query($sql);
        return $liste;
    } catch (Exception $o) {
        die('Erreur: ' . $o->getMessage());
    }
}
function modifiergenre($genre, $id)
{
    $sql = "UPDATE genre SET nomg=:nomg WHERE id=:id";
    $db = Database::getConnexion();

    try {
        $req = $db->prepare($sql);
        $nomg = $genre->getnomg();
       

       

        $req->bindValue(':nomg', $nomg);
       
        $req->bindValue(':id', $id);
        $s = $req->execute();

    } catch (Exception $o) {
        echo "Erreur ! " . $o->getMessage();
    }
}


 
}
?>