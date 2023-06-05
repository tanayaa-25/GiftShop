<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['Add_To_Cart'])){
        if(isset($_SESSION['cart'])){
            $myfood=array_column($_SESSION['cart'],'name');
            if(in_array($_POST['Item_Name'],$myfood)){
              
                ?>
        <script>
          alert('This Item Is Already Present In You Cart');
          window.location.assign('index.php')
        </script>
          <?php
            }
            else{
            $count=count($_SESSION['cart']);
            $_SESSION['cart'][$count]=array('name'=>$_POST['Item_Name'],'price'=>$_POST['Price'],'qnt'=>1);
            ?>
            <script>
              alert('product Added To Your Cart');
              window.location.assign('index.php')
            </script>
              <?php
        }

        }
        else
        {
            $_SESSION['cart'][0]=array('name'=>$_POST['Item_Name'],'price'=>$_POST['Price'],'qnt'=>1);
            ?>
            <script>
              alert('product Added To Your Cart');
              window.location.assign('index.php')
            </script>
              <?php
        }
    }
    if(isset($_POST['remove_item'])){
        foreach($_SESSION['cart'] as $key => $value){ 
          if($value['name']==$_POST['item_name']){
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart']=array_values($_SESSION['cart']);
            ?>
            <script>
              // alert('Food Is Removed From Cart');
              window.location.assign('cart.php')
            </script>
              <?php
          }
        }
        
      }
      if(isset($_POST['modqnt'])){
        foreach($_SESSION['cart'] as $key => $value){ 
           if($value['name']==$_POST['item_name']){
            $_SESSION['cart'][$key]['qnt']=$_POST['modqnt'];
             ?>
             <script>
               window.location.assign('cart.php')
             </script>
               <?php
           }
         }
  
      }
}

?>