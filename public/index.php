<?php
include("../include/layout/pulic/header.php");
include_once("../include/functions.php");
include_once("../include/connectDB.php");
include_once("../include/layout/pulic/navber.php");

// SELECT   `page_name`, `content` FROM  `pages`
// WHERE `visible`=1 AND `status`=1 ORDER BY `id` LIMIT 1 

?>









<br/><br/>
<?php
//show if not select item or page 
    if (empty($_GET)){
        $wher="WHERE `visible`=1 AND `status`=1 ORDER BY `id` DESC LIMIT 1";
        $ress=getrowD($wher,"`pages`","`id`,`page_name`, `content`",$conn);
        $fatRowD=mysqli_fetch_assoc($ress);
        mysqli_free_result($ress);
   
?>
<div class="container">

    <div class="jumbotron">
    <h1 class="display-3"><a class="btn btn-light btn-lg" href="index.php?page=<?php echo $fatRowD['id'];?>"><?php echo $fatRowD['page_name'];?></a></h1>
    <p class="lead  text-md-center"><?php echo $fatRowD['content']?></p>
        <a class="btn btn-primary  btn-lg" href="index.php?page=<?php echo $fatRowD['id'];?>" role="button">Learn more</a>
    </p>
    </div>
</div>
<?php
}
?>

