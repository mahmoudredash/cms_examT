<?php
/**
 * Created by PhpStorm.
 * User: mahmoud
 * Date: 13/02/18
 * Time: 09:04 م
 */


//read Data from DB

$sql="SELECT `id`, `item_name` FROM `website_navbar` WHERE `visible`=1 ";

$result=mysqli_query($conn,$sql);
if (mysqli_num_rows($result)>0) {


?>


<div class="container">
    <nav class="navbar navbar-inverse">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="admin.php" class="navbar-brand">CMS</a>
        </div>
        <!-- Collection of nav links, forms, and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="admin.php">Admin Page</a></li>
                <li class="active"><a href="manage_content.php">Manage Content</a></li>
                <?php

                while($raw=mysqli_fetch_assoc($result)){
                    $res=getPages($conn,$raw["id"]);// result all page in items
                    if (mysqli_num_rows($res)>0) {//cheack if result >0 == found rows
                        echo("<li class='dropdown '> <a class='dropdown-toggle' href='?item={$raw["id"]}'data-toggle='dropdown'>
        {$raw["item_name"]} <span class='caret'></span></a><ul class='dropdown-menu'>");
                        while($war=mysqli_fetch_assoc($res)){// show pages in items
                            echo "<li><a href='?page={$war["id"]}'>{$war["page_name"]}</a></li>";
                        }
                        echo("</ul></li>");
                    }else {//if not found pages in items print this .
                        echo "<li><a href='?item={$raw["id"]}'>{$raw["item_name"]}</a></li>";
                    }
                }

                } //after  close if (){}

                mysqli_free_result($result); //remove data

                ?>
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">Admin Tooles <b class="caret"></b></a>                    <ul class="dropdown-menu">
                        <li><a href="?item=v">VisibleM</a></li>
                        <li><a href="create_menu.php">Create New Menu</a></li>
                        <li><a href="#">Sent Items</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Trash</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Logout</a></li>
            </ul>
        </div>
    </nav>
</div>

