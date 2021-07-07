<?php
require_once('loginManager.php');
//echo file_get_contents("php://input");
if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['pwd']) && !empty($_POST['pwd'])){
     $username = $_POST["email"];
     $password = $_POST["pwd"];
     login($username,$password);
}

if(isset($_GET['logOut'])){
     require_once('sessionHelper.php');
     destroySessions();
}

?>

