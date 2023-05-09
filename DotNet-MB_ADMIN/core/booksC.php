<?php
 include "../core/config.php";
 class BooksC{
    
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
    function Afficherbook()
    {
        $sql = "SELECT books.*,types.nomt AS type_name 
                FROM books 
                INNER JOIN types ON books.types_id = types.id";
        $db = Database::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: '.$e->getMessage());
        }   
    }

    
    function recuperbook($id)
{
    $sql = "SELECT books.*, types.nomt as type_name, writer.nom as writer_name
            FROM books
            INNER JOIN  writer ON books.writer_id = writer.id
            INNER JOIN types ON books.types_id = types.id
            WHERE books.id = $id";
    $db = Database::getConnexion();
    try {
        $liste = $db->query($sql);
        return $liste;
    } catch (Exception $o) {
        die('Erreur: ' . $o->getMessage());
    }
}

function deletebook($id)
{
    $sql = "DELETE FROM books WHERE id =:id";
    $db = Database::getConnexion();
    $req = $db->prepare($sql);
    $req->bindValue(':id', $id);
    try {
        $req->execute();
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}

function afficherDESC()
{
   $sql = "SELECT books.*, types.nomt AS type_name 
   FROM books 
   INNER JOIN types ON books.types_id = types.id
   ORDER BY books.nomB DESC";
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
 $sql = "SELECT books.*, types.nomt AS type_name 
         FROM books 
         INNER JOIN types ON books.types_id = types.id
         ORDER BY books.nomB ASC";
 $db = Database::getConnexion();
 try {
     $liste = $db->query($sql);
     return $liste;
 } catch (Exception $e) {
     die('Erreur: '.$e->getMessage());
 }  
 }

 function searchBook($searchQuery)
 {
     $sql = "SELECT books.*, types.nomt as type_name, writer.nom as writer_name
             FROM books
             INNER JOIN types ON books.types_id = types.id
             INNER JOIN writer ON books.writer_id = writer.id
             WHERE books.nomB LIKE '$searchQuery%'";
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