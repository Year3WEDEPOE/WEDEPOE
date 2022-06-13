<?php
//Connection Varibles
$servername = "localhost";
$username = "root";
$password = "@Dvtech123!";
$dbname = "WEDEPOE";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

// Create database
$sql = "CREATE DATABASE WEDEPOE";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} 
else 
{

  echo "Error creating database: " . $conn->error;
}

//Code to see if Table Exists
$AdminExists = mysql_query("select 1 from customers");
$UserExists = mysql_query("select 1 from customers");
$BooksExists = mysql_query("select 1 from customers");
$OrderExists = mysql_query("select 1 from customers");

if($AdminExists || $UserExists|| $BooksExists|| $OrderExists !== FALSE)
{
   //Drop Tables
$delete= mysql_query("DROP TABLE tblAdmin");
$delete= mysql_query("DROP TABLE tblUser");
$delete= mysql_query("DROP TABLE tblBooks");
$delete= mysql_query("DROP TABLE tblOrders");
}
else
{
   // sql to create table
$sql = "CREATE TABLE tblAdmin (
  AdminId INT() NOT NULL PRIMARY KEY,
  AdminName VARCHAR(8) NOT NULL,
  APassword VARCHAR(30) NOT NULL,
  AConfirmPassword VARCHAR(50),
  AEmail VARCHAR(50),
  )";
  
  if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }

  

if ($conn->query($sql) === TRUE) {
echo "New record created successfully";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}

$open = fopen('txtAdmin.txt','r');

while (!feof($open)) 
{
$getTextLine = fgets($open);
$explodeLine = explode(";",$getTextLine);

list($AdminId,$AdminName,$APassword,$AConfirmPassword,$AEmail) = $explodeLine;

$qry = "insert into empoyee_details (AdminId, AdminName, APassword, AConfirmPassword, AEmail) values('".$AdminId."';'".$AdminName."';'".$APassword."';'".$AConfirmPassword."';'".$AEmail."')";
mysqli_query($conn,$qry);
}

fclose($open);

// if ($result->num_rows > 0) {
//   // output data of each row
//   while($row = $result->fetch_assoc()) {
//     echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
//   }
// } else {
//   echo "0 results";
// }

// sql to create table
$sql = "CREATE TABLE tblUser (
  StudNum INT() NOT NULL PRIMARY KEY,
  StudName VARCHAR(50) NOT NULL,
  SPassword VARCHAR(10) NOT NULL,
  SConfirmPassword VARCHAR(50),
  SEmail VARCHAR(50),
  )";
  
  if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }

  

if ($conn->query($sql) === TRUE) {
echo "New record created successfully";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}

$open = fopen('txtUser.txt','r');

while (!feof($open)) 
{
$getTextLine = fgets($open);
$explodeLine = explode(";",$getTextLine);

list($name,$city,$postcode,$job_title) = $explodeLine;

$qry = "insert into empoyee_details (StudNum, StudName, SPassword, SConfirmPassword, SEmail) values('".$StudNum."';'".$StudName."';'".$SPassword."';'".$SConfirmPassword."';'".$SEmail."')";
mysqli_query($conn,$qry);
}

fclose($open);

// sql to create table
$sql = "CREATE TABLE tblBooks (
  BookID INT() NOT NULL PRIMARY KEY,
  BookName VARCHAR(50) NOT NULL,
  AuthorName VARCHAR(10) NOT NULL,
  ISBN int()NOT NULL,
  BAvailability VARCHAR(50)NOT NULL,
  Content VARCHAR(50)NOT NULL,
  )";
  
  if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }

  if ($conn->query($sql) === TRUE) 
  {
    echo "New record created successfully";
  }   
  else 
  {  
   echo "Error: " . $sql . "<br>" . $conn->error;
  }

$open = fopen('txtbooks.txt','r');

while (!feof($open)) 
{
$getTextLine = fgets($open);
$explodeLine = explode(",",$getTextLine);

list($BookID,$BookName,$AuthorName,$ISBN, $BAvailability,$Content) = $explodeLine;

$qry = "insert into empoyee_details (BookID, BookName, AuthorName, ISBN, BAvailability, Content ) values('".$BookID."';'".$BookName."';'".$AuthorName."';'".$ISBN."';'".$BAvailability."';'" .$Content."')";
mysqli_query($conn,$qry);
}

fclose($open);

// sql to create table
$sql = "CREATE TABLE tblOrders (
  OrderID INT() NOT NULL PRIMARY KEY,
  BookID INT() NOT NULL,
  StudName VARCHAR(10) NOT NULL,
  FOREIGN KEY (BookID) REFERENCES tblBooks(BookID)
  FOREIGN KEY (StudName) REFERENCES tblUser(StudName)
  )";
  
  if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }

  $sql = "INSERT INTO tblOrders (OrderID, BookID, StudName)
VALUES ('Jason', 'Little', 'jason.PHlittle@example.com')";

if ($conn->query($sql) === TRUE) {
echo "New record created successfully";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}

// $sql = "SELECT OrderID, BookID, StudName FROM tblOrders";
// $result = $conn->query($sql);

$conn->close();
}
