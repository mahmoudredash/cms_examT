<?php


//getpages
function getPages($linck,$page_id){
    $sql="SELECT `id`, `page_name`,`content` FROM `pages` WHERE `pages`.`item_name_id` =$page_id ";
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
{
    echo "<div class='alert alert-danger alert-dismissable'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>
                        &times;
                    </a>
                    <strong>Success!</strong>{$sql}  {mysqli_error($conn)}</div>";
}

function msgSuccess($txt)
{
    echo "<div class='alert alert-success alert-dismissable'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>
                        &times;
                    </a>
                    <strong>Success!</strong>{$txt}</div>";
}


?>



