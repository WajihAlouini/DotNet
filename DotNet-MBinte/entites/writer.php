<?php
class writer{ 
    private $nom;
    private $prenom;
    private $daten;
    private $img;
   
   
    function __construct($nom,$prenom,$daten,$img){
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->daten=$daten;
        $this->img=$img;
       
    }
    function getnom(){
        return $this->nom;
    }
    function getprenom(){
        return $this->prenom;
    }
   
    function getdaten(){
        return $this->daten;
    }

    function getimg(){
        return $this->img;
    }
   
    function setnom($nom){
        $this->nom=$nom;
    }
    function setprenom($prenom){
        $this->prenom=$prenom;
    }
  
    function setdaten($daten){
        $this->daten=$daten;
    }

    function setimg($img){
        $this->img=$img;
    }
   


}


?>