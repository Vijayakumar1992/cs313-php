<!doctype html>
<html lang="en-us">

<head>
    <!-- https://site.youidraw.com/painter.html  model website -->
    <meta charset="UTF-8">
    <title>Delta Pro Painting | Painting Site</title>
    <meta name="description" content="Short Description of the page.">
    <meta name="viewport" content="width=device-width">
    <link href="../style.css" rel="stylesheet" type="text/css" media="screen">
    <!-- rel describles the relationship between two links, 
    type-descriibes what the other document is written in / media-helps the brower to find what kind of decives we request to print out -->
</head>

<body>


<nav>   
        <div class="topnav">
            <div class="navflex">
                <img src="images/deltaprologo.png" alt="Business Logo" height="45" width="auto">               
                <a href="#Home">Home</a>
                <a href="aboutus.html">About us</a>
                <a href="services.html">Service</a>
                <a href="photos.html">Photos</a>
                <a href="contactus.html">Contact</a>
                <a href="login.html">Login</a>
                <a href="signup.html">Sign Up</a>
                <!-- I want to include a login in the same signup page and need to work on it -->
            </div>
        </div>

    </nav>
        <!-- <img src="/images/backgroundpic.jpeg" alt="Wall Picture" width="500" height="600"> -->
    <h1>
            <?php   
            echo "Full Name: ". $resultSet["customer_firstname"]." ". $resultSet["customer_lastname"]."<br>";
            echo "Email: ".$resultSet["customer_email"]."<br>";
            echo "Service Date: ".$resultSet["customer_registerdate"];            
            ?>
    </h1>
    
    


</body>



</html>