<div class="container">
<?php
if(isset($_GET['item'])&&(int)$_GET['item']>2 &&(int)$_GET['item']!=0){
    $idItm=(int)urlencode($_GET['item']);
    $wher="WHERE `visible`=1 ORDER BY `id` DESC LIMIT 1 ";
    $ress=getrowD($wher,"`website_navbar`","`id`",$conn);
    $fatRowD=mysqli_fetch_assoc($ress);
    mysqli_free_result($ress);
    $contItm=$fatRowD['id'];
    //cheack if not enter id_itm bag for items
    if (!empty($idItm)&&$contItm>=$idItm) {//show all in item !
        $wher="WHERE `item_name_id`={$idItm} AND `visible`=1 AND `status`=1 ORDER BY `id` DESC ";
        $ress=getrowD($wher,"`pages`","`id`, `page_name`, `content`",$conn);
        while($fatRowD=mysqli_fetch_assoc($ress)){
            ?>

    <div class="card border-light mb-3 heer " style="max-width: 20rem;">
        <div class="card-header">
            <a class="btn btn-light btn-block" href="index.php?page=<?php echo $fatRowD['id'];?>">
            <?php echo $fatRowD['page_name'];?></a></div>
        <div class="card-body">
            <h4 class="card-title"><?php echo $fatRowD['page_name'];?></h4>
            <p class="card-text"><?php echo $fatRowD['content'];?></p>
        </div>
    </div>
<?php
        }
    }else{
        echo "Not Found Menu !...";
    }
    //cheack in page if found data and if data > 0 and data != 0
    }elseif (isset($_GET['page'])&&(int)$_GET['page']>0 &&(int)$_GET['page']!=0) {

        $idPg=(int)urlencode($_GET['page']);
        $wher="WHERE `visible`=1 AND `status`=1 ORDER BY `id` DESC LIMIT 1 ";
        $ress=getrowD($wher,"`pages`","`id`",$conn);
        $fatRowD=mysqli_fetch_assoc($ress);
        mysqli_free_result($ress);
        $contPg=$fatRowD['id'];
        //cheack if page id bag for id_pages !
        if (!empty($idPg)&&$contPg>=$idPg) {
            $wher="WHERE `id`=$idPg LIMIT 1";
            $ress=getrowD($wher,"`pages`","`page_name`, `content`, `data`",$conn);
            $fatRowD=mysqli_fetch_assoc($ress);
            mysqli_free_result($ress);
            ?>
            <br/>
            <br/>
            <div class="col-md-12 clearfix">
                <h1 class="text-info">   <?php echo $fatRowD['page_name']; ?>  </h1>
                <p class="justify-content-center lead"><?php echo $fatRowD['content']; ?></p>
                <hr/>
                <p class="col-md-4 glyphicon-time text-xl-right "><?php echo $fatRowD['data']; ?></p>
              </div>
<?php
        }else {
            echo "Not Found Page !...";
        }
    }elseif (isset($_GET['item'])&&(int)$_GET['item']!=0) {
        $idItm=(int)urlencode($_GET['item']);
       if ($idItm==1) {

           ?>

            <br/>
            <br/>
            <div class="col-md-12 clearfix">
                <h1 class="text-info">   <?php echo 'Website home page'; ?>  </h1>
                <p class="justify-content-center lead"><?php echo "A home page is generally the main page a visitor navigating to a website from a web search engine will see, and it may also serve as a landing page to attract visitors.[1][2] The home page is used to facilitate navigation to other pages on the site by providing links to prioritized and recent articles and pages, and possibly a search box.[3] For example, a news website may present headlines and first paragraphs of top stories, with links to full articles, in a dynamic web page that reflects the popularity and recentness of stories.[4] Meanwhile, other websites use the homepage to attract users to create an account. Once they are logged in, the homepage may be redirected to their profile page. This may in turn be referred to as the personal home page.[5]

A website may have multiple home pages, although most have one.[6] Wikipedia, for example, has a home page at wikipedia.org, as well as language-specific home pages, such as en.wikipedia.org and de.wikipedia.org." ?></p>
                <hr/>
              </div>

           <?php
            $wher="WHERE `item_name_id`={$idItm} AND `visible`=1 AND `status`=1 ORDER BY `id` DESC ";
            $ress=getrowD($wher,"`pages`","`id`, `page_name`, `content`",$conn);
            if (!empty($ress)) {
                while($fatRowD=mysqli_fetch_assoc($ress)){
                ?>
        <div class="card border-light mb-3 heer " style="max-width: 20rem;">
            <div class="card-header">
                <a class="btn btn-light btn-block" href="index.php?page=<?php echo $fatRowD['id'];?>">
                <?php echo $fatRowD['page_name'];?></a></div>
            <div class="card-body">
                <h4 class="card-title"><?php echo $fatRowD['page_name'];?></h4>
                <p class="card-text"><?php echo $fatRowD['content'];?></p>
            </div>
        </div>
        <?php
            }
        }
       }
       if ($idItm==2) {
?>
        <br/>
        <br/>
        <div class="col-md-12 clearfix">
            <h1 class="text-info">   <?php echo 'Web page'; ?>  </h1>
            <p class="justify-content-center lead"><?php echo "A web page (also written as webpage) is a document that is suitable for the World Wide Web and web browsers. A web browser displays a web page on a monitor or mobile device.

The web page usually means what is visible, but the term may also refer to a computer file, usually written in HTML or a comparable markup language. Web browsers coordinate various web resource elements for the written web page, such as style sheets, scripts, and images, to present the web page. Typical web pages provide hypertext that includes a navigation bar or a sidebar menu linking to other web pages via hyperlinks, often referred to as links.

On a network, a web browser can retrieve a web page from a remote web server. The web server may restrict access to a private network such as a corporate intranet. The web browser uses the Hypertext Transfer Protocol (HTTP) to make such requests.

A static web page is delivered exactly as stored, as web content in the web server's file system. In contrast, a dynamic web page is generated by a web application, usually driven by server-side software. Dynamic web pages help the browser (the client) to enhance the web page through user input to the server." ?></p>
            <hr/>
          </div>

       <?php
        $wher="WHERE `item_name_id`={$idItm} AND `visible`=1 AND `status`=1 ORDER BY `id` DESC ";
        $ress=getrowD($wher,"`pages`","`id`, `page_name`, `content`",$conn);
        if (!empty($ress)) {
            while($fatRowD=mysqli_fetch_assoc($ress)){
            ?>
    <div class="card border-light mb-3 heer " style="max-width: 20rem;">
        <div class="card-header">
            <a class="btn btn-light btn-block" href="index.php?page=<?php echo $fatRowD['id'];?>">
            <?php echo $fatRowD['page_name'];?></a></div>
        <div class="card-body">
            <h4 class="card-title"><?php echo $fatRowD['page_name'];?></h4>
            <p class="card-text"><?php echo $fatRowD['content'];?></p>
        </div>
    </div>
    <?php
        }
    }
   }
    }else {
        $wher="WHERE `visible`=1 AND `status`=1 ORDER By `data` DESC LIMIT 6";
        $ress=getrowD($wher,"`pages`","`id`, `page_name`, `content`",$conn);
        if (!empty($ress)) {
            while($fatRowD=mysqli_fetch_assoc($ress)){
            ?>
            <div class="card border-light mb-3 heer " style="max-width: 20rem;">
        <div class="card-header">
            <a class="btn btn-light btn-block" href="index.php?page=<?php echo $fatRowD['id'];?>">
            <?php echo $fatRowD['page_name'];?></a></div>
        <div class="card-body">
            <h4 class="card-title"><?php echo $fatRowD['page_name'];?></h4>
            <p class="card-text"><?php echo $fatRowD['content'];?></p>
        </div>
    </div>
    <?php
        }
    }
    }
?>
</div>











<?php include_once("../include/layout/pulic/footer.php");?>