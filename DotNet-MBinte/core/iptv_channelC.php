<!DOCTYPE html>
<html>

<?php 

class channelC{


	function afficherchannel(){
		$sql="SELECT * FROM iptv_channel  ";
		$db=config::getConnexion();
		try{
			$liste=$db->query($sql);
			return $liste;
		}
		catch(Exception $e){
			die("erreur:".$e->getMessage());
		}
	} 
	   function supprimerchanel($numse){
 $sql="DELETE  FROM iptv_channel WHERE `id_channel`= $numse ";
		$db=config::getConnexion();
		try{
			$liste=$db->query($sql);

        }catch(Exception $e){
		die("erreur:".$e->getMessage());
     
        }
  
} 

function Modifierchannel($ser)
{
$sqlc= "UPDATE `iptv_channel` SET nom_channel=:nom,url=:url,frame=:frame WHERE id_channel=:id ";
$db=config::getConnexion();
try{ $recipesStatement = $db->prepare($sqlc);
	$recipesStatement->execute([ 'nom'=>$ser->getnom_channel(), 
           'url' =>$ser->geturl(),
		'frame' =>$ser->getframe(),
		
			'id' =>$ser->getid_channel(),
		         ]);
}
 catch(Exception $e){ 
 	
			 die("erreur:".$e->getMessage());
}

}


function Ajouterchannel($ser){
$sql= "INSERT INTO `iptv_channel` VALUES (:id,:nom,:url,:frame,:image,:id_cat,:rait)";
$db=config::getConnexion();
try{ $recipesStatement = $db->prepare($sql);
	$recipesStatement->execute([   'id'=>$ser->getid_channel(), 

		'nom' =>$ser->getnom_channel(),
		'url' =>$ser->geturl(),
		'frame' =>$ser->getframe(),
		'image' =>$ser->getimage(),
			'id_cat' =>$ser->getid_cate(),
		
	'rait' =>$ser->getraiting(),




	]);
 }
 catch(Exception $e){ 
 	
			 die("erreur:".$e->getMessage());

}

}
function afficheriptv_channel1($numse){
		$sql="SELECT * FROM iptv_channel WHERE `id_channel`= $numse ";
		$db=config::getConnexion();
		try{
			$liste=$db->query($sql);
			return $liste;
		}
		catch(Exception $e){
			die("erreur:".$e->getMessage());
		}
	}  

	function triiptv(){
		$sql="SELECT * FROM iptv_channel order by url ";
		$db=config::getConnexion();
		try{
			$liste=$db->query($sql);
			return $liste;
		}
		catch(Exception $e){
			die("erreur:".$e->getMessage());
		}
	}
	function recherche($search_value)
    {
        $sql="SELECT * FROM iptv_channel   where 	(id_channel like '$search_value' or nom_channel like '%$search_value%' or url like '%$search_value%' or frame like '%$search_value%' )  ";

        //global $db;
        $db =Config::getConnexion();

        try{
            $result=$db->query($sql);

            return $result;

        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function afficheriptv_channelparcategory($numse){
		$sql="SELECT * FROM iptv_channel WHERE `id_category`= $numse ";
		$db=config::getConnexion();
		try{
			$liste=$db->query($sql);
			return $liste;
		}
		catch(Exception $e){
			die("erreur:".$e->getMessage());
		}
	}  
	function ModifierRaiting($id,$raiting)
{
$sqlc= "UPDATE `iptv_channel` SET raiting=raiting+:raitin WHERE id_channel=:id ";
$db=config::getConnexion();
try{ $recipesStatement = $db->prepare($sqlc);
	$recipesStatement->execute([ 'raitin'=>$raiting, 
        
			'id' =>$id,
		         ]);
}
 catch(Exception $e){ 
 	
			 die("erreur:".$e->getMessage());
}

}


}
?>
</html>
