<?php
include('model.php');
$model= new Model();
 $id=$_REQUEST['id'];
 $remove_published=$model->remove_published($id)
?>