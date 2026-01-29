<?php
session_start();

if (!isset($_SESSION['Spzuserid'])) {
    
    header("location:login.php");
}
else{
    
    $category=$_SESSION['category'];
    
?>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Spacezone India</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Meiphor" name="description" />
        <meta content="Meiphor" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/sicon.png">

         <!-- DataTables -->
         <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />     

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            <?php include('header.php'); ?>

            <!-- ========== Left Sidebar Start ========== -->
            <?php include('menu.php'); ?>
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Videos</h4>

                                    <!-- Rightside start -->
                                    <div class="page-title-right">
                                       
<!-- Popup start -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                    >Add Videos</button>  
                                                    


                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog ">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Add Videos</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post" action="videos.php">
                                                            
                                                            <div class="row" >
                                                                
                                                                 
                                                                
                                                                <div class=" col-lg-12 mb-3">
                                                                    <label  class="col-form-label">Video Code</label>
                                                                    <input type="text" name="videocode" class="form-control" placeholder="Video Code" required >
                                                                   
                                                                    
                                                                </div>
                                                                
                                                               
                                                               
                                                                 
                                                            </div>
                                                                
                                                            
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" name="addvideo" class="btn btn-primary">Save</button>
                                                        </div>
                                                        </form>

 <?php


include('connect.php');

if (isset($_POST['addvideo'])) {
    $link = $_POST['videocode'];
    $date = date('d/m/Y');
    $actionby = $_SESSION['name'];
   
   
    //Image Upload Starting

   
        $insert_query = "INSERT INTO `videos`(`link`, `date`, `actionby`) VALUES ('$link','$date','$actionby')";
    
        if (mysqli_query($connect,$insert_query)) {
          
                echo "<script>window.open('videos.php','_self')</script>";  
          
        }
        else{

            echo mysqli_report($insert_query);
        }
   

}
 ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
<!--Popup End-->


                                    </div>

                                    <!--Rightside  End-->
                                    

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                       
                        <!-- end row -->

                      
                        <!-- end row -->

                        <div class="row">
                        

                                        

                                                    <?php
include('connect.php');

$select_query = "select * from videos order by id desc";

$run = mysqli_query($connect,$select_query);

$c=0;

while ($row = mysqli_fetch_array($run)) {

$c = $c+1;


?>
                    <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">

                    <iframe width="100%" height="300" src="https://www.youtube.com/embed/<?php echo $row['link']; ?>" title="Apartment balcony garden ideas || small balcony garden || latest balcony design 2025" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>    
                                    <a href="deletevideo.php?id=<?php echo $row['id']; ?>">X Delete Video</a>
                                    </div>
                                </div>
                    </div>
<?php 
} ?>
                                                   
                                               
                                        <!-- end table-responsive -->
                                 
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                <!-- end modal -->

                <!-- subscribeModal -->
              
                <!-- end modal -->
<?php include('footer.php') ?>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <!-- Required datatable js -->
        <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="assets/libs/jszip/jszip.min.js"></script>
        <script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
        <script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
        
        <!-- Responsive examples -->
        <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="assets/js/pages/datatables.init.js"></script>    

        <script src="assets/js/app.js"></script>
    </body>

</html>
<?php } ?>