<?php 
 $active='About';

include("includes/header.php");
?>




  
<div class= 'box1'>  <!-- container Begin -->
      <div class="box2"><!-- container_content Begin -->
            <div class="inner_text_box"><!-- container_content_inner Begin -->
                            <div class="inner_text_box_title"> <h1>About Us</h1> </div>
                            <div class="par"><h3 id="homepage_text">Our businesses</h3><p id="homepage_text"> The Blue Group Importing is an enterprise set up by business
                    owner and entrepreneur Toshala Elliott. The Blue Group is a
                    consortium of businesses formed under a common
                    philosophy-inspired theme. The first business to join this
                    consortium was The Blue Bird Vegetarian Café, which was formed
                    in 1995 under the auspices of the Sri Chinmoy Centre. Basic
                    Spirit giftware is a Canadian line of pewter-based
                    spiritually-themed giftware that has been imported by The Blue
                    Group since 2002.</p>
                    <h3 id="homepage_text"> Meet Dr Toshala Elliott</h3>
                <p id="homepage_text">
                    Toshala has a PhD from the University of Waikato in Animal
                    Physiology and Endocrinology and has worked as a senior research
                    associate with the Growth Physiology Department of the then
                    MAFTechnology, Ruakura Agricultural Research Centre in Hamilton.
                    She has owned and operated businesses in the Auckland region
                    since 1995.<br />
                    In her spare time she is a professional musician, is an avid
                    meditator with the Sri Chinmoy Centre, and she also dabbles in
                    writing. Toshala has toured through Europe, North America and
                    Oceania as the piano accordionist in the international
                    Gandharva-Loka Orchestra. This is the orchestra in concert in
                    Paris in 2010<br />
                
                  </p>
                  </div>
            </div><!-- container_content_inner fisnish -->
            </div><!-- container_content finish  -->
            <div class="inner_img_box"><!-- container_outer_img Begin -->
                              <div class="img-inner">
                                <div class="row"> 
                                  <div class="column">
                                   <a href="index.php"> <img src="images/newblue.png" style="width:100%"></a>
                                   <a href="Blue.php">  <img src="images/Bluetech.png" style="width:100%"></a>
                                   <a href="http://www.thebluebird.co.nz/" target="_blank">  <img src="images/bluebird.png" style="width:100%"></a>
                                   <a href="">  <img src="images/BASICSPIRIT.png" style="width:100%"></a>
                                  </div>
                                </div>
                              </div>

<style>
.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  padding: 0 4px;
  animation: slideIn 1.5s ease-in-out forwards;
  
  
}

/* Create four equal columns that sits next to each other */
.column {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
  max-width: 50%;
  padding: 20px;
  background:#f7e3d7;
border-radius:20px;
 
}

.column img {
  margin-top: 8px;
  vertical-align: middle;
  width: 100%;
  padding: 10px;
   transition: transform 0.5s;

}
.column img:hover {  transform: scale(0.9);
}

/* Responsive layout - makes a two column-layout instead of four columns */
@media screen and (max-width: 800px) {
  .column {
    -ms-flex: 50%;
    flex: 50%;
    max-width: 50%;
  }
}

/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column {
    -ms-flex: 100%;
    flex: 100%;
    max-width: 100%;
  }
}</style>
                              
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
  height: 120vh;
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
 margin: 20px;
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