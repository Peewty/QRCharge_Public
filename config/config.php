<?php
//On demarre les sessions et la connexion à la BDD
//session_start();
$mysqli = mysqli_init();
// config.conf
$pepper="<your_key>";

/******************************************************
----------------Configuration Obligatoire--------------
Veuillez modifier les variables ci-dessous pour que l'
espace membre puisse fonctionner correctement.
******************************************************/

//On se connecte a la base de donnee
//$mysqli = mysqli_connect('localhost', 'quentin', 'QrchargeQuentin742273!*', 'qrcharge');
mysqli_ssl_set($mysqli,NULL,NULL, "<your_private_key>", NULL, NULL);
mysqli_real_connect($mysqli, '<your_db_hostname>', '<your_db_name>', '<your_db_password>', '<your_db_schema>', <your_db_port>, MYSQLI_CLIENT_SSL);
if (mysqli_connect_errno($mysqli)) {
die('Failed to connect to MySQL: '.mysqli_connect_error());
}
else {
    $sql0 = "SET SQL_SAFE_UPDATES = 0" ;
    $sql1 = "DELETE FROM dcharge WHERE departureDate < CURRENT_TIMESTAMP()" ;
    $sql2 = "SET SQL_SAFE_UPDATES = 1" ;
    $statement0 = $mysqli->prepare($sql0);
    $statement1 = $mysqli->prepare($sql1);
    $statement2 = $mysqli->prepare($sql2);
    $statement0->execute();
    $statement1->execute();
    $statement2->execute();
  }

//Email du webmaster
$mail_webmaster = '<your_email>';

//Adresse du dossier de la top site
$url_root = '<your_root_appli_url>';
$url_root_dev = '<your_root_devappli_url>';


/******************************************************
----------------Configuration Optionelle---------------
******************************************************/

//Variable Nom du fichier
$url_home = 'index.php';
$url_qrcode = 'qrcode.php';
$url_chargeTime = 'charge.php';
?>
