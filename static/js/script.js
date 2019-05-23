window.onload=function(){
   getpath = document.getElementById('main').getAttribute("value");//取出存放在div.main的path
}

// $('.box').on('click', function () {
//     $(".box").addClass("select");
// });



function refresh() {
    location.reload();
}//reload

function boxmenu(element) {

  var filenamevalue = element.getAttribute("value");
  var onfilenamevalue = "value=\"" + filenamevalue + "\""; //将当前右键box获取到的value写入右键菜单
  // alert(element.getAttribute("value"));
  layer.config({
    extend: 'myskin/style.css', //加载您的扩展样式
    skin: 'myskin'
  });

  layer.open({
    type: 1,
    title: false,
    closeBtn: 0,
    shade: 0.01,
    shadeClose: true,
    scrollbar: false,
    area: ['260px', '150px'],
    offset: [event.clientY + 'px', event.clientX + 'px'],
    content:
      '<div id="attribute"><a ' +
      onfilenamevalue +
      'href="javascript:;" onclick="attribute(this); ">属性</a></div>' +
      '<div id="rname"><a ' +
      onfilenamevalue +
      'href="javascript:;" onclick="rename(this); ">重命名</a></div>' +
      '<div id="dname"><a ' +
      onfilenamevalue +
      'href="javascript:;" onclick="filedel(this); ">删除</a></div>',

  });

}


function filedel(element) {
  var filename = element.getAttribute("value"); //文件名
   //get路劲path
  layer.confirm('确认删除？', {
    btn: ['确认', '取消'] //按钮
  }, function() {
    layer.open({
      type: 2,
      time: 1200,
      title: false,
      closeBtn: 0,
      shade: 0.01,
      shadeClose: true,
      scrollbar: false,
      area: ['500px', '535px'],
      content: ['del.php?del='+getpath+'/'+filename, 'no'],
    });
    // layer.closeAll('dialog');
  }, function() {
    layer.msg('已取消', {
      icon: 2
    });

  });


}


function rename(element) {
  filename = element.getAttribute("value");//当前div文件名
  var fullpath = getpath + '/' + filename;
  layer.open({
    type: 2,
    title: false,
    closeBtn: 0,
    shade: 0.01,
    anim: 2,
    shadeClose: true,
    scrollbar: false,
    area: ['500px', '535px'],
    content: ['renameg.php?fullpath=' + fullpath, 'no'],
  });

}

function newFile(element) {
  filename = element.getAttribute("value");
  layer.prompt(function(val, index) {
    layer.msg('得到了' + val);
    layer.close(index);
  });
}

function newFolder(element) {
  filename = element.getAttribute("value");
  layer.prompt(function(val, index) {
    layer.msg('得到了' + val);
    layer.close(index);
  });
}

function attribute(element) {
  filename = element.getAttribute("value");
  $fullpath = getpath + '/' + filename;
  // alert(fullpath);
  $.post("attribute.php",
    {
      postfullpath: $fullpath,
    },
        function(data){
          // alert("数据: \n" + data);
          layer.open({
            type: 1,
            title: false,
            closeBtn: 0,
            shade: 0.01,
            shadeClose: true,
            scrollbar: false,
            area: ['260px', '150px'],
            content: data
          });
    });


}
