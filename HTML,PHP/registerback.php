<?php
include "connection.php";
$name=$_POST['name'];
$phone=$_POST['phone'];
$addr=$_POST['addr'];
$email=$_POST['email'];
$pass=$_POST['psw'];

$query="insert into users values('null','$name','$phone','$addr','$email','$pass')";
if (mysqli_query($conn, $query)) {
    ?>
    <script>
      alert('<?php $name ?> Your SignUp is succeful');
      window.location.assign('login.html')
    </script>
      <?php
  } else {
    ?>
    <script>
      alert(' Error: something went wrong');
      window.location.assign('register.html')
    </script>
      <?php
  }


?>