<?php

include "connection.php";

$name=$_POST['fullName'];
$gen=$_POST['gender'];
$email=$_POST['email'];
$com=$_POST['comments'];

$query="insert into ufeedback values('null','$name','$gen','$email','$com')";
if (mysqli_query($conn, $query)) {
    ?>
    <script>
      alert('Feedback Submited ');
      window.location.assign('index.php')
    </script>
      <?php
  } else {
    ?>
    <script>
      alert(' Error: something went wrong');
      window.location.assign('index.php')
    </script>
      <?php
  }

?>