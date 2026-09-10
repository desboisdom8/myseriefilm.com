<?php

include("../common/sub_includes.php");
include("../config.php");

ob_start();
if (!isset($_SESSION)) {
    session_start();  // Et on ouvre la session
}

$TransportPrice = $_POST['transport'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $_SESSION['Transport_Price']  = $TransportPrice;

    header('location: ../pages/card.php');
}
