<?php
include_once './functions/dclass.php';
include 'conf.php';
$postfullpath = $_POST['postfullpath'];

if (dirSize($postfullpath)) {
  return dirSize($postfullpath)
}


 ?>
