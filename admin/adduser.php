


<?php
include('../dos/db_connect.php');
SESSION_START();

if($_SESSION['admin']){
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>admin</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


    <style>
        input {
            width: 50%;

        }
    </style>

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

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">ADMIN | ADD USERS</h6>
                        </div>
                        <div class="row" style="margin:50px;">
                            <div class="col-md-8 mt-2 mr-5">
                              

                                <form action="" method="POST">
                                <?php 
                                include('model.php');
                                $model= new Model();
                                $insert_user=$model->insert_user();

                                ?>
                                  

                                    <div class="form-group">
                                        <label  for=""  class="font-weight-bold" >First name</label>
                                        <input type="text" name="fname" class="form-control" placeholder="parent code" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="font-weight-bold"> Last name </label>
                                        <input type="text" name="lname" class="form-control" placeholder="first name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="font-weight-bold"> Username </label>
                                        <input type="text" name="username" class="form-control" placeholder=" last name">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="font-weight-bold"> Password </label>
                                        <input type="text" name="password" class="form-control" placeholder=" last name">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="font-weight-bold">User Type</label>
                                       <select class="form-control" name="admin" id=""  required>
                                           <option value="1">1|Dos</option>
                                           <option value="2">2|Principal Admin</option>
                                         
                                       </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <button type="submit" name="insert_user"  style="width:140px;" class="btn btn-primary btn-lg">Save </button>
                  
                                    </div>

                                   
                                </form>

                            </div>
                        </div>









                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; CSC2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

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
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>

<?php

                }else{
                echo"<script>
                alert('You are not allowed,Please Login')</script>";
                echo"<script>window.location.href='login.php'</script>";
                }

?>