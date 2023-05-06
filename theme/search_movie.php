<table class="data-tables table movie_table " id="movie-table" style="width:100%">
    <thead>
        <tr>
            <th>Image & Nom</th>
            <th>Description</th>
            <th>Trailer URl</th>
            <th>Movie Url</th>
            <th>Duration</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include "../core/MovieC.php";
        $movie1C = new MovieC();

        // Check if the search query is set and not empty
        if (isset($_GET['q']) && !empty($_GET['q'])) {
            $searchQuery = $_GET['q'];
            // Search for movies with the input query
            $listemovie = $movie1C->searchMovie($searchQuery);

        } else {
            // Retrieve all movies if the search query is empty
            $listemovie = $movie1C->Affichermovie();
        }

        // Update the movie table rows with the searched movie results
        foreach ($listemovie as $row) {
            ?>
            <tr>
                <td>
                    <div class="media align-items-center">
                        <div class="iq-movie">
                            <a href="javascript:void(0);"><img src="uploads/<?php echo $row['imgs']; ?>" class="img-border-radius avatar-40 img-fluid" alt=""></a>
                        </div>
                        <div class="media-body text-white text-left ml-3">
                            <p class="mb-0"><?php echo $row['nom']; ?></p>
                            <small><?php echo $row['genre_name']; ?></small>
                        </div>
                    </div>
                </td>
                <td>
                    <p><?php echo $row['DescF']; ?></p>
                </td>
                <td>
                    <p><?php echo $row['trailer']; ?></p>
                </td>
                <td>
                    <p><?php echo $row['UrlF']; ?></p>
                </td>
                <td>
                    <p><?php echo $row['duree']; ?> min</p>
                </td>
                <td>
                    <div class="flex align-items-center list-user-action">
                        <a class="iq-bg-warning" data-toggle="tooltip" data-placement="top" title="" data-original-title="View" href="#"><i class="fa-solid fa-eye"></i></a>
                        <a class="iq-bg-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="moviesupd.php?id=<?php echo $row['id']; ?>"><i class="ri-pencil-line"></i></a>
                        <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="Delete" href="#" onclick="submitForm()">
                            <i class="ri-delete-bin-line"></i>
                            <form id="deleteForm_<?php echo $row['id']; ?>" method="POST" action="deletemovie.php">
                                <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
                            </form>
                        </a>
                        <script>
                            function submitForm() {
                                document.getElementById('deleteForm_<?php echo $row['id']; ?>').submit();
                            }
                        </script>
                    </div>
                </td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>

