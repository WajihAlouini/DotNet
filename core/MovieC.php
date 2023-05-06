<?php
 include "core\config.php";
 class MovieC{
  

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

function recuperMoviesBygenre($genre_id)
{
    $sql = "SELECT movie.*, genre.nomg as genre_name, actor.nom as actor_name
            FROM movie
            INNER JOIN genre ON movie.genre_id = genre.id
            INNER JOIN actor ON movie.actor_id = actor.id
            WHERE genre.id = $genre_id";
    $db = Database::getConnexion();
    try {
        $liste = $db->query($sql);
        return $liste;
    } catch (Exception $o) {
        die('Erreur: ' . $o->getMessage());
    }
}




function recuperemovie($id)
{
    $sql = "SELECT * from movie where id=$id";
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

	
	


 
}
?>