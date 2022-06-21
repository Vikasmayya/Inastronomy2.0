<?php
  if (!isset($_SERVER['HTTP_REFERER'])){
      header('location:index.php');
  }
?><!DOCTYPE HTML>
<html lang="html">
<head>
    <title>InAstronomy-Downloads</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/png" href="images/blue_small.png" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>
<body class="subpage">
<!-- Header -->
<header id="header">
    <a href="index.php" class="logo"><img src="images/inastronomy_logo_small_white.png" alt="" style="height: 100%"></a>
    <a href="#menu">PAPER</a>
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
                <h2>PAPER</h2>
            </div>
        </header>
    </div>
    <div class="card">
        <?php
        include 'config.php';
        $queryId = isset($_GET['url']) ? $_GET['url'] : '' ;
        if (isset($queryId)){
        $id = mysqli_real_escape_string($connection, $_GET['url']);
        $sql = "SELECT * FROM papers WHERE url='$id'";
        $result = mysqli_query($connection, $sql);
        while ($row = mysqli_fetch_array($result)) {
            try {
                $date = new DateTime($row['date']);
            } catch (Exception $e) {
            }
            echo "<div class='align-center'>";
            echo "<h2>Your order for the paper is confirmed. The details of your order is as follows:</h2>";
            echo "<div class='card2'>";
            echo "<div class='card1'>";
            echo "<h2>" . $row['title'] . "</h2>";
            echo "<h4> Author(s) : " . $row['author'] . "</h4>";
            echo "<p style='margin: 0;'> Published on ".$date->format("d F Y H:i:s")."</p>";
            echo "</div>";
            echo "<h2>Our team will contact you within 24 hours regarding the delivery of your order. Please make sure you check your inbox and call logs at proper intervals.</h2>";
            echo "</div>";
            echo "</div>";
        }
        }
        ?>
    </div>
</section>
<!-- Footer -->
<footer id="footer">
    <div class="container">
        <ul class="icons">
            <li><a href="https://twitter.com/InAstronomy1" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="https://www.facebook.com/inastronomy" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
            <li><a href="https://www.instagram.com/inastronomy/" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
            <li><a href="mailto:inastronomyindia@gmail.com?Subject=Hello%20again" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
        </ul>
    </div>
    <div class="copyright">
        Made with love at InAstronomy <br> &copy; 2020 Vikas Mayya. All rights reserved.
    </div>
</footer>
<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.scroll-ex.min.js"></script>
<script src="assets/js/skell.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
