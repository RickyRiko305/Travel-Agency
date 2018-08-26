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




if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    $sql = "SELECT * from customers where name='$username' AND customer_id='$password'";
    $connect = mysqli_connect("localhost", "root", "30051997", "travel_agency");
    $Result = mysqli_query($connect, $sql);
  if(mysqli_num_rows($Result)== 1){
      $_SESSION['message'] = "you are now logged in";
      $_SESSION['username'] = $username;
      echo $_SESSION['message'];

    }
    else{
      $_SESSION['message'] = "username/password combination incorrect";
      header("loaction:http://localhost/library/login_error.php/");
      echo " user name or password is not valid. try again";

      exit;
    }
}

if(isset($_POST['login']))
{
  $query = "SELECT status_description,name
              from ((customers  inner join booking  using(customer_id)) inner join booking_status  using(status_code))
               WHERE CONCAT(`customer_id`, `name`, `age`, `sex`) LIKE '%".$username."%'";
    $search_result = filterTable($query);
}
 else {
    $query = "SELECT * FROM `customers`";
    $search_result = filterTable($query);
}


function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "30051997", "travel_agency");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

if(isset($_POST['login']))
{
    $query1 = "SELECT hotel_name,transport_detail
      from ((((customers  inner join  booking using(customer_id)) inner join service_booking  using (booking_id)) inner join service_offer  using(service_id)) inner join  hotel  using(hotel_id))
       WHERE CONCAT(`customer_id`, `name`, `age`, `sex`) LIKE '%".$username."%'";
    $search_result1 = filterTable1($query1);

}

function filterTable1($query1)
{
    $connect = mysqli_connect("localhost", "root", "30051997", "travel_agency");
    $filter_Result1 = mysqli_query($connect, $query1);
    return $filter_Result1;
}

if(isset($_POST['login']))
{
    $query2 = "SELECT address,address_id
      from ((customers  inner join  customers_address  using(customer_id)) inner join address  using (address_id))
       WHERE CONCAT(`customer_id`, `name`, `age`, `sex`) LIKE '%".$username."%'";
    $search_result2 = filterTable2($query2);

}

function filterTable2($query2)
{
    $connect = mysqli_connect("localhost", "root", "30051997", "travel_agency");
    $filter_Result2 = mysqli_query($connect, $query2);
    return $filter_Result2;
}

if(isset($_POST['login']))
{
    $query3 = "SELECT amount
    from ((customers as c inner join booking as b using(customer_id)) inner join payments as p using(payment_id))
       WHERE CONCAT(`customer_id`, `name`, `age`, `sex`) LIKE '%".$username."%'";
    $search_result3 = filterTable3($query3);

}

function filterTable3($query3)
{
    $connect = mysqli_connect("localhost", "root", "30051997", "travel_agency");
    $filter_Result3 = mysqli_query($connect, $query3);
    return $filter_Result3;
}

?>

<!DOCTYPE html>
<html lg="en">
<head>
  <title>TRAVEL AGENCY</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <style>
  .modal-header, h4, .close {
      background-color: #5cb85c;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #f9f9f9;
  }
  table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 2px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
  </style>

</head>
<body>
  <?php?>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">TRAVEL AGENCY</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">services <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="hotel.php">hotel</a></li>
            <li><a href="transport.php">transport</a></li>
            <li><a href="location.php">location</a></li>
          </ul>
        </li>
        <li><a href="#">special packages</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> welcome <?php echo $username; ?><span class="caret"></span></a>
          <ul class="dropdown-menu" method="POST" action="logout.php">
            <li><a href="index.php" name="logout">log out</a>
              <?php
              session_destroy();
              unset($_SESSION['username']);
              header("loaction: index.php");
              ?>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>

  <table>
      <tr>
        <th>Customer</th>
        <th>location</th>
        <th>hotel</th>
        <th>transport</th>
        <th>payment</th>
        <th>status</th>
      </tr>

      <?php while($row = mysqli_fetch_assoc($search_result)):?>
        <?php while($row1 = mysqli_fetch_assoc($search_result1)):?>
          <?php while($row2 = mysqli_fetch_assoc($search_result2)):?>
            <?php while($row3 = mysqli_fetch_assoc($search_result3)):?>
                <tr>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row2['address'];?></td>
                    <td><?php echo $row1['hotel_name'];?></td>
                    <td><?php echo $row1['transport_detail'];?></td>
                    <td><?php echo $row3['amount'];?></td>
                    <td><?php echo $row['status_description'];?></td>
                </tr>
                <?php endwhile;?>
                <?php endwhile;?>
                <?php endwhile;?>
                <?php endwhile;?>

<!--/div-->
  </table>

<h4>if you want to apply for the scheme please press the button if u already applied plz ignore</h4>
<form method="POST" action="apply.php">
  <div class="btn-group " method="POST" action="login.php">
    <button type="submit" name="done" class="btn btn-primary">Apply and payment</button>
  </div>
</form>






</body>
</html>
