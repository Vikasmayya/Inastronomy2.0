<?php include 'config.php';?>
<!DOCTYPE HTML>
<html lang="HTML">
	<head>
		<title>InAstronomy-Blogs</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="icon" type="image/png" href="images/blue_small.png"/>
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="subpage">
		<!-- Header -->
			<header id="header" class="header" >
                <a href="index.php" class="logo"><img src="images/inastronomy_logo_small_white.png" alt="" style="height: 100%"></a>
				  <a href="#menu">BLOGS</a>
            </header>
		<!-- Nav-->
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
		<!--one -->
		<section id="one" class="wrapper style3">
			<article >
				<div class="inner">
					<header class="align-center">
                        <div class="card2">
                            <img src="images/inastronomy_logo_big_white.png" alt="" class="big-logo">
                            <hr>
                            <h2>BLOGS</h2>
                        </div>
					</header>
				</div>
				<!-- Blog entries -->
				<div class="row">
				  <div class="left-column" >
                      <!-- Blog entry -->
                      <div class="card" >
                          <?php
                          $sql = "SELECT * FROM blogs ORDER BY date DESC";
                          $result = mysqli_query($connection, $sql);
                          while ($row = mysqli_fetch_array($result)) {
                              try {
                                  $date = new DateTime($row['date']);
                              } catch (Exception $e) {
                              }
                              echo "<div>";?>
                              <img src='images/blogs/<?php echo $row['image']?>' alt='' style='width:100%'>
                                        <?php echo "<h3><b>" . $row['title'] . "</b></h3>";
                                              echo "<h4> Author : " . $row['author'] . "</h4>";
                                              echo "<p style='margin: 0;'> Published on ".$date->format("d F Y H:i:s")."</p>";
                                              echo "<h5>" . $row['description'] . "</h5>";
                                              echo "<h4><a class='button' href='blog/" . $row['url'] . "'> <b>read more »</b></a></h4>";
                                              echo "<hr></div>";}?>
                      </div>
                  </div>
					<!-- END BLOG ENTRIES -->
					<div class="right-column">
                        <a href="about.html">
                            <div class="card7">
                                <img class="logo-img" src="images/blue_tag_white.png" alt="" >
                                <h3 style="text-align: center">About Us </h3>
                            </div></a>
                        <hr>
						<div class="card1">
							<h3>Recent Blogs</h3>
                            <ul class="w3-ul">
                                <?php
                                $sql = "SELECT * FROM blogs ORDER BY date DESC LIMIT 3";
                                $result = mysqli_query($connection, $sql);
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<li><a href='blog/" . $row['url'] . "'>";?>
                                    <img src='images/blogs/<?php echo $row['image']?>' alt='image' class="w3-left w3-right" style='width:50px'>
                                    <?php echo "<h4 class='w3-large'>" . $row['title'] . "</h4><br>";
                                    echo "</a><hr>";
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
					</div>
			</article>
		</section>
	<?php include_once 'footer.php'?>
	</body>
</html>