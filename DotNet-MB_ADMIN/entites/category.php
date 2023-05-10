<?php
class category{
	
private $id_category;
private $nom;




public  function __construct($id_category,$nom)
{
	$this->id_category=$id_category;
    $this->nom=$nom;
 
       
 }





public  function getid_category()
{
	return $this->id_category;
}
public function getnom()
{
	return $this->nom;
}




}




?>