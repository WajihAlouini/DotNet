<?php
$servername = 'localhost';
$username = 'root';
$password ='';
$dbname = 'forum';
try {
    $pdo = new PDO(
        "mysql: host=$servername; dbname=$dbname",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC
        ]
    );
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: ". $e->getMessage();
}

if(isset($_POST['title'])) {
    $title=$_POST['title'];
    
    $req="DELETE FROM FORUM WHERE title='$title';";
    $stmt = $pdo->prepare($req);
    if($stmt->execute()){
        echo "Deleted successfully";
    } else {
        echo "erreur";
    }
} else {
    echo "Missing input data";
}

?>
