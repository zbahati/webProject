<?php
include('model.php');
$model= new Model();
 $id=$_REQUEST['id'];
 $approved_message=$model->approved_message($id)
?>