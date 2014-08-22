<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <title><?php echo TITLE;?></title>
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript">google.load("jquery", "1.4");</script>
    <script type="text/javascript" src="js/com.js"></script>
    <script type="text/javascript" src="js/common.js"></script>

    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>

<body>
<?php echo form_open('admmain'); ?>
  <div class="container" id="wrapper">
  <div class="row">
  	<div class="span12" style="background:gray; height:60px; padding-right : 10px;">
		<h4><font color="ffffff">　<?php echo SYSNAME;?></font></h4>
		<h6><font color="ffffff">　　<?php echo LOGINUSER;?><?php echo $user_nm; ?></font></h6>
  	</div>
  </div>
  <div class="row">
  	<div class="span12 text-right"  style="background:gray; height:40px; padding-right : 10px;">
        <a href="#myModal" role="button" class="btn" data-toggle="modal"><?php echo CLOSE;?></a>
  	</div>
  </div>

  <!--モーダル表示-->
	<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	    <h3 id="myModalLabel">終了確認</h3>
	  </div>
	  <div class="modal-body">
	    <p><?php echo WS001;?></p>
	  </div>
	  <div class="modal-footer">
	    <button class="btn" data-dismiss="modal" aria-hidden="true"  onclick="close_win()">OK</button>
	    <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">キャンセル</button>
	  </div>
	</div>
  <!--モーダル表示-->

  <div class="row">
  	<div class="span3" style="background:lightgray; height:550px;">
        <h4>メニュー</h4>
  		<ul class="nav nav-pills nav-stacked">
    	<li><a href="<?php echo BASE_URL ?>admagylist">代理店一覧</a></li></ul>
  	</div>
  	<div class="span9" style="height:400px;">
        <h4>システム管理者からのお知らせ</h4>
        <pre class="pre-scrollable"><?php echo $info; ?></pre>
  	</div>
  	</div>
  </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
