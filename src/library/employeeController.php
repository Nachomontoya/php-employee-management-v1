<?php
require("./employeeManager.php");
$method = $_SERVER['REQUEST_METHOD'];

header("Content-Type: application/json");

switch ($method) {
  case 'POST':
    // var_dump($_POST);
    $newEmployee = $_POST;
    echo addEmployee($newEmployee);
    break;

   case 'GET':
    //echo var_dump($_GET);
    $idEmployee = $_GET['ID'];
    getEmployee($idEmployee);
    break;
}

?>