<?php 

session_start();

include("includes/db.php");
include("functions/functions.php");

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
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>The Bluegroup</title>
  <link rel="stylesheet" href="styles/bootstrap-337.min.css">
  <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
  <link rel="stylesheet" href="styles/style.css">
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
</head>

<body>

  <div id="top">
    <!-- Top Begin -->

    <div class="container">
      <!-- container Begin -->
    
      <div class="col-md-4">
        <!-- col-md-6 Begin -->

        <ul class="menu">
          <!-- cmenu Begin -->


          <li>
          <a href="#" class="" style="background:">
                   
                   <?php 
                   
                   if(!isset($_SESSION['customer_email'])){
                       
                       echo "Welcome: Guest";
                       
                   }else{
                       
                       echo "Welcome: " . $_SESSION['customer_email'] . "";
                       
                   }
                   
                   ?>
                   
               </a>
       
          </li>
          <li>
                   <?php
                      if(!isset($_SESSION['customer_email']))
                      {
                        echo"<a href ='checkout.php'>My Account</a>";
                      }else
                      {
                        echo"<a href = 'customer/my_account.php?my_orders'>My Account</a>";
                      }
                   ?>
          </li>
          <li>
            <a href="checkout.php"> <?php 
                           
                           if(!isset($_SESSION['customer_email'])){
                       
                                echo "<a href='checkout.php'> Login </a>";

                               }else{

                                echo " <a href='logout.php'> Log Out </a> ";

                               }
                           
                           ?></a>
          </li>

        </ul><!-- menu Finish -->

      </div><!-- col-md-6 Finish -->

    </div><!-- container Finish -->

  </div><!-- Top Finish -->

  <div id="navbar" class="navbar navbar-default">
    <!-- navbar navbar-default Begin -->

    <div class="container">
      <!-- container Begin -->

      <div class="navbar-header">
        <!-- navbar-header Begin -->

        <a href="index.php" class="navbar-brand home">
          <!-- navbar-brand home Begin -->

          <img src="images/blue.png" alt="" class="hidden-xs">
          <img src="images/blue.png" alt="" class="visible-xs">

        </a><!-- navbar-brand home Finish -->

        <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">

          <span class="sr-only">Toggle Navigation</span>

          <i class="fa fa-align-justify"></i>

        </button>


      </div><!-- navbar-header Finish -->

      <div class="navbar-collapse collapse" id="navigation">
        <!-- navbar-collapse collapse Begin -->

        <div class="padding-nav">
          <!-- padding-nav Begin -->

          <ul class="nav navbar-nav left">
            <!-- nav navbar-nav left Begin -->

            <li class="<?php if($active=='Home') echo"active"; ?>">
              <a href="index.php">Home</a>
            </li>
            <li class="<?php if($active=='Products') echo"active"; ?>">
              <a href="shop.php">Products</a>
            </li>
            <li class="dropdown">
              <a href="">Brands<span class="drop-icon">▾</span></a>
              <ul class="dropdown-content">
                <li><a href="#">BasicSpirit</a></li>
                <li><a href="Blue.php">BlueTech</a></li>
              </ul>
            </li>
            <li class="<?php if($active=='About') echo"active"; ?>">
              <a href="about.php">About us</a>
            </li>
            <li class="<?php if($active=='Gallery') echo"active"; ?>">
              <a href="gallery.php">Gallery</a>
            </li>
            <li class="<?php if($active=='Contact') echo"active"; ?>">
              <a href="contact.php">Contact Us</a>
            </li> 

          </ul><!-- nav navbar-nav left Finish -->

        </div><!-- padding-nav Finish -->

        <a href="cart.php" class="btn navbar-btn btn-primary right">
          <!-- btn navbar-btn btn-primary Begin -->

          <i class="fa" style="font-size:24px">&#xf07a;</i>
  <span class='badge badge-warning' id='lblCartCount'> <?php items(); ?></span>

<style>#lblCartCount {
    font-size: 12px;
    background: #555;
    color: #fff;
    padding: 0 5px;
    vertical-align: top;
    margin-left: -10px;
}
.badge {
  padding-left: 9px;
  padding-right: 9px;
  -webkit-border-radius: 9px;
  -moz-border-radius: 9px;
  border-radius: 9px;
}

.label-warning[href],
.badge-warning[href] {
  background-color: #337ab7;
}</style>

        </a><!-- btn navbar-btn btn-primary Finish -->

     

      </div><!-- navbar-collapse collapse Finish -->

    </div><!-- container Finish -->

  </div><!-- navbar navbar-default Finish -->