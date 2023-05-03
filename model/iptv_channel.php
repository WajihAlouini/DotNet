<?php
class channel{
	
private $id_channel;
private $nom_channel;
private $url;
private $frame;
private $image;
private $id_cate;
private $raiting;
	




public  function __construct($id_channel,$nom_channel,$url,$frame,$image,$id_cate,$raiting)
{
	$this->id_channel=$id_channel;
    $this->nom_channel=$nom_channel;
    $this->url=$url;
    
    $this->frame=$frame;
    $this->image=$image;
      $this->id_cate=$id_cate;
      $this->raiting=$raiting;
     
       
    

 


}





public  function getid_channel()
{
	return $this->id_channel;
}
public function getnom_channel()
{
	return $this->nom_channel;
}
public function geturl()
{
	return $this->url;
}

public function getframe()
{
	return $this->frame;
}
public  function getimage()
{
   return $this->image;
}
public function getid_cate()
{
	return $this->id_cate;
}
public function getraiting()
{
	return $this->raiting;
}




}




?>