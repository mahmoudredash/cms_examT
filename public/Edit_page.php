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
$mname=null;$tcontent=null;$idP=null;$vis=null;$itmID=null;$rnk=null;



?>








<!-- Start Edit and Delete Pages -->

<div class="col-md-12 container ">

<?php
    if (isset($_GET['page'])&& is_numeric($_GET['page'])) {
        $idP=(int)$_GET['page'];
        $res=mysqli_fetch_assoc(getrowD(" WHERE `id`=$idP LIMIT 1","`pages`","`item_name_id`,`page_name`, `content`,`rank`,`visible`",$conn));
        $itmID=$res['item_name_id'];
        $vis=$res['visible'];
        $mname=$res['page_name'];
        $tcontent=$res['content'];
        $rnk=$res['rank'];
        $conts=getCount("`pages`"," WHERE 1 ",$conn);
    }

?>

<div class="static pgat ">
    <form method="POST" action="sub_Edit_page.php" class="form-group" id="fh">
        <!-- Title Pages -->
            <label class="form-text" for="mname">Title Page :</label>
            <input type="text" name="mname" class="form-control form-control-lg" id="mname" value="<?php echo $mname;?>" >
            <br>
            <!-- item_id -->
            <input type="hidden" name="id" value="<?php echo $idP;?>>
            <!-- content Page -->
            <label class="form-text" for="tcontent">Content Page :</label>
            <textarea name="tcontent" class="form-control form-control-lg" id="tcontent" >
            <?php echo $tcontent;?>
            </textarea>
            <br/>
            <!-- visibul -->
            <label class="radio-inline lbr"><input type="radio" name="optradio" value="1" <?php echo ($vis==1)?'checked':null ;?> >Available </label>
            <label class="radio-inline"><input type="radio" name="optradio" value="0"<?php echo ($vis==0)?'checked':null ;?> >Unavailable</label>
            <br><br>
            <!-- rank -->
            <label for="sel1">Rank:</label>
            <select class="form-control col-md-12" id="sel1" name="rank">
                <?php
                for($i=0;$i<$conts;$i++){
                    $h=$i+1;
                    if ($rnk==$h) {
                        echo "<option selected value='$h'>$h</option>";
                    } else {
                        echo "<option value='$h'>$h</option>";
                    }
                }
                ?>
            </select>
            <br/><br/><br/>
            <!-- cheack input item   -->
            <div class="form-check form-check-inline klche">
            <?php
            $sql="SELECT `id`, `item_name` FROM `website_navbar` WHERE 1";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
              while($row=mysqli_fetch_assoc($result)){

          ?>

                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" <?php echo  ($row['id']==$itmID) ? 'checked' : null ;?> name="idmenu" value="<?php echo $row['id']; ?>">
                <label class="form-check-label" for="inlineCheckbox1"><?php echo $row['item_name']; ?></label>

            <?php
                }
            }
            ?>
            </div>
            <br/>
            <input type="submit" name="sub_edit" id="Edit" class="btn btn-success aq" value="EditPage">
            <input type="submit" name="sub_delete" id="Delete" class="btn btn-danger aq" value="DeletePage">

    </form>
</div>
</div>





<!-- end Edit and Delete Pages -->




  <?php
    include("../include/layout/footer.php");
    ?>
