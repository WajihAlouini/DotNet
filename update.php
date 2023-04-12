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

if(isset($_POST['title']) && isset($_POST['des']) && isset($_POST['name'])) {
    $title=$_POST['title'];
    $des=$_POST['des'];
    $name=$_POST['name'];
    
    
    $req="UPDATE FORUM SET des='$des', name='$name' WHERE title='$title';";
    $stmt = $pdo->prepare($req);
    if($stmt->execute()){
        echo "Updated successfully";
    } else {
        echo "erreur";
    }
} else {
    echo "Missing input data";
}

?>
