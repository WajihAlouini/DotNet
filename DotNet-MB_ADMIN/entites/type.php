<?php
class type{ 
    private $nomt;
  
   
   
    function __construct($nomt){
        $this->nomt=$nomt;
    
       
    }
    function getnomt(){
        return $this->nomt;
    }
   
   
    function setnomt($nomt){
        $this->nomt=$nomt;
    }
   


}


?>