<?php 
 $active='Gallery';

include("includes/header.php");
?>

<style>
  .image-grid img {
    width: 400px;
    height: auto;
    margin:20px;
    border-radius: 10px;
    
  }

  .image-grid { 
    max-width: 1000px;
    margin:  auto;
    display: grid;  
    grid-template-columns: 1fr 1fr;
    gap: 2rem;
    align-items: center;
    border-radius: 10px;
    animation: expand 1s ease forwards;
    transition: all 1s ease;
      }
      .image-grid:hover{ 
        background: #e7e7e7;
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

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<?php 

 $get_gallery = "select * from gallery";
                             
 $run_gallery = mysqli_query($con,$get_gallery);
 while($row_gallery  = mysqli_fetch_array($run_gallery ))
 {
     
     $gallery_id = $row_gallery['gallery_id'];

     $gallery_img = $row_gallery['gallery_img'];

     $gallery_content = $row_gallery['gallery_content'];

     
     echo "
     <div class='image-grid'>
     
     <img src='admin_area/product_images/$gallery_img'  >
     <p> $gallery_content</p>
    
      </div>
   
 ";
 }
?>

<?php

  include("includes/footer.php");

  ?>


  <script src="js/jquery-331.min.js"></script>
  <script src="js/bootstrap-337.min.js"></script>



</body>

</html>