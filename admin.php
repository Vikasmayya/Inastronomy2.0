<?php
session_start();
?>
<!DOCTYPE HTML>
<html lang="html">
<head>
    <title>InAstronomy-Admin Panel</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/png" href="images/blue_small.png" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>
<body class="subpage">
<!-- Header -->
<header id="header">
    <a href="index.php" class="logo"><img src="images/inastronomy_logo_small_white.png" alt="" style="height: 100%"></a>
    <a href="#menu">ADMIN</a>
</header>
<!-- Nav -->
<nav id="menu">
    <ul class="links">
        <li>
            <form action="search.php" method="post" >
                <label>
                    <input id="search-text" type="text" name="initial-search" placeholder="Search..." autocomplete="off" onkeyup="blank()">
                </label>
                <button id="start" type="submit" name="submit" disabled="disabled"><i class="fa fa-search fa-large"></i></button>
            </form>
        </li>
        <li><a href="index.php">Home</a></li>
        <li><a href="blogs.php">Blogs</a></li>
        <li><a href="papers.php">Papers</a></li>
        <li><a href="publish.php">Publish your Paper</a></li>
        <li><a href="about.html">About</a></li>
    </ul>
</nav>
<!-- One -->
<section id="one" class="wrapper style3" >
    <div class="inner">
        <header class="align-center">
            <div class="card2">
                <img src="images/inastronomy_logo_big_white.png" alt="" class="big-logo">
                <hr>
                <h2>ADMIN LOGIN</h2>
            </div>
        </header>
    </div>
    <div class="card2">
      <form method="post"  action="login.php" onsubmit="return validateForm()" name="login-form">
            <div>
               <label for="email" class="pass">Email</label><br>
               <input type="text" id="email" placeholder="Enter Email" autocomplete="off" name="UserName"><br>
               <label for="pwd" class="pass">Password</label><br>
               <input type="password" id="pwd" placeholder="Enter Password" autocomplete="off" name="Password"><br>
               <label><input type="checkbox" onclick="myFunction()">Show Password</label>
                <div class="align-center" >
                    <button name="enter" onClick="validate()" type="submit"><b>Login</b></button>
                </div>
            </div>
          <div class="alert">
          <?php
            if (isset($_SESSION['error'])){
                $error = $_SESSION['error'];
                echo "<h3>$error</h3>";
            }
          ?>
          </div>
      </form>
    </div>
</section>
<?php include_once 'footer.php'?>
<script src="assets/js/login.js"></script>
</body>
</html>
<?php
unset($_SESSION['error']);
?>