<?php

class movie{ 
    private $nom;
    private $DescF;
    private $trailer;
    private $UrlF;
    private $duree;
    private $Released;
    private $imgF;



  
    function __construct($nom,$DescF,$trailer,$UrlF,$duree,$Released,$imgF){
        $this->nom=$nom;
        $this->DescF=$DescF;
        $this->trailer=$trailer;
        $this->UrlF=$UrlF;
        $this->duree=$duree;
        $this->Released=$Released;

    }
    function getnom(){
        return $this->nom;
    }
    function getDescF(){
        return $this->DescF;
    }
    function gettrailer(){
        return $this->trailer;
    }
    function getUrlF(){
        return $this->UrlF;
    }
    function getduree(){
        return $this->duree;
    }
    function getReleased(){
        return $this->Released;
    }
    function getimgF(){
        return $this->imgF;
    }

    

  
    
    function setnom($nom){
        $this->nom=$nom;
    }
    function setDescF($DescF){
        $this->DescF=$DescF;
    }
    function settrailer($trailer){
        $this->trailer=$trailer;
    }
    function setUrlF($UrlF){
        $this->UrlF=$UrlF;
    }
    function setduree($duree){
        $this->duree=$duree;
    }
    function setReleased($Released){
        $this->Released=$Released;
    }
    function setimgF($imgF){
        $this->imgF=$imgF;
    }
  
}








?>