<?php
include_once './functions/dclass.php';
include 'conf.php';
@$gdel = $_GET['del'];//get路径

if((stripos($gdel,'./') === 0) || (stripos($gdel,'../')) || (stripos($gdel,'../') === 0) || (stripos($gdel,'..') === 0) || (stripos($gdel,'..'))){
  echo '非法请求！';
  exit;
}

$cdel = ($dirpath.$gdel);
  if (is_file($cdel)) {
    if (unlink($cdel)) {
      echo "successful";
      echo "<script>parent.parent.layer.closeAll();parent.parent.layer.msg('文件删除成功，页面正在刷新');parent.parent.setTimeout('refresh()',2000);</script>";


    }else {
      echo "false";
      echo "<script>parent.parent.layer.closeAll();parent.parent.layer.msg('文件删除失败，页面正在刷新');parent.parent.setTimeout('refresh()',2000);</script>";
    }
  }else {
    if (deldirs($cdel)) {

      echo "successful";
      echo "<script>parent.parent.layer.closeAll();parent.parent.layer.msg('文件夹删除成功，页面正在刷新');parent.parent.setTimeout('refresh()',2000);</script>";
    }else {
      echo "false";
      echo "<script>parent.parent.layer.closeAll();parent.parent.layer.msg('文件夹删除失败，页面正在刷新');parent.parent.setTimeout('refresh()',2000);</script>";
    }
  }

 ?>
