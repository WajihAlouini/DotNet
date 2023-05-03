<?php

if(isset($_POST['id'])){
    require "connection.php";
    
    

  
   
    
    try{
    
        $query = $pdo->prepare('UPDATE accounts
        SET Name = :Name,  Email=:Email
        WHERE User_id=:id;');
        $query->bindParam(':Name',$_POST['name']);
        $query->bindParam(':Email',$_POST['Email']);
        $query->bindParam(':id',$_POST['id']);
    
        $query->execute();
    
        
    
    
      }catch(PDOException $e){$e->getMessage();}
}
header('location:user.php');
    
    ?>


   
   



            
  
