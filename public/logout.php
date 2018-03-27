<?php
/**
 * Created by PhpStorm.
 * User: mrmrm_000
 * Date: 18/03/2018
 * Time: 02:48 ص
 */
include_once("../include/session.php");
include_once("../include/functions.php");
check_login();

$_SESSION["admin_id"]=null;
$_SESSION["admin_username"]=null;
redirectes("login.php");


?>

