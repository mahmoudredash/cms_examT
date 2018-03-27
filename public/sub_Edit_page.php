<?php session_start();?>
<?php
/**
 * Created by PhpStorm.
 * User: mahmoud
 * Date: 12/02/18
 * Time: 02:52 م
 */

include("../include/layout/header.php");
include_once("../include/functions.php");
include_once("../include/session.php");
include_once("../include/connectDB.php");

include_once ("../include/layout/navbar.php");

check_login();

//  "SELECT COUNT(*) FROM `pages` WHERE `item_name_id`=3";
//SELECT
// `item_name_id`, `page_name`, `content`, `rank`, `visible`, `status`
// FROM `pages` WHERE `id`=1 LIMIT 1
//mname=null;$tcontent=null;$idP=null;$vis=null;$itmID=null;

//$conts=getCount("`pages`"," WHERE 1",$conn);

//
//
//


?>




<?php


if(isset($_POST['sub_edit'])||isset($_POST['sub_delete'])){

    $nameM=mysqli_real_escape_string($conn,htmlentities($_POST['mname']));
    $nameM=cheack_lenth(cheackEmpty(check_data($nameM)),30,6);

    $content=mysqli_real_escape_string($conn,htmlentities($_POST['tcontent']));
    $content=cheack_lenth(cheackEmpty($content),250,10);
    $idmune=(int)$_POST['idmenu'];
    $runkM = (int)$_POST['rank'];
    $visobil = (int)$_POST['optradio'];
    $pageId=(int)$_POST['id'];
    // echo $itemId;exit("stop");+
    // echo "[".$content." #".$nameM." #".$idmune." #".$runkM." #".$visobil." #".$pageId;
    // exit();

    if ($idmune==0) {
        $_SESSION['mgs'] = msgSuccess("Wrning ! In  Select Menu  ");
        redirectes("Edit_page.php?page=$pageId");
    }

    if (!isset($visobil)) {
        $_SESSION['mgs'] = msgSuccess("Wrning !  In select visobil ");
        redirectes("Edit_page.php?page=$pageId");
    }

    if(!empty($errors)){
        $_SESSION['errors'] = $errors;
        redirectes("Edit_page.php?page=$pageId");
    }
// Update Page
if(isset($_POST['sub_edit'])){
        $sql="UPDATE `pages` SET `item_name_id`={$idmune},`page_name`='{$nameM}',`content`='{$content}',
        `rank`={$runkM},`visible`={$visobil},`status`={$visobil}  WHERE `id`=$pageId";
        //  echo $sql;
        //  exit();
        if (mysqli_query($conn,$sql) && mysqli_affected_rows($conn)>0){
            //Successfully add new record
            $_SESSION['mgs'] =  msgSuccess("Update record Updated successfully");
            redirectes("manage_content.php");
        }else{
            //Erorr in Sql Code
        $_SESSION['mgs'] = msgErorr($sql, $conn);
        redirectes("Edit_page.php?page=$pageId");
        }
// Delete Page
}elseif (isset($_POST['sub_delete'])) {
    $sql="DELETE FROM `pages`  WHERE `id`=$pageId";
    //  echo $sql;
    //  exit();
    if (mysqli_query($conn,$sql) && mysqli_affected_rows($conn)>0){
        //Successfully add new record
        $_SESSION['mgs'] =  msgSuccess("Delete record Deleted successfully");
        redirectes("manage_content.php");
    }else{
        //Erorr in Sql Code
    $_SESSION['mgs'] = msgErorr($sql, $conn);
    redirectes("Edit_page.php?page=$pageId");
    }
}
}else{
    redirectes("Edit_page.php?page=$pageId");
}


?>


















  <?php
    include("../include/layout/footer.php");
    ?>
