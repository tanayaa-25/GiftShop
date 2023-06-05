<?php
session_start();
include "connection.php";
$count=0;
if(isset($_SESSION['cart'])){
    $count=count($_SESSION['cart']);
}
?>

<!Doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <!-- jquery link -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://kit.fontawesome.com/f1fe65a302.js" crossorigin="anonymous"></script>  

  <!--Custom CSS-->
  <link rel="stylesheet" href="admin.css">

  <title>GIFT SHOP</title>

</head>

<!--Top navigation bar-->

<body>
    
  <nav class="navbar navbar-expand-sm navbar-dark" data-id="web_navigation_bar">
    <a class="navbar-brand brand-name" href>GIFT HOUSE-ADMIN</a>
    <div class="collapse navbar-collapse" id="web_navigation_bar_collapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          
        </li>
      </ul>
      <div class="px-5" style="display: flex;">

    
       <?php
        if(isset($_SESSION['name'])){
          ?>
            <a href="logout.php"><button type="submit" class="btn btn-dropdown-toggle" >Logout</button></a>
            <p class="uname"><?php echo $_SESSION['name']; ?></p>
          <?php
        }
        else{
          ?>
           <a href="login.html"><button type="submit" class="btn btn-dropdown-toggle" >Login</button></a>
  

          <?php
        }
       ?>
       
    </div>
  </nav>
   <div class="container" style="margin-top:50px;">
    <div class="row">
        <div class="col-lg-12">
        <table class="table table-danger text-center table-striped">
            <thead>
                <tr>
                <th scope="col">Order ID</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Phone No</th>
                <th scope="col">Address</th>
                <th scope="col">Pay Mode</th>
                <th scope="col">orders</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query="select * from order_manager;";
                $user_result=mysqli_query($conn,$query);
                while($user_fatch=mysqli_fetch_assoc($user_result)){
                    echo"
                    <tr>
                        <td>$user_fatch[order_id]</td>
                        <td>$user_fatch[full_name]</td>
                        <td>$user_fatch[phone_no]</td>
                        <td> $user_fatch[addr]</td>
                        <td> $user_fatch[pay_method]</td>
                        <td>
                            <table class='table table-danger text-center table-striped'>
                            <thead>
                                <tr>
                                <th scope='col'>Item Name</th>
                                <th scope='col'>Price</th>
                                <th scope='col'>Qnt</th>
                                </tr>
                            </thead>
                            <tbody>
                            ";
                            $query2="select * from user_orders where oid='$user_fatch[order_id]'";
                            $order_result=mysqli_query($conn,$query2);
                            while($o_result=mysqli_fetch_assoc($order_result)){
                                echo"
                                <tr>
                                    <td>$o_result[iname]</td>
                                    <td>$o_result[price]</td>
                                    <td>$o_result[qnt]</td>
                                </tr>
                                
                                ";
                            }

                            echo"

                            </tbody>
                        </table>
                        
                        
                        </td>
                    </tr>
                    
                    ";

                }

                ?>
                
    
             </tbody>
        </table>
        </div>
    </div>
   </div>
   

</body>
<script>
  $(function(){
    $('#dropdown').on('change',function(){
      var url = $(this).val();
      if(url){
        window.location = url;
      }
      return false;
    })
  })
 </script>

</html>
