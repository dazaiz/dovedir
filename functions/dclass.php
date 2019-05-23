<?php
function deldir($path){
 //如果是目录则继续
 if(is_dir($path)){
  //扫描一个文件夹内的所有文件夹和文件并返回数组
 $p = scandir($path);
 foreach($p as $val){
  //排除目录中的.和..
  if($val !="." && $val !=".."){
   //如果是目录则递归子目录，继续操作
   if(is_dir($path.'/'.$val)){
    //子目录中操作删除文件夹和文件
    deldir($path.'/'.$val);
    //目录清空后删除空文件夹
    @rmdir($path.'/'.$val);
   }else{
    //如果是文件直接删除
    unlink($path.'/'.$val);
   }
  }
 }
}
}

function deldirs($path){
  deldir($path);
  if (rmdir($path)) {
    return true;
  }else {
    return false;
  }
}

function pdir($gdir) //上一级目录
 {
     $direx = explode("/", $gdir);
     $direxnum = count($direx);
     $pdir = '';
     for ($i=1; $i < ($direxnum - 1); $i++) {
         $pdir = $pdir.'/'.$direx[$i];
     }
     return $pdir;
 }

 function dirSize($path) //文件大小
 {
 	$sum=0;
 	global $sum;
 	$handle=opendir($path);
 	while(($item=readdir($handle))!==false){
 		if($item!="."&&$item!=".."){
 			if(is_file($path."/".$item)){
 				$sum+=filesize($path."/".$item);
 			}
 			if(is_dir($path."/".$item)){
 				// $func=__FUNCTION__;
 				dirSize($path."/".$item);
 			}
 		}

 	}
 	closedir($handle);
 	return $sum;
 }

 function transByte($size) //文件大小单位
 {
 	$arr = array ("B", "KB", "MB", "GB", "TB", "EB" );
 	$i = 0;
 	while ( $size >= 1024 ) {
 		$size /= 1024;
 		$i ++;
 	}
 	return round ( $size, 2 ) . $arr [$i];
 }

function pdirex($gdir) //爆破gdir返回目录数组
{
  $direx = explode("/", $gdir);
  $direx = array_splice($direx,1);
  return $direx;
}

function gpdir($gdir,$key) //根据数组id返回上一路径
{
  $direx = explode("/", $gdir);
  $pdir = '';
  for ($i=1; $i < $key+2; $i++) {
      $pdir = $pdir.'/'.$direx[$i];
  }
  return $pdir;

}
 ?>
