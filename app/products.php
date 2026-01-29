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
                                    <h4 class="mb-sm-0 font-size-18">Products</h4>

                                    <!-- Rightside start -->
                                    <div class="page-title-right">
                                       
<!-- Popup start -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                    >Add Product</button>  
                                                    


                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog ">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post" action="products.php" enctype="multipart/form-data">
                                                            
                                                            <div class="row" >
                                                                
                                                                <div class=" col-lg-12 mb-3">
                                                                    <label  class="col-form-label">Name</label>
                                                                    <input type="text" name="name" class="form-control" placeholder="Name" required >
                                                                    
                                                                </div>
                                                                <div class=" col-lg-12 mb-3">
                                                                    <label  class="col-form-label">Link</label>
                                                                    <textarea name="description"  class="form-control" placeholder="Product Description" required  id=""></textarea>
                                                                    
                                                                    
                                                                </div>
                                                               
                                                                 <div class=" col-lg-12 mb-3">
                                                                    <label  class="col-form-label">Image</label>
                                                                    <input type="file" accept=".png,.jpg,.jpeg" class="form-control" id="horizontal-password-input" name="image"
                                                                    >
                                                                </div>
                                                               
                                                               
                                                                 
                                                            </div>
                                                                
                                                            
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" name="addproduct" class="btn btn-primary">Save</button>
                                                        </div>
                                                        </form>

 <?php


include('connect.php');

if (isset($_POST['addproduct'])) {

    $name = $_POST['name'];
    $des = $_POST['description'];
   
   
    //Image Upload Starting
      
    //Image Upload Starting
    $random_digit=rand(10,100);
    $pathname = 'files/'; 

     $uploadpathc = $pathname.$random_digit.( $_FILES['image']['name']);
     $image=$random_digit.($_FILES['image']['name']);

    if(move_uploaded_file($_FILES['image']['tmp_name'], $uploadpathc))
    {   
        echo "upload success";
    
   
        $insert_query = "INSERT INTO `products`(`name`, `des`, `image`) VALUES ('$name','$des','$image')";
    
        if (mysqli_query($connect,$insert_query)) {
          
                echo "<script>window.open('products.php','_self')</script>";  
          
        }
        else{
            echo mysqli_report($insert_query);
        }
    }
    else
    {
        echo "<script>window.alert('Image Upload Error')</script>"; 
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
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="table-responsive">


                                        <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                                <thead class="table-light">
                                                    <tr>
                                                        
                                                        <th class="align-middle">#</th>
                                                        <th class="align-middle">Image</th>
                                                        <th class="align-middle">Title</th>
                                                        <th class="align-middle">Description</th>
                                                        <th class="align-middle">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
include('connect.php');

$select_query = "select * from products order by id desc";

$run = mysqli_query($connect,$select_query);

$c=0;

while ($row = mysqli_fetch_array($run)) {

$c = $c+1;


?>
                                                    <tr>
                                                       
                                                       
                                                        <td><?php echo $c; ?></td>
                                                      
                                                        <td>
                                                            <img src="files/<?php echo $row['image']; ?>" width="50px" alt=""> 
                                                        </td>
                                                        <td>
                                                            <?php echo $row['name']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['des']; ?>
                                                        </td>
                                                      
                                                       
                                                        <td>
                                                            
                                                             
                                                            <a href="deleteproduct.php?id=<?php echo $row['id']; ?>&image=<?php echo $row['image']; ?>" onclick="return confirm('Are you sure you want to delete this item?');" title="Delete"> <button type="button" class="btn btn-danger waves-effect waves-light ">
                                                            <i class="mdi mdi-delete"></i> 
                                                            </button></a>

                                                        </td>
                                                      
                                                    </tr>
<?php 


} ?>
                                                   
                                                </tbody>
                                            </table>

                                        
                                        </div>
                                        <!-- end table-responsive -->
                                    </div>
                                </div>
                            </div>
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