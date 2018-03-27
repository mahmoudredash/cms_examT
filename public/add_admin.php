<?php
/**
 * Created by PhpStorm.
 * User: mrmrm_000
 * Date: 15/03/2018
 * Time: 08:53 م
 */
include_once("../include/functions.php");
include_once("../include/session.php");
check_login();
include_once("../include/connectDB.php");

//`id`, `username`, `password`, `firestname`, `lastname`, `email`, `data`

if (isset($_GET['admine']) && !empty($_GET['admine']) ){
    if ($_GET['admine']>0){
        $id_delected=(int)urlencode(htmlentities($_GET['admine']));
        $rroq=null;
        $resul=getrowD("WHERE `id`={$id_delected}","`admin`","*",$conn);
        if (isset($resul)) {
            $rroq=mysqli_fetch_assoc($resul);
            mysqli_free_result($resul);
        }



    }
}




if (isset($_POST['submit']) && !empty($_POST['submit'])){
    if ($_POST['submit']==="Add"){

        $username=cheackedAdmin($_POST['username']);
        $password=cheackedAdmin($_POST['password']);
        $firestname=cheackedAdmin($_POST['firestname']);
        $lastname=cheackedAdmin($_POST['lastname']);
        $email=cheackedAdmin($_POST['email']);
        if(!empty($errors)){
            $_SESSION['errors'] = $errors;
            redirectes("manag_admin.php?add=1");
        }
        $password=password_hash($password,PASSWORD_BCRYPT);
        $sql="INSERT INTO `admin`(`username`, `password`, `firestname`, `lastname`, `email`) 
VALUES ('$username','$password','$firestname','$lastname','$email')";
        if (mysqli_query($conn,$sql) && mysqli_affected_rows($conn)>0){
            //Successfully Add record
            $_SESSION['mgs'] =  msgSuccess("ADD Admin successfully");
            redirectes("manag_admin.php");
        }else{
            //Erorr in Sql Code
            $_SESSION['mgs'] = msgErorr($sql, $conn);
            redirectes("manag_admin.php");
        }

    }elseif ($_POST['submit']==="Edit"){
//        cheackedAdmin()
        $id=(int)urlencode(htmlentities($_POST['id']));
        $username=cheackedAdmin($_POST['username']);
        $password=cheackedAdmin($_POST['password']);
        $firestname=cheackedAdmin($_POST['firestname']);
        $lastname=cheackedAdmin($_POST['lastname']);
        $email=cheackedAdmin($_POST['email']);
        if($_SESSION['dn']!== $password)
        $password=password_hash($password,PASSWORD_BCRYPT);
    $sql="UPDATE `admin` SET  `username`='$username',`password`='$password',`firestname`='$firestname',`lastname`='$lastname',`email`='$email'  WHERE `id`=$id";
        if(!empty($errors)){
            $_SESSION['errors'] = $errors;
            redirectes("manag_admin.php?admine={$_SESSION['edit']}");
        }

        if (mysqli_query($conn,$sql) && mysqli_affected_rows($conn)>0){
            //Successfully Edit record
            $_SESSION['mgs'] =  msgSuccess("Edit Admin successfully");
            redirectes("manag_admin.php");
        }else{
            //Erorr in Sql Code
            $sql="Failed to update process :: And :: Erorr in Sql Code ";
            $_SESSION['mgs'] = msgErorr($sql, $conn);
            redirectes("manag_admin.php");
        }


    }

}



?>
<!-- -->
<div class="container">
    <?php  erorr_function(err());?>
</div>
<br/><br>
<div class="container mkl">
    <div class="row">
        <div class="form-group container-fluid">

            <form action="add_admin.php" method="post" class="col-lg-8 col-lg-offset-2">
                <div class="form-group">
                    <label for="menuName">UserName:</label>
                    <input type="text" class="form-control" id="menuName" name="username" value="<?php
                    echo @$rroq['username'];?>">
                </div> <input type="hidden" name="id" value="<?php echo @$rroq['id']; ?>">
                <div class="form-group">
                    <label for="menuName">Password:</label>
                    <input type="text" class="form-control" id="menuName" name="password" value="<?php
                    echo @$rroq['password'];@$_SESSION['dn']=$rroq['password'];?>">
                </div>
                <div class="form-group">
                    <label for="menuName">FirestName:</label>
                    <input type="text" class="form-control" id="menuName" name="firestname" value="<?php
                    echo @$rroq['firestname'];?>">
                </div>
                <div class="form-group">
                    <label for="menuName">LastName:</label>
                    <input type="text" class="form-control" id="menuName" name="lastname" value="<?php
                    echo @$rroq['lastname'];?>">
                </div>
                <div class="form-group">
                    <label for="menuName">Email:</label>
                    <input type="email" class="form-control" id="menuName" name="email" value="<?php
                    echo @$rroq['email'];?>">
                </div>
                <div class="form-group">

                    <input type="submit" class="form-control btn btn-success"  name="submit" value="<?php
                    if(isset($_GET["add"])){
                        echo "Add";
                    }elseif(isset($_SESSION["edit"])&& $_SESSION["edit"]>0){
                            echo "Edit";

                        }

                    ?>">
                </div>
            </form>
        </div>
    </div>
</div>