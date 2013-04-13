$(document).ready(function(){
    
	var sudoSlider = $(".carrousel").sudoSlider({
	slidecount:4,
	autowidth:false
	});
	var sudoSlider2 = $(".slider").sudoSlider({
	slidecount:6,
	autowidth:false,
	vertical:true,
	prevhtml:'<a href="#" class="prevBtn1"></a>',
	nexthtml:'<a href="#" class="nextBtn1"></a>',
	controlsattr:'id="controls1"'
	});
	$(".textMy").focus(function() {
		$(this).addClass("curFocus");
	});
	$(".textMy").blur(function() {
		$(this).removeClass("curFocus");
	});
    /*var widthSld = $(".carrousel ul li").outerWidth(true);//width of one li element
    var cnt = $(".carrousel ul").children().size();//count of li elements
    $(".carrousel ul").width(cnt*(widthSld));//width for slider
    $(".carrousel").after("<div class='countLi'></div>");
    for(var i=0;i<$(".carrousel ul").children().size();i++){
        $(".countLi").append("<span id='my_li'>O</span>");
    }
    $(".carrousel ul li").css("float","left");
    var prev="<span class='nextMy'></span";
    var next="<span class='prevMy'></span>";
    $(".carrousel").before(prev),
    $(".carrousel").after(next);
        $(".nextMy").addClass("arrows nextMy").click(function(){
            $(".carrousel ul").animate({
                left:"-="+widthSld
            },"slow");
        });
        $(".prevMy").addClass("arrows prevMy").click(function(){
            $(".carrousel ul").animate({
                left:"+="+widthSld
            },"slow");
        });*/
});//end ready	