<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/bootstrap.min.css" rel="stylesheet">

	<title><?php echo TITLE;?></title>
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript">google.load("jquery", "1.4");</script>
    <script type="text/javascript" src="js/com.js"></script>
    <script type="text/javascript" src="../../js/com.js"></script>
    <script type="text/javascript" src="js/common.js"></script>
    <script type="text/javascript" src="../../js/common.js"></script>
   <script type="text/javascript">
	    function onSetPassword() {
	        /* 再発行ボタン押下*/
	    	 document.getElementById("inp_password").value =Math.random().toString(36).slice(-8);
		}
    </script>
</head>

<body scroll="yes" onBlur="focus()">
<?php echo form_open('agyscyreg'); ?>
  <div class="container" id="wrapper">
  <form action="">
  <div class="row">
  	<div class="span12" style="background:gray; height:60px; padding-right : 10px;">
		<h4><font color="ffffff">　<?php echo SYSNAME;?></font></h4>
		<h6><font color="ffffff">　　<?php echo LOGINUSER;?><?php echo $user_nm; ?></font></h6>
  	</div>
  </div>
  <div class="row">
  	<div class="span12 text-right"  style="background:gray; height:40px; padding-right : 10px;">
        <input class="btn btn-primary" id="update_button" type="submit" name="regist" value="登録" >
 	</div>
  </div>
  <div class="row" style="margin-top:10px;">
	<div class="offset2 span8 offset2">
	  	<?php if (($msg_user_nm != "") or ($msg_kana_user_nm != "") or ($msg_postcode != "")
	  	or ($msg_address != "") or ($msg_tel != "") or ($msg_fax != "") or ($msg_email != "")
	  	or ($msg_post_nm != "") or ($msg_tantou_nm != "") or ($msg_kana_tantou_nm != "")
	  	or ($msg_start_date != "") or ($message != "")): ?>
			<div class="alert alert-error">
	    			<button type="button" class="close" data-dismiss="alert">×</button>
	    			<strong>警告！</strong> 該当項目を修正して再登録して下さい。
	    		</div>
		<?php elseif($info !=''): ?>
	    <div class="alert alert-success">
	    			<button type="button" class="close" data-dismiss="alert">×</button>
	    			<strong>情報！</strong> <?php echo $info; ?>
	    		</div>
	    <?php endif; ?>
   	</div>
  </div>
  <div class="row" id="inputs">
  	<div class="span12"  style="height:400px;">
              <table class="style" style="position:absolute;">
                <tr>
                    <td align="right"><b>ID：</b></td>
                    <td>
                        <input class="input-mini" type="text"
                               name="inp_user_id" value="<?php echo $inp_user_id; ?>"
                               id="inp_user_id" readonly>　(自動採番)
                    </td>
                </tr>
                <tr>
                    <td align="right"><b> 観光協会名：</b></td>
                    <td>
                        <input class="input-xxlarge" type="text" maxlength="50"
                               name="inp_user_nm" value="<?php echo $inp_user_nm; ?>"
                               id="inp_user_nm">　(必須)
                        　<font color="red"><?php echo $msg_user_nm; ?></font>
                    </td>
                </tr>
                <tr>
                    <td align="right"><b>（カナ）：</b></td>
                    <td>
                        <input class="input-xxlarge" type="text" maxlength="50"
                               name="inp_kana_user_nm" value="<?php echo $inp_kana_user_nm; ?>"
                               id="inp_kana_user_nm">　(必須)
                        　<font color="red"><?php echo $msg_kana_user_nm; ?></font>
                    </td>
                </tr>
                <tr>
                    <td align="right"><b>ログインID：</b></td>
                    <td>
                        <input class="input-medium" type="text" maxlength="24"
                               name="inp_login_id" value="<?php echo $inp_login_id;  ?>"
                               id="inp_login_id" readonly>　(自動採番)
                    </td>
                </tr>
                <tr>
                    <td align="right"><b>パスワード：</b></td>
                    <td>
                    <div class="input-append">
                    	<input class="input-medium" type="text" maxlength="16"
	                               name="inp_password" value="<?php echo $inp_password; ?>"
	                               id="inp_password">
	                    <?php if(strlen($inp_user_id) > 0): ?>
	                    	<input class="btn btn-success" id="reissue_button" type="button" value="再発行" style="display:false" onClick="onSetPassword()" />
	                    <?php endif; ?>
	                </div>
                    </td>
                </tr>
                <tr>
                    <td align="right"><b>郵便番号：</b></td>
                    <td>
                        <input class="input-mini" type="text" maxlength="8"
                               name="inp_postcode" value="<?php echo $inp_postcode; ?>"
                               id="inp_postcode">　(必須)　※「－」なし
                        　<font color="red"><?php echo $msg_postcode; ?></font>

                    </td>
                <tr>
                    <td align="right"><b>住所：</b></td>
                    <td>
                        <input class="input-xxlarge" type="text" maxlength="100"
                               name="inp_address" value="<?php echo $inp_address; ?>"
                               id="inp_address">　(必須)
                        　<font color="red"><?php echo $msg_address; ?></font>
                    </td>
                </tr>
                <tr>
                    <td align="right"><b>TEL：</b></td>
                    <td>
                        <input class="input-small" type="text" maxlength="16"
                               name="inp_tel" value="<?php echo $inp_tel; ?>"
                               id="inp_tel">　(必須)　※「－」なし
                        　<font color="red"><?php echo $msg_tel; ?></font>
                    </td>
                </tr>
                <tr>
                    <td align="right"><b>FAX：</b></td>
                    <td>
                        <input class="input-small" type="text" maxlength="16"
                               name="inp_fax" value="<?php echo $inp_fax; ?>"
                               id="inp_fax">　※「－」なし
                        　<font color="red"><?php echo $msg_fax; ?></font>
                    </td>
                </tr>
                <tr>
                    <td align="right"><b>Email：</b></td>
                    <td>
                        <input class="input-xlarge" type="text" maxlength="64"
                               name="inp_email" value="<?php echo $inp_email; ?>"
                               id="inp_email">
                        　<font color="red"><?php echo $msg_email; ?></font>
                    </td>
                </tr>
                <tr>
                    <td align="right"><b>部署名：</b></td>
                    <td>
                        <input class="input-xlarge" type="text" maxlength="50"
                               name="inp_post_nm" value="<?php echo $inp_post_nm; ?>"
                               id="inp_post_nm">
                        　<font color="red"><?php echo $msg_post_nm; ?></font>
                    </td>
                </tr>
                <tr>
                    <td align="right"><b>担当者：</b></td>
                    <td>
                        <input type="text" maxlength="32"
                               name="inp_tantou_nm" value="<?php echo $inp_tantou_nm; ?>"
                               id="inp_tantou_nm">
                        　<font color="red"><?php echo $msg_tantou_nm; ?></font>
                    </td>
                </tr>
                <tr>
                    <td align="right"><b>（カナ）：</b></td>
                    <td>
                        <input type="text" maxlength="32"
                               name="inp_kana_tantou_nm" value="<?php echo $inp_kana_tantou_nm; ?>"
                               id="inp_kana_tantou_nm">
                        　<font color="red"><?php echo $msg_kana_tantou_nm; ?></font>
                    </td>
                </tr>
                <tr>
                    <td align="right"><b>利用開始日：</b></td>
                    <td>
                    <?php if($msg_start_date <> '0000-00-00'):?>
                    <input type="date"class="input-small"
                               name="inp_start_date" value="<?php echo $inp_start_date; ?>"
                               id="inp_start_date">　(必須)
                    <?php else :?>
                    <input type="date"class="input-small"
                               name="inp_start_date" value=""
                               id="inp_start_date">　(必須)
                    <?php endif; ?>
                    　<font color="red"><?php echo $msg_start_date; ?></font>
                    </td>
                </tr>
                <tr>
                    <td align="right"><b>利用終了日：</b></td>
                    <td>
                    <?php if($inp_end_date <> '0000-00-00'):?>
                    <input type="date"class="input-small"
                               name="inp_start_date" value="<?php echo $inp_end_date; ?>"
                               id="inp_end_date">　(必須)
                    <?php else :?>
                    <input type="date"class="input-small"
                               name="inp_start_date" value=""
                               id="inp_end_date">　(必須)
                    <?php endif; ?>
                    </td>
                </tr>
                <tr>
                <td>
		        	 <?php echo $message; ?>
                </td>
                </tr>
            </table>

        </div>
        </div>
        </form>
 </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
