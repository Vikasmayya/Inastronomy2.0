<!DOCTYPE HTML>
<html lang="html">
 <head>
    <title>InAstronomy Search</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/png" href="images/blue_small.png"/>
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" />
 </head>
 <body class="subpage">
 <!-- Header -->
 <header id="header" class="header" >
     <a href="index.php" class="logo"><img src="images/inastronomy_logo_small_white.png" alt="" style="height: 100%"></a>
    <a href="#menu">SEARCH</a>
 </header>
 <!-- Nav -->
 <nav id="menu">
    <ul class="links">
        <li><a href="index.php">Home</a></li>
        <li><a href="blogs.php">Blogs</a></li>
        <li><a href="papers.php">Papers</a></li>
        <li><a href="publish.php">Publish your Paper</a></li>
        <li><a href="about.html">About</a></li>
    </ul>
 </nav>
  <section id="one" class="wrapper style3" >
     <article>
        <div class="inner">
          <header class="align-center">
            <div class="card2">
                <img src="images/inastronomy_logo_big_white.png" alt="" class="big-logo">
                <hr>
                <h2>SEARCH</h2>
            </div>
          </header>
        </div>
        <form action="search.php" method="get">
            <label>
                <input id="search-box" type="text" placeholder="Search.." autocomplete="OFF" name="search">
            </label>
            <button id="searchButton" type="submit" name="submit-search"><i class="fa fa-search"></i></button>
        </form>
     </article>
    <?php
    include 'config.php';
    if (isset($_GET['submit-search'])){
        $search = mysqli_real_escape_string($connection,$_GET['search']);
        $sql = "(SELECT url, title, author, 'n' as papers FROM papers WHERE title LIKE '%" . $search . "%' OR author LIKE '%" . $search . "%')
          UNION (SELECT blog_id, title, author, 'b' as papers FROM blogs WHERE title LIKE '%" . $search . "%' OR author LIKE '%" . $search . "%')";
        $result = mysqli_query($connection, $sql);
        $queryResults = mysqli_num_rows($result);
        echo "<div class='card5'>";
        echo "<h3>There are ".$queryResults." results!</h3>";
        echo "</div>";
        if ($queryResults > 0) {
            while ($row = mysqli_fetch_assoc($result)){
                if($row['papers'] == 'n'){
                    $n_id    = $row['url'];
                    echo "<div>";
                    echo "<a href=paper/$n_id><h3>".$row['title']."</h3></a>";
                    echo "<p>Author : ".$row['author']."</p>";
                    echo "</div><hr>";
                }
                elseif ($row['papers'] == 'b'){
                    $b_id    = $row['url'];
                    echo "<div>";
                    echo "<a href=blog.php?blog_id=$b_id><h3>".$row['title']."</h3></a>";
                    echo "<p>Author : ".$row['author']."</p>";
                    echo "</div><hr>";
                }
            }
        } else{
            echo "<div class='card5'>";
            echo "<h3>There are no results matching your search!</h3>";
            echo "<p>you can try again by cross checking your query.</p>";
            echo "</div>";
        }
    }
    if (isset($_POST['submit'])){
        $search = mysqli_real_escape_string($connection,$_POST['initial-search']);
        $sql = "(SELECT url, title, author, 'n' as papers FROM papers WHERE title LIKE '%" . $search . "%' OR author LIKE '%" . $search . "%' )
                    UNION (SELECT blog_id, title, author, 'b' as papers FROM blogs WHERE title LIKE '%" . $search . "%' OR author LIKE '%" . $search . "%')";
        $result = mysqli_query($connection, $sql);
        $queryResults = mysqli_num_rows($result);
        echo "<div class='card5'>";
        echo "<h3>There are ".$queryResults." results!</h3>";
        echo "</div>";
        if ($queryResults > 0) {
            while ($row = mysqli_fetch_assoc($result)){
                if($row['papers'] == 'n'){
                    $n_id    = $row['url'];
                    echo "<div>";
                    echo "<a href=paper/$n_id><h3>".$row['title']."</h3></a>";
                    echo "<p>Author : ".$row['author']."</p>";
                    echo "</div><hr>";
                }
                elseif ($row['papers'] == 'b'){
                    $b_id    = $row['url'];
                    echo "<div>";
                    echo "<a href=blog.php?blog_id=$b_id><h3>".$row['title']."</h3></a>";
                    echo "<p>Author : ".$row['author']."</p>";
                    echo "</div><hr>";
                }
            }
        } else{
            echo "<div class='card5'>";
            echo "<h3>There are no results matching your search!</h3>";
            echo "<p>you can try again by cross checking your query.</p>";
            echo "</div>";
        }
    }
      ?>
  </section>
<?php include_once 'footer.php'?>
</body>
</html>