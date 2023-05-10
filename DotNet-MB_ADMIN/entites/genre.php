<?php

class genre{ 
    private $nomg;
    
 
  
    function __construct($nomg){
        $this->nomg=$nomg;
     
    }
    function getnomg(){
        return $this->nomg;
    }

    function setnomg($nomg){
        $this->nomg=$nomg;
    }

  
}








?>