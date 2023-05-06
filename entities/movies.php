<?PHP
class movies{ 
    private $reference;
    private $title;
    private $description;
    private $genre;
    private $trailer;
    private $duration;
    private $img;
    function __construct($reference,$title,$description,$genre,$trailer,$duration,$img){
        $this->reference=$reference;
        $this->title=$title;
        $this->description=$description;
        $this->genre=$genre;
        $this->trailer=$trailer;
        $this->duration=$duration;
        $this->img=$img;
    }
    function getreference(){
        return $this->reference;
    }
    function gettitle(){
        return $this->title;
    }
    function getdescription(){
        return $this->description;
    }
    function getgenre(){
        return $this->genre;
    }
    function gettrailer(){
        return $this->trailer;
    }
    function getduration(){
        return $this->duration;
    }
    function getimg(){
        return $this->img;
    }
    function setreference($reference){
        $this->reference=$reference;
    }
    function settitle($title){
        $this->title=$title;
    }
    function setdescription($description){
        $this->description=$description;
    }
    function setgenre($genre){
        $this->genre=$genre;
    }
    function settrailer($trailer){
        $this->trailer=$trailer;
    }
    function setduration($duration){
        $this->duration=$duration;
    }
    function setimg($img){
        $this->img=$img;
    }


}

?>