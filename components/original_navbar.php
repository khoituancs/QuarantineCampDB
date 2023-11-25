<?php
  session_start();
?> 

<nav class="navbar navbar-expand-lg sticky-top navbar-light shadow-sm navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand " href="/QuarantineCampDB/index.php"><strong>Quarantine Camp Group 8</strong></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class=" collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-uppercase" href="/QuarantineCampDB/index.php?page=home">Home</a>
        </li>
        <?php if (isset($_SESSION["authenticated"])) : ?>
          <li class="nav-item">
              <a class="nav-link text-uppercase" href="/QuarantineCampDB/index.php?page=search_patient">Search</a>
          </li>
          <li class="nav-item">
              <a class="nav-link text-uppercase" href="/QuarantineCampDB/index.php?page=insert_patient">Insert</a>
          </li>          
        <?php else : ?>
          <li class="nav-item">
            <a class="nav-link text-uppercase" href="/QuarantineCampDB/index.php?page=login">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-uppercase" href="/QuarantineCampDB/index.php?page=register">Register</a>
          </li>
        <?php endif; ?>
      </ul>

      <?php  if (isset($_SESSION["authenticated"])) : ?>
          <p1 class="d-flex text-white ms-auto"><?php  echo $_COOKIE["user"] . ", " . "level: " . $_COOKIE["userlevel"] ?></p1>
      <?php endif; ?>
    </div>
  </div>
</nav>
