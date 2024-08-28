<?php
  session_start();
  include_once("partial/header.php");
?>

<div class="container-fluid custom-bg custom-text py-2">
    <div class="container">
        <h1 class="text-center mb-4">Movies</h1>

        <div class="row my-3">
          <?php
            $movie_list = isset($_SESSION["movie-list"]) ? $_SESSION["movie-list"] : [];

            $filtered_movies = array_filter($movie_list, function($movie) {
              return strtolower($movie['type']) === 'movie';
            });

            foreach($filtered_movies as $movie) {
          ?>
          <div class="col-3 mb-3">
            <div class="card" style="width: 18rem;">
              <img src="admin/<?= $movie['poster'] ?>" class="card-img-top" alt="Img">
              <div class="card-body">
                <h5 class="card-title"><?= $movie['title'] ?></h5>
                Year: <?= $movie['year'] ?><br/>
                Genre: <?= $movie['genre'] ?><br/>
                Type: <?= $movie['type'] ?>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
    </div>
</div>

<?php include_once("partial/footer.php"); ?>

