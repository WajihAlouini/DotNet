<?php
if (isset($_POST['id'])){
    
    $servername ="localhost";
    $username ="root";
    $password ="";
    $dbname="reclamation";
    try{
    $pdo=new PDO (
        "mysql:host=$servername;dbname=$dbname",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO :: ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO ::FETCH_ASSOC,
        ]
        );
        echo "Connected successfully";
    }
    catch(PDOException $e)
    {
        echo "Connection failed :" . $e ->getMessage();
    }
    
          
            try {
                $req="DELETE FROM reponse where idrep =:idrep;";
                $query = $pdo->prepare($req);
                $query->execute(['idrep'=>$_POST['id'] ]);
             } catch (PDOException $e) {
                $e->getMessage();}
        }
        header('location:join.php');
        
        ?>