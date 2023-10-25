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
            <li>
                            <a href="../index.php">Home</a>
                        </li>
                        <li>
                            <a href="../shop.php">Products</a>
                        </li>
                        <li class="dropdown">
                            <a href="">Brands</a>
                            <ul class="dropdown-content">
                                <li><a href="#">BasicSpirit</a></li>
                                <li><a href="../Blue.php">BlueTech</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="../about.php">About us</a>
                        </li>
                        <li>
                            <a href="../gallery.php">Gallery</a>
                        </li>
                        <li>
                            <a href="../contact.php">Contact Us</a>
                        </li>

          </ul><!-- nav navbar-nav left Finish -->

        </div><!-- padding-nav Finish -->

        <a href="../cart.php" class="btn navbar-btn btn-primary right">
          <!-- btn navbar-btn btn-primary Begin -->

          <i class="fa fa-shopping-cart"></i>



        </a><!-- btn navbar-btn btn-primary Finish -->

        <div class="navbar-collapse collapse right">
          <!-- navbar-collapse collapse right Begin -->

          <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search">
            <!-- btn btn-primary navbar-btn Begin -->

            <span class="sr-only">Toggle Search</span>

            <i class="fa fa-search"></i>

          </button><!-- btn btn-primary navbar-btn Finish -->

        </div><!-- navbar-collapse collapse right Finish -->

        <div class="collapse clearfix" id="search">
          <!-- collapse clearfix Begin -->

          <form method="get" action="results.php" class="navbar-form">
            <!-- navbar-form Begin -->

            <div class="input-group">
              <!-- input-group Begin -->

              <input type="text" class="form-control" placeholder="Search" name="user_query" required>

              <span class="input-group-btn">
                <!-- input-group-btn Begin -->

                <button type="submit" name="search" value="Search" class="btn btn-primary">
                  <!-- btn btn-primary Begin -->

                  <i class="fa fa-search"></i>

                </button><!-- btn btn-primary Finish -->

              </span><!-- input-group-btn Finish -->

            </div><!-- input-group Finish -->

          </form><!-- navbar-form Finish -->

        </div><!-- collapse clearfix Finish -->

      </div><!-- navbar-collapse collapse Finish -->

    </div><!-- container Finish -->

  </div><!-- navbar navbar-default Finish -->