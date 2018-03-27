<?php session_start();?>
<?php

include_once("../include/functions.php");
include_once("../include/session.php");
check_login();
include("../include/layout/header.php");
include_once("../include/connectDB.php");


include_once ("../include/layout/navbar.php");

?>

  <!-- <div class="container theme-showcase" role="main"> -->
    <div class="container theme-showcase" role="main">
    <div class="jumbotron">
      <h1>This Admin Page</h1>
      <p>this is exampel for test your CMS</p>
      <p>
      <a type="button" class="btn btn-lg btn-success" href="admin.php">Admin Page</a>
      <a type="button" class="btn btn-lg btn-primary" href="manage_content.php">Manage Content</a>
      <a type="button" class="btn btn-lg btn-danger" href="#">Logout</a>
    </p>
    </div>
  </div>









<!--show content all data for selected-->


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








