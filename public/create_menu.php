<?php
/**
 * Created by PhpStorm.
 * User: mahmoud
 * Date: 12/02/18
 * Time: 02:52 م
 */

include("../include/layout/header.php");
include_once("../include/functions.php");
include_once("../include/connectDB.php");

include_once ("../include/layout/navbar.php");




?>


<!--Start Form -->



<br/> <br/>

<div class="form-group container-fluid">

    <form action="submit_menu.php" method="post">
        <div class="form-group">
            <label for="menuName">Menu Name:</label>
            <input type="text" class="form-control" id="menuName" name="mname">
        </div>
        <div class="form-group">
            <label>Visible : </label>
            <div class="radio">
                <label><input type="radio" name="optradio" value="1">Yes</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="optradio" value="0">NO</label>
            </div>
        </div>


        <div class="form-group">
            <label for="sel1">Rank:</label>
            <select class="form-control" id="sel1" name="sel">

                <?php
                $sql="SELECT `rank` FROM `website_navbar` WHERE 1";
                $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0){
                    $hr=mysqli_num_rows($result)+1;
                    for($i=1; $i<=$hr; $i++){
                        echo "<option value='{$i}' >"."{$i}</option>";
                    }
                    }
                ?>
            </select>
        </div>
        
        <button type="submit" name="submit" class="btn btn-default">Submit</button>
    </form>

</div>













<div class="container">
    <?php

    if(isset($_GET['page'])){
        $id=(int)mysqli_real_escape_string($conn,$_GET['page']);
        echo "<br/><br/><br/><br/>";
        $sql="SELECT * FROM `pages` WHERE `id`=".$id;
        $exq=mysqli_query($conn,$sql);

        if(mysqli_num_rows($exq)>0){
            $resulr=null;
            while ($resulr=mysqli_fetch_assoc($exq)){
                echo "<details><summary>".$resulr['page_name']."</summary>";
                echo "<p>".$resulr['content']."</p></details><br/><hr/><br/>";
            }
            //mysqli_free_result($resulr);
        }
    }elseif (isset($_GET['item'])){
        $id=(int)mysqli_real_escape_string($conn,$_GET['item']);
        echo "<br/><br/><br/><br/>";
        $sql="SELECT * FROM `pages` WHERE `item_name_id`=".$id;
        $exq=mysqli_query($conn,$sql);
        if(mysqli_num_rows($exq)>0){
            while ($resulr=mysqli_fetch_assoc($exq)){
                echo "<details><summary>".$resulr['page_name']."</summary>";
                echo "<p>".$resulr['content']."</p></details><br/><hr/><br/>";
            }
            //mysqli_free_result($resulr);
            //mysqli_close($conn);
        }elseif (isset($_GET['item'])&& mysqli_real_escape_string($conn,$_GET['item'])=="v"){
            $ruslt = getHiden($conn);
            if(mysqli_num_rows($ruslt)>0){
                while($row=mysqli_fetch_assoc($ruslt)){
                    echo "<div class='container panel-default'> <label class='tfs  panel-primary'>".$row["item_name"]."</label>";
                    $resulrs = getPages($conn,$row["id"]);
                    if(mysqli_num_rows($resulrs)>0){
                        while ($erw=mysqli_fetch_assoc($resulrs)){
                            echo "<details><summary>".$erw['page_name']."</summary>";
                            echo "<p>".$erw['content']."</p></details><br/><hr/><br/>";
                        }
                    }
                    echo "</div>";
                }

            }

        }else {
            echo "Not Found Data ";
        }
    }

    ?>






    <?php
    include("../include/layout/footer.php");
    ?>


