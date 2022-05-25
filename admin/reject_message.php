<?php
include('model.php');
$model= new Model();
 $id=$_REQUEST['id'];
 $reject_message=$model->reject_message($id)
?>