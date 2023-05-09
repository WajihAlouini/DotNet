<?php
                            include "/core/movieC.php";
                            $movie1C=new movieC();
                            $listemovie=$movie1C-> Affichermovies();
                        
                            ?>
                            <table border="1"  id="example1" class="table table-striped">
<tr>
<th> title</th>
<th> description </th>
<th> genre </th>
<th>  trailer </th>
<th> duration </th>
<th>img</th>
<th>Modifier</th>
</tr>

<?PHP
foreach($listeoffre as $row)
{
    ?>
    <tr>
    <td><?PHP echo $row['title']; ?></td>
    <td><?PHP echo $row['description']; ?></td>
    <td><?PHP echo $row['genre']; ?></td>
    <td><?PHP echo $row['nouvprix']; ?></td>
    <td><?PHP echo $row['dateoffre']; ?></td>
    <td><form method="POST" action="supprimeroffre.php">
    <input type="submit" name="supprimer" value="supprimer">
    <input type="hidden" value="<?PHP echo $row['numoffre']; ?>" name="numoffre">
    </form>
    </td>
    <td><a href="modifieroffrek.php?numoffre=<?PHP echo $row['numoffre']; ?>">
    Modifier</a></td>
    </tr>
    <?PHP
}
?>
</table>