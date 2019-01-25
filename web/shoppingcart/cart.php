<?php

session_start();
if(isset( $_SESSION["jerseyjames"])) {
    echo "jersey james printed";
}else{
    echo "not in cart";
}


?>