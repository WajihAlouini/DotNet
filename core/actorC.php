<?php
 include "core\config.php";
 class actorC{
function ajouterActor($actor)
{
    $v1=$actor->getnom();
    $v2=$actor->getprenom();
    $v3=$actor->getdateN();
    $v4=$actor->getimg();
    

    // SQL query to check if table exists in database
    $sqlCheckTable = "SELECT 1 FROM actor LIMIT 1";
    $db = Database::getConnexion();

    try {
        $reqCheckTable = $db->query($sqlCheckTable);
    } catch (Exception $e) {
        // If the query throws an exception, it means that the table does not exist
        // Therefore, create the table
        $sqlCreateTable = "CREATE TABLE actor (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            nom VARCHAR(50) NOT NULL Unique,
            prenom VARCHAR(255) NOT NULL,
            dateN DATE NOT NULL,
            img VARCHAR(255) NOT NULL
			
        )";

        $reqCreateTable = $db->query($sqlCreateTable);
    }

    // Insert data into table
    $sqlInsert = "INSERT INTO actor (nom, prenom, dateN , img)
        VALUES ('$v1', '$v2', '$v3', '$v4')";

    try {
        $reqInsert = $db->prepare($sqlInsert);
        $reqInsert->execute();
        return true;
    } catch (Exception $e) {
        echo 'Erreur: '.$e->getMessage();
        return false;
    }
}

	
	function Afficheractor($actor)
	{
		
		echo "nom: ".$actor->getnom()."<br>";
		echo "prenom: ".$actor->getprenom()."<br>";
		echo "dateN: ".$actor->getdateN()."<br>";
		echo "img: ".$actor->getimg()."<br>";
		
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

    function deleteActor($id)
{
    $sql = "DELETE FROM actor WHERE id =:id";
    $db = Database::getConnexion();
    $req = $db->prepare($sql);
    $req->bindValue(':id', $id);
    try {
        $req->execute();
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}

function recupereactor($id)
{
    $sql = "SELECT * from actor where id=$id";
    $db = Database::getConnexion();
    try {
        $liste = $db->query($sql);
        return $liste;
    } catch (Exception $o) {
        die('Erreur: ' . $o->getMessage());
    }
}
function modifieractor($actor, $id)
{
    $sql = "UPDATE actor SET nom=:nom, prenom=:prenom, dateN=:dateN, img=:img WHERE id=:id";
    $db = Database::getConnexion();

    try {
        $req = $db->prepare($sql);
        $nom = $actor->getNom();
        $prenom = $actor->getPrenom();
        $dateN = $actor->getdateN();
        $img = "";

        // Check if a new image file has been uploaded
        if (!empty($_FILES['img']['name'])) {
            $img = $_FILES['img']['name'];
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($img);
            move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
        } else {
            // Use the current image file name
            $actorC = new actorC();
            $currentactor = $actorC->recupereactor($id);
            $img = $currentactor['img'];
        }

        $req->bindValue(':nom', $nom);
        $req->bindValue(':prenom', $prenom);
        $req->bindValue(':dateN', $dateN);
        $req->bindValue(':img', $img);
        $req->bindValue(':id', $id);
        $s = $req->execute();

    } catch (Exception $o) {
        echo "Erreur ! " . $o->getMessage();
    }
}


 }
?>