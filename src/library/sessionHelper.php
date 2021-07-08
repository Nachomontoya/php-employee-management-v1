<?PHP
if(!isset($_SESSION)){
     session_start();
}
if (isset($_GET["destroyUpdate"]) && $_GET["destroyUpdate"] == true){
     unset($_SESSION["employeeUpdate"]);
     header("Location: ../employee.php");
}

function destroySessions(){
     $base_url = $_SESSION['BASE_URL'];
     session_destroy();
     header('Location: '.$base_url.'/index.php');
}

function checkExpiredSession(){

     if(isset($_SESSION["timeout"])){
          // Calcular el tiempo de vida de la sesión (TTL = Time To Live)
          //$sessionTTL = $_SESSION["timeout"] + 3000;
          $sessionTimeForAlfonso = time() - $_SESSION["timeout"];
          //echo $_SESSION["timeout"];
          if($sessionTimeForAlfonso >10){
               destroySessions();
          }
     }
}

function initSessionTime(){
     // El siguiente key se crea cuando se inicia sesión
     $_SESSION["timeout"] = time();
     //var_dump($_SESSION["timeout"]);
     //echo $_SESSION["timeout"];

     header("Location: ../dashboard.php?login=success");
}
