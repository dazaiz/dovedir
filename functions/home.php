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
  <div id="main" value="<?php echo "$gdir"; ?>">
    <div class="contents">
      <p>
        <a href="index.php">index</a>
      </p>
      <?php
      $variable = pdirex($gdir);
      foreach ($variable as $key => $value) {
        ?>
        <p>
          <a href="index.php?gdir=<?php echo gpdir($gdir,$key); ?>"><?php echo $value ?></a>
        </p>

      <?php } ?>


    </div>
    <!-- 输出文件夹 -->
    <?php
    foreach ($scandir as  $filename) {
        if (is_dir($dirpath.$gdir.'/'.$filename)!==false && $filename!=='.' && $filename!=='..') {
    ?>
    <div class="box"  oncontextmenu="boxmenu(this);" value="<?php echo "$filename"; ?>">


      <div class="mbox">
        <div class="mimg">
           <img src="static/picture/1.png" alt="">

        </div>
        <div class="name"><p><a href='index.php?gdir=<?php echo "$gdir/$filename"; ?>'><?php echo "$filename"; ?></a></p></div>
      </div>
    </div>
        <?php
          }
      }
        ?>


    <!-- 输出文件 -->
    <?php
    foreach ($scandir as  $filename) {
        if (is_file($dirpath.$gdir.'/'.$filename)!==false && $filename!=='.' && $filename!=='..') {
    ?>
    <div class="box" id="box" oncontextmenu="boxmenu(this);" value="<?php echo "$filename"; ?>">


      <div class="mbox">
        <div class="mimg">
          <img src="static/picture/2.png" alt="">

        </div>
        <div class="name"><p><a href='<?php echo "file$gdir/$filename"; ?>'><?php echo "$filename"; ?></a></p></div>
      </div>
    </div>

        <?php
          }
      }
        ?>

  </div>
