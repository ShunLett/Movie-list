<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Movie List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      body {
        background-color: #f8f9fa; 
      }

      .navbar-custom {
        background-color: #0056b3; 
      }

      .navbar-custom .nav-link, .navbar-custom .navbar-brand {
        color: #ffffff;
      }

      .navbar-custom .nav-link:hover, .navbar-custom .navbar-brand:hover {
        color: #cce5ff; 
      }

      .dropdown-menu {
        background-color: #0056b3; 
      }

      .dropdown-item {
        color: #ffffff; 
      }

      .dropdown-item:hover {
        background-color: #cce5ff; 
      }

      .search-bar {
        background-color: #ffffff; 
        border: 1px solid #0056b3; 
        color: #0056b3; 
      }

      .search-bar::placeholder {
        color: #0056b3; 
      }

      .search-bar:focus {
        border-color: #003d7a; 
        box-shadow: none;
      }

      .custom-bg {
          background-color: #0056b3; 
      }
      .custom-text {
          color: #ffffff; 
      }
</style>

    </style>
  </head>
  <body>
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container d-flex flex-wrap align-items-center">
          <a href="index.php" class="navbar-brand">ShunMovies</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
            <li class="nav-item"><a href="index.php" class="nav-link active" style="color: #ffffff; background-color: #0056b3;">Home</a></li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" id="genreDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Genre</a>
                <ul class="dropdown-menu" aria-labelledby="genreDropdown">
                  <li><a class="dropdown-item" href="genre.php?genre=Action">Action</a></li>
                  <li><a class="dropdown-item" href="genre.php?genre=Animation">Animation</a></li>
                  <li><a class="dropdown-item" href="genre.php?genre=Comedy">Comedy</a></li>
                  <li><a class="dropdown-item" href="genre.php?genre=Horror">Horror</a></li>
                  <li><a class="dropdown-item" href="genre.php?genre=Mystery">Mystery</a></li>
                  <li><a class="dropdown-item" href="genre.php?genre=Romance">Romance</a></li>
                  <li><a class="dropdown-item" href="genre.php?genre=Sci-fi">Sci-Fi</a></li>
                  <li><a class="dropdown-item" href="genre.php?genre=Thriller">Thriller</a></li>
                </ul>
              </li>
              <li class="nav-item"><a href="movies.php" class="nav-link">Movies</a></li>
              <li class="nav-item"><a href="series.php" class="nav-link">Series</a></li>
              <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
            </ul>
            <form class="d-flex ms-3" method="get" action="index.php">
              <input name="title" type="text" class="form-control search-bar" placeholder="Search by Title...">
              <button class="btn btn-outline-light ms-2" type="submit">Search</button>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item"><a href="admin/login.php" class="nav-link">Login</a></li>
            </ul>
          </div>
        </div>
      </nav>
      <header class="py-3 mb-4 border-bottom">
      </header>
    </div>
    <div class="container">