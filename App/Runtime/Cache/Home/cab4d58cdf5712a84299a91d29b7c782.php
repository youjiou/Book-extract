<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>个人信息</title>
    <link rel="stylesheet" href="/project/Public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/project/Public/css/custom.css" />
    <link rel="stylesheet" href="/project/Public/css/theme.css" />
    <link rel="stylesheet" href="/project/Public/css/page.css"/>
</head>
<body>
<nav class="navbar navbar-fixed-top my-navbar top-nav" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#example-navbar-collapse">
                <span class="sr-only">切换导航</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">sharedYourBook</a>
        </div>
        <div class="collapse navbar-collapse" id="example-navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>    <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control search-text" placeholder="Search" style="width: 265px; height: 36.5px;">
                    </div>
                    <button type="submit" class="btn btn-default btn-search-ico"><span class="glyphicon glyphicon-search" style="height: 10.5px;"></span> </button>
                </form></li>

                <li><a href="#"> <img src="/project/Public/images/user1.jpg" class="img-circle" /> 账号:<?php echo ($username); ?> </a> </li>
                <li><a href="<?php echo U('Home/Login/login_out');?>"><span class="glyphicon glyphicon-log-out"></span> 注销</a></li>

            </ul>

        </div>
    </div>
</nav>



<div class="MyHeader">
    <ol class="breadcrumb">
        <li><a href="<?php echo U('Home/Index/index');?>">首页</a></li>
        <li><a href="#">个人信息</a></li>
    </ol>
</div>



<div class="wrap">
    <!-- 左边内容 -->
    <div id="left" class="left">
        <div class="menu-title">个人信息管理</div>
        <div class="menu-item menu-item-active" href="#one" data-toggle="tab">
            修改信息
        </div>
        <div class="menu-item" href="#two" data-toggle="tab">
            上传作品
        </div>
        <div class="menu-item" href="#three" data-toggle="tab">
            我的书摘
        </div>
        <div class="menu-item" href="#four" data-toggle="tab">
            我的作品
        </div>

    </div>
    <!-- 右边内容 -->
    <div id="right" class="tab-content right">
        <div id="one" class="tab-pane active">
                             <span style="margin-left:40px;text-shadow: 2px 0px 6px rgba(94, 35, 255, 0.91);">


                                  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><form class="form-horizontal" role="form" method="post" action="/project/index.php/Home/Index/amend">
                                         <div class="form-group">
                                             <label class="col-sm-2 control-label">账号 </label>
                                             <div class="col-sm-10">
                                                 <p class="form-control-static"> <?php echo ($vo["username"]); ?>  </p>
                                             </div>
                                         </div>
                                         <div class="form-group">
                                             <label class="col-sm-2 control-label">当前用户名 </label>
                                             <div class="col-sm-10">
                                                 <p class="form-control-static"> <?php echo ($vo["name"]); ?>  </p>
                                             </div>
                                         </div>

                                         <div class="form-group">
                                             <label for="newname" class="col-sm-2 control-label">新用户名</label>
                                             <div class="col-sm-10">
                                                 <input type="text" class="form-control" id="newname"  name="newname" placeholder="请输入新用户名">
                                             </div>
                                         </div>
                                         <div class="form-group">
                                             <div class="col-sm-1 col-sm-offset-11">
                                                 <button type="submit" class="btn btn-info">修改</button>
                                             </div>
                                         </div>


                                     </form><?php endforeach; endif; else: echo "" ;endif; ?>




                            </span>
        </div>
        <div id="two" class="tab-pane">
                             <span style="margin-left:40px;text-shadow: 2px 0px 6px rgba(94, 35, 255, 0.91);">
                                             <form role="form" enctype="multipart/form-data"  method="post" action="/project/index.php/Home/Index/upload">
                                                 <div class="form-group">
                                                     <label for="name">书名</label>
                                                     <input type="text" class="form-control" id="name" placeholder="请输入书名" name="bookname" style="width: 55%;">
                                                 </div>
                                                 <div class="form-group">
                                                     <label for="name">该书介绍</label>
                                                     <textarea class="form-control" rows="3" maxlength="50" name="instroction" style="width: 80%;"></textarea>
                                                 </div>

                                                 <div class="form-group">
                                                     <label for="imgsrc">封面上传</label>
                                                     <input type="file" name="photo"  id="imgsrc"/>
                                                 </div>

                                                 <div class="form-group">
                                                     <label for="name">内容</label>
                                                     <script id="editor" type="text/plain" style="width:100%;height:300px;"></script>
                                                 </div>

                                                 <div class="col-md-2 col-md-offset-10"><button type="submit" class="btn btn-info">提交</button></div>
                                             </form>

                            </span>
        </div>
        <div id="three" class="tab-pane">
                             <span style="margin-left:40px;">
                                 <div class="vcontent">
                                     <div id="content_table">
                                     <table class="table table-hover">
                                         <caption>记录你的美文</caption>
                                         <thead>
                                         <tr>
                                     <th style="width: 80%">内容</th>
                                     <th>时间</th>
                                 </tr>
                                     </thead>
                                     <tbody>
                                     <?php if(is_array($list2)): $i = 0; $__LIST__ = $list2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?><tr>
                                             <td><?php echo ($vo2["content"]); ?></td>
                                             <td><?php echo ($vo2["pubishedtime"]); ?></td>
                                         </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                     </tbody>
                                     </table>
                                     <div id="page"><?php echo ($page); ?></div>
                                 </div>
                            </div>
                             </span>
        </div>


        <div id="four" class="tab-pane">
                             <span style="margin-left:40px;">
                                 <div class="vcontent">
                                     <table class="table table-bordered">
                                         <caption>作品情况  (提示：0表示审核 1审核成功  2未通过审核)</caption>
                                         <thead>

                                         <tr>
                                             <th>作品名</th>
                                             <th>审核情况</th>
                                             <th>发表时间</th>
                                         </tr>

                                         </thead>
                                         <tbody>
                                         <?php if(is_array($list3)): $i = 0; $__LIST__ = $list3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo3): $mod = ($i % 2 );++$i;?><tr>
                                             <td><?php echo ($vo3["bookname"]); ?></td>
                                             <td><?php echo ($vo3["status"]); ?></td>
                                             <td><?php echo ($vo3["publishedtime"]); ?></td>
                                         </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                         </tbody>
                                     </table>



                                 </div>
                             </span>
        </div>






    </div>
</div>




</body>
<script src="/project/Public/js/jquery-3.2.1.min.js"></script>
<script src="/project/Public/js/bootstrap.min.js"></script>
<script src="/project/Public/js/theme.js"></script>
<script type="text/javascript" charset="utf-8" src="/project/Public/ueditor1_4_3_3-utf8-php/utf8-php/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/project/Public/ueditor1_4_3_3-utf8-php/utf8-php/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/project/Public/ueditor1_4_3_3-utf8-php/utf8-php/lang/zh-cn/zh-cn.js"></script>

<script type="text/javascript">
    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');

</script>
</html>