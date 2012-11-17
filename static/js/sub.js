            var swf_width=490;						//宽度
            var swf_height=210;						//高度
            //文字颜色|文字位置|文字背景颜色|文字背景透明度|按键文字颜色|按键默认颜色|按键当前颜色|自动播放时间|图片过渡效果|是否显示按钮|打开方式
            var configtg='0xffffff|3|0x3FA61F|0|0xffffff|0x008acf|0x00033|5|3|1|_blank';
            var files = "";
            var links = "";
            var texts = "";
 
            for(i=1 ; i <= picarr.length-1 ; i++){
				if(files=="") files = picarr[i];
				else files += "|"+picarr[i];
            }
            for(i=1 ; i <= linkarr.length-1 ; i++){
				if(links=="") links = linkarr[i];
				else links += "|"+linkarr[i];
            }
            for(i=1 ; i <= textarr.length-1 ; i++){
				if(texts=="") texts = textarr[i];
				else texts += "|"+textarr[i];
            }
            document.write('<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="'+ swf_width +'" height="'+ swf_height +'" >');
            document.write('<param name="movie" value="js/index.swf"/>');
			document.write('<param name="quality" value="high"/>');
            document.write('<param name="menu" value="false"/>');
			document.write('<param name="wmode" value="opaque"/>');
            document.write('<param name="FlashVars" value="bcastr_file='+files+'&bcastr_link='+links+'&bcastr_title='+texts+'&bcastr_config='+configtg+'"/>');
            document.write('<embed src="js/index.swf" wmode="opaque" FlashVars="bcastr_file='+files+'&bcastr_link='+links+'&bcastr_title='+texts+'&bcastr_config='+configtg+'&menu="false" quality="high" width="'+ swf_width +'" height="'+ swf_height +'" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />');
			document.write('</object>');