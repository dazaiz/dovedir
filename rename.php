<?php
include_once './functions/dclass.php';
include 'conf.php';

$postfullpath = $_POST['postfullpath'];
$newname = $_POST['newname'];
$fullnewname = pdir($postfullpath).'/'.$newname;

if((stripos($postfullpath,'./') === 0) || (stripos($postfullpath,'../')) || (stripos($postfullpath,'../') === 0) || (stripos($postfullpath,'..') === 0) || (stripos($postfullpath,'..'))){
  echo '非法请求！';
  exit;
}

  if (rename($dirpath.$postfullpath,$dirpath.$fullnewname)) {


      echo "<script>parent.parent.layer.closeAll();parent.parent.layer.msg('重命名成功，页面正在刷新');parent.parent.setTimeout('refresh()',2000);</script>";

  }else {
    echo "<script>parent.parent.layer.closeAll();parent.parent.layer.msg('重命名失败，页面正在刷新');parent.parent.setTimeout('refresh()',2000);";
  }

?>
