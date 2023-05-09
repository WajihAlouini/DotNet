
<?php
            require 'connection.php';
            try{
             $query=$pdo->prepare('INSERT INTO reclamation (idrec,numrec,titrerec,description,iduser,status) VALUES(:idrec,:numrec,:titrerec,:description,:iduser,"not done")');
             $query->bindParam(':idrec',$_POST['idrec']);
             $query->bindParam(':numrec',$_POST['numrec']);
             $query->bindParam(':titrerec',$_POST['titrerec']);
             $query->bindParam(':description',$_POST['description']);
             $query->bindParam(':iduser',$_POST['iduser']);
             
             $query->execute();
            }catch(PDOException $e)
            {
                $e->getMessage();
            }
            try {
                $query = $pdo->prepare('SELECT * FROM reclamation');
                 $query->execute();
                $result = $query->fetchALL();
            }catch (PDOException $e) {
                $e-›getMessage ();
            }
                /*foreach ($result as $row){
                echo $row['nom'] . ' ' . $row['prenom'];
                }*/

        ?>
        <Style>
        body {
  background-color: #141414;
  font-family: Arial, sans-serif;
  color: #FFFFFF;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
}

h1 {
  font-size: 36px;
  font-weight: bold;
  margin-bottom: 20px;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
}

th, td {
  text-align: left;
  padding: 10px;
  border-bottom: 1px solid #FFFFFF;
}

th {
  background-color: #E50914;
}

tr:nth-child(even) {
  background-color: #222222;
}

tr:hover {
  background-color: #333333;
}

input[type="submit"] {
  background-color: #E50914;
  border: none;
  color: #FFFFFF;
  padding: 10px 20px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #BF0812;
}
            </style>
        <pre>
            
            </pre>
            <table border = 1>
                <tr>
                <td>ID</td>
                <td>numrec</td>
                <td>titrerec</td>
                <td>description</td>
                <td>iduser</td>
                <td>status</td>
                <td>supprimer</td>
                    </tr>
                    <?php
                    foreach($result as $rec){
                        ?>
                <tr>
                <td><?= $rec['idrec']?></td>
                <td><?= $rec['numrec']?></td>
                <td><?= $rec['titrerec']?></td>
                <td><?= $rec['description']?></td>
                <td><?= $rec['iduser']?></td>
                <td><?= $rec['status']?></td>
                <td><form action="deletereclamation.php" method="POST">
                    <input type="submit" value="supprimer">
                    <input type="hidden" name="id" value="<?=
                    $rec['idrec']?>">
                </form></td>
                </tr>
                <?php
                    }
                    ?>
                    </table>

