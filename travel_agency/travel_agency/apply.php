<?php
session_start();
$servername = "localhost";
$username1 = "root";
$password1 = "30051997";
$dbname = "travel_agency";


$conn = new mysqli($servername, $username1, $password1, $dbname );


if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
else{
echo "successfully connected";
}

 echo   $_SESSION['username'];


$username =  $_SESSION['username'];
$password = $_SESSION['password'];

if(isset($_POST['done']))
 {
     $query1 = "SELECT customer_id
       from customers  WHERE CONCAT(`customer_id`, `name`, `age`, `sex`) LIKE '%".$username."%'";
     $search_result1 = filterTable1($query1);
     while($row1 = mysqli_fetch_assoc($search_result1)):
       $_SESSION['c_id']=$row1['customer_id'];
     endwhile;
 }

 function filterTable1($query1)
 {
     $connect = mysqli_connect("localhost", "root", "30051997", "travel_agency");
     $filter_Result1 = mysqli_query($connect, $query1);
     return $filter_Result1;
 }


 if(isset($_POST['done']))
 {
   $c_id = $_SESSION['c_id'];
   date_default_timezone_set("Asia/Kolkata");

   $query = "INSERT into booking(customer_id,outcome_code,status_code, travel_agency_id, date_of_booking)
             values('$c_id','1','1','99999','" . date("Y/m/d") . "')";

             $conn = mysqli_connect("localhost", "root", "30051997", "travel_agency") or Die("connection failed");

     if($conn->query($query) === TRUE){
        $id=$conn->insert_id;

        $_SESSION['id']=$id;
     }
     else{
       echo " failed to input ";
     }

 }




 if(isset($_POST['done']))
 {    $id =$_SESSION['id'];
   date_default_timezone_set("Asia/Kolkata");
   $query1 = "INSERT into service_booking(booking_id,service_id,booking_start_date,booking_end_date)
             values('$id','10','" . date("Y/m/d") . "','" . date("Y/m/d") . "')";

             $conn = mysqli_connect("localhost", "root", "30051997", "travel_agency") or Die("connection failed");
     if($conn->query($query1) === TRUE){
         echo "   service_booking successfull   ";
     }
     else{
       echo "   service_booking failed   ";
     }
 }


 if(isset($_POST['done']))
 { $id =$_SESSION['id'];
   date_default_timezone_set("Asia/Kolkata");
   $query = "INSERT into payments(amount,payment_date,payment_type,payment_time)
             values('5000','" . date("Y/m/d") . "','netbanking','" . date("h:i:sa") . "')";

              $conn = mysqli_connect("localhost", "root", "30051997", "travel_agency") or Die("connection failed");
     if($conn->query($query) === TRUE){
        $id1 = $conn->insert_id;

       $_SESSION['id1']=$id1;
        $sql= "UPDATE booking
               SET payment_id= $id1
               WHERE booking_id=$id";
                $conn = mysqli_connect("localhost", "root", "30051997", "travel_agency") or Die("connection failed");
                if($conn->query($sql) === TRUE){
                  echo " payment is done .";
                }
     }
     else{
       echo"..error in payment..";
     }
 }



 if(isset($_POST['done']))
 { $id =$_SESSION['id'];
   $password =  $_SESSION['password'];
   $query = "INSERT into customers_address(customer_id,address_id,date_from, date_to)
             values($password,'x333','21/11/2017','30/11/2017')";
              $conn = mysqli_connect("localhost", "root", "30051997", "travel_agency") or Die("connection failed");
     if($conn->query($query) === TRUE){
                  echo " ca insertion is done .";
     }

 }




?>
