<?php
include('model.php');
$model= new Model();
 $id=$_REQUEST['id'];
 $delete=$model->delete_parent($id)
?>