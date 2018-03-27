<?php
/**
 * Created by PhpStorm.
 * User: mrmrm_000
 * Date: 17/03/2018
 * Time: 04:47 م
 */


include_once("../include/functions.php");
include_once("../include/session.php");
include_once("../include/connectDB.php");

//

//cheack  if got to page from forms[POST]
if(isset($_POST["submit"]) && !empty($_POST["submit"])){
//    cheack if username and password != null
    if(!empty($_POST['username']) && !empty($_POST['password'])){
        $username=htmlentities($_POST["username"]);
        $password=htmlentities($_POST["password"]);
        $user=mysqli_real_escape_string($conn,$username);
        $paswd=mysqli_real_escape_string($conn,$password);

        $sql="SELECT `id`, `username`, `password` FROM `admin` WHERE `username`='{$user}'LIMIT 1";
        $reslt=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($reslt);
// cheack if return data from DB and  DB_username == Form_username
        if(mysqli_num_rows($reslt)>0 && $user === $row["username"]){
            mysqli_free_result($reslt);
//            cheack   password
            if (password_verify($paswd,$row["password"])){
                $_SESSION["admin_id"]=$row["id"];
                $_SESSION["admin_username"]=$row["username"];
                $_SESSION['mgs']="Login successfully : Welcome ".$row['username']." !";
                redirectes("manage_content.php");
            }else{
                $_SESSION['errors']="Veiled Login : There is an error in Username And Password !!Try Agin ";
                redirectes("login.php");
            }
        }else{
            $_SESSION['errors']="Veiled Login : There is an error in Username And Password !!Try Agin 3";
            redirectes("login.php");
        }
    }else{
        $_SESSION['errors']="Veiled Login : There is an error in Username And Password !!Try Agin 2";
        redirectes("login.php");
    }
}else{
    $_SESSION['errors']="Veiled Login : There is an error in Username And Password !!Try Agin 1";
    redirectes("login.php");
}


























?>
<?php
include("../include/layout/footer.php");
?>

