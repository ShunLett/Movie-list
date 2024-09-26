<?php include_once("partial/header.php");?>

<h1 class="text-center">Create New Movie</h1>
<a href="index.php" class="btn btn-outline-secondary my-2">Back to Listing</a>

<?php
session_start();

$error_message = '';
$success_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['title']) && !empty($_POST['year']) && !empty($_POST['genre']) && !empty($_POST['type']) && !empty($_POST['status'])) {
        
        $title = $_POST['title'];
        $year = $_POST['year'];
        $genre = $_POST['genre'];
        $type = $_POST['type'];
        $status = $_POST['status'];
        $file = $_FILES['poster'];

        $upload_file = './images/' . $file['name'];

        move_uploaded_file(
            $file['tmp_name'],
            $upload_file,
        );

        $movie = [
            "id" => time(),
            "title" => $title,
            "year" => $year,
            "genre" => $genre,
            "type" => $type,
            "status" => $status,
            "poster" => $upload_file,
            "created_at" => date("Y-m-d h:iA"),
        ];

        $_SESSION['movie-list'][] = $movie;

        $success_message = "Record created successfully!";
    } else {
        $error_message = "All fields are required!";
    }
}
?>
<form action="add.php" method="post" enctype="multipart/form-data">
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
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="col-6 mb-3">
            <label for="year" class="form-label">Year</label>
            <input type="text" class="form-control" id="year" name="year">
        </div>
        <div class="col-6 mb-3">
            <label for="genre" class="form-label">Genre</label>
            <select class="form-select" id="genre" name="genre">
                <option value="" disabled selected>Select Genre</option>
                <option value="action">Action</option>
                <option value="animation">Animation</option>
                <option value="comedy">Comedy</option>
                <option value="horror">Horror</option>
                <option value="mystery">Mystery</option>
                <option value="romance">Romance</option>
                <option value="sci-fi">Sci-Fi</option>
                <option value="thriller">Thriller</option>
            </select>
        </div>
        <div class="col-6 mb-3">
            <label for="type" class="form-label">Type</label>
            <select class="form-select" id="type" name="type">
                <option value="" disabled selected>Select Type</option>
                <option value="movie">Movie</option>
                <option value="series">Series</option>
            </select>
        </div>
        <div class="col-6 mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status">
                <option value="" disabled selected>Select Status</option>
                <option value="watched">Watched</option>
                <option value="to watch">To Watch</option>
            </select>
        </div>
        <div class="col-6 mb-3">
            <label for="poster" class="form-label">Poster</label>
            <input type="file" class="form-control" id="poster" name="poster">
        </div>
        <div class="col-12">
            <input type="submit" name="submit" value="Create" class="btn btn-primary"/>
        </div>
    </div>
</form>

<?php include_once("partial/footer.php");?>
