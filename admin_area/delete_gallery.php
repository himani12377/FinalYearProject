<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_gallery'])){
        
        $delete_id = $_GET['delete_gallery'];
        
        $delete_gallery = "delete from gallery where gallery_id='$gallery_id'";
        
        $run_delete = mysqli_query($con,$delete_gallery);
        
        if($run_delete){
            
            echo "<script>alert('Image deleted')</script>";
            
            echo "<script>window.open('index.php?view_gallery','_self')</script>";
            
        }
        
    }

?>

<?php } ?>