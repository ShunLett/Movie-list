<?php
session_start();


if (!isset($_SESSION['isAuthenticated']) || !$_SESSION['isAuthenticated']) {
    header("Location: login.php");
    exit;
}

include_once("partial/header.php");
?>

<h1 class="text-center">Movie List</h1> 
<a href="add.php" class="btn btn-outline-secondary my-2">Create New</a>
<a href="../index.php" class="btn btn-outline-secondary my-2">Back to home page</a>

<?php
$movie_list = [];
if (isset($_SESSION["movie-list"])) {
    $movie_list = $_SESSION["movie-list"];
}

echo isset($_SESSION['isAuthenticated']) ? "logged in!" : "logged out!";
?>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th scope="col">Poster</th>
            <th scope="col">Title</th>
            <th scope="col">Year</th>
            <th scope="col">Genre</th>
            <th scope="col">Type</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($movie_list as $movie) { ?>
            <tr>
                <td><img src="<?php echo $movie['poster']; ?>" width="50" /></td>
                <td><?php echo $movie['title']; ?></td>
                <td><?php echo $movie['year']; ?></td>
                <td><?php echo $movie['genre']; ?></td>
                <td><?php echo $movie['type']; ?></td>
                <td><?php echo $movie['created_at']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $movie['id']; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $movie['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php include_once("partial/footer.php"); ?>



