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

