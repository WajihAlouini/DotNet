

<?php
            require 'connection.php';
            try{
             $query=$pdo->prepare('INSERT INTO reponse (idrep,idrec,iduser,reponse) VALUES(:idrep,:idrec,:iduser,:reponse)');
             $query->bindParam(':idrep',$_POST['idrep']);
             $query->bindParam(':idrec',$_POST['idrec']);
             $query->bindParam(':iduser',$_POST['iduser']);
             $query->bindParam(':reponse',$_POST['reponse']);
             
             
             $query->execute();
            }catch(PDOException $e)
            {
                $e->getMessage();
            }
            try {
                $query = $pdo->prepare('SELECT * FROM reponse JOIN reclamation ON reponse.idrec = reclamation.idrec');
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
                <td>IDREC</td>
                <td>IDUSER</td>
                <td>reponse</td>
                <td>supprimer</td>
                    </tr>
                    <?php
                    foreach($result as $rec){
                        ?>
                <tr>
                <td><?= $rec['idrep']?></td>
                <td><?= $rec['idrec']?></td>
                <td><?= $rec['iduser']?></td>
                <td><?= $rec['reponse']?></td>
                <td><form action="deletereponse.php" method="POST">
                    <input type="submit" value="supprimer">
                    <input type="hidden" name="id" value="<?=
                    $rec['idrep']?>">
                </form></td>
                </tr>
                <?php
                    }
                    ?>
                    </table>

