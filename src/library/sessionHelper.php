<?PHP

function destroySessions(){
     session_destroy();
     require_once('loginManager.php');
     logOut();
}

function checkExpiredSession(){

     if(isset($_SESSION["timeout"])){
          // Calcular el tiempo de vida de la sesión (TTL = Time To Live)
          //$sessionTTL = $_SESSION["timeout"] + 3000;
          $sessionTimeForAlfonso = time() - $_SESSION["timeout"];
          //echo $_SESSION["timeout"];
          if($sessionTimeForAlfonso >60){
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