<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['edit_term'])){
        
        $edit_term_id = $_GET['edit_term'];
        
        $edit_term_query = "select * from terms where term_id='$edit_term_id'";
        
        $run_edit = mysqli_query($con,$edit_term_query);
        
        $row_edit = mysqli_fetch_array($run_edit);
        
        $term_id = $row_edit['term_id'];
        
        $term_title = $row_edit['term_title'];

        $term_link = $row_edit['term_link'];
        
        $term_desc = $row_edit['term_desc'];
        
    }

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit Terms
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-pencil fa-fw"></i> Edit Terms
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post"><!-- form-horizontal begin -->
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Term Title 
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input value=" <?php echo $term_title; ?> " name="term_title" type="text" class="form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->
                    
                    <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                    
                         Edit Term LInk 
                    
                    </label><!-- control-label col-md-3 finish --> 
                    
                    <div class="col-md-6"><!-- col-md-6 begin -->
                    
                    <input value=" <?php echo $term_link; ?> " name="term_link" type="text" class="form-control">
                    
                    </div><!-- col-md-6 finish -->
                
                </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Terms Description 
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <textarea  name="term_desc" cols="19" rows="6" class="form-control"><?php echo $term_desc; ?></textarea>
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                             
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input value="Update term" name="update" type="submit" class="form-control btn btn-primary">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->
                </form><!-- form-horizontal finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->
<script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script> 


<?php  

          if(isset($_POST['update'])){
              
              $term_title = $_POST['term_title'];

              $term_link = $_POST['term_link'];
              
              $term_desc = $_POST['term_desc'];
              
              $update_term = "update terms set term_title='$term_title',term_desc='$term_desc',term_link='$term_link' where term_id='$term_id'";
              
              $run_terms= mysqli_query($con,$update_term);
              
              if($run_terms){
                  
                  echo "<script>alert('Your term Has Been Updated')</script>";
                  
                  echo "<script>window.open('index.php?view_terms','_self')</script>";
                  
              }
              
          }

?>



<?php } ?> 