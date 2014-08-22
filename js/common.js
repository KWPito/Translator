/*
 * 閉じるボタン処理
 */
//window.onload = initialize;
//function initialize() {
//    document.getElementById( 'close_button' ).onclick=sampleModalDialog;
//}
function sampleModalDialog(url) {
    var $arguments = new Array( "" );
    var $returnValue = showModalDialog(
    	url + "closedialog",
        $arguments,
        "dialogWidth:250px;dialogHeight:175px"
    );

    if($returnValue == "true")
    {
        // 画面を閉じる
    	window.open('about:blank','_self').close();
    }
}

function close_win(){
	var nvua = navigator.userAgent;
		if(nvua.indexOf('MSIE') >= 0){
			if(nvua.indexOf('MSIE 5.0') == -1) {
				top.opener = '';
			}
		}
		else if(nvua.indexOf('Gecko') >= 0){
			top.name = 'CLOSE_WINDOW';
			wid = window.open('','CLOSE_WINDOW');
		}
	top.close();
}