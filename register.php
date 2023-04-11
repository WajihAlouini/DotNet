<?php
require 'connection.php';

try{

    $query = $pdo->prepare('INSERT INTO login (Name,Password) Values (:Name,:password)');
    $query->bindParam(':Name',$_POST['user_login']);
    $query->bindParam(':password',$_POST['pass2']);
    $query->execute();

    header('Location:log-in.html');

  }catch(PDOException $e){$e->getMessage();}



?>