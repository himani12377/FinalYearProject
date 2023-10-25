<?php 
 $active='Contact';

include("includes/header.php");
?>


<div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
              
       <div class= 'box1'>  <!-- container Begin -->
      <div class="box2"><!-- container_content Begin -->
            <div class="inner_text_box"><!-- container_content_inner Begin -->
                         
                            <div class="contactform-container"><!--contactform-container start -->
                    <div class="contactform-btn"><h3>Contact Us</h3></div>

                    <form action="contact.php" method="post" class="contact-form"><!--contact-form start -->
                            
                            <div class="form-item" style="
                                    display: flex;
                                    flex-direction: row;
                                    justify-content: center;
                                    align-items: center; 
                                ">
                                <label for="name">Name: </label>
                                <input type="text" name="name" id="name" required />
                            </div>                                               <!--name  -->
                            <div class="form-item" style="
                                    display: flex;
                                    flex-direction: row;
                                    justify-content: center;
                                    align-items: center;
                                ">
                                <label for="email">Email: </label>
                                <input type="text" name="email" id="email" required />
                            </div>                                                <!--email  -->
                            <div class="form-item" style="
                                    display: flex;
                                    flex-direction: row;
                                    justify-content: center;
                                    align-items: center;
                                ">
                                <label for="subject">Subject: </label>
                                <input type="text" name="subject"  id="subject"required />
                            </div>                                                <!--subject  -->
                            <div class="form-item" style="
                                    display: flex;
                                    flex-direction: row;
                                    justify-content: center;
                                    align-items: center;
                                ">
                                <label for="message">Message: </label>
                                <textarea  name="message"  id="message" required></textarea>
                            </div>                                                 <!--message  -->
                            <button type="submit" name="submit" class="btn btn-primary">
                            <i class="fa fa-user-md"></i> Send Message </button>   <!--send  -->

                        </form><!--contact-form finish -->
                        <?php 
                       
                       if(isset($_POST['submit'])){
                           
                           /// Admin receives message with this ///
                           
                           $sender_name = $_POST['name'];
                           
                           $sender_email = $_POST['email'];
                           
                           $sender_subject = $_POST['subject'];
                           
                           $sender_message = $_POST['message'];
                           
                           $receiver_email = "thebluegroup@thebluegroup.nz";
                           
                           mail($receiver_email,$sender_name,$sender_subject,$sender_message,$sender_email) or die("Error!");
                           
                           /// Auto reply to sender with this ///
                           
                           $email = $_POST['email'];
                           
                           $subject = "Welcome to my website";
                           
                           $msg = "Thanks for sending us message. We will reply your message ASAP";
                           
                           $from = "thebluegroup@thebluegroup.nz";
                           
                           mail($email,$subject,$msg,$from);
                           
                           echo "<script>alert('Your message has been sent, we will reply soon!')</script>";
                           
                       }
                       
                       ?>
                    </div><!--contactform-container finish -->
            </div><!-- container_content_inner fisnish -->
            </div><!-- container_content finish  -->
            

                              
      </div><!-- container_content finish -->
  </div><!-- container Begin -->
<div class="overlay"></div>
            
<style>
  :root {
  --secondary-color: rgb(255, 239, 231);
  --contrast-color: #fff;
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
    margin:20px;
  display: flex;
  height: 100vh;
  justify-content: space-around;
  align-items: center;
  color: #555;
  animation: expand .8s ease forwards;
  background-color: var(--secondary-color);
  position: relative;
  transition: all .8s ease;
  border-radius: 30px;
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

<?php

  include("includes/footer.php");

  ?>


  <script src="js/jquery-331.min.js"></script>
  <script src="js/bootstrap-337.min.js"></script>

</body>

</html>