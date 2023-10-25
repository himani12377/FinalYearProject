<?php 

    session_start();
    include("includes/db.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
   
<div class="account-page">
      <div class="container">
        <div
          class="row"
          style="
            background-color: rgb(255, 239, 231);
            border-radius: 10px;
            padding: 40px;
          "
        >
         

          <div class="col-2">
            <div class="form-container">
              <div class="form-btn">
                <span>Admin Login</span>
              </div>

              <form id="AdminLoginForm" method="post">
                <input type="text" placeholder="Username" name="admin_email" required />
                <input type="password" placeholder="Password" name="admin_pass" required />
                <button name="admin_login" value="Login" class="btn btn-primary"><i class="fa fa-sign-in"></i> Login</button>
                <a href="../index.php" class="btn btn-primary">Back to Home</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    
</body>
</html>


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

.account-page {
  display: flex;
  height: 100vh;
  justify-content: space-around;
  
 
  animation: expand .8s ease forwards;
  background-color: var(--secondary-color);
  position: relative;
  transition: all .8s ease;
 
}


.form-container{


  animation: slideIn 1.5s ease-in-out forwards;
 
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
<?php 

    if(isset($_POST['admin_login'])){
        
        $admin_email = mysqli_real_escape_string($con,$_POST['admin_email']);
        
        $admin_pass = mysqli_real_escape_string($con,$_POST['admin_pass']);
        
        $get_admin = "select * from admins where admin_email='$admin_email' AND admin_pass='$admin_pass'";
        
        $run_admin = mysqli_query($con,$get_admin);
        
        $count = mysqli_num_rows($run_admin);
        
        if($count==1){
            
            $_SESSION['admin_email']=$admin_email;
            
            echo "<script>alert('Logged in. Welcome Back')</script>";
            
            echo "<script>window.open('index.php?dashboard','_self')</script>";
            
        }else{
            
            echo "<script>alert('Email or Password is Wrong !')</script>";
            
        }
        
    }

?>