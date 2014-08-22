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
    <script type="text/javascript" src="../../js/com.js"></script>
    <script type="text/javascript" src="js/common.js"></script>
    <script type="text/javascript" src="../../js/common.js"></script>

    <script type="text/javascript">
	    function onAddClick() {
	        var newWin = window.open(
	        		"<?php echo BASE_URL ?>scypamcomreg",
	        		"",
	        		"width=980, height=820, resizable=yes, location=no, menubar=no, status=no, toolbar=no"
	        	);
	        newWin.focus();
	    }

	    function onTransClick() {
	        var newWin = window.open(
	        		"<?php echo BASE_URL ?>pamtransreg",
	        		"",
	        		"width=980, height=820, resizable=yes, location=no, menubar=no, status=no, toolbar=no"
	        	);
	        newWin.focus();
	    }
	</script>

    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>
<div class="container" id="wrapper">
  <div class="row">
  	<div class="span12" style="background:gray; height:60px; padding-right : 10px;">
		<h4><font color="ffffff">　<?php echo SYSNAME;?></font></h4>
		<h6><font color="ffffff">　　<?php echo LOGINUSER;?></font></h6>
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

  <div class="row" id="main">
  	<div class="span3" style="background:lightgray; height:500px;">
        <h4>メニュー</h4>
  		<ul class="nav nav-pills nav-stacked">
    	<li><a href="<?php echo BASE_URL ?>scymain">トップメニュー</a></li>
    	</ul>
  	</div>
  	<div class="span9" style="height:500px;">
  		<div class="row">
  		<div class="span9" style="height:20px;" id="search">
  			<form action="">
    		    <table class="style" style="position:absolute; top:120px">
                        <tr>
                            <td align="left">
    						<button class="btn btn-primary" type="button" class="btn" name="add" onClick="onAddClick()" >パンフ新規</button>
    						</td>
                        </tr>
                </table>
      		 </form>
       	</div></div>
  		<div class="row">
  		<div class="span9" style="height:400px;">
  		<div class="table-responsive" style="margin-top:50px;">
  		<form action="">
       		<table class="table table-striped table-bordered table-hover table-condensed" id="myTable" >
                    <thead>
                        <tr>
                            <th>パンフ名</th>
                            <th>住所</th>
                            <th>状態</th>
                            <th>最終投稿日</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
						<tr>
							<td width="60">名古屋城</td>
							<td width="80">名古屋市○○</td>
							<td width="50">全完了</td>
							<td width="80">2014/8/1</td>
							<td width="120">
    						<button type="button" class="btn" name="edit" value="" onClick="onAddClick();">共通</button>
    						<button type="button" class="btn" name="edit" value="" onClick="onTransClick();">翻訳</button>
    						<button type="button" class="btn btn-warning"  name="del" value="" onClick="onDeleteClick()">
    						<i class="icon-warning-sign icon-white"></i>削除</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    	</div>
    </div>
  </div>
</div>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
