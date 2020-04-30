<?php


include_once '../auth/Authenticate.php';
include_once '../config/Database.php';

$db = new Database();

$auth = new Authenticate($db);

$email = $_POST['email'];
$pwd = $_POST['pwd'];

$authIntent = $auth->login_seller($email ,$pwd);

if( $authIntent['status'] == 1){
    session_start();
    $_SESSION['seller_id'] = $authIntent['seller_id'];
    
    header('Location: portal.php');
}