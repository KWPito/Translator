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
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>

<body>
<?php echo form_open('login'); ?>
  <div class="container" id="wrapper">
  <div class="row">
  	<div class="span12" style="background:gray; height:100px; padding-right : 10px;">
   		<h4><font color="ffffff">　<?php echo SYSNAME;?></font></h4>
    	<h5><font color="ffffff">　　<?php echo LOGIN;?></font></h5>
  	</div>
  </div>
  <div class="row" style="margin-top:60px;">
	<div class="span4 offset4">
		<div class="well">
			<form action="" >
			  	<h3 class="sign-up-title" style="color:dimgray;"><?php echo LOGIN;?></h3>
			  	<hr class="colorgraph">
				<div class="input-prepend">
					<span class="add-on"><i class="icon-user"></i></span>
				    <input placeholder="ユーザID" name="userid" type="text" value="<?php echo set_value('userid'); ?>" id="userid">
				</div><br>
				<div class="input-prepend">
					<span class="add-on"><i class="icon-lock"></i></span>
				    <input placeholder="パスワード" name="password" type="password" value="">
				</div>
				<input class="btn btn-lg btn-success btn-block" type="submit" value="<?php echo LOGIN;?>"  value="<?php echo set_value('password'); ?>"id="password"><br>
			</form>
		</div>
	</div>
  </div>

   	<?php if ((form_error('userid') != "") or (form_error('password') != "") or ($message != "")): ?>
	<div class="row" style="margin-top:60px;">
		<div class="offset2 span8 offset2">
			<div class="alert alert-error">
    			<button type="button" class="close" data-dismiss="alert">×</button>
    			<strong>警告！</strong> <?php echo form_error('userid'); ?><?php echo form_error('password'); ?><?php echo $message; ?>
    		</div>
    	</div>
    </div>
    <?php endif; ?>

</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
