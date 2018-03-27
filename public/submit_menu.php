<?php session_start();?>
<?php
/**
 * Created by PhpStorm.
 * User: mahmoud
 * Date: 13/02/18
 * Time: 09:59 م
 */

include("../include/layout/header.php");
include_once("../include/functions.php");
include_once("../include/session.php");
include_once("../include/connectDB.php");

include_once ("../include/layout/navbar.php");

check_login();

if(isset($_POST['submit'])){

    $nameM=mysqli_real_escape_string($conn,htmlentities($_POST['mname']));
    $nameM=cheack_lenth(cheackEmpty(check_data($nameM)),12,4);
    $runkM = (int)$_POST['sel'];
    $visobil = (int)$_POST['optradio'];
    if(!empty($errors)){
        $_SESSION['errors'] = $errors;
        redirectes("create_menu.php");
    }

    $sql = "INSERT INTO `website_navbar`(`item_name`,`rank`,`visible`) VALUES ('{$nameM}',{$runkM},{$visobil})";
    if (mysqli_query($conn,$sql) && mysqli_affected_rows($conn)>0){
        //Successfully add new record
        $_SESSION['mgs'] =  msgSuccess("New record created successfully");
        redirectes("manage_content.php");
    }else{
        //Erorr in Sql Code
      $_SESSION['mgs'] = msgErorr($sql, $conn);
        redirectes("create_menu.php");
    }
}else{
    redirectes("create_menu.php");
}


?>