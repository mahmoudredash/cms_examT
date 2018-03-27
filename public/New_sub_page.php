<?php session_start();?>
<?php
/**
 * Created by PhpStorm.
 * User: mahmoud
 * Date: 12/02/18
 * Time: 02:52 م
 */

include_once("../include/functions.php");
include_once("../include/session.php");
check_login();
include("../include/layout/header.php");
include_once("../include/connectDB.php");

//  "SELECT COUNT(*) FROM `pages` WHERE `item_name_id`=3";
//SELECT
// `item_name_id`, `page_name`, `content`, `rank`, `visible`, `status`
// FROM `pages` WHERE `id`=1 LIMIT 1
//$mname=null;$tcontent=null;$idP=null;$vis=null;$itmID=null;


?>

<?php


if(isset($_POST['newpage'])){

    $nameM=mysqli_real_escape_string($conn,htmlentities($_POST['mname']));
    $nameM=cheack_lenth(cheackEmpty(check_data($nameM)),30,6);

    $content=mysqli_real_escape_string($conn,htmlentities($_POST['txcontent']));
    $content=cheack_lenth(cheackEmpty($content),250,10);

    $runkM = (int)$_POST['rank'];
    $visobil = (int)$_POST['vestibule'];
    $itemId=(int)$_POST['check'];
//  echo $itemId;exit("");
    if (empty($itemId) || $itemId==0) {
        $_SESSION['mgs'] = msgSuccess("Wrning ! In  Select Menu  ");
        redirectes("New_page.php");
    }

    if (!isset($visobil)) {
        $_SESSION['mgs'] = msgSuccess("Wrning !  In select visobil ");
        redirectes("New_page.php");
    }

    if(!empty($errors)){
        $_SESSION['errors'] = $errors;
        redirectes("New_page.php");
    }

    $sql="INSERT INTO `pages`( `item_name_id`, `page_name`, `content`, `rank`, `visible`, `status`)
     VALUES ({$itemId},'{$nameM}','{$content}',{$runkM},{$visobil},{$visobil})";
    if (mysqli_query($conn,$sql) && mysqli_affected_rows($conn)>0){
        //Successfully add new record
        $_SESSION['mgs'] =  msgSuccess("New record created successfully");
        redirectes("manage_content.php");
    }else{
        //Erorr in Sql Code
      $_SESSION['mgs'] = msgErorr($sql, $conn);
      redirectes("New_page.php");
    }
}else{
    redirectes("New_page.php");
}


?>

  <?php
    include("../include/layout/footer.php");
    ?>
