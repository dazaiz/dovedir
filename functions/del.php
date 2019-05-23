<?php
include 'conf.php';
@$gdel = $_GET['del'];//get路径

if((stripos($gdel,'./') === 0) || (stripos($gdel,'../')) || (stripos($gdel,'../') === 0) || (stripos($gdel,'..') === 0) || (stripos($gdel,'..'))){
  echo '非法请求！';
  exit;
}

$cdel = ($dirpath.$gdel);
  if (unlink($cdel)) {
    // echo "var_dump($cdel)";
    echo "successful";
  }else {
    echo "false";
  }

 ?>
