<?php session_start();?>
<?php
/**
 * Created by PhpStorm.
 * User: mahmoud
 * Date: 13/02/18
 * Time: 09:59 م
 */

include_once("../include/functions.php");
include_once("../include/session.php");
check_login();
include("../include/layout/header.php");
include_once("../include/connectDB.php");


?>

<?php
$id=0;
if (isset($_POST['sub_edit'])) {
    $mname=check_data($_POST['mname']);
    $mname=cheack_lenth(cheackEmpty($mname),12,4);
    $mname=mysqli_real_escape_string($conn,htmlentities($mname));
    $visbol=(int)$_POST['optradio'];
    $runk=(int)$_POST['rank'];
    $id=(int)$_POST['idr'];
    if (!empty($errors)) {
        $_SESSION['errors']=$errors;
        redirectes("Edit_mune.php");
    }
$sql="UPDATE `website_navbar` SET `item_name`='{$mname}',`rank`={$runk},`visible`={$visbol} WHERE `id`=$id";
    if(mysqli_query($conn,$sql)&& mysqli_affected_rows($conn)>0){
        $_SESSION['mgs']=msgSuccess("Update Record Menu");
        redirectes("Edit_mune.php");
    }else{
        $_SESSION['errors']= msgErorr($sql, $conn);
        redirectes("Edit_mune.php");
    }

}elseif (isset($_POST['sub_delete'])) {
    $id=(int)$_POST['idr'];
    $sql="DELETE FROM `website_navbar` WHERE `id`=$id";
    if(mysqli_query($conn,$sql)&& mysqli_affected_rows($conn)>0){
        $_SESSION['mgs']=msgSuccess("Delete Record Menu");
        redirectes("Edit_mune.php");
    }else{
        $_SESSION['errors']= msgErorr($sql, $conn);
        redirectes("Edit_mune.php");
    }
}
else{
    redirectes("Edit_mune.php");
}

?>
