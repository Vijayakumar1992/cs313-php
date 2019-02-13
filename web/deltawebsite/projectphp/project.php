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
$Email = $_GET['Email'];

foreach ($db->query('SELECT * FROM customer WHERE customer_firstname = $FirstName') as $row)
{
  echo 'user: ' . $row['customer_firstname'];
  echo ' customer phonenumber: ' . $row['customer_phonenumber'];
  echo '<br/>';
}
?>