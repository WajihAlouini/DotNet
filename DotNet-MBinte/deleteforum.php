<?php
session_start(); 

require 'connectionforum.php';

try {
    $req = "DELETE FROM forum WHERE title = :title";
    $query = $pdo->prepare($req);
    $query->execute(['title' => $_POST['title']]);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

header('location:indexforum.php');
?>
