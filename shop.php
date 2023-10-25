<?php 
 $active='Products';


include("includes/header.php");
?>


<div id="content"><!-- #content Begin -->
       <div class="container" id="box"><!-- container Begin -->
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
           <?php  
                   if(!isset($_GET['cat']))
                   {
             
                     echo "

                      <div class='box' style='margin-bottom:30px;' ><!-- box Begin -->
                          <h1>All products</h1>
                          <p>
                              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo deleniti accusamus, consequuntur illum quasi ut. Voluptate a, ipsam repellendus ut fugiat minima? Id facilis itaque autem, officiis veritatis perferendis, quaerat!
                          </p>
                      </div><!-- box Finish -->

                      ";
                       
                   }
            ?>
        
             <div class="row"><!-- row Begin -->
               
                   <?php 
                   
                     
                            
                         if(!isset($_GET['cat'])){
                            
                            $per_page=12; 
                             
                            if(isset($_GET['page'])){
                                
                                $page = $_GET['page'];
                                
                            }else{
                                
                                $page=1;
                                
                            }
                            
                            $start_from = ($page-1) * $per_page;
                             
                            $get_products = "select * from products order by 1 DESC LIMIT $start_from,$per_page";
                             
                            $run_products = mysqli_query($con,$get_products);
                             
                            while($row_products = mysqli_fetch_array($run_products))
                            {
                                
                                $pro_id = $row_products['product_id'];
        
                                $pro_title = $row_products['product_title'];

                                $pro_price = $row_products['product_price'];

                                $pro_img = $row_products['product_img'];
                                
                                echo "
                                
                                    <div class='col-4 center-responsive'  >
                                        <div class='product'>
                                         <a href='details.php?pro_id=$pro_id'>
                                             <img  src='images/coins/$pro_img'>
                                         </a>
                                         <div class='text'>
                                         <h4 
                                         style=' color: #555; 
                                         padding-top: 10px; 
                                          
                                         text-overflow: ellipsis;
                                         white-space: nowrap;
                                         overflow: hidden;'>
                                             <a href='details.php?pro_id=$pro_id' style='text-decoration:none'> $pro_title </a>
                                         </h4>
                                         <p class='price'>$$pro_price</p> 
                                         <input type='hidden' name='currency_code' value='NZD' >
                                         <p class='buttons'>
                                         <a class='btn btn-primary' href='details.php?pro_id=$pro_id'> 
                                            <i class='fa fa-arrow-right'></i> View Product
                                         </a> </p>

                                    </div>
                                    </div>
                                    </div>
                                ";
                             }
                        ?>
               
               </div><!-- row Finish -->
               
               <center>
                   <ul class="pagination"><!-- pagination Begin -->
					 <?php
                             
                    $query = "select * from products";
                             
                    $result = mysqli_query($con,$query);
                             
                    $total_records = mysqli_num_rows($result);
                             
                    $total_pages = ceil($total_records / $per_page);
                             
                        echo "
                        
                            <li>
                            
                                <a href='shop.php?page=1'> ".'First Page'." </a>
                            
                            </li>
                        
                        ";
                             
                        for($i=1; $i<=$total_pages; $i++){
                            
                              echo "
                        
                            <li>
                            
                                <a href='shop.php?page=".$i."'> ".$i." </a>
                            
                            </li>
                        
                        ";  
                            
                        };
                             
                        echo "
                        
                            <li>
                            
                                <a href='shop.php?page=$total_pages'> ".'Last Page'." </a>
                            
                            </li>
                        
                        ";
                             
					    	}
							
						
					 
					 ?> 
                       
                   </ul><!-- pagination Finish -->
               </center>
                
                <?php 
               
   
               
               getpcatpro()
               
               ?>  
               
           </div><!-- col-md-9 Finish -->
           
       </div><!-- container Finish -->
   </div><!-- #content Finish -->
   
<style>
#box {

animation: expand .8s ease forwards;
background-color: var(--secondary-color);

transition: all .8s ease;

}
@keyframes expand {
  0% {
    transform: translateX(1400px);
  }
  100% {
    transform: translateX(0px);
  }
}</style>



    <?php

    include("includes/footer.php");

    ?>


    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>



</body>

</html>