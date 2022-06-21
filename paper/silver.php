<?php include '../config.php';?>
<!DOCTYPE HTML>
<html lang="html">
<head>
    <title>InAstronomy-Silver</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/png" href="../images/blue_small.png"/>
    <link rel="stylesheet" href="../assets/css/main.css" />
</head>
<body class="subpage">
<!-- Header -->
<header id="header">
    <a href="../index.php" class="logo"><img src="../images/inastronomy_logo_small_white.png" alt="" style="height: 100%"></a>
    <a href="#menu">SILVER</a>
</header>
<!-- Nav -->
<nav id="menu">
    <ul class="links">
        <li>
            <form action="../search.php" method="post" >
                <label>
                    <input id="search-text" type="text" name="initial-search" placeholder="Search..." autocomplete="off" onkeyup="blank()">
                </label>
                <button id="start" type="submit" name="submit" disabled="disabled"><i class="fa fa-search fa-large"></i></button>
            </form>
        </li>
        <li><a href="../index.php">Home</a></li>
        <li><a href="../blogs.php">Blogs</a></li>
        <li><a href="../papers.php">Papers</a></li>
        <li><a href="../publish.php">Publish your Paper</a></li>
        <li><a href="../about.html">About</a></li>
    </ul>
</nav>
<!-- One -->
<section id="one" class="wrapper style3" >
    <div class="inner">
        <header class="align-center">
            <div class="card2">
                <img src="../images/inastronomy_logo_big_white.png" alt="" class="big-logo">
                <hr>
                <h2>PAPERS - SILVER</h2>
            </div>
        </header>
    </div>
    <div class="row">
        <div class="left-column">
            <div class="card">
                <?php
                $sql = "SELECT * FROM papers WHERE FIND_IN_SET ('silver',pack) ORDER BY date DESC";
                $result = mysqli_query($connection, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    try {
                        $date = new DateTime($row['date']);
                    } catch (Exception $e) {}
                    echo "<div>";
                    echo "<h3>" . $row['title'] . "</h3>";
                    echo "<h4> Author(s) : " . $row['author'] . "</h4>";
                    echo "<p style='margin: 0;'> Published on ".$date->format("d F Y H:i:s")."</p>";
                    echo "<h4><a class='button' href='" . $row['url'] . "'> <b>more »</b></a></h4>";
                    echo "<hr></div>";
                }
                ?>
            </div>
        </div>
        <div class="right-column">
            <a href="../about.html">
                <div class="card7">
                    <img class="logo-img" src="../images/blue_tag_white.png" alt="inastronomy" >
                    <h3 style="text-align: center">About Us </h3>
                </div></a>
            <hr>
            <div class="card1">
                <h3 style="text-align: center; text-decoration: underline;">Recent Papers</h3>
                <ul class="w3-ul">
                    <?php
                    $sql = "SELECT * FROM papers ORDER BY date DESC LIMIT 5";
                    $result = mysqli_query($connection, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<li><a href='" . $row['url'] . " '><h4 class='w3-large'>» " . $row['title'] . "</h4><br></a></li>";
                    }
                    ?>
                </ul>
            </div><hr>
            <a href="mailto:inastronomyindia@gmail.com?Subject=Hello%20there">
                <div class="card1" style="text-align: center">
                    <h3>LET'S TALK</h3>
                    <h4>Want To Know More?<br>Write To Us...</h4>
                    <ul class="icons">
                        <li class="icon fa-envelope-o fa-2x"><span class="label">Email</span></li>
                    </ul>
                </div>
            </a>
        </div>
    </div>
</section>
<?php include_once '../footer.php'?>
<!-- Scripts -->
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/jquery.scroll-ex.min.js"></script>
<script src="../assets/js/skell.min.js"></script>
<script src="../assets/js/util.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../assets/js/search.js"></script>
</body>
</html>