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
    <script type="text/javascript"></script>

   	<script type="text/javascript">
	    $('input[id=lefile]').change(function () {
	          $('#photoCover').val($(this).val());
	    });
	</script>
</head>

<body onBlur="focus()">
  <div class="container" id="wrapper">
  <div class="row">
  	<div class="span12" style="background:gray; height:60px;">
		<h4><font color="ffffff">　<?php echo SYSNAME;?></font></h4>
		<h6><font color="ffffff">　　<?php echo LOGINUSER;?></font></h6>
  	</div>
  </div>
  <div class="row">
  	<div class="span12 text-right"  style="background:gray; height:40px;">
 	</div>
  </div>
  <div class="row">
  	<div class="span12"  style="height:400px;">
            <div class="TabbedPanels" id="tabPanel" style="position:absolute; top:150px; width:940px; height:500px;">
                <div class="tabbable" style="margin-bottom: 18px;">
    				<ul class="nav nav-tabs">
    					<li class="active"><a href="#tab1" data-toggle="tab">共通情報</a></li>
    					<li><a href="#tab2" data-toggle="tab">パンフイメージ</a></li>
    					<li><a href="#tab3" data-toggle="tab">認識画像</a></li>
    					<li><a href="#tab4" data-toggle="tab">翻訳元情報</a></li>
    				</ul>
    				<div class="tab-content">
    					<div class="tab-pane active" id="tab1">
							<div class="text-right">
        						<input class="btn btn-warning" id="update_button" type="submit" name="regist" value="全体差戻" >
								<input class="btn btn-primary" id="update_button" type="submit" name="regist" value="共通情報登録" >
							</div>
              				<table class="style" style="position:absolute;">
                				<tr>
                    				<td align="right"><b>パンフ名：</b></td>
                    				<td>
				                        <input type="text"
				                               name="inp_user_id" value="名古屋城"
				                               id="inp_user_id">　(必須)
                   					 </td>
                				</tr>
                				<tr>
                    				<td align="right"><b>住所：</b></td>
                    				<td>
                    					<div class="input-append">
                    					<input class="input-xxlarge" type="text" maxlength="50"
				                               name="inp_user_nm" value="愛知県名古屋市中区○○○○○"
				                               id="inp_user_nm">
	                    				<input class="btn" id="reissue_button" type="button" value="緯度経度" style="display:false">
	                    				</div>　(必須)
				                    </td>
                				</tr>
                				<tr>
                    				<td align="right"><b>緯度・経度：</b></td>
                    				<td>
                    					<div class="input-append">
                    					<input type="text" maxlength="50"
				                               name="inp_kana_user_nm" value="35.180188"
				                               id="inp_kana_user_nm">　，
				                        <input type="text" maxlength="50"
				                               name="inp_kana_user_nm" value="136.906565"
				                               id="inp_kana_user_nm">　，
	                    				<input class="btn" id="reissue_button" type="button" value="確認" style="display:false">
	                    				</div>　(必須)
                    				</td>
                				</tr>
                				<tr>
                    				<td align="right"><b>ＵＲＬ：</b></td>
                    				<td>
                    					<div class="input-append">
                    					<input class="input-xxlarge" type="text" maxlength="50"
				                               name="inp_user_nm" value="http://www.*****.co.jp"
				                               id="inp_user_nm">
	                    				<input class="btn" id="reissue_button" type="button" value="確認" style="display:false">
	                    				</div>
				                    </td>
                				</tr>
                				<tr>
                    				<td align="right"><b>デフォルト言語：</b></td>
                    				<td>
                    					<select>
                    						<option>英語</option>
                    						<option>中国語</option>
                    						<option>韓国語</option>
                    						<option>・・・</option>
                    					</select>
                   					 </td>
                				</tr>
                				<tr>
                    				<td align="right"><b>翻訳対象言語：</b></td>
                    				<td>
    									<div class="well">
    										<label class="checkbox">
    										<input type="checkbox" value="option1">英語（英）</label>
    										<label class="checkbox">
    										<input type="checkbox" value="option1">中国語（中）</label>
    										<label class="checkbox">
    										<input type="checkbox" value="option1">韓国語（韓）</label>
    									</div>
                   					 </td>
                				</tr>
            				</table>
						</div>
    					<div class="tab-pane" id="tab2">
    						<div class="span4">
								<div class="alert alert-error">
	    						*.ＰＤＦ／*.ＰＮＧファイルのみ
								</div>
    						</div>

              				<table class="style" style="position:absolute; top:120px">
                				<tr>
                    				<td align="right"><b>1.</b></td>
                    				<td>
                    					<div class="input-append">
                    					<input class="input-xxlarge" type="text" maxlength="50"
				                               name="inp_user_nm" value="表.pdf"
				                               id="inp_user_nm">
	                    				<input class="btn btn-warning" id="reissue_button" type="button" value="削除" style="display:false">
	                    				</div>
				                    </td>
                				</tr>
                				<tr>
                    				<td align="right"><b>2.</b></td>
                    				<td>
                    					<div class="input-append">
                    					<input class="input-xxlarge" type="text" maxlength="50"
				                               name="inp_user_nm" value="裏.pdf"
				                               id="inp_user_nm">
	                    				<input class="btn btn-warning" id="reissue_button" type="button" value="削除" style="display:false">
	                    				</div>
				                    </td>
                				</tr>
                				<tr>
                    				<td align="right"><b>3.</b></td>
                    				<td>
                    					 <input id="lefile" type="file" style="display:none">
                    					<div class="input-append">
                    					<input class="input-xxlarge" type="text" maxlength="50"
				                               name="photoCover" value="" placeholder="-- 未登録 --"
				                               id="photoCover">
	                    				<input class="btn" id="selectFile" type="button" value="UPLOAD" style="display:false" onclick="$('input[id=lefile]').click();">
	                    				</div>
				                    </td>
                				</tr>
                			</table>
    					</div>
    					<div class="tab-pane" id="tab3">
	                        <p>1.
	                            <img src="images/sample.gif" alt="サンプル" class="img-rounded f_left" />
	                            <input class="btn btn-warning" type="button" value="削除" name="example" style="position:absolute; left:150px; top:70px;">
	                            <textarea class="input-xlarge" name="example2" style="position:absolute; left:250px;" cols="50" rows="3" readonly>投稿日：2014/6/10
