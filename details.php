<?php 
    $active='Cart';
    include("includes/header.php");

?>
<?php 

if(isset($_GET['pro_id'])){
    
    $product_id = $_GET['pro_id'];
    
    $get_product = "select * from products where product_id='$product_id'";
    
    $run_product = mysqli_query($con,$get_product);
    
    $row_product = mysqli_fetch_array($run_product);
    
    $cat_id = $row_product['cat_id'];
    
    $pro_title = $row_product['product_title'];
    
    $pro_price = $row_product['product_price'];
    
    $pro_desc = $row_product['product_desc'];
    
    $pro_img = $row_product['product_img'];
  
     
    $get_cat = "select * from categories where cat_id='$cat_id'";
    
    $run_cat = mysqli_query($con,$get_cat);
    
    $row_cat = mysqli_fetch_array($run_cat);
    
    $cat_title = $row_cat['cat_title'];
    
}

?>
<div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
           <div class="col-md-12"><!-- col-md-12 Begin -->
               
               <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                   <a href="shop.php">Products</a>
                   </li>
                   
                  
                  
               </ul><!-- breadcrumb Finish -->
               
           </div><!-- col-md-12 Finish -->
           
           <div class="col-md-3"><!-- col-md-3 Begin -->
   
                <?php 
                    
                    include("includes/sidebar.php");
                    
                    ?>
               
           </div><!-- col-md-3 Finish -->
  
   
          <div class="col-md-9"><!-- col-md-9 Begin -->
              <div id="productMain" class="row"><!-- row Begin -->
                   <div class="col-sm-6"><!-- col-sm-6 Begin -->
                       <div id="mainImage"><!-- #mainImage Begin -->
                          <div class="item active">
                                       <center><img class="img-responsive" src="images/coins/<?php echo $pro_img; ?>" ></center>
                          </div>
                       </div><!-- #mainImage Finish -->
                  </div><!-- col-sm-6 Finish -->

                  <div class="col-sm-6"><!-- col-sm-6 Begin -->
                      <div class="box"><!-- box Begin -->
                      
                     
                           <?php add_cart(); ?>
                           <h1> <?php echo $pro_title; ?> </h1>
                           <form action="details.php?add_cart=<?php echo $product_id; ?>" class="form-horizontal" method="post"><!-- form-horizontal Begin -->
                               
                              <div class="form-group"><!-- form-group Begin -->
                                        <div class="col-md-7"><!-- col-md-7 Begin -->
                                        
                                        <label  >Quantity:<input 
                                                    type="number"
                                                    name="product_qty"
                                                      
                                                    style=" width: 50px;
                                                    height: 30px;
                                                    padding-left: 10px;
                                                    font-size: 15px;
                                                     margin: 10px;
                                                    border: 1px solid #ff7f27;"
                                                    value="1">
                                                </label></br>
                                        
                                                    <p class="price">NZ$ <?php echo $pro_price; ?></p>
                                                   
                                                    
                                                    <button class="btn btn-primary"> Add to cart</button>
                                         
                                    </div> <!-- col-md-7 finish -->
                               </div><!-- form-group Finish -->
                               <div class="box" id="details"><!-- box Begin -->
                                            <h4>Product Details</h4>
                                            <p><?php echo $pro_desc; ?></p>
                                            </div><!-- box Finish -->
                           </form><!-- form-horizontal Finish -->
                           
                      </div><!-- box Finish -->
                   </div><!-- col-sm-6 Finish -->
                   
           </div><!-- row Finish -->

          
               
           </div><!-- col-md-9 Finish -->
           
       </div><!-- container Finish -->
   </div><!-- #content Finish -->

   
  
    
    
   
   
   
   
   
   <?php 
    
    include("includes/footer.php");
    
    ?>
   
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
  
  </body>
</html>