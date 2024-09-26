<?php
  session_start();
  include_once("partial/header.php");
?>

<div class="container-fluid custom-bg custom-text py-2">
    <div class="container">
        <h1 class="text-center mb-4">Series</h1>

        <div class="row my-3">
          <?php
            $movie_list = isset($_SESSION["movie-list"]) ? $_SESSION["movie-list"] : [];

            $filtered_series = array_filter($movie_list, function($movie) {
              return strtolower($movie['type']) === 'series';
            });

            foreach($filtered_series as $movie) {
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

<?php include_once("partial/footer.php"); ?>






