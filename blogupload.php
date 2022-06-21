<?php
ob_start();
session_start();
ob_end_clean();
if(isset($_SESSION['UserData']['UserName'])) {
    $session_id = $_SESSION['UserData']['UserName'];
}else{
    ob_start();
    header("location: admin.php");
    ob_end_clean();
}
?>
<!DOCTYPE HTML>
<html lang="html">
<head>
    <title>InAstronomy</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/png" href="images/blue_small.png"/>
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" />
</head>
<body class="subpage">
<!-- Header -->
<header id="header">
    <img src="images/inastronomy_logo_small_white.png" alt="" class="logo">
    <a href="#menu">UPLOADS</a>
</header>
<!-- Nav -->
<nav id="menu">
    <ul class="links">
        <li><a href="papersupload.php">upload paper</a></li>
        <li><a href="logout.php">Log out</a></li>
    </ul>
</nav>
<!-- One -->
<section id="one" class="wrapper style3" >
    <div class="inner">
        <header class="align-center">
            <div class="card2">
                <img src="images/inastronomy_logo_big_white.png" alt="" class="big-logo">
                <hr>
                <h2>BLOG UPLOADS</h2>
            </div>
        </header>
    </div>
    <div class="card2">
        <?php
        include_once 'config.php';
        if(isset($_POST['save-blog'])){
            $title = mysqli_real_escape_string($connection,$_POST['title']);
            $author = mysqli_real_escape_string($connection,$_POST['author']);
            $description = mysqli_real_escape_string($connection,$_POST['description']);
            $second = mysqli_real_escape_string($connection,$_POST['second_para']);
            $third = mysqli_real_escape_string($connection,$_POST['third_para']);
            $image = mysqli_real_escape_string($connection,$_FILES['image']['name']);
            $image2 = mysqli_real_escape_string($connection,$_FILES['image2']['name']);
            $destination = "images/blogs/".$image;
            $destination2 = "images/blogs/".$image;
            $extension = pathinfo($image,PATHINFO_EXTENSION);
            $file = $_FILES['image']['tmp_name'];
            $extension2 = pathinfo($image2,PATHINFO_EXTENSION);
            $file2 = $_FILES['image2']['tmp_name'];
            $slug = slug($title);
            if (!in_array($extension ,['png', 'jpeg', 'jpg'])){
                echo "<div class='wrapper style3'>";
                echo "<div class='card2'>";
                echo "<p style='text-align: center'>your Image must be .png or .jpeg or .jpg !</p>";
                echo "</div>";
                echo "</div>";
                if (!in_array($extension2 ,['png', 'jpeg', 'jpg'])){
                    echo "<div class='wrapper style3'>";
                    echo "<div class='card2'>";
                    echo "<p style='text-align: center'>your Second Image must be .png or .jpeg or .jpg !</p>";
                    echo "</div>";
                    echo "</div>";
                }
            }
            else{
                $sql = "INSERT INTO blogs (title, description, second_para, third_para, image, second_image, author, url) VALUES('$title','$description','$second','$third','$image','$image2','$author','$slug')";
                if (mysqli_query($connection,$sql)){
                    move_uploaded_file($file,$destination);
                    move_uploaded_file($file2,$destination2);
                    echo "<div class='wrapper style3'>";
                    echo "<div class='card2'>";
                    echo "<p style='text-align: center'>article uploaded successfully!</p>";
                    echo "</div>";
                    echo "</div>";
                }else{
                    echo "<div class='wrapper style3'>";
                    echo "<div class='card2'>";
                    echo "<p style='text-align: center'>failed to upload!</p>";
                    echo "</div>";
                    echo "</div>";
                }
            }
        }?>
        <form action="blogupload.php" method="post" enctype="multipart/form-data">
            <label>Title</label>
            <label><input type="text" name="title" placeholder="Title..."></label>
            <label>Author</label>
            <label><input type="text" name="author" placeholder="Author..."></label>
            <label for="1">Description</label>
            <textarea id="1" name="description" cols="40" rows="2" placeholder="Description..."></textarea>
            <label for="2">Second Para</label>
            <textarea id="2" name="second_para" cols="40" rows="4" placeholder="Second Para..."></textarea>
            <label for="3">Third Para</label>
            <textarea id="3" name="third_para" cols="40" rows="4" placeholder="Third Para..."></textarea>
            <label>Image</label>
            <input type="file" name="image">
            <label>Second Image</label>
            <input type="file" name="image2">
            <input type="reset" name="reset" value="reset">
            <input type="submit" name="save-blog" value="save">
        </form><hr>
    </div>
</section>
<?php include_once 'footer.php'?>
</body>
</html>