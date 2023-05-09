<?php

class Book{ 
    private $nomB;
    private $DescB;
    private $UrlB;
    private $duree;
    private $Released;
    private $imgB;




    function __construct($nomB,$DescB,$UrlB,$duree,$Released,$imgB){
        $this->nomB=$nomB;
        $this->DescB=$DescB;
        $this->UrlB=$UrlB;
        $this->duree=$duree;
        $this->Released=$Released;

    }
    function getnomB(){
        return $this->nomB;
    }
    function getDescB(){
        return $this->DescB;
    }
   
    function getUrlB(){
        return $this->UrlB;
    }

    function getduree(){
        return $this->duree;
    }

    function getReleased(){
        return $this->Released;
    }

    function getimgB(){
        return $this->imgB;
    }





    function setnomB($nomB){
        $this->nomB=$nomB;
    }
    function setDescB($DescB){
        $this->DescB=$DescB;
    }
   
    function setUrlB($UrlB){
        $this->UrlB=$UrlB;
    }

    function setduree($duree){
        $this->duree=$duree;
    }
  
    function setReleased($Released){
        $this->Released=$Released;
    }
    function setimgB($imgB){
        $this->imgB=$imgB;
    }

}








?>
