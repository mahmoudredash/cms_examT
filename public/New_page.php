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

include_once ("../include/layout/navbar.php");

//  "SELECT COUNT(*) FROM `pages` WHERE `item_name_id`=3";
//SELECT
// `item_name_id`, `page_name`, `content`, `rank`, `visible`, `status`
// FROM `pages` WHERE `id`=1 LIMIT 1
//$mname=null;$tcontent=null;$idP=null;$vis=null;$itmID=null;

$conts=getCount("`pages`"," WHERE 1",$conn);

?>



<!--Start Form -->
<div class="container">
            <?php echo  msgd();?>
            <?php  $errs = err();
            erorr_function($errs);?>
</div>


<div class="col-md-12 container">
    <div class="static">
        <form method="POST" action="New_sub_page.php" class="form-group" id="fh">
            <!-- Title Pages -->
                <label class="form-text" for="mname">Title Page :</label>
                <input type="text" name="mname" class="form-control form-control-lg" id="mname" >
                <br>

                <!-- content Page -->
                <label class="form-text" for="txcontent">Content Page :</label>
                <textarea name="txcontent" class="form-control form-control-lg" id="txcontent" >
                </textarea>
                <br/>
                <!-- visibul -->
                <label class="radio-inline lbr"><input type="radio" value="1" name="vestibule" >Available </label>
                <label class="radio-inline"><input type="radio" value="0" name="vestibule">Unavailable</label>
                <br><br>
                <!-- rank -->
                <label for="sel1">Rank:</label>
                    <select class="form-control col-md-12" id="sel1" name="rank">
                        <?php
                        for($i=0;$i<=$conts;$i++){
                            $h=$i+1;
                            echo "<option value='$h'>$h</option>";
                        }
                        ?>
                    </select>
                    <br/><br/><br/>
                <!-- cheack input item -->
                     <!-- cheack input item   -->
                     <div class="form-check form-check-inline klche">
                    <?php
                    $sql="SELECT `id`, `item_name` FROM `website_navbar` WHERE 1";
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result)>0){
                      while($row=mysqli_fetch_assoc($result)){

                  ?>

                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="check" value="<?php echo $row['id']; ?>">
                        <label class="form-check-label" for="inlineCheckbox1"><?php echo $row['item_name']; ?></label>

                    <?php
                        }
                    }
                    ?>
                    </div>
                <br/><br/>
                <input type="submit" name="newpage" id="Edit" class="btn btn-success  ah" value="New Page">

        </form>
    </div>
</div>
<?php
    include("../include/layout/footer.php");
    ?>
