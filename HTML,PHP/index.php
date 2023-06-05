<?php
session_start();
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
  <link rel="stylesheet" href="">

  <title>GIFT SHOP</title>
  <style>
      .navbar-brand{
    font-weight: bolder;
  }

.nav-item{
    padding-left: 1rem;
}

.navbar{
    background-color: rgb(224, 169, 169) ;
} 

.footer{
    background-color: rgb(221, 187, 187) ;
}

.form-control{
    background-color: rgb(224, 186, 186) ;
    border: 1px solid rgba(255, 255, 255, .5);;
    border-radius: 0;
    opacity: 1;
}

.form-control .form-inline{
    width: 220px;
}


.form-control:focus{
    color:black;
    background-color: #fff;
    border-color:#a75470;
    box-shadow:none;
}

.form-control::placeholder{
    color: rgba(255, 255, 255, .5);
}

.btn {
    color: #fff;
    background-color:black;
    border-color:rgb(224, 186, 186);
    border-radius: 0;
    height: 38px;
  }

.btn:hover,.btn:focus  {
    color: #fff;
    box-shadow: 0 0 0 0.2rem #a56177;
  }
 

.carousel-caption,h3{
    font-weight: lighter;
}

.footer{
    font-size: x-small;
}
.dropdown{
  border: none;
  background-color: rgb(224, 169, 169) ;
  color: white;
  margin-top: 8px;
}
input:focus,
select:focus,
textarea:focus,
button:focus {
    outline: none;
}
.cart{
    display: flex;
    text-decoration: none;
    color: black;
    margin-right:40px;


}
.cart i {
    font-size: 30px;
}
.cart .count{
    display: flex;
    align-items: center;
    justify-content: center;
    background-color:rgb(224, 169, 169) ;
    width: 25px;
    height: 25px;
    border-radius: 50%;
    border:1px solid black;
    position: absolute;
    margin-left: 15px;
    font-family: 'Open Sans', sans-serif;
    
}
.uname{
  margin-top:8px;
  font-size: 16px;
  margin-left:5px;
}
  </style>
</head>

<!--Top navigation bar-->

<body>
    
  <nav class="navbar navbar-expand-sm navbar-dark" data-id="web_navigation_bar">
    <a class="navbar-brand brand-name" href>GIFT HOUSE</a>
    <div class="collapse navbar-collapse" id="web_navigation_bar_collapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">HOME <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="">ABOUT US</a>
        </li>
        <li class="nav-item active">
        <select name="CATEGORIES " id="dropdown" class="dropdown">
        <option value="CATEGORIES" selected>CATEGORIES</option>  
        <option value="kids.html">Kids</option>  
        <option value="women.html">Female</option>  
        <option value="mens.html">Male</option>  
        <option value="customized.html">Customized</option>  
        </select> 
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="register.html">REGISTER</a>
        </li>
        <!-- <li class="nav-item active">
            <a class="nav-link" href="payment.html">PAYMENT</a>
          </li> -->
          <li class="nav-item active">
            <a class="nav-link" href="feedback.html">FEEDBACK</a>
          </li>
      </ul>
      <div class="px-5" style="display: flex;">

      <a href="cart.php">
        <div class="cart">
            <i class="fa-solid fa-bag-shopping"></i>
           <div class="count">
            <h3 style="font-size:20px;margin-top:10px;"><?php echo $count; ?></h3>
           </div>
        </div>
        </a>
       <?php
        if(isset($_SESSION['name'])){
          ?>
            <a href="logout.php"><button type="submit" class="btn btn-dropdown-toggle" >Logout</button></a>
            <p class="uname"><?php echo $_SESSION['name']; ?></p>
          <?php
        }
        else{
          ?>
           <a href="login.html"><button type="submit" class="btn btn-dropdown-toggle" name="login1" >Login</button></a>
  

          <?php
        }
       ?>
       
    </div>
    
      
  
  </nav>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/bg.jpg" height="100%" width="100%" class="d-block w-100 " alt="Error loading image">
        <div class="carousel-caption d-none d-md-block">
          
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
