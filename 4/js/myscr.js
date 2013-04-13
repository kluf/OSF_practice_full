    $(document).ready(function(){
    function bottomCircles(first,param){
        switch(param){
        case 'next':
            $("#my_li"+first).addClass("act_circle");
            $("#my_li"+(first-1)).removeClass("act_circle");
            break;
        case 'prev':
            $("#my_li"+first).addClass("act_circle");
            $("#my_li"+(first+1)).removeClass("act_circle");
            break;
        case 'before':
            $("#my_li"+first).addClass("act_circle");
            break;
        case 'curDel':
            $("#my_li"+first).removeClass("act_circle");
            break;
        case 'curAdd':
            $("#my_li"+first).addClass("act_circle");
            break;
        }
    }
    function addContr(){
        var container = $(".carrousel");
        var next="<span id='next' class='arrows nextMy'></span";
        container.after(next);    
        var prev="<span id='prev' class='arrows prevMyHigh'></span>";
        container.before(prev);
        container.after("<div class='countLi'><ul></ul></div>");
        for(var i=1;i<=cnt-numbShowList+1;i++){
            $(".countLi ul").append("<li id='my_li"+i+"'>O</li>");
        }
        $(".carrousel ul li").css("float","left");
        container.css("height","250px");
    }
    function moveSlide(count,plmin){
        $(".carrousel ul").animate({
        left:plmin+widthSld*count},"slow");
    }
    function bottomCirclesClick(){
            $(".countLi ul li").click(function(e){
                var str = this.id;
                str = str.substring(5);
                if(first<=last){
                    if(str>first){
                        $("#prev").removeClass("arrows prevMyHigh").addClass("arrows prevMy");
                        bottomCircles(first,'curDel');
                        moveSlide(str-first,"-=");
                        first=str;
                        bottomCircles(first,'curAdd');
                        console.log("first = "+first+"str = "+str);
                    }else if(str<=first){
                        bottomCircles(first,'curDel');
                        moveSlide(first-str,"+=");
                        first=str;
                        bottomCircles(first,'curAdd');
                        console.log("first = "+first);
                    }else{
                        e.preventDefault();
                    }
                }
            });
    }
    function nextSlide(showing){	
        $("#next").click(function(e){
            if(first<=last){
                first++;
                console.log(first);
                bottomCircles(first,'next');
                $("#prev").removeClass("arrows prevMyHigh").addClass("arrows prevMy");	
                moveSlide(1,"-=");
            }else{
                e.preventDefault();
                $("#next").removeClass('arrows nextMy').addClass('arrows nextMyHigh');
            }
        });
    }
    function prevSlide(e){
            $("#prev").click(function(e){
            if(first>1){
                first--;
                bottomCircles(first,'prev');
                $("#next").removeClass('arrows nextMyHigh').addClass('arrows nextMy');
                console.log(first);
                moveSlide(1,"+=");
            }else{
                e.preventDefault();
                $("#prev").removeClass("arrows prevMy").addClass('arrows prevMyHigh');
            }		
            });
    }	
        var numbShowList = 4;
        var first=1;
        var widthSld = $(".carrousel ul li").outerWidth(true);//width of one li element
        var cnt = $(".carrousel ul").children().size();//count of li elements
        $(".carrousel ul").width(cnt*(widthSld));//width for slider
        var last=cnt - numbShowList;
        addContr();
        bottomCircles(first,'before');
        console.log(cnt);
        nextSlide(numbShowList);
        prevSlide();
        bottomCirclesClick();
    });//end ready;
