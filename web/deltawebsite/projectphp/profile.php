<!doctype html>
<html lang="en-us">

<head>
    <!-- https://site.youidraw.com/painter.html  model website -->
    <meta charset="UTF-8">
    <title>Delta Pro Painting | Painting Site</title>
    <meta name="description" content="Short Description of the page.">
    <meta name="viewport" content="width=device-width">
    <link href="style.css" rel="stylesheet" type="text/css" media="screen">
    <!-- rel describles the relationship between two links, 
    type-descriibes what the other document is written in / media-helps the brower to find what kind of decives we request to print out -->
</head>

<!--I have worked with: David Aruldass, Sam, Ethan, Ashley -->


<body>
        <!-- <img src="/images/backgroundpic.jpeg" alt="Wall Picture" width="500" height="600"> -->
    <h1>
            <?php   
            echo "Full Name: ". $resultSet["customer_firstname"]." ". $resultSet["customer_lastname"]. "/n";
            echo "Email: ".$resultSet["customer_email"]. "/n";
            echo "Service Date: ".$resultSet["customer_registerdate"];

            
            ?>
    </h1>
    
    


</body>



</html>