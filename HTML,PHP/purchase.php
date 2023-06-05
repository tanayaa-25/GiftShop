<?php
include "connection.php";
session_start();
if(isset($_SESSION['name'])){
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST['purchase'])){
            $fname=$_POST['name'];
            $phon=$_POST['phone'];
            $addr=$_POST['address'];
            $pay=$_POST['pay_mod'];

            $query="insert into order_manager values('null','$fname','$phon','$addr','$pay');";
        if(mysqli_query($conn,$query)){
            $order_id=mysqli_insert_id($conn);
            $query2="insert into user_orders values(?,?,?,?);";
            $stmt=mysqli_prepare($conn,$query2);
            if($stmt){
                mysqli_stmt_bind_param($stmt,"isii",$order_id,$iname,$price,$qnt);
                foreach($_SESSION['cart'] as $key => $values){
                    $iname=$values['name'];
                    $price=$values['price'];
                    $qnt=$values['qnt'];
                    mysqli_stmt_execute($stmt);
                }
                unset($_SESSION['cart']);
                ?>
                <script>
                alert('Order Placed Succesfully');
                window.location.assign('index.php')
                </script>
                <?php
            }
            else{
                ?>
                <script>
                alert('Mysqli Error');
                window.location.assign('index.php')
                </script>
                <?php

            }

                
            }
            else{
                ?>
                <script>
                alert('Mysqli Error');
                window.location.assign('index.php')
                </script>
                <?php
            }
        }
    }
}
else{
    ?>
                <script>
                alert('Pls login first');
                window.location.assign('login.html')
                </script>
                <?php
}
?>