<?php 
include("includes/header.php");
?>
<div id="content"><!-- #content Begin -->
    <div class="container" id="box"><!-- container Begin -->
        <div class="col-md-12"><!-- col-md-12 Begin -->
                
                <ul class="breadcrumb"><!-- breadcrumb Begin -->
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        Cart
                    </li>
                </ul><!-- breadcrumb Finish -->
                
            </div><!-- col-md-12 Finish -->
            <div id="cart" class="col-md-9"><!-- col-md-9 Begin -->
               
               <div class="box"><!-- box Begin -->
                    <form action="cart.php" method="post" enctype="multipart/form-data"><!-- form Begin -->
                        <h3>Shopping Cart</h3>
                        
                        <?php 
                        
                            $ip_add = getRealIpUser();
                            $select_cart = "select * from cart where ip_add='$ip_add'";
                            $run_cart = mysqli_query($con,$select_cart);
                            $count = mysqli_num_rows($run_cart);
                        
                        ?>
                        <p class="text-muted">You currently have <?php echo $count; ?> item(s) in your cart</p>
                        <div class="table-responsive"><!-- table-responsive Begin -->
                           
                           <table class="table"><!-- table Begin -->
                               <thead><!-- thead Begin -->
                                   <tr><!-- tr Begin -->
                                   
                                        <th colspan="2" >Product</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Remove</th>
                                            <th colspan="2">Subtotal</th>
                                   </tr><!-- tr Finish -->
                                </thead><!-- thead Finish -->
                               
                                    <tbody><!-- tbody Begin -->
                                        <?php 
                                        
                                        $total = 0;
                                   
                                        while($row_cart = mysqli_fetch_array($run_cart)){
                                            
                                          $pro_id = $row_cart['p_id'];
                                          
                                          $pro_qty = $row_cart['qty'];
                                            
                                            $get_products = "select * from products where product_id='$pro_id'";
                                            
                                            $run_products = mysqli_query($con,$get_products);
                                            
                                            while($row_products = mysqli_fetch_array($run_products)){
                                                
                                                $product_title = $row_products['product_title'];
                                                
                                                $product_img = $row_products['product_img'];
                                                
                                                $only_price = $row_products['product_price'];
                                                
                                                $sub_total = $row_products['product_price']*$pro_qty;
                                                
                                                $total += $sub_total;

                                            // $cartTotal = document.getElementById( $sub_total).value;
                                                 
                                        ?>
                                        <tr><!-- tr Begin -->
                                       
                                        <td>
                                        <div class="cart-info">
                                        <img class="img-responsive" src="admin_area/product_images/<?php echo $product_img; ?>">
                                        <td>
                                            <a href="details.php?pro_id=<?php echo $pro_id; ?>"> <?php echo $product_title; ?> </a>
                                            </td>
                                        </div>
                                        </td>
                                        <td><?php echo $pro_qty; ?></td>
                                        <td>$<?php echo $only_price; ?></td>
                                        <td> <input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"></td>
                                        <td> $<?php echo $sub_total; ?></td>
                                       
                                   </tr><!-- tr Finish -->
                                   
                                   <?php } } ?>
                                    </tbody><!-- tbody Finish -->
                                    <tfoot><!-- tfoot Begin -->
                                   
                                        <tr><!-- tr Begin -->
                                            
                                            <th colspan="4">Total Price</th>
                                            <th colspan="2">$<?php echo $total; ?></th>
                                            
                                        </tr><!-- tr Finish -->
                                   
                                    </tfoot><!-- tfoot Finish -->
                               
                           </table><!-- table Finish -->
                           
                       </div><!-- table-responsive Finish -->
                    
                           
                       <div class="box-footer"><!-- box-footer Begin -->
                           
                           <div class="pull-left"><!-- pull-left Begin -->
                               
                               <a href="index.php" class="btn btn-default"><!-- btn btn-default Begin -->
                                   
                                   <i class="fa fa-chevron-left"></i> Continue Shopping
                                   
                               </a><!-- btn btn-default Finish -->
                               
                           </div><!-- pull-left Finish -->
                           
                           <div class="pull-right"><!-- pull-right Begin -->
                               
                               <button type="submit" name="update" value="Update Cart" class="btn btn-default"><!-- btn btn-default Begin -->
                                   
                                   <i class="fa fa-refresh"></i> Update Cart
                                   
                               </button><!-- btn btn-default Finish -->
                               
                               <a href="checkout.php" class="btn btn-primary">
                                   
                                   Proceed Checkout <i class="fa fa-chevron-right"></i>
                                   
                               </a>
                              
                           </div><!-- pull-right Finish -->
                           
                       </div><!-- box-footer Finish -->
                     </form><!-- form finish -->
                </div><!-- box finish -->
                <?php 
               
                function update_cart(){
                    
                    global $con;
                    
                    if(isset($_POST['update'])){
                        
                        foreach($_POST['remove'] as $remove_id){
                            
                            $delete_product = "delete from cart where p_id='$remove_id'";
                            
                            $run_delete = mysqli_query($con,$delete_product);
                            
                            if($run_delete){
                                
                                echo "<script>window.open('cart.php','_self')</script>";
                                
                            }
                            
                        }
                        
                    }
                    
                }
               
               echo @$up_cart = update_cart();
               
               ?>
            
            </div><!-- col-md-9 finish -->
            <div class="col-md-3" style="background:#f7f7f7; border-radius: 20px ; margin-top:80px"><!-- col-md-3 Begin -->
               
               <div id="order-summary" class="box"><!-- box Begin -->
                   
                 
                       
                       <h4 style="padding:20px">Order Summary</h4>
                       
                   
                   
                   <p class="text-muted"><!-- text-muted Begin -->
                       
                       Shipping and additional costs are calculated based on value you have entered
                       
                   </p><!-- text-muted Finish -->
                   
                   <div class="table-responsive"><!-- table-responsive Begin -->
                       
                       <table class="table"><!-- table Begin -->
                           
                           <tbody><!-- tbody Begin -->
                               
                               <tr><!-- tr Begin -->
                                   
                                   <td> Order All Sub-Total </td>
                                   <td> $<?php echo $total; ?> </td>
                                   
                               </tr><!-- tr Finish -->
                               
                               <tr><!-- tr Begin -->
                                   
                                   <td> Shipping and Handling </td>
                                   <td> $0 </td>
                                   
                               </tr><!-- tr Finish -->
                               
                               <tr><!-- tr Begin -->
                                   
                                   <td> Tax </td>
                                   <td> $0 </td>
                                   
                               </tr><!-- tr Finish -->
                               
                               <tr class="total"><!-- tr Begin -->
                                   
                                   <td> Total </td>
                                   <td> $<?php echo $total; ?> </td>
                                   
                               </tr><!-- tr Finish -->
                               
                           </tbody><!-- tbody Finish -->
                           
                       </table><!-- table Finish -->
                       
                   </div><!-- table-responsive Finish -->
                   
               </div><!-- box Finish -->
               
