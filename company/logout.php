<?php
session_start();
error_reporting(0);
$_SESSION["comp_id_session"];
session_destroy();
header("location:../index1.php");