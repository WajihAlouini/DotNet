<?php
require 'connection.php';

try{

    $query = $pdo->prepare('SELECT * FROM accounts WHERE Name=:Name && Password=:Password');
    $query->bindParam(':Name',$_POST['log']);
    $query->bindParam(':Password',$_POST['pwd']);

    $query->execute();

    $result=$query->fetchAll();


  }catch(PDOException $e){$e->getMessage();}

  if (empty($result)){
    echo '<br> Wrong credentials';
  }else{
    echo '<br> Connected to the website';
    header('Location:index.html');}

?>