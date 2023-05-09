<?php
include "../core/config.php";
class typeC
{

function ajoutertype($type)
{
    $v1=$type->getnomt();
 


    // SQL query to check if table exists in database
    $sqlCheckTable = "SELECT 1 FROM types LIMIT 1";
    $db = Database::getConnexion();

    try {
        $reqCheckTable = $db->query($sqlCheckTable);
    } catch (Exception $e) {
        // If the query throws an exception, it means that the table does not exist
        // Therefore, create the table
        $sqlCreateTable = "CREATE TABLE types (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            nomt VARCHAR(50) NOT NULL
           
			
        )";

        $reqCreateTable = $db->query($sqlCreateTable);
    }

    // Insert data into table
    $sqlInsert = "INSERT INTO types (nomt)
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

	
	
	function Affichertypes()
	{
		$sql="SElECT * From types";
		$db = Database::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
   

    function deletetype($id)
{
    $sql = "DELETE FROM types WHERE id =:id";
    $db = Database::getConnexion();
    $req = $db->prepare($sql);
    $req->bindValue(':id', $id);
    try {
        $req->execute();
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}

 
function modifiertype($type, $id)
{
    $sql = "UPDATE types SET nomt=:nomt WHERE id=:id";
    $db = Database::getConnexion();

    try {
        $req = $db->prepare($sql);
        $nomt = $type->getnomt();

        // Check if a new image file has been uploaded
        
            // Use the current image file name
            $typeC = new typeC();
            $currenttype = $typeC->recuperetype($id);
          
        

        $req->bindValue(':nomt', $nomt);
        $req->bindValue(':id', $id);
        $s = $req->execute();

    } catch (Exception $o) {
        echo "Erreur ! " . $o->getMessage();
    }
}


    function recuperetype($id)
    {
        $sql = "SELECT * from types where id=$id";
        $db = Database::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $o) {
            die('Erreur: ' . $o->getMessage());
        }
    }

}


?>