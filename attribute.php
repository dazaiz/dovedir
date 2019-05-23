<?php
include_once './functions/dclass.php';
include 'conf.php';
$postfullpath = 'file'.$_POST['postfullpath'];

if (is_file($postfullpath)) {
  $size = filesize($postfullpath);
}else {
  $size = dirSize($postfullpath);
}

echo transByte($size);

 ?>
