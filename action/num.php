<?php

include("../common/sub_includes.php");
include("../config.php");

ob_start();
if(!isset($_SESSION)){
    session_start();  // Et on ouvre la session
} 

$num = $_POST['phone_number'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $_SESSION['phone_number']  = $num;
}

?>