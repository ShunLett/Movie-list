<?php include_once("partial/header.php");?>

<?php
$genre = isset($_GET['genre']) ? htmlspecialchars($_GET['genre']) : 'All Genres';
echo "<h1>$genre Movies</h1>";
?>
<?php include_once("partial/footer.php");?>

<div class="container my-5">
  <div class="alert alert-warning text-center" role="alert">
    Sorry!This section is currently under development. Please check back later.
  </div>
</div>

