<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / View Terms & conditions
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  View Terms & conditions
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
               <?php
               $get_terms = "select * from terms";
               $run_terms = mysqli_query($con,$get_terms);

               while($run_terms_section=mysqli_fetch_array($run_terms)){
                   $term_id = $run_terms_section['term_id'];
                   $term_title = $run_terms_section['term_title'];
                   $term_desc = substr ($run_terms_section['term_desc'],0,200);

  
               ?>

               <div class="col-lg-4 col-md-4">
                    <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title" align="center">
                            <?php echo $term_title; ?>

                        </h3>
                    </div>

                    <div class="panel-body">
                        <?php echo $term_desc; ?>
                    </div>

                    <div class="panel-footer">
                        <center>
                            <a href="index.php?delete_term=<?php echo $term_id; ?>" class="pull-right">
                        <i class="fa fa-trash"></i>Delete</a>

                        <a href="index.php?edit_term=<?php echo $term_id; ?> " class="pull-left">
                        <i class="fa fa-pencil"></i>Edit</a>
                        <div class="clearfix"></div>
                        </center>
                    </div>

                    </div>
               </div>

               <?php } ?>
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php } ?>