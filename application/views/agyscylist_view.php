<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/bootstrap.min.css" rel="stylesheet">

    <title><?php echo TITLE;?></title>
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript">google.load("jquery", "1.4");</script>
    <script type="text/javascript" src="js/com.js"></script>
    <script type="text/javascript" src="../../js/com.js"></script>
    <script type="text/javascript" src="js/common.js"></script>
    <script type="text/javascript" src="../../js/common.js"></script>
    <script type="text/javascript">
	    function onEditClick(userid, user_nm) {
			var newWin = window.open(
	        /* 編集ボタン押下*/
		        "<?php echo BASE_URL ?>directurl/redirect/agyscyreg/update/" + userid,
		        "観光パンフ",
        		"width=980, height=800, resizable=yes, location=no, menubar=no, status=no, toolbar=no"
			);
			newWin.focus();
	    }
	    function onProxyClick(userid, user_nm) {
	        /* 代理ボタン押下*/
	        location.href = "<?php echo BASE_URL ?>directurl/proxy_redirect/" + userid;


	    }
	    function onDeleteClick(userid) {
			/* 削除ボタン 押下*/
	    	var arguments = userid;
			 if( document.getElementById("delcheck"+userid).checked)
			 {
	    	     // 削除
	    	    location.href = "<?php echo BASE_URL ?>agyscylist/delete/" + userid;
			}
    		else
    		{
    		}
		}
		function onAddClick()
		{
			// 新規ボタンクリック
			var newWin = window.open(
	        		"<?php echo BASE_URL ?>agyscyreg",
	        		"新規作成",
	        		"width=980, height=800, resizable=yes, location=no, menubar=no, status=no, toolbar=no"
	        	);
	        	newWin.focus();
		}
	</script>
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>
<?php echo form_open('agyscylist'); ?>
  <div class="container"  id="wrapper">
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

  <div class="row" id="main">
  	<div class="span3" style="background:lightgray; height:550px;">
        <h4>メニュー</h4>
  		<ul class="nav nav-pills nav-stacked">
    	<li><a href="<?php echo BASE_URL ?>agymain">トップメニュー</a></li>
    	<li><a href="javascript:void(0)"  onclick="onEditClick(<?php echo $user_id; ?>); return false;">登録情報修正</a></li>
    	</ul>
    </div>
  	<div class="span9" style="height:500px;">
  		<div class="row">
  		<div class="span8" style="height:65px;" id="search">
  			<form action="">
    		    <table class="style" style="position:absolute; top:120px">
                        <tr>
                            <td align="left">
	                            <div style="float:left;">観光協会名で検索：</div>
	                            <div class="input-append"  style="float:left; "><?=form_input('serchUser', $serchUser)?>
	    							<button type="submit" class="btn">検索</button></div>
								<div class="text-right" style="float:left; margin-left:30px;">
	    							<button class="btn btn-primary" type="button" class="btn" name="add" onClick="onAddClick()" >新規</button>
	    						</div>
                            </td>
                        </tr>
                </table>
      		 </form>
       	</div></div>
  		<div class="row">
  		<div class="span8" style="height:500px;">
       	<div class="table-responsive">
       	<form>
       		<table class="table table-striped table-bordered table-hover table-condensed" id="myTable" >
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>観光協会名</th>
                            <th>電話番号</th>
                            <th>担当者</th>
                            <th></th>
                            <th></th>
                            <th></th>
                       </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($query->result() as $row): ?>
						<tr>
							<td width="10"><?=$row->user_id ?></td>
							<td width="100"><?=$row->user_nm ?></td>
							<td width="100"> <?=$row->tel ?></td>
							<td width="100"><?=$row->tantou_nm ?></td>
							<td width="50">
    						<button type="button" class="btn" name="edit" value=<?=$row->user_id ?> onClick="onEditClick(<?=$row->user_id ?>, '<?=$row->user_nm ?>')">編集</button>
                            </td>
                            <td width="50">
    						<button type="button" class="btn" name="edit" value=<?=$row->user_id ?> onClick="onProxyClick(<?=$row->user_id ?>, '<?=$row->user_nm ?>')">代理</button>
                            </td>
                            <td width="60">
    						<!-- <button type="button" class="btn btn-warning"  name="del" value=<?=$row->user_id ?> onClick="onDeleteClick(<?=$row->user_id ?>, '<?=$row->user_nm ?>')">
    						<i class="icon-warning-sign icon-white"></i>削除</button> -->
					        <a href="#<?=$row->user_id ?>" role="button" class="btn btn-warning" data-toggle="modal"><i class="icon-warning-sign icon-white"></i>削除</a>
    						</td>
                        </tr>

						  <!--モーダル表示-->
							<div id="<?=$row->user_id ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							  <div class="modal-header">
							    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							    <h3 id="myModalLabel">削除確認</h3>
							  </div>
							  <div class="modal-body">
							    <p>「<?=$row->user_nm ?>」<?=WS002?></p>
								<label class="checkbox">
									<input type="checkbox" id="delcheck<?=$row->user_id ?>" value="削除">削除！
								</label>
							  </div>
							  <div class="modal-footer">
							    <button class="btn" data-dismiss="modal" aria-hidden="true"  onclick="onDeleteClick(<?=$row->user_id ?>)">OK</button>
							    <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">キャンセル</button>
							   </div>
							</div>
						  <!--モーダル表示-->
                        <?php endforeach; ?>
                    </tbody>

                </table>
                <?php echo $this->pagination->create_links();?>
            </form>
        </div>
    </div>
    </div>
    </div>
  </div>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>

</body>
</html>
