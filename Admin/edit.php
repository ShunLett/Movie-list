<?php include_once("partial/header.php"); ?>

<h1 class="text-center">Create New Movie</h1>

<a href="index.php" class="btn btn-outline-secondary my-2">Back to Listing</a>

<?php
  session_start();

  $error_message = '';
  $success_message = '';

  $id = $_GET["id"];

  $data = null;
  $movie_list = [];
  if (isset($_SESSION["movie-list"])) {
    $movie_list = $_SESSION["movie-list"];
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['title']) && !empty($_POST['year']) && !empty($_POST['genre']) && !empty($_POST['type'])) {
      
      $title = $_POST['title'];
      $year = $_POST['year'];
      $genre = $_POST['genre'];
      $type = $_POST['type'];
      $file = $_FILES['poster'];

      $upload_file = './images/' . $file['name'];

      move_uploaded_file(
        $file['tmp_name'],
        $upload_file,
      );

      foreach ($movie_list as $index => $movie) {
        if ($movie['id'] == $id) {
          $movie['title'] = $title;
          $movie['year'] = $year;
          $movie['genre'] = $genre;
          $movie['type'] = $type;
          $movie["poster"] = $upload_file;

          $movie_list[$index] = $movie;
          $_SESSION["movie-list"] = $movie_list;
          break;
        }
      }

      $success_message = "Record updated successfully!";
    }
    else {
      $error_message = "All fields are required!";
    }
  }
  foreach ($movie_list as $index => $movie) {
    if ($movie['id'] == $id) {
      $data = $movie;
      break;
    }
  }

?>

<form method="post" enctype="multipart/form-data">
  <div class="row my-3">
    <?php if ($error_message) { ?>
    <div class="col-12 mb-3">
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?php echo $error_message; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    </div>
    <?php } ?>
    <?php if ($success_message) { ?>
    <div class="col-12 mb-3">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $success_message; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div> 
    </div>
    <?php } ?>
    <div class="col-6 mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control" id="title" name="title" value="<?= $data['title'] ?>"/>
    </div>
    <div class="col-6 mb-3">
      <label for="year" class="form-label">Year</label>
      <input type="text" class="form-control" id="year" name="year" value="<?= $data['year'] ?>"/>
    </div>
    <div class="col-6 mb-3">
      <label for="genre" class="form-label">Genre</label>
      <input type="text" class="form-control" id="genre" name="genre" value="<?= $data['genre'] ?>"/>
    </div>
    <div class="col-6 mb-3">
      <label for="type" class="form-label">Type</label>
      <input type="text" class="form-control" id="type" name="type" value="<?= $data['type'] ?>"/>
    </div>
    <div class="col-6 mb-3">
      <label for="poster" class="form-label">Poster</label>
      <input type="file" class="form-control" id="poster" name="poster"/>
      <img src="<?= $data['poster'] ?>" width="150"/>
    </div>
    <div class="col-12">
      <input type="submit" name="submit" value="Update" class="btn btn-primary"/>
    </div>
  </div>
</form>

<?php include_once("partial/footer.php"); ?>