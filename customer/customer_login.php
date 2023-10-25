<div class="account-page"> <!-- account page start -->
    <div class="container"><!-- container start -->
                  <div class="row" style="
                        background-color: rgb(255, 239, 231);
                        border-radius: 10px;
                        padding: 40px;
                      "><!-- row start -->
                    <div class="col-2" style="
                          background-color: rgb(255, 239, 231);
                          border-radius: 10px;
                          padding: 40px;
                        "><!-- col-2 start -->
                      <a href="admin_area/login.php" class="btn btn-primary">Admin Login only</a>
                      <img src="./images/b.png" width="100%" />
                    </div><!-- col-2 finish -->
                    <div class="col-2"><!-- col-2 start -->
          
                    <div class="form-container"><!-- form-container start -->
                        <div class="form-btn"><!-- form-btn start -->
                        <span onclick="login()">Login</span>
                        <span onclick="register()">Register</span>
                        <hr id="Indicator" />
                        </div><!-- form-btn finish -->
    
  
   
                <form method="post" action="checkout.php" id="LoginForm"><!-- form Begin -->
                    
                        <input name="c_email" placeholder="Username" type="text"  required> 
                        <input name="c_pass" placeholder="Password" type="password"  required>
                        <button name="login" value="Login" class="btn btn-primary"><i class="fa fa-sign-in"></i> Login</button>
                        
                </form><!-- form Finish -->

                <form id="RegisterForm" method="post"><!-- RegisterForm start -->
                    <input type="text" placeholder="Name" name="customer_name" required />
                    <input type="text" placeholder="Email" name="customer_email" required />
                    <input type="password" placeholder="Password" name="customer_pass" required />
                    <input type="text" placeholder="Country" name="customer_country" required />
                    <input type="text" placeholder="City" name="customer_city" required />
                    <input type="text" placeholder="Postal code" name="customer_postal" required />
                    <input type="text" placeholder="Address" name="customer_address" required />
                    <input type="text" placeholder="Contact No." name="customer_contact" required />
                    <button name="register" value="register" class="btn btn-primary"> <i class="fa fa-user-md"></i> Register</button>
                </form><!-- RegisterForm finish -->
</div><!-- form-container finish -->
  </div><!-- col-2 finish -->
      </div><!-- row finish -->
    </div><!-- container finish -->
  </div><!-- account page finish -->
    
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

.box1 {
  display: flex;
  height: 100vh;
  justify-content: space-around;
  align-items: center;
  color: #fff;
  animation: expand .8s ease forwards;
  background-color: var(--secondary-color);
  position: relative;
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


@keyframes expand {
  0% {
    transform: translateX(1400px);
  }
  100% {
    transform: translateX(0px);
  }
}

</style>
 <!-- js for login form -->
 <script>
    var LoginForm = document.getElementById("LoginForm");
    var RegisterForm = document.getElementById("RegisterForm");
    var Indicator = document.getElementById("Indicator");

    function register() {
      RegisterForm.style.transform = "translateX(0px)";
      LoginForm.style.transform = "translateX(0px)";
      Indicator.style.transform = "translateX(100px)";
    }

    function login() {
      RegisterForm.style.transform = "translateX(300px)";
      LoginForm.style.transform = "translateX(300px)";
      Indicator.style.transform = "translateX(0px)";
    }
</script>

<script src="js/jquery-331.min.js"></script>
<script src="js/bootstrap-337.min.js"></script>

<?php 

if(isset($_POST['login'])){
    
    $customer_email = $_POST['c_email'];
    
    $customer_pass = $_POST['c_pass'];
    
    $select_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";
    
    $run_customer = mysqli_query($con,$select_customer);
    
    $get_ip = getRealIpUser();
    
    $check_customer = mysqli_num_rows($run_customer);
    
    $select_cart = "select * from cart where ip_add='$get_ip'";
    
    $run_cart = mysqli_query($con,$select_cart);
    
    $check_cart = mysqli_num_rows($run_cart);
    
    if($check_customer==0){
        
        echo "<script>alert('Your email or password is wrong')</script>";
        
        exit();
        
    }
    
    if($check_customer==1 AND $check_cart==0){
        
        $_SESSION['customer_email']=$customer_email;
        
       echo "<script>alert('You are Logged in')</script>"; 
        
       echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";
        
    }else{
        
        $_SESSION['customer_email']=$customer_email;
        
       echo "<script>alert('You are Logged in')</script>"; 
        
       echo "<script>window.open('checkout.php','_self')</script>";
        
    }
    
}

?>
<?php 

if(isset($_POST['register'])){
    
    $customer_name = $_POST['customer_name'];
    
    $customer_email = $_POST['customer_email'];
    
    $customer_pass = $_POST['customer_pass'];
    
    $customer_country = $_POST['customer_country'];
    
    $customer_city = $_POST['customer_city'];
    
    $customer_postal = $_POST['customer_postal'];
    
    $customer_address = $_POST['customer_address'];
    
    $customer_contact = $_POST['customer_contact'];
    
    $c_ip = getRealIpUser();
    

    
    $insert_customer = "insert into customers (customer_name,customer_email,customer_pass,customer_country,customer_city,customer_postal,customer_address,customer_contact,customer_ip) values ('$customer_name','$customer_email','$customer_pass','$customer_country','$customer_city','$customer_postal','$customer_address','$customer_contact','$c_ip')";
    
    $run_customer = mysqli_query($con,$insert_customer);
    
    $sel_cart = "select * from cart where ip_add='$c_ip'";
    
    $run_cart = mysqli_query($con,$sel_cart);
    
    $check_cart = mysqli_num_rows($run_cart);
    
    if($check_cart>0){
        
        /// If register have items in cart ///
        
        $_SESSION['customer_email']=$customer_email;
        
        echo "<script>alert('You have been Registered Sucessfully')</script>";
        
        echo "<script>window.open('checkout.php','_self')</script>";
        
    }else{
        
        /// If register without items in cart ///
        
        $_SESSION['customer_email']=$customer_email;
        
        echo "<script>alert('You have been Registered Sucessfully')</script>";
        
        echo "<script>window.open('index.php','_self')</script>";
        
    }
    
}

?>