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
  	<div class="span12 text-right" style="height:40px;">
    	<h5> パンフイメージDownload</h5>
    	<div class="btn-group">
    		<button class="btn">1</button>
    		<button class="btn">2</button>
    		<button class="btn">3</button>
    	</div>
    </div>
  </div>
  <div class="row">
  	<div class="span12"  style="height:400px;">
       <div style="position:absolute;">
       <pre>
            パンフ名：名古屋城
            住　所　：愛知県名古屋市中区＊＊＊＊＊＊
            ＵＲＬ　：http://www.*****.co.jp</pre>
        </div>
            <div class="TabbedPanels" id="tabPanel" style="position:absolute; top:240px; width:940px; height:500px;">
                <div class="tabbable" style="margin-bottom: 18px;">
    				<ul class="nav nav-tabs">
    					<li class="active"><a href="#tab1" data-toggle="tab">英</a></li>
    					<li><a href="#tab2" data-toggle="tab">中</a></li>
    					<li><a href="#tab3" data-toggle="tab">韓</a></li>
    					<li class="disabled"><a href="" data-toggle="tab">仏</a></li>
    					<li class="disabled"><a href="" data-toggle="tab">伊</a></li>
    					<li class="disabled"><a href="" data-toggle="tab">・・・</a></li>
    				</ul>
    				<div class="tab-content">
    					<div class="tab-pane active" id="tab1">
							<div class="text-right">
        						<input class="btn btn-warning" id="update_button" type="submit" name="regist" value="個別差戻" >
								<input class="btn btn-primary" id="update_button" type="submit" name="regist" value="翻訳依頼" >
								<input class="btn btn-success" id="update_button" type="submit" name="regist" value="登録" >
							</div>
    						<div class="input-append">
    							<input type="text" name="example2" size="30" maxlength="30" value="http://www.****.co.jp">
								<button type="submit" class="btn">確認</button>
							</div>
	                        <p>1.
	                            <img src="images/sample.gif" alt="サンプル" class="img-rounded f_left" />
	                            <input type="checkbox" name="example" style="position:absolute; left:150px; top:160px;">
	                            <textarea class="input-xlarge" name="example2" style="position:absolute; left:200px;" cols="100" rows="4">
It is said that the notation of the name of a country by the kanji called "Japan" may come from that the Japanese Islands are located in east end that is "Japan" (fire) seeing from Mainland China</textarea>
	                            <textarea class="input-xlarge" name="example2" style="position:absolute; left:570px;" cols="50" rows="4">
「日本」という漢字による国号の表記は、日本列島が中国大陸から見て東の果て、つまり「日の本（ひのもと）」に位置することに由来しているのではないかとされる</textarea>
	                        </p>
	                        <p>2.
	                            <img src="images/sample.gif" alt="サンプル" class="img-rounded f_left" />
	                            <input type="checkbox" name="example" style="position:absolute; left:150px; top:245px;">
	                            <textarea class="input-xlarge" name="example2" style="position:absolute; left:200px;" cols="50" rows="4"></textarea>
	                            <textarea class="input-xlarge" name="example2" style="position:absolute; left:570px;" cols="50" rows="4"></textarea>
	                        </p>
	                        <p>3.
	                            <img src="images/sample.gif" alt="サンプル" class="img-rounded f_left" />
	                            <input type="checkbox" name="example" style="position:absolute; left:150px; top:330px;">
	                            <textarea class="input-xlarge" name="example2" style="position:absolute; left:200px;" cols="50" rows="4"></textarea>
	                            <textarea class="input-xlarge" name="example2" style="position:absolute; left:570px;" cols="50" rows="4"></textarea>
	                        </p>
	                        <p>4.
	                            <img src="images/sample.gif" alt="サンプル" class="img-rounded f_left" />
	                            <input type="checkbox" name="example" style="position:absolute; left:150px; top:415px;">
	                            <textarea class="input-xlarge" name="example2" style="position:absolute; left:200px;" cols="50" rows="4"></textarea>
	                            <textarea class="input-xlarge" name="example2" style="position:absolute; left:570px;" cols="50" rows="4"></textarea>
	                        </p>
	                        <p>5.
	                            <img src="images/sample.gif" alt="サンプル" class="img-rounded f_left" />
	                            <input type="checkbox" name="example" style="position:absolute; left:150px; top:505px;">
	                            <textarea class="input-xlarge" name="example2" style="position:absolute; left:200px;" cols="50" rows="4"></textarea>
	                            <textarea class="input-xlarge" name="example2" style="position:absolute; left:570px;" cols="50" rows="4"></textarea>
	                        </p>
    					</div>
    					<div class="tab-pane" id="tab2">
							<div class="text-right">
        						<input class="btn btn-warning" id="update_button" type="submit" name="regist" value="個別差戻" >
								<input class="btn btn-primary" id="update_button" type="submit" name="regist" value="翻訳依頼" >
								<input class="btn btn-success" id="update_button" type="submit" name="regist" value="登録" >
							</div>
    						<div class="input-append">
    							<input type="text" name="example2" size="30" maxlength="30" value="http://www.****.co.jp">
								<button type="submit" class="btn">確認</button>
							</div>
	                        <p>1.
	                            <img src="images/sample.gif" alt="サンプル" class="img-rounded f_left" />
	                            <input type="checkbox" name="example" style="position:absolute; left:150px; top:160px;">
	                            <textarea class="input-xlarge" name="example2" style="position:absolute; left:200px;" cols="100" rows="4">
