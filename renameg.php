<?php

$fullpath = $_GET['fullpath'];


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>  </title>
    <meta charset="utf-8"/>
</head>

<body>
<iframe name="iframe" id="iframe" style="display:none"></iframe>

<form action="rename.php" method="post" target="iframe">
    <table border="1">
      <tr>
          <td>path</td>
          <td><input type="text" name="postfullpath" value="<?php echo "$fullpath"; ?>"/></td>
      </tr>
        <tr>
            <td>newname</td>
            <td><input type="text" name="newname"/></td>
        </tr>
        <tr>
            <td colspan='2'><input type="submit" value="提交"/>
            </td>
        </tr>
    </table>
</form>
</body>
</html>
