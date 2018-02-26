<?php
/**
 * Created by PhpStorm.
 * User: mahmoud
 * Date: 13/02/18
 * Time: 09:59 م
 */

include("../include/layout/header.php");
include_once("../include/functions.php");
include_once("../include/connectDB.php");

include_once ("../include/layout/navbar.php");



if(isset($_POST['submit'])){

    $nameM = mysqli_real_escape_string($conn,htmlentities($_POST['mname']));
    $runkM = (int)$_POST['sel'];
    $visobil = (int)$_POST['optradio'];
    $sql = "INSERT INTO `website_navbar`(`item_name`,`rank`,`visible`) VALUES ('{$nameM}',{$runkM},{$visobil})";
    if (mysqli_query($conn,$sql) && mysqli_affected_rows($conn)>0){
        //Successfully add new record
        msgSuccess("New record created successfully");
        redirectes("manage_content.php");
    }else{
        //Erorr in Sql Code
        msgErorr($sql, $conn);
        redirectes("create_menu.php");
    }
}else{
    redirectes("create_menu.php");
}


?>