<?php
try
{
  // after submitting thr form it comes down here to read the code
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl); // associative array

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  // create a pda object
  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  // save the data in db server
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} // if the try fails the catch will let me know if the error 
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

try{ // getting data 
// this would grab the first name from contact 
$FirstName = $_GET['firstname']; 
$LastName = $_GET['lastname'];
$PhoneNumber = $_GET['phonenumber'];
$Email = $_GET['email'];
$registerdate = $_GET['registerdate'];
} 

catch(Exception $ex){
  echo 'Error!: ' . $ex->getMessage();
  die();
}

// performs the action based on the code in db server
if (isset($FirstName)){

  $sql = 'INSERT INTO customer values (default, :FirstName, :LastName, :PhoneNumber, :Email, :registerdate, NULL)'; // place holders
  $statement = $db->prepare($sql); // prepare function give a new object and give it to the variable statement

  // bindvalue will replace the placeholder with actual value and firstname is -actual value and PDO... actual data name
  $statement->bindValue(':FirstName', $FirstName, PDO::PARAM_STR); 
  $statement->bindValue(':LastName', $LastName, PDO::PARAM_STR);
  $statement->bindValue(':PhoneNumber', $PhoneNumber, PDO::PARAM_STR);
  $statement->bindValue(':Email', $Email, PDO::PARAM_STR);
  $statement->bindValue(':registerdate', $registerdate, PDO::PARAM_STR);
  $statement->execute(); // execute the statement object 
  $statement->closeCursor();// closes the interaction with the database  

}
$sql = 'SELECT * FROM customer WHERE customer_email = :Email';
$statement = $db->prepare($sql);
$statement->bindValue(':Email', $Email, PDO::PARAM_STR);
$statement->execute();
$resultSet = $statement->fetch(); // get the first result of the query above
$statement->closeCursor();// closes the interaction with the database
//this would get the result from each column and displays it as rows 
echo $resultSet["customer_id"] .$resultSet["customer_firstname"].$resultSet["customer_lastname"].$resultSet["customer_email"];


?>