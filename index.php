<?php include 'config.php';?>
<!DOCTYPE HTML>
<html lang="html">
	<head>
		<title>InAstronomy</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="icon" type="image/png" href="images/blue_small.png"/>
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="subpage">
		<!-- Header -->
			<header id="header">
                <a href="index.php" class="logo"><img src="images/inastronomy_logo_small_white.png" alt="" style="height: 100%"></a>
					 <a href="#menu">HOME</a>
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
			<section id="one" class="wrapper style3" >
				<article>
				  <div class="inner">
					<header class="align-center">
							<div class="card2">
							 <img src="images/inastronomy_logo_big_white.png" alt="" class="big-logo">
							 <hr>
							</div>
					</header>
                          <blockquote class="align-center">
                           "Where INNOVATION meets the COSMOS."
					      </blockquote>
				  </div>
				  <div class="row">
							<div class="left-column">
                                <a href="blogs.php">
								<div class="card6">
									<img class="IndexPic" src="images/IndexPic/woods.jpg" alt="">
									<h2 style="text-align: center">BLOGS </h2>
								</div></a>
                                <a href="papers.php">
								<div class="card6">
									<img class="IndexPic" src="images/IndexPic/bg-1.jpg" alt="" >
									<h2 style="text-align: center">PAPERS </h2>
								</div></a>
							</div>
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
                                        echo "<li><a href='blog/" . $row['url'] . "' >";?>
										<img src='images/blogs/<?php echo $row['image']?>' alt='image' class="w3-left w3-right" style='width:50px'>
								  <?php echo "<h4 class='w3-large'>" . $row['title'] . "</h4><br>";
										echo "</a><hr>";
										echo "</li>";
                                  }
                                  ?>
								</ul>
                                </div>
                                <div class="card1">
                                        <h3 style="text-decoration: underline;">Recent Papers</h3>
                                        <ul class="w3-ul">
                                            <?php
                                            $sql = "SELECT * FROM papers ORDER BY date DESC LIMIT 5";
                                            $result = mysqli_query($connection, $sql);
                                            while ($row = mysqli_fetch_array($result)) {
                                                echo "<li><a href='paper/" . $row['url'] . "'><h4 class='w3-large'>» " . $row['title'] . "</h4><br></a></li>";
                                            }
                                            ?>
                                        </ul>
                                </div>
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
				</article>
			</section>
    <?php include_once 'footer.php'?>
	</body>
</html>
