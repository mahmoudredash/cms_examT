<?php
$errors=array();

//getpages
function getPages($linck,$page_id){
    $sql="SELECT `id`, `page_name`,`content` FROM `pages` WHERE `pages`.`item_name_id` =$page_id ";
    return mysqli_query($linck,$sql);
}
function getPagesP($linck,$page_id){
    $sql="SELECT `id`, `page_name`,`content` FROM `pages` WHERE `pages`.`item_name_id` =$page_id AND `visible`=1";
    return mysqli_query($linck,$sql);
}


function getHiden($linck){
    $sql="SELECT `item_name`,`id` FROM `website_navbar` WHERE `visible`=0 ";
    return mysqli_query($linck,$sql);
}



function redirectes($url)
{
    header("Location:".$url);
    exit();
}

/**
 * @param $sql
 * @param $conn
 */
function msgErorr($sql, $conn)
{$hr=mysqli_error($conn);
    $masg ='<div class="alert alert-danger text-center alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">
                        &times;
                    </a>';
    $masg.="<strong>Worning !</strong>{$sql}  {$hr}</div>";
    return $masg;
}

function msgSuccess($txt)
{
    $masg ='<div class="alert alert-success text-center alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
    $masg.="<strong>Success!</strong>{$txt}</div>";
    return $masg;
}

//handle Errors

function check_data($data)
{
    $data = str_replace("_","",$data);
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = ucfirst($data);
    return $data;
}

//cheack data and return data or add Eror in array erorrs!!
function cheack_lenth($data,$max,$min)
{
    global $errors;
    if (strlen($data)<$min) {
        $errors['too short'] = "input is too short , minimum is {$min} characters ({$max} max).";
    }elseif (strlen($data)>$max) {
        $errors['too long'] = " input is too long , maxmum is {$max} characters";
    }else {
        return $data;
    }

}
//cheack data and return data or add Eror in array erorrs!!
function cheackEmpty($data){
    global $errors;
    $data = trim($data);
    if(isset($data)==true&&$data==="")
    {
        $errors['empty'] = "empty Filed";
    }else {
        return $data;
    }
}
function erorr_function($errors=array()){
    if (!empty($errors)) {
   echo '<ul class="list-group"><h3 class="list-group-item">ERROR :</h3>';
    foreach ($errors as $key => $value) {
        echo ' <li class="list-group-item list-group-item-danger">';
        echo "{$key} => {$value}\n";
        echo '</li>';
    }
     echo '</ul> ';}
}





/**
 * @param Table Name
 * @param  if Condtion
 * @param  $link connectDB
 * @return echo COUNT(*)
 */
function getCount($tableN,$wher,$conn)
{
    $sql="SELECT COUNT(*) FROM {$tableN} {$wher}";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
      $hr=mysqli_fetch_array($result);
     return $hr[0] ;
    }
}

/**
 * @param WHERE ==(condition)
 * @param Table_Name
 * @param Select_Colum_Name
 * @param Linck_(Connect_DB)
 * @return Result == rows :)
 */
function getrowD($wher,$tableN,$colms,$conn)
{
    $sql="SELECT $colms FROM $tableN  $wher";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
      return $result;
    }else{
        return null;
    }
}


function actevet($getr,$ids){
    if($ids==$getr){
        return "active";
    }
}
function getMenu($getr,$conn){
    $getr=(int)urlencode($getr);
    $sql="SELECT `item_name_id` FROM `pages` WHERE `id`=$getr LIMIT 1";
    $resue=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($resue);
    mysqli_free_result($resue);
    return $row["item_name_id"];

}

function cheackedAdmin($data){
    $data=cheackEmpty($data);
    $data = str_replace("_","",$data);
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = htmlentities($data);
    $data = cheack_lenth($data,150,4);
    return $data;
}






?>



