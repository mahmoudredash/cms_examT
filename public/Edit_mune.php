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

//function show handel eny erorrs in cheack fro Data
erorr_function($errors);

echo msgd();
echo err();
?>

<?php
$size=0;
$sql="SELECT `id`, `item_name` FROM `website_navbar` WHERE 1";
$result = mysqli_query($conn,$sql);
while ($arRows=mysqli_fetch_assoc($result)) {
    //runk >> add to size
    if($arRows["id"]>$size){$size=$arRows["id"];}
?>
        <a href="Edit_mune.php?id=<?php echo$arRows["id"];?>" class="btn btn-info klir btn-block">
           <button type="button" class="btn btn-info klir btn-block">
           <?php echo ucfirst($arRows["item_name"]);?>
        </button></a> <br>
<?php
}
mysqli_free_result($result);


if (isset($_GET['id'])&& !empty($_GET['id'])) {
    $num=(int)$_GET['id'];
    $sql = "SELECT `item_name`,`rank`, `visible` FROM `website_navbar` WHERE `id`={$num} LIMIT 1";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result)>0) {
        $arRows=mysqli_fetch_assoc($result);
?>


<script>
    function show() {
        confirm('Are YOU Shour Delete Menu !!');
    }
</script>


        <div class=" content col-md-12 ">
            <div class=" static">
                <form  method="POST" action="Edit_submit_mune.php" class="form-group" id="fh">
                    <label class="form-text" for="mname">Menu name :</label>
                    <input type="text" name="mname" class="form-control form-control-lg" id="mname"
                    value="<?php echo $arRows['item_name'];?>" >
                    <br><input type="hidden"  name="idr" value="<?php echo $num;?>">
                    <label class="radio-inline lbr"><input type="radio" name="optradio" value='1'
                    <?php  if($arRows['visible']==1){echo 'checked';} ?>>Available </label>
                    <label class="radio-inline"><input type="radio" name="optradio" value='0'
                    <?php  if($arRows['visible']==0){echo 'checked';} ?>>Unavailable</label>
                    <br><br>
                    <label for="sel1">Rank:</label>
                    <select class="form-control trh col-md-12" id="sel1" name="rank">
                      <option value="<?php echo $arRows['rank']; ?>" ><?php echo $arRows['rank']; ?></option>
                      <?php for($i=0;$i<$size;$i++){echo "<option value=''.{$i}>{$i}</option>";}?>
                    </select><br><br/>
                    <input type="submit" name="sub_edit" id="Edit" class="btn btn-success lbr btn-block" value="EditMenu">
                    <br><input type="submit" onclick="show()" name="sub_delete" id="Delete" class="btn btn-danger btn-block" value="DeleteMenu">

                </form>
            </div>
        </div>
<?php
    }
}
?>



    <?php
    include("../include/layout/footer.php");
    ?>
