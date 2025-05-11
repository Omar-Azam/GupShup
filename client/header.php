<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="./"><img src="./public/icon.png" alt="logo" height="40px"> GupShup</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?php if(!isset($_GET['login']) && !isset($_GET['signup']) && !isset($_GET['ask']) && !isset($_GET['myQues'])){echo 'active';} ?>" href="./">Home</a>
        </li>
        <?php session_start() ?>
        <?php if(!isset($_SESSION['user']['name'])): ?>
        <li class="nav-item">
          <a class="nav-link <?php if(isset($_GET['login'])){echo 'active';} ?>" href="?login=true">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(isset($_GET['signup'])){echo 'active';} ?>" href="?signup=true">Sign up</a>
        </li>
        <?php else: ?>
        <li class="nav-item">
          <a class="nav-link" href="./server/requests.php?logout=true">Logout(<?php echo $_SESSION['user']['name'];?>)</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(isset($_GET['ask'])){echo 'active';} ?>" href="?ask=true">Ask a question</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(isset($_GET['myQues'])){echo 'active';} ?>" href="?myQues=true">My Quesions</a>
        </li>
        <?php endif ?>
      </ul>
      <form class="d-flex" action="" method="get" role="search">
        <input class="form-control me-2" name="search" type="search" placeholder="Search"/>
        <button class="btn btn-outline-primary" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>