<?php
if ($_POST) {
    //处理你的业务...
    echo "<script>parent.parent.layer.closeAll();parent.parent.layer.msg('添加成功，页面正在刷新');parent.parent.setTimeout('refresh()',2000);</script>";
    die;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title> 弹窗测试 </title>
    <meta charset="utf-8"/>
</head>

<body>
<iframe name="iframe" id="iframe" style="display:none"></iframe>

<form action="#" method="post" target="iframe">
    <table border="1">
        <tr>
            <td>姓名</td>
            <td><input type="text" name="username"/></td>
        </tr>
        <tr>
            <td>年龄</td>
            <td><input type="text" name="age"/></td>
        </tr>
        <tr>
            <td colspan='2'><input type="submit" value="提交"/>
            </td>
        </tr>
    </table>
</form>
</body>
</html>
