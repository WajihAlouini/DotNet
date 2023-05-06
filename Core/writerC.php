<?php
include "Core\config.php";
class writerC
{

function ajouterWriter($writer)
{
    $v1=$writer->getnom();
    $v2=$writer->getprenom();
    $v3=$writer->getdaten();
    $v4=$writer->getimg();


    // SQL query to check if table exists in database
    $sqlCheckTable = "SELECT 1 FROM writer LIMIT 1";
    $db = Database::getConnexion();

    try {
        $reqCheckTable = $db->query($sqlCheckTable);
    } catch (Exception $e) {
        // If the query throws an exception, it means that the table does not exist
        // Therefore, create the table
        $sqlCreateTable = "CREATE TABLE writer (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            nom VARCHAR(50) NOT NULL Unique,
            prenom VARCHAR(255) NOT NULL,
            daten DATE NOT NULL,
            img VARCHAR(255) NOT NULL
			
        )";

        $reqCreateTable = $db->query($sqlCreateTable);
    }

    // Insert data into table
    $sqlInsert = "INSERT INTO writer (nom, prenom, daten, img)
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

	
	function AfficherWriter($Writer)
	{
		
		echo "nom: ".$Writer->getnom()."<br>";
		echo "prenom: ".$Writer->getprenom()."<br>";
		echo "daten: ".$Writer->getdaten()."<br>";
		echo "img: ".$Writer->getimg()."<br>";
		
	}
	
	function AfficherWriters()
	{
		$sql="SElECT * From writer";
		$db = Database::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}

    function deleteWriter($id)
{
    $sql = "DELETE FROM writer WHERE id =:id";
    $db = Database::getConnexion();
    $req = $db->prepare($sql);
    $req->bindValue(':id', $id);
    try {
        $req->execute();
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}


function modifierwriter($writer, $id)
{
    $sql = "UPDATE writer SET nom=:nom, prenom=:prenom, daten=:daten, img=:img WHERE id=:id";
    $db = Database::getConnexion();

    try {
        $req = $db->prepare($sql);
        $nom = $writer->getNom();
        $prenom = $writer->getPrenom();
        $daten = $writer->getDaten();
        $img = "";

        // Check if a new image file has been uploaded
        if (!empty($_FILES['img']['name'])) {
            $img = $_FILES['img']['name'];
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($img);
            move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
        } else {
            // Use the current image file name
            $writerC = new writerC();
            $currentWriter = $writerC->recuperewriter($id);
            $img = $currentWriter['img'];
        }

        $req->bindValue(':nom', $nom);
        $req->bindValue(':prenom', $prenom);
        $req->bindValue(':daten', $daten);
        $req->bindValue(':img', $img);
        $req->bindValue(':id', $id);
        $s = $req->execute();

    } catch (Exception $o) {
        echo "Erreur ! " . $o->getMessage();
    }
}


    function recuperewriter($id)
    {
        $sql = "SELECT * from writer where id=$id";
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