<?php
require("./employeeManager.php");
$method = $_SERVER['REQUEST_METHOD'];

header("Content-Type: application/json");

switch ($method) {
  case "POST":
    if($_GET["update"] == true){
      updateEmployee($_SESSION['employeeUpdate'],$_POST);
    }else{
      // var_dump($_POST);
      $newEmployee = $_POST;
      echo addEmployee($newEmployee);
    }
    break;

  case 'GET':
    if($_GET["ID"]){
      $idEmployee = $_GET['ID'];
      getEmployee($idEmployee);
    }
    break;

  case "DELETE":
    parse_str(file_get_contents("php://input"), $_DELETE);
    $employeeID = $_DELETE['id']; //This is the id of the employee clicked on.
    var_dump(deleteEmployee($employeeID));


}
?>