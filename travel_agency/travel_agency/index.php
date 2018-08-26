<!DOCTYPE html>
<html lang="en">

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
  </style>
</head>

<body >

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">TRAVEL AGENCY</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">services <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="https://in.hotels.com/">hotel</a></li>
            <li><a href="https://www.irctc.co.in/eticketing/loginHome.jsf">transport</a></li>
            <li><a href="https://www.indiatoursonline.com//">location</a></li>
          </ul>
        </li>
        <li><a href="#">special packages</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a ><span class="glyphicon glyphicon-user" id="myres"></span> Sign Up</a></li>
        <li><a ><span class="glyphicon glyphicon-log-in" id="myBtn"></span> Login</a></li>
        <!-- Trigger the modal with a button -->
  <!--li><button type="button" class="btn btn-default btn-md" id="myBtn">Login</button></li-->

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" method="POST" action="login.php">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" class="form-control" id="usrname" name="username" placeholder="Enter username">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" id="psw" name="password" placeholder="Enter password">
            </div>

              <button type="login" name="login" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="cancel" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
        </div>
      </div>
    </div>
  </div>
<!--     *********************************************************************************************************************   -->
<div class="modal fade" id="registration" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="padding:35px 50px;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4><span class="glyphicon glyphicon-lock"></span> registration</h4>
      </div>
      <div class="modal-body" style="padding:40px 50px;">
        <form role="form" method="POST" action="regist_1.php">
          <div class="form-group">
            <label for="usrname"><span class="glyphicon glyphicon-user"></span> name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
          </div>
          <div class="form-group">
            <label for="usrname"><span class="glyphicon glyphicon-user"></span> email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Enter e-mail">
          </div><div class="form-group">
            <label for="gender"><span class="glyphicon glyphicon-user"></span> sex</label>
            <input type="radio"  id="gender" name="gender" value="M">male
            <input type="radio"  id="gender" name="gender" value="F">female
          </div><div class="form-group">
            <label for="age"><span class="glyphicon glyphicon-user"></span> age</label>
            <input type="text" class="form-control" id="age" name="age" placeholder="age">
          </div>
          <div class="form-group">
            <label for="phone"><span class="glyphicon glyphicon-eye-open"></span>contact number</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="contact number">
          </div>
          <div class="form-group">
            <label for="password"><span class="glyphicon glyphicon-eye-open"></span>password</label>
            <input type="text" class="form-control" id="password" name="password" placeholder="password">
          </div>
            <button type="submit" name ="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> register</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="cancel" name ="cancel" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>

      </div>
    </div>

  </div>
</div>
<!-- *****************************************************************************************************************-->
<?php
function NewUser() {
  $fullname = $_POST['name'];
  $email = $_POST['email'];
  $sex = $_POST['email'];
  $password = $_POST['pass'];
  $query = "INSERT INTO websiteusers (fullname,userName,email,pass) VALUES ('$fullname','$userName','$email','$password')";
   $data = mysql_query ($query)or die(mysql_error());
    if($data) { echo "YOUR REGISTRATION IS COMPLETED..."; } }


?>


<!-- *****************************************************************************************************************-->

<script>
$(document).ready(function(){
  $("#myres").click(function(){
      $("#registration").modal();
  });
});
</script>

<!--     *********************************************************************************************************************   -->


  <script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>
      </ul>
    </div>
  </nav>

  <div class="jumbotron text-center">
    <h1>Welcome to the MY tour for the heaven</h1>
    <p>best for comfortable and easy planning for the trip.</p>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <h3 style="text-color: Blue;">hotel</h3>
        <div class="thumbnail">
          <a href="image/6.jpg"></a>
          <img src="image/6.jpg" alt="Lights" style="width:100%">
        </div>
        <p>we will choose the best hotel as per your budget and comfort.</p>
        <p>trip is incomplete with a comfortable bed and nice room.</p>
      </div>
      <div class="col-sm-4">
        <h3>transport</h3>
        <div class="thumbnail">
          <a href="image/7.jpg"></a>
          <img src="image/7.jpg" alt="Lights" style="width:100%">
        </div>
        <p>confused and frustrated by finding the right transport for the tour.</p>
        <p>we are here to make the things easy for you.</p>
      </div>
      <div class="col-sm-4">
        <h3>location</h3>
        <div class="thumbnail">
          <a href="image/2.jpg"></a>
          <img src="image/2.jpg" alt="Lights" style="width:100%">
        </div>
        <p>searching for the loaction right for the tour</p>
        <p>we will provide you some awesome places to wesite which you are going to love.</p>
      </div>
    </div>
  </div>

  <div class="jumbotron text-center" style="background-color:#00bcd4;">
    <nav class="navbar navbar-pink">
      <div class="container">
        <p>please go to sign up to register yourself for the tour package</p>
        <p>if you are already registered please go to the login to view the details</p>
      </div>
    </nav>
  </div>




</body>

</html>
