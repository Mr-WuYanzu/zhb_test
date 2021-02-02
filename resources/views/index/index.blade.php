<!DOCTYPE html>
<html class="x-admin-sm">

    <head>
        <meta charset="UTF-8">
        <title>专业院校查询系统</title>
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

            html,body{height: 100%;width: 100%;min-height:800px}
            body{
                background: url("{{$img}}") no-repeat;
                width:100%;
                height:100%;
                background-size: 112% 114% !important;
                position:absolute;
                filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='{{$img}}',sizingMethod='scale');
                background-color:#6c757d;
            }
        </style>
    </head>
    <body>
        <div class="layui-fluid" style="background-color: #ffffff;margin-top: 250px;margin-left: 5%;width: 90%;border-radius:10px 10px;">
            <div class="layui-row">
                <div style="text-align: center;width: 100%;font-size: 18px;margin-bottom: 20px">请输入您的专科专业/专业代码</div>
                <form class="layui-form">
                  <div class="layui-form-item" style="width: 100%">
                      <div class="layui-input-inline" style="width: 80%;padding-left: 10%;">
                          <input type="text" id="text" name="text" required="" lay-verify="required"
                          autocomplete="off" class="layui-input" style="height: 50px" placeholder="请输入专业全称/专业代码">
                      </div>
                  </div>
                    <div class="layui-form-item" id="content" style="font-size:18px;text-align: center;border: solid 1px #D0D0D0;margin-top: -15px;background-color: #ffffff;width: 80%;margin-left: 10%;padding-top: 20px;display: none">

                    </div>
                  <div class="layui-form-item" style="text-align: center;width: 100%">
                      <button  class="layui-btn" id="submit" lay-filter="add" style="width: 80%;font-size: 18px;background-color: #1E9FFF">
                          查询
                      </button>
                  </div>
              </form>
            </div>
        </div>

        <div class="layui-fluid" id="check" style="position:relative;top:-450px;border:solid 1px #1b1e21;background-color: #ffffff;margin-top: 250px;margin-left: 10%;width: 80%;border-radius:10px 10px;display: none">
            <div class="layui-row">
                <div style="text-align: center;width: 100%;font-size: 18px;margin-bottom: 10px">信息验证</div>
                <form class="layui-form">
                    <div class="layui-form-item" style="padding-left: 10%;padding-top: 20px">
                        <label class="layui-form-label"  style="width: 60px"><span class="x-red">*</span>城市</label>
                        <div class="layui-input-inline" style="width: 50%;">
                            <select name="city" lay-verify="required" lay-filter="city" id="city">
                                <option value="">请选择</option>
                                @foreach($city_data as $k=>$v)
                                <option value="{{$v['name']}}" _id="{{$v['id']}}">{{$v['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item" style="padding-left: 10%;padding-top: 20px">
                        <label class="layui-form-label"  style="width: 60px"><span class="x-red">*</span>学校</label>
                        <div class="layui-input-inline" style="width: 50%;">
                            <select name="school" lay-verify="required" id="school">
                                <option value="">请选择</option>
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item" style="padding-left: 10%;padding-top: 20px">
                        <label class="layui-form-label"  style="width: 60px"><span class="x-red">*</span>年级</label>
                        <div class="layui-input-inline" style="width: 50%;">
                            <select name="class" lay-verify="required">
                                <option value="一年级">大学一年级</option>
                                <option value="二年级">大学二年级</option>
                                <option value="三年级">大学三年级</option>
                                <option value="四年级">大学四年级</option>
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item" style="padding-left: 10%;padding-top: 20px">
                        <label for="username" class="layui-form-label" style="width: 60px">
                            <span class="x-red">*</span>手机号
                        </label>
                        <div class="layui-input-inline" style="width: 50%;">
                            <input type="number" id="phone" name="phone" required="" lay-verify="required"
                                   autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item" style="padding-left: 10%;padding-top: 20px">
                        <label for="username" class="layui-form-label" style="width: 60px">
                            <span class="x-red">*</span>验证码
                        </label>
                        <div class="layui-input-inline" style="width: 50%;">
                            <input type="number" id="auth_code" name="auth_code" required="" lay-verify="required"
                                   autocomplete="off" class="layui-input">
                        </div>
                        <div class="layui-form-mid layui-word-aux" style="">
                            <span class="map_select" style="color:#007DDB">获取验证码</span>
                        </div>
                    </div>

                    <div class="layui-form-item" style="text-align: center;width: 100%">
                        <button  class="layui-btn" lay-filter="login" lay-submit="" style="width: 80%;background-color: #1E9FFF">
                            验证
                        </button>
                    </div>
                </form>
            </div>
        </div>

            <div style="width: 100%;height:50px;position: fixed;bottom: 10px;" align="center">
                <h2 style="color: white">山东微派网络科技有限公司</h2>
                <h2 style="color: white">联系电话：<a href="tel:18396839126" style="color: #00FFFF">18396839126</a></h2>
            </div>
        <script>
            var hight = document.body.clientHeight;
            $('body').attr({style: 'min-height: '+hight+'px'});

            layui.use(['form', 'layer'],
            function() {
                var form = layui.form;
                var login_data = localStorage.getItem('login');
                if(login_data == null){
                    $('#check').show();
                }

                form.on('select(city)', function(data){
                    var _id = $("#city").find("option:selected").attr("_id");
                    var _html = '';
                    $.ajax({
                        url:'/admin/get_school_list?city_id='+_id,
                        dataType:'json',
                        async:false,
                        success:function (res) {
                            console.log(res)
                            if(res.code==200){
                                for (const item in res.data) {
                                    _html += '<option value="'+res.data[item].name+'">'+res.data[item].name+'</option>';
                                }
                            }
                        }
                    })
                    console.log(_html)
                    if(_html == ''){
                        _html = '<option value="">请选择</option>';
                    }

                    $('#school').html('');
                    $('#school').append(_html);
                    form.render();
                });

                $("#text").bind("input propertychange",function(event){
                    var _str = $('#text').val();
                    $('#content').show();
                    var _text = $(this).val();
                    if(_text == ''){
                        $('#content').hide();
                        return false;
                    }
                    _html = '';

                    $.ajax({
                        url:'/get_specialty?str='+_str,
                        async:false,
                        success:function (res) {
                            if(res.code==200){
                                for (const item in res.data) {
                                    _html += '<a href="/details?code='+res.data[item].code+'">'+res.data[item].name+'['+res.data[item].code+']</a><br>';
                                }
                            }
                        }
                    })
                    $('#content').html('');
                    $('#content').append(_html);
                });
                $('#submit').click(function () {

                    var _str = $('#text').val();
                    $('#content').show();
                    if(_str == ''){
                        $('#content').hide();
                        return false;
                    }
                    _html = '';

                    $.ajax({
                        url:'/get_specialty?str='+_str,
                        async:false,
                        success:function (res) {
                            if(res.code==200){
                                for (const item in res.data) {
                                    _html += '<a href="/details?code='+res.data[item].code+'">'+res.data[item].name+'['+res.data[item].code+']</a><br>';
                                }
                            }
                        }
                    })
                    $('#content').html('');
                    $('#content').append(_html);
                    return false;
                })

                $(document).on('click','.map_select',function () {
                    var _text = $(this).text();
                    if(_text!='获取验证码'){
                        return false;
                    }
                    var phone = $('#phone').val();
                    if(phone==''){
                        layer.msg('手机号不能为空');
                        return false;
                    }
                    $.ajax({
                        url:'/auth_code?phone='+phone,
                        success:function (res) {
                            if(res.code==200){
                                layer.msg('发送成功');
                                auth_code();
                            }else{
                                layer.msg(res.msg);
                            }
                        }
                    })
                })

                var form = layui.form;

                //监听提交
                form.on('submit(login)', function(data){
                    var _check = $('#check');
                    $.ajax({
                        url:'/login',
                        type:'post',
                        data:data.field,
                        success:function (res) {
                            if(res.code==200){
                                localStorage.setItem('login',res.data);
                                _check.hide();
                            }
                        }
                    })
                    return false;
                });

                function auth_code() {
                    var oBtn = $('.map_select')
                    var time = 60;
                    var timer = null;
                    oBtn.text('重新发送'+time);
                    timer = setInterval(function(){
                        // 定时器到底了 兄弟们回家啦
                        if(time == 1){
                            clearInterval(timer);
                            oBtn.text('获取验证码');
                        }else{
                            time--;
                            oBtn.text('重新发送'+time);
                        }
                    }, 1000)
                }
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
