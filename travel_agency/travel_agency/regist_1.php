<?php
  $servername = "localhost";
  $username = "root";
  $password = "30051997";
  $dbname = "travel_agency";

// Create connection
  $conn = new mysqli($servername, $username, $password, $dbname );

 // Check connection
 if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
}
else{
//echo "successfully connected";
}

if(isset($_POST['submit'])) {
  $name = $_POST['name'];
  $age = $_POST['age'];
  $email = $_POST['email'];
  $sex = $_POST['gender'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];
  $q="SELECT * from customers where name='$name' ";
  $query = mysql_query($q);
  if (mysql_num_rows($query) != 0)
  {
      echo "Username already exists";
  }
 else{
   $query = "INSERT INTO customers(name,age,sex,phone_no,email_id,password)
    VALUES ('$name','$age','$sex','$phone','$email','$password')";


  if ($conn->query($query) === TRUE) {
     echo "YOUR REGISTRATION IS COMPLETED...";
 } else {
     echo "Error: " . $query . "<br>" . $conn->error;

     echo "user is already registed in the database";
 }

 }



}




?>
