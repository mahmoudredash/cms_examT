<?php
/**
 * Created by PhpStorm.
 * User: Mahmoud
 * Date: 15/03/2018
 * Time: 07:08 م
 */
session_start();

include_once("../include/functions.php");
include_once("../include/session.php");
check_login();
include("../include/layout/header.php");
include_once("../include/connectDB.php");

?>


    <div class="container">
        <div class="row">
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="manag_admin.php">Admin Mangment</a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="manag_admin.php">admin</a></li>
                        <li><a href="manag_admin.php?add=1">Add Admin</a></li>
                        <li><a href="manage_content.php">Manage Content</a></li>
                        <li><a href="index.php">Site ME</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>


<?php

if(isset($_GET) && !empty($_GET)){
    if (isset($_GET['admine']) && !empty($_GET['admine'])){
        $_SESSION["edit"]=(int)urlencode(htmlentities($_GET['admine']));
        require "add_admin.php";
    }elseif (isset($_GET['admind']) && !empty($_GET['admind'])){
        //Delete data
        $id=(int)urlencode(htmlentities($_GET['admind']));
        $sql="DELETE FROM `admin` WHERE `id`=$id";
        if (mysqli_query($conn,$sql) && mysqli_affected_rows($conn)>0){
            //Successfully Delete record
            $_SESSION['mgs'] =  msgSuccess("Delete  Admin successfully");
            redirectes("manag_admin.php");
        }else{
            //Erorr in Sql Code
            $_SESSION['mgs'] = msgErorr($sql, $conn);
            redirectes("manag_admin.php");
        }
    }elseif (isset($_GET['add']) && !empty($_GET['add'])){
        $_SESSION["add"]=(int)urlencode(htmlentities($_GET['add']));
        require "add_admin.php";
    }
}else{

?>
    <div class="container">
        <?php echo  msgd();?>
    </div>
<div class="container-fluid">
    <div class="row">
        <div class="container-fluid">
            <h2>InFormation Data Admin</h2>
            <p> data users mangment admin site</p>
            <table class="table">
                <thead>
                <tr>
                    <th>FirestName</th>
                    <th>LastName</th>
                    <th>UserName</th>
                    <th>Email</th>
                    <th>Data</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $resultt=getrowD("WHERE 1","`admin`","*",$conn);
                if (isset($resultt)) {
                    while ($roww = mysqli_fetch_assoc($resultt)) {
                        echo "<tr>
                            <td>{$roww['firestname']}</td>
                            <td>{$roww['lastname']}</td>
                            <td>{$roww['username']}</td>
                            <td>{$roww['email']}</td>
                            <td>{$roww['data']}</td>
                            <td><a type='button' href='manag_admin.php?admine={$roww['id']}' class='btn btn-primary '> Edit </a></td>
                            <td><a type='button' href='manag_admin.php?admind={$roww['id']}' class='btn btn-danger'>Delete</a></td>
                          </tr>";


                    }
                    mysqli_free_result($resultt);
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php
}
?>


























<?php
include("../include/layout/footer.php");
?>