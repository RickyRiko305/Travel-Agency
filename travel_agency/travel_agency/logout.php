<?php
if(isset($_POST['logout'])){
  session_destroy();
  unset($_SESSION['username']);
  header("loaction: index.php");
}

?>
