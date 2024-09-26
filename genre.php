<?php
session_start();
include_once("partial/header.php");

$selected_genre = isset($_GET['genre']) ? ucfirst($_GET['genre']) : null;

$movie_list = isset($_SESSION['movie-list']) ? $_SESSION['movie-list'] : [];
?>

<div class="container-fluid custom-bg custom-text py-5">
    <div class="container">
        <h1 class="text-center"><?= $selected_genre ? "$selected_genre Movies" : "All Movies" ?></h1>

        <?php
        if ($selected_genre) {
            $filtered_movies = [];
            foreach ($movie_list as $movie) {
                if (strtolower($movie['genre']) === strtolower($selected_genre)) {
                    $filtered_movies[] = $movie;
                }
            }

            if (count($filtered_movies) > 0) {
                echo '<div class="row my-3">';
                foreach ($filtered_movies as $movie) {
                    ?>
                    <div class="col-3 mb-3">
                        <div class="card" style="width: 18rem;">
                            <img src="admin/<?= $movie['poster'] ?>" class="card-img-top" alt="Img">
                            <div class="card-body">
                                <h5 class="card-title"><?= $movie['title'] ?></h5>
                                Year: <?= ucfirst($movie['year']) ?><br/>
                                Genre: <?= ucfirst($movie['genre']) ?><br/>
                                Type: <?= ucfirst($movie['type']) ?><br/>
                                Status: <?= ucfirst($movie['status']) ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                echo '</div>';
            } else {
                // If no movies match the genre
                echo '<div class="alert alert-warning text-center" role="alert">';
                echo "No movies found for this genre.";
                echo '</div>';
            }
        } else {
            echo '<div class="alert alert-warning text-center" role="alert">';
            echo "Please select a genre from the dropdown.";
            echo '</div>';
        }
        ?>
    </div>
</div>

<?php include_once("partial/footer.php"); ?>
