<?php
  session_start(); 
  include_once('partial/header.php');
?>

<div class="container-fluid custom-bg custom-text py-5">  
    <div class="container">
        <div class="row my-3">
          <?php
            $movie_list = [];
            if (isset($_SESSION["movie-list"])) {
              $movie_list = $_SESSION["movie-list"];
            }

            if (isset($_GET['title'])) {
              $title = $_GET['title'];
              
              $filtered_movies = [];
              foreach ($movie_list as $movie) {
                if (stripos($movie['title'], $title) !== false) {
                  $filtered_movies[] = $movie;
                }
              }

              if (count($filtered_movies) > 0) {
                $movie_list = $filtered_movies;
              }
            }

            foreach ($movie_list as $movie) {
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
          <?php } ?>
        </div>
    </div>
</div>

<?php include_once('partial/footer.php'); ?>
