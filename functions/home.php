<?php

include_once './functions/dclass.php';
include 'conf.php';

@$gdir = $_GET['gdir'];//get路径
$scandir = scandir($dirpath.$gdir);//scandir 固定路径+get路径



//对目录进行过滤
if((stripos($gdir,'./') === 0) || (stripos($gdir,'../')) || (stripos($gdir,'../') === 0) || (stripos($gdir,'..') === 0) || (stripos($gdir,'..'))){
  echo '非法请求！';
  exit;
}


?>
  <div class="main">
    <!-- 输出文件夹 -->
    <div class="box">
      <?php
      foreach ($scandir as  $filename) {
          if (is_dir($dirpath.$gdir.'/'.$filename)!==false && $filename!=='.' && $filename!=='..') {
      ?>

      <div class="mbox">
        <div class="mimg">

        </div>
        <div class="name"><a href='index.php?gdir=<?php echo "$gdir/$filename"; ?>'><?php echo "$filename"; ?></a><br></div>
      </div>
        <?php
          }
      }
        ?>

    </div>
    <!-- 输出文件 -->
    <div class="box">
      <?php
      foreach ($scandir as  $filename) {
          if (is_dir($dirpath.$gdir.'/'.$filename)==false && $filename!=='.' && $filename!=='..') {
      ?>

      <div class="mbox">
        <div class="mimg">

        </div>
        <div class="name"><a href='<?php echo "file$gdir/$filename"; ?>'><?php echo "$filename"; ?></a><br></div>
      </div>
        <?php
          }
      }
        ?>


    </div>




  </div>
