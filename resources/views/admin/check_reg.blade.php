<!DOCTYPE html>
<html class="x-admin-sm">
    <head>
        <meta charset="UTF-8">
        <title>欢迎页面-X-admin2.2</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <link rel="stylesheet" href="/css/font.css">
        <link rel="stylesheet" href="/css/xadmin.css">
        <script src="/lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="/js/xadmin.js"></script>
        <!--[if lt IE 9]>
          <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
          <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div class="layui-fluid">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md12">
                        <div class="layui-card-header">
                            <button class="layui-btn" onclick="xadmin.open('报考信息','/admin/link_reg?spe_code={{$spe_code}}',600,400)">关联报考信息</button>
                        </div>
                        <div class="layui-card-body ">
                            <table class="layui-table layui-form">
                              <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>报考信息</th>
                                    <th>代码</th>
                                    <th>操作</th>
                              </thead>
                              <tbody>
                              @foreach($data as $k=>$v)
                                <tr>
                                  <td>{{$v['id']}}</td>
                                  <td>{{$v['reg_title']}}</td>
                                    <td>{{$v['reg_code']}}</td>
                                    <td>
                                        <button class="layui-btn" onclick="del($(this),{{$v['id']}})">删除</button>
                                    </td>
                                </tr>
                              @endforeach
                              </tbody>
                            </table>
                        </div>
                        <div class="layui-card-body ">
                            <div class="page">
                                <div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </body>
    <script>
      layui.use(['laydate','form'], function(){
        var laydate = layui.laydate;
        var form = layui.form;

        //执行一个laydate实例
        laydate.render({
          elem: '#start' //指定元素
        });

        //执行一个laydate实例
        laydate.render({
          elem: '#end' //指定元素
        });
      });

      /*删除*/
      function del(obj,id){
          layer.confirm('确认要删除吗？',function(index){
              //发异步删除数据
              $.ajax({
                  url:'/admin/check_reg_del?id='+id,
                  dataType:'json',
                  success:function (res) {
                    if(res.code==200){
                        $(obj).parents("tr").remove();
                        layer.msg('已删除!',{icon:1,time:1000});
                    }else{
                        layer.msg(res.msg,{icon:1,time:1000});
                    }
                  }
              })

          });
      }



      function delAll (argument) {

        var data = tableCheck.getData();

        layer.confirm('确认要删除吗？'+data,function(index){
            //捉到所有被选中的，发异步进行删除
            layer.msg('删除成功', {icon: 1});
            $(".layui-form-checked").not('.header').parents('tr').remove();
        });
      }
    </script>
    <script>var _hmt = _hmt || []; (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
      })();</script>
</html>
