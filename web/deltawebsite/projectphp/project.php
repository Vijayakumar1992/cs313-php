<?php
try
{
  // after submitting the form it comes down here to read the code
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
$collectpassword = $_GET['password'];
} 

catch(Exception $ex){
  echo 'Error!: ' . $ex->getMessage();
  die();
}


echo "Before the if statement\n";

// performs the action based on the code in db server
if (isset($FirstName))
{

  echo "first name is set\n";
echo $collectpassword;
// creates new password and hides the actuall password. 
$collectpassword2 = password_hash($collectpassword, PASSWORD_DEFAULT);

echo $collectpassword2;
exit;

  //Following code displays the data based on 1st table & the order
  $sql = 'INSERT INTO customer values (default, :FirstName, :LastName, :PhoneNumber, :Email, :registerdate, Null, :collectpassword)'; // place holders
  $statement = $db->prepare($sql); // prepare function give a new object and give it to the variable statement

  // bindvalue will replace the placeholder with actual value and firstname is -actual value and PDO... actual data name
  $statement->bindValue(':FirstName', $FirstName, PDO::PARAM_STR); 
  $statement->bindValue(':LastName', $LastName, PDO::PARAM_STR);
  $statement->bindValue(':PhoneNumber', $PhoneNumber, PDO::PARAM_STR);
  $statement->bindValue(':Email', $Email, PDO::PARAM_STR);
  $statement->bindValue(':registerdate', $registerdate, PDO::PARAM_STR);
  $statement->bindValue(':collectpassword', $collectpassword, PDO::PARAM_STR);
  $statement->execute(); // execute the statement object 
  $statement->closeCursor();// closes the interaction with the database  

}
else
{
  echo "in the else statement\n";
  $sql = 'SELECT * FROM customer WHERE customer_email = :Email'; // gathers user data
  $statement = $db->prepare($sql);
  $statement->bindValue(':Email', $Email, PDO::PARAM_STR);
  $statement->execute();
  $resultSet = $statement->fetch(); // get the first result of the query above -- associative of array
  $statement->closeCursor();// closes the interaction with the database

  //takes clear text and compares it with hash in database - password/hashpassword will be compared
  $hashCheck = password_verify($collectpassword, $resultSet['customer_password']; 
  echo "hashcheck:$haskCheck\n"; 
  
  // if hashcheck is true and show them the data
  if($hashCheck){
    echo "in the hashcheck\n";
  //this would get the result from each column and displays it as rows 
  echo $resultSet["customer_id"] .$resultSet["customer_firstname"].$resultSet["customer_lastname"]
  .$resultSet["customer_email"].$resultSet["customer_password"];
  } 
  
}



?>