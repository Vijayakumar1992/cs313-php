
<h1> Items in the cart </h1>

<?php
session_start();
// //removes jerseys from the cart
// $removeitem = $_POST["remove"];
// if(removeitem = "jerseyjames"){
//     $_SESSION ["jerseyjames"] = false;
// }



if(isset( $_SESSION["jerseyjames"])) {
    echo "<h1>jersey james printed</h1><br>";

    // <form action="cart.php?remove=jerseyjames">  
    // <input type="submit" value="Submit">
    // </form>
}

if(isset( $_SESSION["jerseydurant"])) {
    echo "<h1>jersey durant printed</h1><br>";
}


if(isset( $_SESSION["jerseykobe"])) {
    echo "<h1>jersey kobe printed</h1><br>";
}

if(isset( $_SESSION["jerseynash"])) {
    echo "<h1>jersey nash printed</h1><br>";
}


if(isset( $_SESSION["jerseywade"])) {
    echo "<h1>jersey wade printed</h1><br>";
}


if(isset( $_SESSION["jerseywestbrook"])) {
    echo "<h1>jersey westbrook printed</h1><br>";
}

?>


<!DOCTYPE HTML>
<html>

<head>


</head>

<body>



<form action="cart.php?remove=jerseyjames">  
     <input type="submit" value="REMOVE">
</form>


</body>
</html>