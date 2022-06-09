<?php
include('../dos/db_connect.php');
?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        include('include/sidebar.php')
        
        
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php 
                include('include/navbar.php')


?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">PARENTS MESSAGES</h1>
                        
                    </div>

                    <!-- Content Row -->


                    <?php
                    include("model.php");
                    $model=new Model();
                    $search_message=$model->search_message();
                   
                    if(!empty($search_message)){
                        foreach($search_message as $row){
                      ?>
                    
                    <div class="row sm-12">

                       
                        <div class="col-xl-12  mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 mb-4 2mr-3 font-weight-bold text-gray-800">
                                               PARENT NAME
                                            </div>
                                            <div class="h6 mb-2 mr-3 font-weight-bold text-gray-800">
                                                <?php echo $row['title'] ?>
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1"> 
                                                    <?php echo $row['message'] ?>
                                                    </div>
                                                </div>
                                              
                                            </div>
                                            <?php

                                            if($row['status']==0){
                                               echo" <br>";
                                               echo '<hr class="text-black align-items-center">';
                                               echo'<button class=" badge badge-success">Pending</button>';

                                            }
                                            if($row['status']==1){
                                               echo"<br>";
                                               echo '<hr class="text-black align-items-center">';
                                               echo'
                                               <button class=" badge badge-success">Approved</button>';

                                            }
                                            if($row['status']==2){
                                                echo"<br>";
                                                echo '<hr class="text-black align-items-center">';
                                                echo'<button class=" badge badge-info">Rejected</button>';

                                            }
                                           
                                            ?>

                                            
                                            
                                        </div>
                                        <div class="d-inline p-2  text-white">
                                            <a href="approved_message.php?id=<?php echo $row['id'] ?>" class="badge badge-success">Approved</a> 
                                        </div>
                                        <div class="d-inline p-2  text-white">
                                        <a href="reject_message.php?id=<?php echo $row['id'] ?>" class="badge badge-primary">Rejected</a> 
                                        </div>

                                        <div class="d-inline p-2  text-white">
                                        <a href="delete_message.php?id=<?php echo $row['id'] ?>" class="badge badge-danger">Delete</a> 
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>

                       
                    </div>

                    <?php

                        }
                       
                    
                    }
                    else{
                        echo"<h1 class='font-weight-bold text-gray-800'>No Message</h1>";
                    }
                
                        ?>



                </di</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; CS2022
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>