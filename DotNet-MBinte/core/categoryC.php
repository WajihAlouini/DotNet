<!DOCTYPE html>
<html>

<?php 

class categoryC{


	function affichercategory(){
		$sql="SELECT * FROM iptv_category";
		$db=config::getConnexion();
		try{
			$liste=$db->query($sql);
			return $liste;
		}
		catch(Exception $e){
			die("erreur:".$e->getMessage());
		}
	} 
	   function supprimercategory($numse){
 $sql="DELETE  FROM iptv_category WHERE `id_category`= $numse ";
		$db=config::getConnexion();
		try{
			$liste=$db->query($sql);

        }catch(Exception $e){
		die("erreur:".$e->getMessage());
     
        }
  
}
function Modifiercategory($id,$nom)
{
$sqlc= "UPDATE `iptv_category` SET nom_category=:nome WHERE id_category=:id  ";
$db=config::getConnexion();
try{ $recipesStatement = $db->prepare($sqlc);
	$recipesStatement->execute(['nome' =>$nom,
		            
		           
	  'id'=>$id,
		         ]);
}
 catch(Exception $e){ 
 	
			 die("erreur:".$e->getMessage());
}

} 

function Ajoutercategory($ser){
$sql= "INSERT INTO `iptv_category` VALUES (:id,:nom)";
$db=config::getConnexion();
try{ $recipesStatement = $db->prepare($sql);
	$recipesStatement->execute([   'id'=>$ser->getid_category(), 

		'nom' =>$ser->getnom(),





	]);
 }
 catch(Exception $e){ 
 	
			 die("erreur:".$e->getMessage());

}

}
function affichercategory1($numse){
		$sql="SELECT * FROM iptv_category WHERE `id_category`= $numse ";
		$db=config::getConnexion();
		try{
			$liste=$db->query($sql);
			return $liste;
		}
		catch(Exception $e){
			die("erreur:".$e->getMessage());
		}
	}  

}
?>
</html>
