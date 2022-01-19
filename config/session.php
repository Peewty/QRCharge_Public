<?php
include('config.php');
//si appuie sur le boutton valider, champs mdp et user non vide et mdp correct alors ...
//start session
session_start();

$user_check = $_SESSION['login_user'];
$ses_sql = mysqli_query($mysqli,"select username from users where username = '$user_check' ");
$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$login_session = $row['username'];
//echo 'User: '.$_SESSION['login_user'].' '; ==> For debug

if(!isset($_SESSION['login_user'])){
    header("location:../register.php");
    die();
}
 ?>
