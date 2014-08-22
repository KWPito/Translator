$(function() {

/*画像ロールオーバー*****************************************
*********************************************************/
	var images = $("img");
	for(var i=0; i < images.size(); i++) {
		if(images.eq(i).attr("src").match("_off.")) {
			$("img").eq(i).hover(function() {
				$(this).attr('src', $(this).attr("src").replace("_off.", "_on."));
			}, function() {
				$(this).attr('src', $(this).attr("src").replace("_on.", "_off."));
			});
		}
	}

/*ページ上部への移動*****************************************
*********************************************************/
	$('#pagetop').click(function(){
		$('html,body').animate({ scrollTop: 0 }, 'fast');
		return false;
	});


});

$(function () {
    $("#myTable").tablesorter({
        headers: {
            1: { sorter: false },
            2: { sorter: false }
        }
    });
});

$(function () {
     $('#ui-tab > ul').tabs();
});