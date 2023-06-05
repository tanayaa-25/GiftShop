<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/f1fe65a302.js" crossorigin="anonymous"></script>  
    <style>
        .redirect{
  text-decoration: none;
  color: black;
  font-size: 20px;
  margin: 20px;

}
        </style>
</head>
<body>
<a href="index.php" class="redirect"> <i class="fa-solid fa-bars"></i>  Home</a> 
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center border rounded bg-light my-5">
            <h1 >My Cart</h1>
            </div>
            <?php
            if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0){
                ?>
            <div class="col-lg-8">

            <table class="table">
                <thead>
                    
                    <tr>
                    <th scope="col">Serial No.</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Item Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col">Action</th>
                    </tr>
                 
                </thead>
                <tbody>
                <?php
                $Gtotal=0;
           
                    foreach($_SESSION['cart'] as $key => $value){
                        $Gtotal=$Gtotal+ $value['price'];
                        $sr=$key+1;
                    ?>
                    <tr>
                    <th scope="row"><?php echo $sr; ?></th>
                    <td><?php echo "$value[name]" ?></td>
                    <td><?php echo "$value[price]" ?><input type="hidden" class="iprice" value="<?php echo "$value[price]" ?>   "></td>
                    <td>
                        <form action="manage_cart.php" method="post" >
                        <input class="text-center iquantity" name="modqnt" onchange='this.form.submit();'  type="number" value="<?php echo "$value[qnt]" ?>" min='1' max='10'>
                        <input type="hidden" name="item_name" value="<?php echo "$value[name]" ?>">
                    </form>
                    </td>
                    <td class='itotal'>0</td>
                    <td>
                        <form action="manage_cart.php" method="post">
                            <button name="remove_item" class="btn btn-sm btn-outline-danger">REMOVE</button>
                            <input type="hidden" name="item_name" value="<?php echo "$value[name]" ?>">
                        </form>
                    </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
            </div>
            <div class="col-lg-3">
             <div class="border bg-light rounded p-4">
             <h4>Total:</h4>
             <h5 class="text-right" id="gtotal"></h5>
             <br>
             <form action="purchase.php" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-control" required >
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Phone No</label>
                    <input type="number" name="phone" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" required >
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="pay_mod" value="COD" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                       Cash On Delivery
                    </label>
                </div>
                <br>
            <button class="btn btn-primary btn-block" name="purchase">Make Purchase</button>
        </form>
             </div>
        </div>
        </div>
            <?php }
            else{

               echo " <h1>Cart is Empty</h1>";
            }
            ?>
           
        
    </div>
    <script>
        var price=document.getElementsByClassName('iprice');
        var qnt=document.getElementsByClassName('iquantity');
        var total=document.getElementsByClassName('itotal');
        var gtotal=document.getElementById('gtotal');
        function subTotal()
        {
            gt=0;
            for( let i = 0; i < price.length; i++)
            {
                total[i].innerText=(price[i].value)*(qnt[i].value);
            
                gt=gt+(price[i].value)*(qnt[i].value);

            }
            gtotal.innerText=gt;
        }
subTotal();


        </script>
</body>
</html>