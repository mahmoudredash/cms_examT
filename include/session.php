<?php
if(!isset($_SESSION)){
    session_start();
}


function msgd(){
    if(isset($_SESSION['mgs'])){
        $mss = $_SESSION['mgs'];
        $_SESSION['mgs']=NULL;
        return $mss;
    }
}

function err(){
    if(isset($_SESSION['errors'])){
        $mss =$_SESSION['errors'];
        $_SESSION['errors']=NULL;
        return $mss;
    }
}function errL(){
    if(isset($_SESSION['errors'])){
        $masg='<div class="alert alert-danger text-center alert-dismissible " id="h">
                    <a  class="close" data-dismiss="alert" aria-label="close">
                        &times;
                    </a>';
        $mss=$_SESSION['errors'];
        $masg.="<strong>Worning !</strong> {$mss}</div>";
        $_SESSION['errors']=NULL;
        return $masg;
    }
}


function msgSuccessLAdmin()
{
    $masg ='<div class="alert alert-success text-center alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
    $masg.="<strong>Success!</strong>".msgd()."</div>";
    return $masg;
}

function check_login()
{
//cheack if session ==null redirect to >> login page
    if (!isset($_SESSION['admin_id'])) {
        redirectes("login.php");
    }
}




?>