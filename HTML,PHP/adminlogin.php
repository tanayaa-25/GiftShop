<?php
session_start();
include "connection.php";
$username=$_POST['username'];
$pass=$_POST['password'];

$query="select * from admin where name='$username' and pass='$pass';";
$result=mysqli_query($conn, $query);
if ($row=mysqli_fetch_array($result)) {
    $_SESSION["name"]=$row['name'];
    $_SESSION["userID"]=$row['id'];
    ?>
    <script>
      alert('<?php $username ?> Login Successfully');
      window.location.assign('adminpanal.php')
    </script>
      <?php
  } else {
    ?>
    <script>
      alert(' Error: something went wrong');
      window.location.assign('admin.html')
    </script>
      <?php
  }


?>