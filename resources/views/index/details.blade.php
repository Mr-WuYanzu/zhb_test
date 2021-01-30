<!DOCTYPE html>
<html class="x-admin-sm">

    <head>
        <meta charset="UTF-8">
        <title>专业报考</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <link rel="stylesheet" href="/css/font.css">
        <link rel="stylesheet" href="/css/xadmin.css">
        <script type="text/javascript" src="/lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="/js/xadmin.js"></script>
        <script type="text/javascript" src="/js/jquery.min.js"></script>
        <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
        <!--[if lt IE 9]>
            <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
            <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            #back{
                width: 100%;
                height: 100px;
            }
            table{

                border-collapse: collapse;

            }

            tr{

                border-bottom: 1px solid #495057;

            }
        </style>
    </head>
    <body style="background-color: #ffffff;">
    <div style="height: 100%">
        <div>
            <img src="/images/loadingpic44.png" alt="" id="back">
        </div>
        <div style="width:90%;padding-left: 5%;">
            <h3 style="padding-top: 20px;text-align: center;padding-bottom: 10px">{{$spe_data['name']??''}}报考信息</h3>
            <p style="width:100%;border: black 1px solid;"></p>
            <div style="width: 100%;padding-top: 10px">
                <table style="width: 100%">
                    <tbody>
                    @foreach($reg_data as $k=>$v)
                    <tr style="height: 50px;">
                        <td style="font-size: 18px;width: 65%">{{$v['title']}}[{{$v['code']}}]</td>
                        <td style="text-align: right;color: deepskyblue;font-size: 18px;cursor:pointer" class="details" onclick='xadmin.open("{{$v['title']}}[{{$v['code']}}]","/get_school?code={{$v['code']}}",400,500)'>查看招生院校&nbsp;></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <div style="width: 100%;height:50px;position: fixed;bottom: 10px;" align="center">
        <img src="/images/loadingpic44.png" alt="" style="height: 50px;width: 150px;">
    </div>

        <script>
            layui.use(['form', 'layer'],
            function() {

            });


        </script>
        <script>var _hmt = _hmt || []; (function() {
                var hm = document.createElement("script");
                hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
                var s = document.getElementsByTagName("script")[0];
                s.parentNode.insertBefore(hm, s);
            })();</script>
    </body>

</html>
