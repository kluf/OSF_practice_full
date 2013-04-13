$(document).ready(function(){
    (function( $ ) {
      $.widget( "demo.DragResizePic", {
        // Опції по замовчуванню
        options: { 
          height:50,
          left:2,
          top:2,
          picHeight:400,
          picWidth:600,
          myId:"#draggable",
          myImage:"img/fe_820121_600.jpg",
          myPic:"pic",
          backImage:"img/back.png",
          divBack:"back",
          div:"#mydiv",
          clear: null
        },
        // Створюємо віджет
        _create: function() {
            this._createElem();
            $("#height").val(this.options.height);
            $("#left").val(this.options.left);
            $("#top").val(this.options.top);
            $("."+this.options.divBack).css("background","url("+this.options.backImage+") repeat");
            this._myResize();
            this._myDrag();
            $(this.options.myId).css({height:this.options.height,
                                      width:this.options.height,
                                      border: '2px dotted #fefefe',
                                      background:"url("+this.options.myImage+") no-repeat",
                                      'border-radius':'1%'
            });
            $("."+this.options.divBack).css({   width:this.options.picWidth,
                                                height:this.options.picHeight
            });
            $("."+this.options.myPic).css({
                    background:"url("+this.options.myImage+") no-repeat",
                    width:this.options.picWidth,
                    height:this.options.picHeight,
                    position:'relative'
            });
        },
        _createElem:function(){
            $(this.options.div).append("<div id='resizePic'><div id='pic' class='"+this.options.myPic+"'><div class='"+this.options.divBack+"'><div id='draggable' class='ui-widget-content'></div></div></div><div id='picSize'><fieldset><form action='img.php' method='POST'><p>Висота<input type='text' id='height' name='height' readonly/></p><p>Згори<input type='text' id='top' name='top' readonly/><br><br>Зліва<input type='text' id='left' name='left' readonly/></p><button type='submit'>Створити</button></form></fieldset></div></div>");
        },
        _myDrag:function(){
            var _this = this;
            $(this.options.myId).draggable({
                containment: "parent",
                drag: function( event, ui ) {
                    $(this).css("cursor","crosshair");
                    var x1 = ui.position.left+2;
                    var y1 = ui.position.top+2;
                    $(this).css("background-position", "-"+x1+"px -"+y1+"px");
                    $("#height").val(_this.options.height);
                    $("#top").val(y1);
                    $("#left").val(x1);
              }
            });
        },
        _myResize:function(){
            var _this = this;
            $(this.options.myId).resizable({ 
                handles: "ne, se, sw, nw" ,
                containment: "parent", 
                aspectRatio: "true",
                resize: function( event, ui ) {
                    _this.options.height = ui.size.height;
                    var leftUp = ui.position.left+2;
                    var topUp = ui.position.top+2;
                    $(this).css("background-position", "-"+leftUp+"px -"+topUp+"px");
                    $("#height").val(_this.options.height);
                    $("#top").val(topUp);
                    $("#left").val(leftUp);
                    }
            });
        },
        // використовуємо метод _setOption для реагування на зміни в налаштуваннях
        _setOption: function( key, value ) {
          switch( key ) {
            case "clear":
              // обробляємо зміни
              break;
          }
          // В jQuery UI 1.8, вручну викликаємо метод _setOption в батьківському віджеті
          $.Widget.prototype._setOption.apply( this, arguments );
          // В jQuery UI 1.9 и вище, ми будемо використовувати метод _super
          this._super( "_setOption", key, value );
        },
        // Використовуємо метод destroy для очистки всіх змін в DOM, які зробив наш віджет
        destroy: function() {
          // В jQuery UI 1.8 треба викликати метод destroy из батьківського віджету
          $.Widget.prototype.destroy.call( this );
          // В jQuery UI 1.9 и вище замість цього ми визначимо метод _destroy і не будемо викликати метод базового віджету
        }
      });
    }( jQuery ));
    $("#mydiv").DragResizePic();
});