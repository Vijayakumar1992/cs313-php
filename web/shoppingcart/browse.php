<?php


session_start();
if(!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
    $_SESSION['price'] = array();
}


?>


<!DOCTYPE HTML>
<html>

<head>
    <link rel="stylesheet" href="jersey.css">
</head>

<?php 

if(isset($_POST["jerseyjames"])){
    $_SESSION["jerseyjames"] = true;
}
echo $_POST["jerseyjames"];
echo $_POST["jerseydurant"];
?>
<body>
    <!-- <button id="cartbutton" type="button" onclick="alert('adding to cart!')">Add to Cart</button> -->
    <!-- <h1 id="center">FAVORITE NBA JERSEY'S</h1>
    <div class="container">
        <img src="jamesjersey.JPG" width="500px" alt="LeBron James Jersey">
        <img src="kdjersey.png" width="500px" alt="Kevin Durant Jersey">
        <img src="kobebryant.png" width="500px" alt="kobe Bryant Jersey">
    </div>
    <div class="buttonflex">
        <button class="cartbutton" type="button" onclick="addToCart('jamesjersey', 99)">Add to Cart</button>
        <button class="cartbutton" type="button" onclick="addToCart('kdjersey', 89)">Add to Cart</button>
        <button class="cartbutton" type="button" onclick="addToCart('kobebryant', 79)">Add to Cart</button> -->


        <img src="jamesjersey.JPG" width="500px" alt="LeBron James Jersey">
        <form action="#" method="post">
            <input type="text" hidden name ="jerseyjames" value ="james">
            <input type="submit" value = "add to card">
        </form>


        <img src="kdjersey.png" width="500px" alt="Kevin Durant Jersey">
        <form action="#" method="post">
            <input type="text" hidden name ="jerseydurant" value ="durant">
            <input type="submit" value = "add to card">
        </form>
    <!-- </div> -->

    <!-- <div class="container">
        <img src="nashjersey.jpg" width="500px" alt="Steve Nash Jersey">
        <img src="wadejersey.jpg" width="500px" alt="wade  Jersey">
        <img src="westbrookjersey.png" width="500px" alt="westbrook Jersey">
    </div>

    <div class="buttonflex">
        <button class="cartbutton" type="button" onclick="alert('adding to cart!')">Add to Cart</button>
        <button class="cartbutton" type="button" onclick="alert('adding to cart!')">Add to Cart</button>
        <button class="cartbutton" type="button" onclick="alert('adding to cart!')">Add to Cart</button>
    </div> -->
</body>