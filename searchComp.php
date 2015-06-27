	<?php 
			     	/*print '<span id="choice" class="leftPadding20 left "><a href="index.php?latest=true" class="order">时间</a><-><a href="index.php?random=true" class="order">随机</a><-><a href="index.php?favorite=true"  class="order">热度</a></span>
';*/
	?>		       <span class="right"> 
					<img class="searchImg" src="pics/search.png" />
	           		<input id="chanFontSize" class="cssInput" name="key" type="text" size="15" border="none"  onfocus="javascript:this.value=''"  placeholder="关键字" id="key"/> 
					<input id="chanZIndex" class="cssInputSubmit" type="submit"  value=""   style="position:relative; left:-10px; opacity:0.8;" />

				   </span>
<script language="JavaScript" type="text/javascript">
    var chanFontSize=document.getElementById("chanFontSize");
	chanFontSize.style.fontSize="50%";//xx-small没有作用
	//chanFontSize.innerhtml().style.verticalAlign="top";
if ((navigator.userAgent.indexOf('MSIE') >= 0) && (navigator.userAgent.indexOf('Opera') < 0)){
    //alert('你是使用IE');
	document.getElementById("chanZIndex").value="搜索";
}else if (navigator.userAgent.indexOf('Firefox') >= 0){
    //alert('你是使用Firefox')
}else if (navigator.userAgent.indexOf('Opera') >= 0){
    //alert('你是使用Opera')
}else{
    //alert('你是使用其他的浏览器浏览网页！')
}
</script>