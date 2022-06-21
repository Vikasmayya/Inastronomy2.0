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
        <li><a href="blogupload.php">upload blogs</a></li>
        <li><a href="logout.php">Log out</a></li>    </ul>
</nav>
<!-- One -->
<section id="one" class="wrapper style3" >
    <div class="inner">
        <header class="align-center">
            <div class="card2">
                <img src="images/inastronomy_logo_big_white.png" alt="" class="big-logo">
                <hr>
                <h2>PAPER UPLOADS</h2>
            </div>
        </header>
    </div>
    <div class="card2">
        <?php
        include_once 'config.php';
        if(isset($_POST['save'])){
            $file_name = mysqli_real_escape_string($connection,$_FILES['paper']['name']);
            $title = mysqli_real_escape_string($connection,$_POST['title']);
            $abstract = mysqli_real_escape_string($connection,$_POST['abstract']);
            $price = mysqli_real_escape_string($connection,$_POST['price']);
            $author = mysqli_real_escape_string($connection,$_POST['author']);
            $slug = slug($title);
            $destination = "Paper/".$file_name;
            $extension = pathinfo($file_name,PATHINFO_EXTENSION);
            $file = $_FILES['paper']['tmp_name'];
            if (!in_array($extension,['pdf'])){
                echo "<div class='wrapper style3'>";
                echo "<div class='card2'>";
                echo "<p style='text-align: center'>your file must be .pdf !</p>";
                echo "</div>";
                echo "</div>";
            }
            else{
                if(move_uploaded_file($file,$destination)){
                    $sql = "INSERT INTO papers (title, file_name, abstract, price, author, url) VALUES('$title', '$file_name', '$abstract', '$price', '$author', '$slug')";
                    if (mysqli_query($connection, $sql)){
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
            }
        }?>
        <form action="papersupload.php" method="post" enctype="multipart/form-data">
            <label>Title</label>
            <label><input type="text" name="title" placeholder="Title..."></label>
            <label>Author(s)</label>
            <label><input type="text" name="author" placeholder="Author..."></label>
            <label for="1">Abstract</label>
            <textarea id="1" name="abstract" cols="40" rows="4" placeholder="Abstract..."></textarea>
            <label>Price</label>
            <label><input type="text" name="price" placeholder="Price..."></label>
            <label>File</label>
            <input type="file" name="paper">
            <input type="reset" name="reset" value="reset">
            <input type="submit" name="save" value="save">
        </form><hr>
    </div>
</section>
<?php include_once 'footer.php'?>
</body>
</html>