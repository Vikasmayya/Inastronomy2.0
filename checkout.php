<?php
if (!isset($_SERVER['HTTP_REFERER'])){
    header('location:papers.php');
}include 'config.php';
?>
<!DOCTYPE HTML>
<html lang="html">
<head>
    <title>Checkout</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/png" href="images/blue_small.png" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>
<body class="subpage">
<!-- Header -->
<header id="header">
    <a href="index.php" class="logo"><img src="images/inastronomy_logo_small_white.png" alt="" style="height: 100%"></a>
    <a href="#menu">CHECKOUT</a>
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
                <h2>CHECKOUT</h2>
            </div>
        </header>
    </div>
    <div class="align-center">
        <?php
                if(isset($_GET['url'])) {
                    $url = mysqli_real_escape_string($connection, $_GET['url']);
                    $sql = "SELECT * FROM papers WHERE url='$url'";
                    $result = mysqli_query($connection, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                        $price = $row['price'] * 100;
                        $paper = $row['title'];
                        $paper_id = $row['paper_id'];
                        $queryId = isset($_GET['url']) ? $_GET['url'] : '' ;
                        try {$date = new DateTime($row['date']);} catch (Exception $e) {}
                        echo "<div class='card4'>";
                        echo "<h3>Cart Summary:</h3>";
                        echo "<h3>" . $row['title'] . "</h3>";
                        echo "<h4> Author(s) : " . $row['author'] . "</h4>";
                        echo "<p style='margin: 0;'> Published on ".$date->format("d F Y H:i:s")."</p>";
                        echo "<hr>";
                        echo "<h2>Cart Total(1 item): INR &#8377;" . $row['price'] . "</h2>";
                        echo "<hr>";
                        echo "</div>";
                    }
                }
                ?>
        <div class="card2">
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
            <form>
                <label for="name"></label><input type="text" name="name" id="name" placeholder="Enter your name"/><br/><br/>
                <label for="email"></label><input type="text"  id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Enter your email"/><br/><br/>
                <label for="contact"></label><input type="text" id="contact" placeholder="Enter your contact number"><br/><br/>
                <label for="paper_id"></label><input type="hidden"  id="paper_id" value="<?php echo $paper_id;?>"/>
                <label>
                    <input onchange="document.getElementById('btn').disabled = !this.checked" type="checkbox" checked="checked">By clicking you agree to our <a href="paper/Terms%20and%20conditions.pdf" style="text-decoration: underline;" target="_blank">terms & privacy</a>
                </label>
                <button type="button" name="btn" id="btn" onclick="pay_now()"><b>Continue To Checkout</b></button>
            </form>
            <script>
                function pay_now(){
                    let name = jQuery('#name').val();
                    let email = jQuery('#email').val();
                    let contact = jQuery('#contact').val();
                    let paper_id = jQuery('#paper_id').val();
                    jQuery.ajax({
                        type:'post',
                        url:'pay.php',
                        data:"email="+email+"&name="+name+"&contact="+contact+"&paper_id="+paper_id,
                        success:function(result){
                            let options = {
                                "key": "<?php echo $keyId; ?>",
                                "amount": "<?php echo $price; ?>",
                                "currency": "INR",
                                "name": "INASTRONOMY",
                                "description": "<?php echo $paper; ?>",
                                "image": "images/blue_small.png",
                                "customer":{
                                    "user-name": "name",
                                    "email": this.data.email,
                                    "contact": this.data.contact,
                                },
                                "theme": {
                                    "color": "#4606f1"
                                },
                                "handler": function (response) {
                                    jQuery.ajax({
                                        type: 'post',
                                        url: 'pay.php',
                                        data: "payment_id=" + response.razorpay_payment_id,
                                        success: function (result) {
                                            window.location.href = "verify.php";
                                        }
                                    });
                                }
                            };
                            let rzp1 = new Razorpay(options);
                            rzp1.open();
                        }
                    });
                }
            </script>
        </div>
    </div>
</section>
<?php include_once 'footer.php'?>
</body>
</html>