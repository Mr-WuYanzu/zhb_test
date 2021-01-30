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
        <script type="text/javascript" src="/lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="/js/xadmin.js"></script>
        <script type="text/javascript" src="/js/jquery.min.js"></script>
        <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
        <!--[if lt IE 9]>
            <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
            <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            /*body{*/
            /*    background: url("/images/loadingpic44.png");*/
            /*}*/
            body{
                position:fixed;
                background: url("{{$img}}") no-repeat;
            }
        </style>
    </head>
    <body style="height: 100%">
        <div class="layui-fluid" style="background-color: #ffffff;margin-top: 250px;margin-left: 5%;width: 90%;border-radius:10px 10px;">
            <div class="layui-row">
                <div style="text-align: center;width: 100%;font-size: 28px">请输入您的专科专业/专业代码</div>
                <form class="layui-form">
                  <div class="layui-form-item">
                      <div class="layui-input-inline" style="width: 80%;padding-left: 10%;padding-top: 38px">
                          <input type="text" id="text" name="text" required="" lay-verify="required"
                          autocomplete="off" class="layui-input" style="height: 40px" placeholder="请输入专业全称/专业代码">
                      </div>
                  </div>
                    <div class="layui-form-item" id="content" style="text-align: center;border: solid 1px #D0D0D0;margin-top: -15px;background-color: #ffffff;width: 80%;margin-left: 10%;padding-top: 20px;display: none">

                    </div>
                  <div class="layui-form-item" style="text-align: center;width: 100%">
                      <button  class="layui-btn" id="submit" lay-filter="add" style="width: 80%">
                          查询
                      </button>
                  </div>
              </form>
            </div>
        </div>

        <div class="layui-fluid" id="check" style="position:relative;top:-450px;border:solid 1px #1b1e21;background-color: #ffffff;margin-top: 250px;margin-left: 10%;width: 80%;border-radius:10px 10px;display: none">
            <div class="layui-row">
                <form class="layui-form">
                    <div class="layui-form-item">
                        <label for="username" class="layui-form-label">
                            <span class="x-red">*</span>城市
                        </label>
                        <div class="layui-input-inline" style="width: 80%;padding-left: 10%;padding-top: 20px">
                            <input type="text" id="city" name="city" required="" lay-verify="required"
                                   autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="username" class="layui-form-label">
                            <span class="x-red">*</span>学校
                        </label>
                        <div class="layui-input-inline" style="width: 80%;padding-left: 10%;padding-top: 20px">
                            <input type="text" id="school" name="school" required="" lay-verify="required"
                                   autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="username" class="layui-form-label">
                            <span class="x-red">*</span>年级
                        </label>
                        <div class="layui-input-inline" style="width: 80%;padding-left: 10%;padding-top: 20px">
                            <input type="text" id="class" name="class" required="" lay-verify="required"
                                   autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="username" class="layui-form-label">
                            <span class="x-red">*</span>手机号
                        </label>
                        <div class="layui-input-inline" style="width: 80%;padding-left: 10%;padding-top: 20px">
                            <input type="number" id="phone" name="phone" required="" lay-verify="required"
                                   autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="username" class="layui-form-label">
                            <span class="x-red">*</span>验证码
                        </label>
                        <div class="layui-input-inline" style="width: 60%;padding-left: 10%;padding-top: 20px">
                            <input type="number" id="auth_code" name="auth_code" required="" lay-verify="required"
                                   autocomplete="off" class="layui-input">
                        </div>
                        <div class="layui-form-mid layui-word-aux" style="margin-top:15px">
                            <span class="x-red map_select">点击获取验证码</span>
                        </div>
                    </div>

                    <div class="layui-form-item" style="text-align: center;width: 100%">
                        <button  class="layui-btn" lay-filter="add" lay-submit="" style="width: 80%">
                            增加
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <script>
            layui.use(['form', 'layer'],
            function() {
                var login_data = localStorage.getItem('login');
                if(login_data == null){
                    $('#check').show();
                }
                $("#text").bind("input propertychange change",function(event){
                    $('#content').show();
                    var _text = $(this).val();
                    if(_text == ''){
                        $('#content').hide();
                        return false;
                    }
                    _html = '<a href="https://www.baidu.com">'+_text+'</a><br>'
                    $('#content').append(_html);
                });
                $('#submit').click(function () {



                    return false;
                })
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
