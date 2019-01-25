<h1> Ites in the cart </h1>





<?php

session_start();
if(isset( $_SESSION["jerseyjames"])) {
    echo "<h1>jersey james printed</h1><br>";
}else{
    echo "not in cart";
}

if(isset( $_SESSION["jerseydurant"])) {
    echo "<h1>jersey durant printed</h1><br>";
}else{
    echo "not in cart";
}


if(isset( $_SESSION["jerseykobe"])) {
    echo "<h1>jersey kobe printed</h1><br>";
}else{
    echo "not in cart";
}

if(isset( $_SESSION["jerseynash"])) {
    echo "<h1>jersey nash printed</h1><br>";
}else{
    echo "not in cart";
}


if(isset( $_SESSION["jerseywade"])) {
    echo "<h1>jersey wade printed</h1><br>";
}else{
    echo "not in cart";
}


if(isset( $_SESSION["jerseywestbrook"])) {
    echo "<h1>jersey westbrook printed</h1><br>";
}else{
    echo "not in cart";
}


?>