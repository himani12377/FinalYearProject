<?php 
 $active='Home';

include("includes/header.php");
?>

<div class= 'box1'>  <!-- container Begin -->
      <div class="box2"><!-- container_content Begin -->
            <div class="inner_text_box"><!-- container_content_inner Begin -->
                            <div class="inner_text_box_title"><h1>Who we are</h1> </div>
                            <div class="par"><p id="homepage_text">A New Zealand wholesale importer, distributor and retailer of giftware and technical equipments. Philosophy-based products and service dedicated to sustainable, fairtrade practices for a range of manufactured unique, authentic and ethically sourced quality-crafted articles.</p></div>
            </div><!-- container_content_inner fisnish -->
            </div><!-- container_content finish  -->
            <div class="inner_img_box"><!-- container_outer_img Begin -->
                              <div class="img-inner"><img src='images/b.png'  alt="" class="container_img"/></div>

                              
      </div><!-- container_content finish -->
  </div><!-- container Begin -->
<div class="overlay"></div>
 
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