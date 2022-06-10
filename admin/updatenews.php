
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

    <title>Admin</title>
    <!-- RICH TEXT EDITOR  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>

    <!-- END OF LINK OF RICH TEXT EDITOR -->

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
                    <h1 class="h3 mb-4 text-gray-800 pb-3">SAVE AND SHARE TO PARENT</h1>
                    
                    <form action="" method="POST">
                    <?php
                    include('model.php');
                    $model=new Model();
                    $updatenews=$model->insert_updatenews();

                    ?>
                        <div class="form-group">
                            <label for="" class="" style="color:black;">TITLE</label>
                            <input type="text" name="title" class="form-control" Placeholder="title">
                        </div>
                        <label for="" style="color:black;" > DESCRIPTION</label>
                        <textarea id="summernote" name="description">
                        </textarea>
                        <div class="form-group">
                            <button type="submit" name="save_to_publish"  style="width:140px;" class="btn btn-primary btn-lg mt-3 mb-3">Save</button>
                        </div>
                    </form>

                                <script>
                                    $('textarea#summernote').summernote({
                                    placeholder: 'Your text here',
                                    tabsize: 2,
                                    height: 100,
                            toolbar: [
                                    ['style', ['style']],
                                    ['font', ['bold', 'italic', 'underline', 'clear']],
                                    // ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                                    //['fontname', ['fontname']],
                                // ['fontsize', ['fontsize']],
                                    ['color', ['color']],
                                    ['para', ['ul', 'ol', 'paragraph']],
                                    ['height', ['height']],
                                    ['table', ['table']],
                                    ['insert', ['link', 'picture', 'hr']],
                                    //['view', ['fullscreen', 'codeview']],
                                    ['help', ['help']]
                                ],
                                });
                                
                                </script>




                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Admin| MESSAGE TO PUBLISH</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>TITLE</th>
                                                <th>DESCRIPTION</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>TITLE</th>
                                                <th>DESCRIPTION</th>
                                                <th>STATUS</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>

                                        <?php
                                       
                                         $rows=$model->fetch_updatenews();
                                         $i=1;
                                     if(!empty($rows)){
                                         foreach($rows as $row){
                                       ?>

                                            <tr>
                                                <td><?php echo $i++ ?></td>
                                                <td><?php echo  $row['title'] ?></td>
                                                <td><?php echo  $row['description'] ?></td>
                                                <td>
                                                    <?php
                                                    if($row['status']==0){
                                                        ?>

                                                      <a href="update_published.php?id=<?php echo $row['id'] ?>" class="badge badge-success w-50 " style="height:30px;justify-content: center; font-size: 16px" onclick="return checkpublish()">Publish</a><br>
                                                          <?php
                                                    }
                                                    else{
                                                        ?>
                                                      <a href="remove_published.php?id=<?php echo $row['id'] ?>" class="badge badge-success w-100 " style="height:30px;justify-content: center; font-size: 16px" onclick="return checkremove()">Remove Published</a><br>

                                                      <?php
                                                    }


                                                    ?>
                                                    <a href="delete_updatenews.php?id=<?php echo $row['id'] ?>" class="badge badge-danger w-50" style="height:30px;justify-content: center; font-size: 16px" onclick="return checkdelete()">Delete</a>
                                                </td>
                                               
                                            </tr>
                                            <?php
                              }         
                                             }


                            ?>
                                            
                                        </tbody>
                                    </table>
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
                        <span>Copyright &copy;CSC 2020</span>
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

    <script>

        function checkpublish(){
            return confirm('Are you sure, You want to Publish?.')
        }
        function checkdelete(){
            return confirm("Are you sure,You want to delete?.")
        }
        function checkremove(){
            return confirm("Are you sure,You want to remove Published ?.")
        }
    </script>


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