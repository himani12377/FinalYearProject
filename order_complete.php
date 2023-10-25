
    
           
            <div id="content"><!-- #content Begin -->
    <div class="container" id="box"><!-- container Begin -->
       
            <div id="" class="col-md-7" style="color:#555;" ><!-- col-md-9 Begin -->
            
                <div class="box"><!-- box Begin -->
                    <form action="" method="post" enctype="multipart/form-data" class="deliveryForm" ><!-- form Begin -->
                   
                       
                       <h3 >Congratulations! You have placed your order successfully</h3>
                        <div class="table-responsive"><!-- table-responsive Begin -->
                       
                            <table class="table"><!-- table Begin -->
                           
                                <tbody><!-- tbody Begin -->
                                <?php 
            
            $customer_session = $_SESSION['customer_email'];
            
            $get_customer = "select * from customers where customer_email='$customer_session'";
            
            $run_customer = mysqli_query($con,$get_customer);
            
            $row_customer = mysqli_fetch_array($run_customer);
            
            $customer_id = $row_customer['customer_id'];
            
            $get_orders = "select * from customer_orders where customer_id='$customer_id'";
            
            $run_orders = mysqli_query($con,$get_orders);
            
            $i = 0;
            
            while($row_orders = mysqli_fetch_array($run_orders)){
                
                $order_id = $row_orders['order_id'];
                
                $due_amount = $row_orders['due_amount'];
                
                $invoice_no = $row_orders['invoice_no'];

                $product_title = $row_orders['product_title'];

                
                $qty = $row_orders['qty'];

                $order_date = substr($row_orders['order_date'],0,11);
                
                $order_status = $row_orders['order_status'];
                
                $i++;
                
                if($order_status=='pending'){
                    
                    $order_status = 'Unpaid';
                    
                }else{
                    
                    $order_status = 'Paid';
                    
                }
            
            ?>
                                    <tr>
                                        <td>Product name:  </td>
                                        <td>  <?php echo $product_title; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Quantity</td>
                                        <td><?php echo $pro_qty; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Invoice No: </td>
                                        <td><?php echo $invoice_no; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Order Date:</td>
                                        <td><?php echo $order_date; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Amount</td>
                                        <td>NZ$<?php echo $due_amount; ?></td>
                                    </tr>

                                   
                            
                                </tbody><!-- tbody Finish -->
                           
                            </table><!-- table Finish -->
                       <a href="customers/my_orders.php"></a></A>
                        </div><!-- table-responsive Finish -->
                        <?php } ?>
                    </form>
                </div>
            </div>
          
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


