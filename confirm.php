
<div id="content"><!-- #content Begin -->
    <div class="container" id="box"><!-- container Begin -->
        <div class="col-md-12"><!-- col-md-12 Begin -->
                
                <ul class="breadcrumb"><!-- breadcrumb Begin -->
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        Checkout
                    </li>
                </ul><!-- breadcrumb Finish -->
                
            </div><!-- col-md-12 Finish -->
            
            <div id="" class="col-md-7" style="color:#555;" ><!-- col-md-9 Begin -->
            
                <div class="box"><!-- box Begin -->
                    <form action="" method="post" enctype="multipart/form-data" class="deliveryForm" ><!-- form Begin -->
                    <?php 
                        
                        $ip_add = getRealIpUser();
                        $select_cart = "select * from cart where ip_add='$ip_add'";
                        $run_cart = mysqli_query($con,$select_cart);
                        $count = mysqli_num_rows($run_cart);
                    
                    ?>
                 
                       
                       <h3 >Your Order</h3>
                 <div class="table-responsive"><!-- table-responsive Begin -->
                       
                       <table class="table"><!-- table Begin -->
                           
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
                                   
                                   <td>  <img class="img-responsive" src="admin_area/product_images/<?php echo $product_img; ?>"></td>
                                   <td><?php  $pro_id; ?> 
                                      <?php echo $product_title; ?>  
                                      <br>Quantity: <?php echo $pro_qty; ?>
                                      <br>NZ$<?php echo $only_price; ?>
                                      
                                </td>
                                   
                               </tr><!-- tr Finish -->
                               
                               <?php } } ?>
                               
                               <tr class="total"><!-- tr Begin -->
                                   
                                   <td><h4>Total</h4>  </td>
                                   <td><h4>NZ$<?php echo $total; ?></h4>  </td>
                                   
                               </tr><!-- tr Finish -->
                            
                           </tbody><!-- tbody Finish -->
                           
                       </table><!-- table Finish -->
                       
                   </div><!-- table-responsive Finish -->
                  
                  </form><br><br>
                  <form action="" method="post" enctype="multipart/form-data" class="selectPaymentForm" >
                    <h3>Shipping and Handling</h3>
                    <div class="payment-box"></div>

                   <div class="paymentOptions">
                     <label class="option">
                            <div class="option_title">Standard delivery 7-10 days (NZ$7.99)</div>
                              
                            <div class="icons"></div>
                              <div class="icon_img">
                                
                                <input type="radio" name="payment" value="credit">
                                
                              </div>
                    </label>
                    
                    <label class="option">
                            <div class="option_title">Express Delivery 3-4 days (NZ$13.99)</div>
                              
                            <div class="icons"></div>
                              <div class="icon_img">
                                
                                <input type="radio" name="payment" value="poli">
                               
                              </div>
                    </label>
                   </div>
                  
</form>
                  <br><br>
                  <form action="" method="post" enctype="multipart/form-data" class="selectPaymentForm" >
                    <h3>Select Payment Option</h3>
                    <div class="payment-box"></div>
                   <div class="paymentOptions">
                     <label class="option">
                            <div class="option_title">Secure credit card</div>
                              
                            <div class="icons"></div>
                              <div class="icon_img">
                                <img src="https://cdn11.bigcommerce.com/s-v7ajalirzz/stencil/21abcc60-2fc2-013a-2a2b-6ad5f58f6a49/e/811332f0-27dc-013a-09e3-3a9dd6acacf9/img/checkout-payment/checkout-icon-secure-credit-card.svg" class="img"alt="">
                                <input type="radio" name="payment_method" value="credit">
                                
                              </div>
                    </label>
                    <label class="option">
                            <div class="option_title">Paypal</div>
                              
                            <div class="icons"></div>
                              <div class="icon_img">
                                <img src="https://cdn11.bigcommerce.com/s-v7ajalirzz/stencil/21abcc60-2fc2-013a-2a2b-6ad5f58f6a49/e/811332f0-27dc-013a-09e3-3a9dd6acacf9/img/checkout-payment/checkout-icon-pay-pal.svg" class="img"alt="">
                                <input type="radio" name="payment_method" value="paypal_checkout">
                               
                              </div>
                    </label>
                    <label class="option">
                            <div class="option_title">POLI</div>
                              
                            <div class="icons"></div>
                              <div class="icon_img">
                                <img src="images/poli.png" class="img"alt="">
                                <input type="radio" name="payment_method" value="poli">
                               
                              </div>
                    </label>
                   </div> <?php 
    
    $session_email = $_SESSION['customer_email'];
    
    $select_customer = "select * from customers where customer_email='$session_email'";
    
    $run_customer = mysqli_query($con,$select_customer);
    
    $row_customer = mysqli_fetch_array($run_customer);
    
    $customer_id = $row_customer['customer_id'];
    
    ?>
    
                   
                   <a class="btn btn-primary" href="order.php?c_id=<?php echo $customer_id ?>"> Place Order </a>
