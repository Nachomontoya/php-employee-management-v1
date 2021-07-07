<?PHP

function destroySessions(){
     echo '<br>he entrado a destruir las sessiones';
     session_destroy();
     require_once('loginManager.php');
     logOut();
}

function checkExpiredSession(){

     if(isset($_SESSION["timeout"])){
          // Calcular el tiempo de vida de la sesión (TTL = Time To Live)
          //$sessionTTL = $_SESSION["timeout"] + 3000;
          $sessionTTL = time() - $_SESSION["timeout"];
          //echo $_SESSION["timeout"];
          if($sessionTTL > 5){
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