没由来于日本列岛位于东面的尽头就是说"日之本"(hinomoto)在中国大陆看来的的话出自"日本"这样的汉字的国家号的书写方式被做  </textarea>
	                            <textarea class="input-xlarge" name="example2" style="position:absolute; left:570px;" cols="50" rows="4">
「日本」という漢字による国号の表記は、日本列島が中国大陸から見て東の果て、つまり「日の本（ひのもと）」に位置することに由来しているのではないかとされる</textarea>
	                        </p>
	                        <p>2.
	                            <img src="images/sample.gif" alt="サンプル" class="img-rounded f_left" />
	                            <input type="checkbox" name="example" style="position:absolute; left:150px; top:245px;">
	                            <textarea class="input-xlarge" name="example2" style="position:absolute; left:200px;" cols="50" rows="4"></textarea>
	                            <textarea class="input-xlarge" name="example2" style="position:absolute; left:570px;" cols="50" rows="4"></textarea>
	                        </p>
	                        <p>3.
	                            <img src="images/sample.gif" alt="サンプル" class="img-rounded f_left" />
	                            <input type="checkbox" name="example" style="position:absolute; left:150px; top:330px;">
	                            <textarea class="input-xlarge" name="example2" style="position:absolute; left:200px;" cols="50" rows="4"></textarea>
	                            <textarea class="input-xlarge" name="example2" style="position:absolute; left:570px;" cols="50" rows="4"></textarea>
	                        </p>
	                        <p>4.
	                            <img src="images/sample.gif" alt="サンプル" class="img-rounded f_left" />
	                            <input type="checkbox" name="example" style="position:absolute; left:150px; top:415px;">
	                            <textarea class="input-xlarge" name="example2" style="position:absolute; left:200px;" cols="50" rows="4"></textarea>
	                            <textarea class="input-xlarge" name="example2" style="position:absolute; left:570px;" cols="50" rows="4"></textarea>
	                        </p>
	                        <p>5.
	                            <img src="images/sample.gif" alt="サンプル" class="img-rounded f_left" />
	                            <input type="checkbox" name="example" style="position:absolute; left:150px; top:505px;">
	                            <textarea class="input-xlarge" name="example2" style="position:absolute; left:200px;" cols="50" rows="4"></textarea>
	                            <textarea class="input-xlarge" name="example2" style="position:absolute; left:570px;" cols="50" rows="4"></textarea>
	                        </p>
    					</div>
    					<div class="tab-pane" id="tab3">
							<div class="text-right">
        						<input class="btn btn-warning" id="update_button" type="submit" name="regist" value="個別差戻" >
								<input class="btn btn-primary" id="update_button" type="submit" name="regist" value="翻訳依頼" >
								<input class="btn btn-success" id="update_button" type="submit" name="regist" value="登録" >
							</div>
    						<div class="input-append">
    							<input type="text" name="example2" size="30" maxlength="30" value="http://www.****.co.jp">
								<button type="submit" class="btn">確認</button>
							</div>
	                        <p>1.
	                            <img src="images/sample.gif" alt="サンプル" class="img-rounded f_left" />
	                            <input type="checkbox" name="example" style="position:absolute; left:150px; top:160px;">
	                            <textarea class="input-xlarge" name="example2" style="position:absolute; left:200px;" cols="100" rows="4">
「일본」이라고 하는 한자에 의한 국호의 표기는, 일본 열도가 중국 대륙에서 봐 동쪽의 끝, 즉 「일의 책(히의 아래)」에 위치하는 것에 유래하고 있는 것은 아닐까 여겨진다</textarea>
	                            <textarea class="input-xlarge" name="example2" style="position:absolute; left:570px;" cols="50" rows="4">
「日本」という漢字による国号の表記は、日本列島が中国大陸から見て東の果て、つまり「日の本（ひのもと）」に位置することに由来しているのではないかとされる</textarea>
	                        </p>
	                        <p>2.
	                            <img src="images/sample.gif" alt="サンプル" class="img-rounded f_left" />
	                            <input type="checkbox" name="example" style="position:absolute; left:150px; top:245px;">
	                            <textarea class="input-xlarge" name="example2" style="position:absolute; left:200px;" cols="50" rows="4"></textarea>
	                            <textarea class="input-xlarge" name="example2" style="position:absolute; left:570px;" cols="50" rows="4"></textarea>
	                        </p>
	                        <p>3.
	                            <img src="images/sample.gif" alt="サンプル" class="img-rounded f_left" />
	                            <input type="checkbox" name="example" style="position:absolute; left:150px; top:330px;">
	                            <textarea class="input-xlarge" name="example2" style="position:absolute; left:200px;" cols="50" rows="4"></textarea>
	                            <textarea class="input-xlarge" name="example2" style="position:absolute; left:570px;" cols="50" rows="4"></textarea>
	                        </p>
	                        <p>4.
	                            <img src="images/sample.gif" alt="サンプル" class="img-rounded f_left" />
	                            <input type="checkbox" name="example" style="position:absolute; left:150px; top:415px;">
	                            <textarea class="input-xlarge" name="example2" style="position:absolute; left:200px;" cols="50" rows="4"></textarea>
	                            <textarea class="input-xlarge" name="example2" style="position:absolute; left:570px;" cols="50" rows="4"></textarea>
	                        </p>
	                        <p>5.
	                            <img src="images/sample.gif" alt="サンプル" class="img-rounded f_left" />
	                            <input type="checkbox" name="example" style="position:absolute; left:150px; top:505px;">
	                            <textarea class="input-xlarge" name="example2" style="position:absolute; left:200px;" cols="50" rows="4"></textarea>
	                            <textarea class="input-xlarge" name="example2" style="position:absolute; left:570px;" cols="50" rows="4"></textarea>
	                        </p>
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
