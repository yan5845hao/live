 var lzxss =document.getElementById('player');
  var lzxOldUrl=lzxss.href;
  if(lzxss.href.indexOf(':8090/gate/big5/')>0){
   lzxss.href=lzxOldUrl.substr(0,7)+lzxOldUrl.substr(39);
  }flowplayer("player", "http://www.cppcc.gov.cn/swftest/flowplayer.commercial.swf",{clip: {autoPlay: false,autoBuffering: true},onLoad:function(){this.setVolume(30);}});