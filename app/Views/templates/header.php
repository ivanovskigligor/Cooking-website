<html>

<head>
  <title>Cooking Website</title>
  <link rel="stylesheet" href="https://bootswatch.com/5/sandstone/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
  </link>
  <link href="css/styles.css" rel="stylesheet" />
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?php echo base_url(); ?>">Cheap Eats</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarColor02">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>">Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>/posts">Posts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>/about">About</a>
          </li>

        </ul>

        <ul class="navbar-nav ms-auto">
          <?php
          if (!session()->get('isLoggedIn')) {
            echo '<li class="nav-item">
                                <a class="nav-link" href="/signin" id= "pagesText">Login</a>
                                  </li>';
            echo '<li class="nav-item">
                                <a class="nav-link" href="register" id= "pagesText">Register</a>
                                  </li>';
          } else {
            echo '<li class="nav-item">
                                <a class="nav-link" href="/profile" id= "pagesText"><i class="fa-solid fa-user" id= "pagesText"></i> Profile</a>
                                  </li>';
            echo '<li class="nav-item">
                                <a class="nav-link" href="/logout" id= "pagesText"><i class="fa-solid fa-right-from-bracket" id= "pagesText"></i> Logout</a>
                                  </li>';
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <br>
    <div>
      <form class="d-flex" <?php $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                            echo $actual_link;
                            if ($actual_link === "http://localhost:8080/posts") : ?> hidden>
        <input id="textarea2" class="form-control me-sm-2" type="text" placeholder="Search" type="search">
        <button id="searchButton" class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        <?php endif ?>>
    </div>
    </form>