<style>
  :root {
  --secondary-color: #fff;
  --contrast-color: #ff7f27;
}
.overlay {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  height: 100%;
  z-index: -10;
  background-color: var(--contrast-color);
}

#box {

  animation: expand .8s ease forwards;
  background-color: var(--secondary-color);
 
  transition: all .8s ease;
 
}

.box2 {
 width: 50%;
}

.inner_text_box {
  width: 80%;
  margin-left: 80px;
}

.inner_img_box {
  margin: 50px;
  width: 50%;
  overflow: hidden;
}   
    
.container_img {
  width: 100%;
  animation: slideIn 1.5s ease-in-out forwards;
}

.par {
  height: auto;
  overflow: hidden;
}

#homepage_text{
  line-height: 28px;
  color:  #333333;
  transform: translateY(300px);
  animation: slideUp .8s ease-in-out forwards .8s;
  text-align: justify;
}


.title {
  overflow: hidden;
  height: auto;
}

h1 {
    font-size: 40px;
    color: var(--contrast-color);
    margin-bottom: 20px;
    transform: translateY(100px);
    animation: slideUp .8s ease forwards .5s;
}

@keyframes slideIn {
  0% {
    transform: translateX(500px) scale(.2);
  }
  100% {
    transform: translateX(0px) scale(1);
  }
}

@keyframes slideUp {
  0% {
    transform: translateY(300px);
  }
  100% {
    transform: translateY(0px);
  }
}

@keyframes expand {
  0% {
    transform: translateX(1400px);
  }
  100% {
    transform: translateX(0px);
  }
}

</style>


           </div><!-- col-md-3 Finish -->
        </div><!-- container Finish -->
</div><!-- content Finish -->


