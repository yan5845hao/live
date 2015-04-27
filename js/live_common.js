(function () {
    "use strict";
    var IS_IE6 = !("XMLHttpRequest" in window),box;
    /*global loadingBox:false*/
    (function($){
        $.fn.extend({
            // 首页幻灯片效果
            picShow : function(options) {
                var opts = $.extend({
                    speed : 4000,
                    type : 0, //0=fade,1=slide,2=show;
                    time : 800,
                    auto : 1,
                    slideBtn : true
                }, options);
                $(this).each(function() {
                    var slideWrap = $(this),
                        i,
                        slideBtns = slideWrap.append("<div class='slideBtns'><ul></ul></div>"),
                        slideHref = slideWrap.find("a"),
                        imgLen = slideWrap.find("img").length;
                    slideHref.css({display : "none"});

                    // 生成按钮
                    //根据img数量加载按钮
                    if(imgLen) {
                        for(i = 0; i < imgLen; i++) {
                            slideBtns.find("ul").append("<li>" + (i + 1) + "</li>");
                        }
                        $("a:first", slideWrap).css({display : "block"});
                        goSlide(0);
                    }
                    slideBtns.find("li:last").addClass("last");

                    //为按钮绑定事件
                    slideBtns.find("li").each(function(i) {
                        $(this).click(function() {
                            goSlide(i);
                            autoSlide.index = i;
                        });
                    });
                    //执行动画
                    function goSlide(tango) {
                        slideBtns.find(".cur").removeClass("cur");
                        slideBtns.find("li").eq(tango).addClass("cur");
                        var current = $("a:visible", slideWrap),
                            next = $("a:eq("+tango+")", slideWrap);
                        if(current[0] === next[0]) {
                            return false;
                        }
                        else {
                            switch(opts.type) {
                                case 0:
                                    current.fadeOut(opts.time);
                                    next.fadeIn(opts.time);
                                    break;
                                case 1:
                                    current.slideUp(opts.time);
                                    next.slideDown(opts.time);
                                    break;
                                case 2:
                                    current.toggle();
                                    next.toggle();
                                    break;
                            }
                        }
                    }

                    //自动执行
                    function autoSlide() {
                        if(!autoSlide.index) {
                            autoSlide.index = 0;
                        }
                        var getIndex = autoSlide.index%$("li",slideBtns).length;
                        goSlide(getIndex);
                        autoSlide.index++;
                        setTimeout(autoSlide, opts.speed);
                    }
                    if(opts.auto) {
                        autoSlide();
                    }
                });
            },
            expertAutoComplete: function(setting) { //文本框自动索引插件
                var ie6 = IS_IE6,
                    opts = $.extend({
                        "className": "search-recommend",
                        "data":{},
                        "left": null,
                        "onvalChange": null, //输入框值发生变化的回调
                        "delay": 500, //设置请求延迟时间毫秒
                        "dataDefalut": null, //传入默认的json数组
                        "height": 280, //autocomplete高度
                        "url": null,
                        "title": null, // autocomplete 标题
                        "onfocus": null, //获得焦点时候的回调函数
                        "onBlur": null, //失去焦点时候的回调函数
                        "onKeydown": null, //键盘按下时的回调函数
                        "onClick": null, //点击下拉框li时的回调函数
                        "creatHtml": null, //组装数据
                        "useData": "name"
                    }, setting);
                $(this).each(function() {
                    var cache = {}, myval,finalData,//储存已经请求过的ajax数据
                        myInput = $(this), //当前输入框
                        url = opts.url || myInput.data("remote"),
                        dataName = myInput.attr("name"), //发送ajax需要传递的参数
                        isOn = false, // 判断光变是否在autocomplete上
                        timeout = null, //定时器
                        completeList,
                        index = -1, //用于键入上下键是高亮某行的索引
                        mywidth = opts.width ? opts.width : myInput.outerWidth() - 2, //autocomplete宽度
                        myData = opts.dataDefalut || [], //用于匹配的json数据
                        completeWrap = $("<div class='selectWrap " + opts.className + "' style='display:none;position:absolute;width:" + mywidth + "px;overflow:hidden;'></div>");
                    $("body").append(completeWrap);
                    $("<ul class='completeList' style='max-height:" + opts.height + "px;overflow:auto;'></ul>").appendTo(completeWrap);
                    completeList = completeWrap.find("ul");
                    if (opts.title) {
                        $("<div class='search-head'>" + opts.title + "</div>").prependTo(completeWrap);
                    }

                    if (ie6) {
                        $("<iframe style='position:absolute; display:block; top:0; left:0; width:" + mywidth + " height:1000px; z-index:-1;'></iframe>").prependTo(completeWrap);
                    }
                    myInput.focus(function() {
                        var top = opts.top ? opts.top : myInput.outerHeight() + myInput.offset().top, //autocomplete 顶部偏移值
                            left = opts.left ? opts.left : myInput.offset().left; //autocomplete 左偏移值
                        completeWrap.css({
                            left: left,
                            top: top
                        });
                        index = -1;
                        myval = $(this).val();
                        if (!myval) {
                            if (opts.dataDefalut) {
                                finalData = opts.dataDefalut;
                                addHtml(finalData);
                            } else {
                                //if (!cache[myval]) {
                                clearTimeout(timeout);
                                timeout = setTimeout(ajaxData, opts.delay);
                                //} else {
                                //  completeWrap.hide().find("ul").html("");
                                //}
                            }
                        } else {
                            finalData = creatDataArr(myval);
                            if (!finalData.length) {
                                //if (!cache[myval]) {
                                clearTimeout(timeout);
                                timeout = setTimeout(ajaxData, opts.delay);
                                //} else {
                                //  completeWrap.hide().find("ul").html("");
                                //}
                            } else {
                                addHtml(finalData);
                            }
                        }
                        if (opts.onfocus) { //输入框获得焦点的回调
                            myInput.focus(function() {
                                opts.onfocus(myInput);
                            });
                        }
                    });
                    function creatDataArr(keyWords) {
                        var newWords = keyWords.toUpperCase(), i,
                            newDataArr = [];
                        for (i = 0; i < myData.length; i++) {
                            if (myData[i][opts.useData].toUpperCase().indexOf(newWords) > -1) {
                                newDataArr.push(myData[i]);
                            }
                        }
                        return newDataArr;
                    }
                    function addHtml(finalData) {
                        if (!finalData) {
                            completeWrap.hide().find("ul").html("");
                            return;
                        }
                        var html = opts.creatHtml ? opts.creatHtml(finalData) : "";
                        completeWrap.show().find("ul").html(html);
                        if (parseInt(completeList.height()) > opts.height) {
                            completeList.height(opts.height);
                        }
                        completeWrap.find("li").hover(function() {
                            index = $(this).index();
                            $(this).addClass("ac_over").siblings().removeClass("ac_over");
                        }, function() {
                            index = -1;
                            $(this).removeClass("ac_over");
                        });
                        completeWrap.find("li").click(function() {
                            isOn = false;

                            if (opts.onClick) {
                                opts.onClick(myInput, $(this), finalData);
                            } else {
                                var li = $(this),
                                    text = li.text();
                                myInput.val(text);
                            }
                        });
                    }
                    function ajaxData() {
                        opts.data[opts.dataName || dataName] = myval;
                        $.ajax({
                            url: url,
                            data: opts.data,
                            dataType: "json",
                            type: opts.type || "GET",
                            success: function(data) {
                                cache[myval] = data.data;
                                finalData = opts.parse(data);
                                if (!opts.dataDefalut) {
                                    opts.dataDefalut = finalData;
                                }
                                if (finalData.length) {
                                    for (var i = 0; i < finalData.length; i++) {
                                        myData.push(finalData[i]);
                                    }
                                    addHtml(finalData);
                                } else {
                                    completeWrap.hide().find("ul").html("");
                                }
                            }
                        });
                    }
                    //输入框失去焦点的回调
                    myInput.blur(function() {
                        if (opts.onBlur) {
                            opts.onBlur(myInput);
                        }
                    });
                    $(this).keyup(function() { //当键盘按钮被松开时的回调 为什么没有按下键盘就触发ajax
                        myval = myInput.val();
                        if (opts.onvalChange) {  //为了兼容所有浏览器，防止输入汉字的时候拼写拼音的过程中触发ajax
                            opts.onvalChange(myInput);
                        }
                        if (!myval) {
                            addHtml(opts.dataDefalut);
                        } else {
                            //finalData = creatDataArr(myval);
                            if (!cache[myval]) {
                                //if (!cache[myval]) {
                                clearTimeout(timeout);
                                timeout = setTimeout(ajaxData, opts.delay);
                                //} else {
                                //  completeWrap.hide().find("ul").html("");
                                //}
                            } else {
                                addHtml(finalData);
                            }
                        }

                    });
                    myInput.hover(function() {
                        isOn = true;
                    }, function() {
                        isOn = false;
                    });
                    $("body").click(function() {
                        if (!isOn) {
                            completeWrap.hide();
                        }
                    });
                    myInput.bind("keydown", function(e) {
                        if (opts.onKeydown) {
                            opts.onKeydown(myInput);
                        }
                        /*
                         if ((e.keyCode === 37) || (e.keyCode === 39)) {

                         } else */
                        if (e.keyCode === 40) {//down
                            // completeWrap.find("li").eq(++index).addClass("ac_over").siblings().removeClass("ac_over");
                        } else if (e.keyCode === 38) { //up
                            //  completeWrap.find("li").eq(--index).addClass("ac_over").siblings().removeClass("ac_over");
                        } else if (e.keyCode === 13) {
                            /* index = -1;
                             var li = completeWrap.find(".ac_over"), text;
                             if (opts.onClick) {
                             opts.onClick(myInput, li, finalData);
                             } else {
                             text = li.text();
                             myInput.val(text);
                             }
                             if (li.length) {
                             completeWrap.hide();
                             }
                             return false; */
                            myInput.parents("form").submit();
                        }
                    });
                });
            },
            //导航条动画
            navSlider: function () {
                $(this).each(function (){
                    var item = $(this), slider, lis, index;
                    item.append("<div class='navSlider'></div>");
                    slider = item.find(".navSlider");
                    lis = item.find("li");
                    index = item.find(".cur").index();
                    setOff (index);
                    item.find("li").hover(function() {
                        var newindex = $(this).index();
                        setOff(newindex);
                    }, function() {
                        setOff(index);
                    });
                    function setOff(index) {
                        var totalWidth = 15, i, width;
                        for (i = 0; i < index; i++) {
                            totalWidth += lis.eq(i).innerWidth();
                        }
                        width = item.find("li").eq(index).find("a").innerWidth();
                        slider.stop(true,false).animate({
                            width: width,
                            left: totalWidth
                        });
                    }
                });
            }
        });
    })(jQuery);
    window.loadingBox =function (block, fixed) {
        if(!block.find(".loadingBox").length){
            block.append("<div class='loadingBox' style='z-index:1000;'><img src='/img/icon/ajax_loading.gif' class='loading' style='position:absolute;left:50%;,margin-left:14px;margin-top:-14px;'/></div>");
            block.css({position: "relative"});
        }
        var loadingbox = block.find(".loadingBox"),
            width = block.innerWidth(),
            height = block.innerHeight();
        function setPosition() {
            var top=$(window).scrollTop(),
                wheight=$(window).height(),
                newTop=top+wheight/2;
            loadingbox.find("img").css("top",newTop);
        }
        if(!fixed || IS_IE6) {
            loadingbox.css({ width: width, height: height, top:0, left:0, position:"absolute"}).show();
            setPosition();
            $(window).scroll( function() {
                setPosition();
            });
        }else{
            loadingbox.find("img").css("top","50%");
            loadingbox.css({ width: "100%", height: "100%", top:0, left:0, position:"fixed"}).show();
        }

        return {
            mseeage:    function(html, className){
                loadingbox.find(".loading").hide();
                var htmlBox = loadingbox.children("div");
                if( ! htmlBox.length ){
                    htmlBox = $("<div></div>");
                    htmlBox.appendTo(loadingbox);
                }

                htmlBox.attr("class", className).html(html);
                htmlBox.wrap("<div class='msg-wrap'></div>");
            },
            close:  function(){
                loadingbox.fadeOut(200, function (){
                    loadingbox.find(".loading").show().siblings().remove();
                });
            }
        };
    };

    function ajaxReload(url) {
        $.ajax({
            url : url,
            dataType : "html",
            beforeSend : function () {
                box = loadingBox($("body"), "fixed");
            },
            error : function () {
                box.mseeage("<p>系统错误，请稍后再试！</p><a href='javascript:;' class='close_link'></a><a href='javascript:;' class='got-it'>我知道了</a>","expert_loading get_error");
                $(".close_link, .got-it").one("click", function () {
                    box.close();
                });
            },
            success : function(result) {
                box.close();
                $(".main").html(result);
                $("html, body").animate({scrollTop : 0}, 300);
                $(".trun_page .prve, .trun_page .next, .trun_page .page, .trun_page .cur").click(function () {
                    var url = $(this).attr("href");
                    ajaxReload(url);
                    return false;
                });
            }
        });
    }
    $(function () {
        $("#banner").picShow();
        $("#sub-banner").picShow({
            slideBtn :false
        });
    });
})();