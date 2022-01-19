<?php
//recuperation connexion BDD
include('config/config.php');
//session_start();
$iduser = $_GET['id'];
//recuperation des donnees
//$result = mysqli_query($mysqli, "SELECT * FROM dcharge");
$result = mysqli_query($mysqli, "SELECT * FROM dcharge WHERE id_user = '$iduser'");

//stockage dans un tableau
$data = array();
while ($row = mysqli_fetch_assoc($result))
{
  $data[] = $row;
}

//retourner les resultats sous format JSON
echo json_encode($data);
?>
