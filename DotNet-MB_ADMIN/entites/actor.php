<?php

class actor{ 
    private $nom;
    private $prenom;
    private $dateN;
    private $img;
  
    function __construct($nom,$prenom,$dateN,$img){
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->dateN=$dateN;
        $this->img=$img;
     
    }
    function getnom(){
        return $this->nom;
    }
    function getprenom(){
        return $this->prenom;
    }
    function getimg(){
        return $this->img;
    }
    function getdateN(){
        return $this->dateN;
    }
  
    
    function setnom($nom){
        $this->nom=$nom;
    }
    function setprenom($prenom){
        $this->prenom=$prenom;
    }
    function setimg($img){
        $this->img=$img;
    }
    function setdateN($dateN){
        $this->dateN=$dateN;
    }
}








?>