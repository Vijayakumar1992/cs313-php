<?php
try
{
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}
// this would grab the first name from contact 
$FirstName = $_GET['firstname']; 
$LastName = $_GET['lastname'];
$PhoneNumber = $_GET['phonenumber'];
$Email = $_GET['email'];
echo $email;
exit;
$registerdate = $_GET['registerdate'];

//make sure to correct the where information to make sure it connects to the right name. 

// performs the action based on the code in db server
if (isset($FirstName)){

  $sql = 'INSERT INTO customer values (default, :FirstName, :LastName, :PhoneNumber, :Email, :registerdate, NULL)';
  $statement = $db->prepare($sql);

  $statement->bindValue(':FirstName', $FirstName, PDO::PARAM_STR);
  $statement->bindValue(':LastName', $LastName, PDO::PARAM_STR);
  $statement->bindValue(':PhoneNumber', $PhoneNumber, PDO::PARAM_STR);
  $statement->bindValue(':Email', $Email, PDO::PARAM_STR);
  $statement->bindValue(':registerdate', $registerdate, PDO::PARAM_STR);

  $statement->execute();
  $statement->closeCursor();// closes the interaction with the database  

//   $db->query
// ("INSERT INTO customer values (default,'$FirstName','$LastName','$PhoneNumber','$Email','$registerdate',NULL)");
}
// GETS ALL DATA FROM CUSTOMER TABLE 
// $resultSet = $db->query("SELECT * FROM CUSTOMER WHERE customer_email = '$Email'");
$sql = 'SELECT * FROM customer WHERE customer_email = :Email';
$statement = $db->prepare($sql);
$statement->bindValue(':Email', $Email, PDO::PARAM_STR);
$statement->execute();
$resultSet = $statement->fetch(); // get the first result of the query above
$statement->closeCursor();// closes the interaction with the database
//this would get the result from each column and displays it as rows 
var_dump($resultSet); // takes all the info in array and dumps it out into the page
exit;
echo $resultSet["customer_id"] .$resultSet["customer_firstname"].$resultSet["customer_lastname"].$resultSet["customer_email"];


?>