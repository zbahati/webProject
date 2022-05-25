<?php
session_start();

unset($_SESSION["parent"]);
header("Location:../login.php");
?>