<p>*You will be redirected to third party payment website based on option you choose</p>
</form><br><br>
                </div><!-- box finish -->
            </div><!-- col-md-9 finish -->

            <div id="" class="col-md-5" style="color:#555;" >
            <div class="box"><!-- box Begin -->
                    <form action="" method="post" enctype="multipart/form-data" class="deliveryForm" ><!-- form Begin -->
                    <?php 
                        
                        $ip_add = getRealIpUser();
                        $select_cart = "select * from cart where ip_add='$ip_add'";
                        $run_cart = mysqli_query($con,$select_cart);
                        $count = mysqli_num_rows($run_cart);
                    
                    ?>
                 
                       
                       <h3 >Your Details</h3>
                 <div class="table-responsive"><!-- table-responsive Begin -->
                       
                       <table class="table"><!-- table Begin -->
                           
                           <tbody><!-- tbody Begin -->
                           <?php  $customer_session = $_SESSION['customer_email'];
                                        $get_customer = "select * from customers where customer_email='$customer_session'";
                                        $run_customer = mysqli_query($con,$get_customer);
                                        $row_customer = mysqli_fetch_array($run_customer);
                                        $customer_id = $row_customer['customer_id'];
                                        $customer_name = $row_customer['customer_name'];
                                        $customer_email= $row_customer['customer_email'];
                                        $customer_country= $row_customer['customer_country'];
                                        $customer_city= $row_customer['customer_city'];
                                        $customer_postal= $row_customer['customer_postal'];
                                        $customer_address= $row_customer['customer_address'];
                                        $customer_contact= $row_customer['customer_contact'];
                                       ?>
                                        <tr><!-- tr Begin -->
                                   
                                        <td>Name: </td>
                                        <td> <?php echo $customer_name; ?>  </td>
                                        
                                       </tr><!-- tr Finish -->
                                       <tr><!-- tr Begin -->
                                   
                                   <td>Email:</td>
                                   <td> <?php echo $customer_email; ?>  </td>
                                   
                                  </tr><!-- tr Finish -->
                                  <tr><!-- tr Begin -->
                                   
                                   <td>Country:</td>
                                   <td> <?php echo $customer_country; ?>  </td>
                                   
                                  </tr><!-- tr Finish -->
                                  <tr><!-- tr Begin -->
                                   
                                   <td>City:</td>
                                   <td> <?php echo $customer_city; ?>  </td>
                                   
                                  </tr><!-- tr Finish -->
                                  <tr><!-- tr Begin -->
                                   
                                   <td>Postal: </td>
                                   <td> <?php echo $customer_postal; ?>  </td>
                                   
                                  </tr><!-- tr Finish -->
                                  <tr><!-- tr Begin -->
                                   
                                   <td>Address:</td>
                                   <td> <?php echo $customer_address; ?>  </td>
                                   
                                  </tr><!-- tr Finish -->
                                  <tr><!-- tr Begin -->
                                   
                                   <td>Contact: </td>
                                   <td> <?php echo $customer_contact; ?>  </td>
                                   
                                  </tr><!-- tr Finish -->
                         </tbody><!-- tbody Finish -->
                           
                       </table><!-- table Finish -->
                       <a href="shop.php" class="btn btn-primary">Continue shopping</a>
                   </div><!-- table-responsive Finish -->
                
                   </form>
                </div><!-- box finish -->
            </div><!-- col-md-9 finish -->

<style>
  .deliveryForm input{
    width:80%;
  }
  .selectPaymentForm{
    background:#f7f7f7; 
    border-radius: 20px ; 
    padding: 30px;
  }
  .deliveryForm {
    background:#f7f7f7; 
    border-radius: 20px ; 
    padding: 30px;
  }

  .img {
    margin-right: 20px;
  }
 
  .icon_img {
    display: flex;
    align-items: center;
    justify-content: flex-end;
  }
  .icons {
    font-size: 12px;
    line-height: 15px;
    font-weight: bold;
    color: #555;
    letter-spacing: 1px;
    text-transform: uppercase;
    margin-right: 20px;
  }
 input[type=radio] {
    box-sizing: border-box;
    padding: 0;
    width: 20px;
    height: 20px;
    border-radius: 10px;
    border: 1px solid #505050;
    display: inline-block;
    position: relative;
    cursor: pointer;
    flex-shrink: 0;
}
  .payment-box {
    display: flex;
    flex-basis: 100%;
    flex-flow: row wrap;
    padding: 20px 26px;
    border-top: 1px solid #F2F2F2;
  }
  .paymentOptions {
    display: flex;
    flex-basis: 100%;
    flex-flow: row wrap;
    margin-bottom: 12px;
    padding: 0 12px;
  }
  .option {
    color: #606f7b;
    display: flex;
    flex-basis: 100%;
    flex-flow: row nowrap;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
  }
  .option_title {
    flex-basis: 70%;
    flex-grow: 2;
    font-size: 12px;
    line-height: 15px;
    font-weight: bold;
    color: #555;
    letter-spacing: 1px;
    text-transform: uppercase;
  }
</style>
    </div><!-- container Finish -->
</div><!-- content Finish -->


