<!DOCTYPE HTML>
<html lang="html">
<head>
    <title>Publish Your Paper</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/png" href="images/blue_small.png" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>
<body class="subpage">
<!-- Header -->
<header id="header">
    <a href="index.php" class="logo"><img src="images/inastronomy_logo_small_white.png" alt="" style="height: 100%"></a>
    <a href="#menu">PUBLISH </a>
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
                <h2>PUBLISH YOUR PAPER</h2>
            </div>
        </header>
    </div>
    <div class="row">
        <div class="left-column">
            <div class="card6">
                <h2 style="text-decoration: underline; text-align: center;">Diamond Pack</h2>
                <h3>» Publish at just Rs 860/-</h3>
                <h3>» Your paper valuation can go anywhere between Rs 1,00,000/- to Rs 1,00,00,000/-</h3>
                <h3>» You will have the chance to work with INASTRONOMY.</h3>
                <h3>» You can host events with INASTRONOMY related to your field or on based on your research paper.</h3>
                <h3>» You can write blogs related to your field or on based on your research paper on INASTRONOMY Website.</h3>
                <h3>» For more information <a href="paper/Terms%20and%20conditions.pdf" style="text-decoration: underline" target="_blank">click here.</a></h3>
                <label><input onchange="document.getElementById('terms').disabled = !this.checked" type="checkbox" checked="checked">By clicking you agree to our <a href="paper/Terms%20and%20conditions.pdf" style="text-decoration: underline" target="_blank">terms & privacy</a></label>
                <form action="Diamond.html" method="post">
                <button id="terms"><b>publish</b></button>
                </form>
            </div>
            <div class="card6">
                <h2 style=" text-decoration: underline; text-align: center; ">Gold Pack</h2>
                <h3>» Publish at just Rs 601/-</h3>
                <h3>» Your paper valuation can go anywhere between Rs 10,000/- to Rs 1,00,000/-</h3>
                <h3>» You will have the chance to work with INASTRONOMY.</h3>
                <h3>» You can write blogs related to your field or on based on your research paper on INASTRONOMY Website.</h3>
                <h3>» For more information <a href="paper/Terms%20and%20conditions.pdf" style="text-decoration: underline" target="_blank">click here.</a></h3>
                <label>
                    <input onchange="document.getElementById('terms1').disabled = !this.checked" type="checkbox" checked="checked">By clicking you agree to our<a href="paper/Terms%20and%20conditions.pdf" style="text-decoration: underline" target="_blank"> terms & privacy</a>
                </label>
                <form action="Golden.html" method="post">
                    <button id="terms1"><b>publish</b></button>
                </form>
            </div>
            <div class="card6">
                <h2 style=" text-decoration: underline; text-align: center">Silver Pack</h2>
                <h3>» Publish at just Rs 86/-</h3>
                <h3>» Your paper valuation can go anywhere between Rs 1,000/- to Rs 10,000/-</h3>
                <h3>» You will have the chance to work with INASTRONOMY</h3>
                <h3>» For more information <a href="paper/Terms%20and%20conditions.pdf" style="text-decoration: underline" target="_blank">click here.</a></h3>
                <label>
                    <input onchange="document.getElementById('terms2').disabled = !this.checked" type="checkbox" checked="checked">By clicking you agree to our<a href="paper/Terms%20and%20conditions.pdf" style="text-decoration: underline" target="_blank"> terms & privacy</a>
                </label>
                <form action="Silver.html" method="post">
                    <button id="terms2"><b>publish</b></button>
                </form>
            </div>
        </div>
        <div class="right-column">
            <a href="about.html">
                <div class="card7">
                    <img class="logo-img" src="images/blue_tag_white.png" alt="" >
                    <h3 style="text-align: center">About Us </h3>
                </div></a>
            <hr>
            <div class="card1">
                <h3 style="text-decoration: underline; text-align: center">Recent Papers</h3>
                <ul class="w3-ul">
                    <?php
                    include 'config.php';
                    $sql = "SELECT * FROM papers ORDER BY date DESC LIMIT 5";
                    $result = mysqli_query($connection, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<li><a href='paper/" . $row['url'] . "'>";?>
                  <?php echo "<h4 class='w3-large'>» " . $row['title'] . "</h4><br>";
                        echo "</a>";
                        echo "</li>";
                    }
                    ?>
                </ul>
            </div>
            <hr>
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
    </div><hr>
</section>
<!-- Footer -->
<?php include_once 'footer.php'?>
</body>
</html>