KEY:1234567890</textarea>
	                        </p>
	                        <p>2.
	                            <img src="images/sample.gif" alt="サンプル" class="img-rounded f_left" />
	                            <input class="btn btn-warning" type="button" value="削除" name="example" style="position:absolute; left:150px; top:160px;">
	                            <textarea class="input-xlarge" name="example2" style="position:absolute; left:250px;" cols="50" rows="3" readonly>投稿日：2014/6/10
KEY:1234567890</textarea>
	                       </p>
	                        <p>3.
	                            <img src="images/sample.gif" alt="サンプル" class="img-rounded f_left" />
	                    		<input class="btn" id="selectFile" type="button" value="UPLOAD"  style="position:absolute; left:150px; top:250px;" onclick="$('input[id=lefile]').click();">
	                        </p>
	                        <p>4.
	                            <img src="images/sample.gif" alt="サンプル" class="img-rounded f_left" />
	                    		<input class="btn" id="selectFile" type="button" value="UPLOAD"  style="position:absolute; left:150px; top:340px;" onclick="$('input[id=lefile]').click();">
	                        </p>
	                        <p>5.
	                            <img src="images/sample.gif" alt="サンプル" class="img-rounded f_left" />
	                    		<input class="btn" id="selectFile" type="button" value="UPLOAD"  style="position:absolute; left:150px; top:430px;" onclick="$('input[id=lefile]').click();">
	                        </p>
    					</div>
    					<div class="tab-pane" id="tab4">
 							<div class="text-right">
        						<input class="btn btn-success" id="update_button" type="submit" name="regist" value="翻訳依頼" >
								<input class="btn btn-primary" id="update_button" type="submit" name="regist" value="保存" >
							</div>
							<div style="position:absolute; top:100px;">
	                        <p>1.
	                            <img src="images/sample.gif" alt="サンプル" class="img-rounded f_left" />
	                            <input class="btn btn-warning" type="button" value="削除" name="example" style="position:absolute; left:150px; top:20px;">
	                            <textarea class="input-xlarge" name="example2" style="position:absolute; left:250px;" cols="50" rows="3" readonly>投稿日：2014/6/10
KEY:1234567890</textarea>
	                            <textarea class="input-xlarge" name="example2" style="position:absolute; left:570px;" cols="50" rows="4"></textarea>
	                        </p>
	                        <p>2.
	                            <img src="images/sample.gif" alt="サンプル" class="img-rounded f_left" />
	                            <input class="btn btn-warning" type="button" value="削除" name="example" style="position:absolute; left:150px; top:110px;">
	                            <textarea class="input-xlarge" name="example2" style="position:absolute; left:250px;" cols="50" rows="3" readonly>投稿日：2014/6/10
KEY:1234567890</textarea>
	                            <textarea class="input-xlarge" name="example2" style="position:absolute; left:570px;" cols="50" rows="4"></textarea>
	                       </p>
	                        <p>3.
	                            <img src="images/sample.gif" alt="サンプル" class="img-rounded f_left" />
	                    		<input class="btn" id="selectFile" type="button" value="UPLOAD"  style="position:absolute; left:150px; top:200px;" onclick="$('input[id=lefile]').click();">
	                    		<textarea class="input-xlarge" name="example2" style="position:absolute; left:570px;" cols="50" rows="4"></textarea>
	                        </p>
	                        <p>4.
	                            <img src="images/sample.gif" alt="サンプル" class="img-rounded f_left" />
	                    		<input class="btn" id="selectFile" type="button" value="UPLOAD"  style="position:absolute; left:150px; top:290px;" onclick="$('input[id=lefile]').click();">
	                    		<textarea class="input-xlarge" name="example2" style="position:absolute; left:570px;" cols="50" rows="4"></textarea>
	                        </p>
	                        <p>5.
	                            <img src="images/sample.gif" alt="サンプル" class="img-rounded f_left" />
	                    		<input class="btn" id="selectFile" type="button" value="UPLOAD"  style="position:absolute; left:150px; top:380px;" onclick="$('input[id=lefile]').click();">
	                    		<textarea class="input-xlarge" name="example2" style="position:absolute; left:570px;" cols="50" rows="4"></textarea>
	                        </p>
	                        </div>
    					</div>
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
