<?php

define("HOSTNAME","localhost",true);
define("USERNAME","root",true);
define("PASSWORD","",true);
define("DBNAME","website_MS");

try{
    $conn = mysqli_connect(HOSTNAME,USERNAME,password,DBNAME);
    if (!$conn) {
        die("Connect Filed".mysqli_connect_error()."Erorr NO ".mysqli_connect_errno());
    }else {
        //echo "Connect DB";
    }
}catch(Exception $e){
    echo "Erorr : ".$e;
}
 


?>