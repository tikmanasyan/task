<?php session_start(); ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <?php if(isset($_SESSION['checked_user']) || $_COOKIE['checked_user']): ?>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Posts</a>
                </li>
                <?php if($_SESSION['checked_user'][0]['role_id'] == 1): ?>
                    
                <?php endif; ?>
            </ul>

            <div class="user-settings">
                <a href="http://task.loc/routes/web.php?action=logout" >Log out</a>
            </div>
        <?php else: ?>

         <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li> 
            </ul>

            <div class="user-account">
                <a href="http://task.loc/views/auth/login.php" >Sign in</a>
                <a href="http://task.loc/views/auth/register.php" >Sign up</a>
            </div>
            <?php endif; ?>
      
    </div>
  </div>
</nav>