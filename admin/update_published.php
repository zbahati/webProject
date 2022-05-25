<?php
include('model.php');
$model= new Model();
 $id=$_REQUEST['id'];
 $update_published=$model->update_published($id)
?>