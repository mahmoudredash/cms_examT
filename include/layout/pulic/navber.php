<?php


$sql="SELECT `id`, `item_name` FROM `website_navbar` WHERE `visible`=1 ";
$result=mysqli_query($conn,$sql);
if (mysqli_num_rows($result)>0) {

?>




<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="index.php">My Site Name</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">



 <?php

while($raw=mysqli_fetch_assoc($result)){
    $res=getPagesP($conn,$raw["id"]);// result all page in items
    if (mysqli_num_rows($res)>0) {//cheack if result >0 == found rows
   @$ffd=actevet(getMenu($_GET['page'],$conn),$raw["id"]);
   $frf='';
        echo("<li class='nav-item dropdown {$ffd}'>
        <a class='nav-link dropdown-toggle' data-toggle='dropdown' href='?item={$raw["id"]}' role='button' aria-haspopup='true' aria-expanded='false'>
{$raw["item_name"]} </a>
<div class='dropdown-menu' x-placement='bottom-start' style='position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;'>");
        while($war=mysqli_fetch_assoc($res)){// show pages in items
            echo "<a class='dropdown-item' href='?page={$war["id"]}'>{$war["page_name"]}</a>";
        }
        echo("</div> </li>");
    }else{
      //if not found pages in items print this .
    $ffd='';
    @$frf=actevet($_GET['item'],$raw["id"]);
     echo " <li class='nav-item {$frf}'><a class='nav-link' href='?item={$raw["id"]}'>{$raw["item_name"]}</a></li>";
    }
}

} //after  close if (){}

mysqli_free_result($result); //remove data
// Edit_mune.php
?>







      <!-- <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li> -->
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" placeholder="Search" type="text">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>