

<div id="footer">
    <!-- #footer Begin -->
    <div class="container">
        <!-- container Begin -->
        <div class="row">
            <!-- row Begin -->
           



            <div class="col-sm-6 col-md-3 center-responsive">
                <!-- col-sm-6 col-md-3 Begin -->

                <h4>Help</h4>

                <ul>
                    <!-- ul Begin -->
                    <li><a href="Terms.php">Terms and Conditions</a></li>
                    <li><a href="Privacy.php">Privacy policy</a></li>
                 

                </ul><!-- ul Finish -->



                <hr class="hidden-md hidden-lg">

            </div><!-- col-sm-6 col-md-3 Finish -->
            <div class="col-sm-6 col-md-3 center-responsive">
                <!-- col-sm-6 col-md-3 Begin -->



                <h4>User Section</h4>

                <ul>
                    <!-- ul Begin -->
                    <?php
                      if(!isset($_SESSION['customer_email']))
                      {
                        echo"<a href ='checkout.php'>My Account</a>";
                      }else
                      {
                        echo"<a href = 'customer/my_account.php?my_orders'>My Account</a>";
                      }
                   ?>
                    <li><a href="customer_register.php">Register</a></li>
                    
                    <?php
                      if(!isset($_SESSION['customer_email']))
                      {
                        echo"<a href ='checkout.php'>My Orders</a>";
                      }else
                      {
                        echo"<a href = 'customer/my_account.php?my_orders'>My Orders</a>";
                      }
                   ?>
                </ul><!-- ul Finish -->

                <hr class="hidden-md hidden-lg hidden-sm">

            </div><!-- col-sm-6 col-md-3 Finish -->

            <div class="col-sm-6 col-md-3 center-responsive">

                <h4>Newsletter</h4>

                <p class="text-muted">
                    Dont miss our latest products update.
                </p>

                <form action="mailchimp_action.php" method="post">
                    <!-- form begin -->
                    <div class="input-group center-responsive">
                        <!-- input-group begin -->

                        <input type="email" placeholder="Your Email" class="form-control" name="email" style="border-radius: 30px">
                       
                       
                        <input type="submit" name="submit" value="Sign up" class="btn btn-primary">
                      
                        <?php
                            $statusMsg = !empty($_SESSION['msg'])?$_SESSION['msg']:'';
                            unset($_SESSION['msg']);
                            echo $statusMsg;
                        ?>

                    </div><!-- input-group Finish -->
                </form><!-- form Finish -->



            </div>
        </div><!-- row Finish -->
    </div><!-- container Finish -->
</div><!-- #footer Finish -->


<div id="copyright">
    <!-- #copyright Begin -->
    <div class="container">
        <!-- container Begin -->
        <div class="col-md-6">
            <!-- col-md-6 Begin -->

            <p class="pull-left">&copy;Copyright 2021 - The Blue Group </p>

        </div><!-- col-md-6 Finish -->

    </div><!-- container Finish -->
</div><!-- #copyright Finish -->