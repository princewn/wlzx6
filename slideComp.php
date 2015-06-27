 <style type="text/css">

</style>
<div id="clearPosition">
	<div id="slide">
		<a id="btnLeft" href="javascript:void(0);" >
			<span id="btnLeftImg">
			</span>
		</a>
		<a id="btnRight" href="javascript:void(0);" >
			<span id="btnRightImg">
			</span>
		</a>
		<ul class="slideshow" id="slidesImgs" >
			<li><a href="#" target="_blank">
				<img src="images/1.jpg" class="circlePic" alt="" /></a></li>
			<li><a href="#" target="_blank">
				<img src="images/2.jpg" class="circlePic" alt="" /></a></li>
			<li><a href="#" target="_blank">
				<img src="images/3.jpg" class="circlePic" alt="" /></a></li>
			<li><a href="#" target="_blank">
				<img src="images/4.jpg" class="circlePic" alt="" /></a></li>
			<li><a href="#" target="_blank">
				<img src="images/5.jpg" class="circlePic" alt="" /></a></li>
			<li><a href="#" target="_blank">
				<img src="images/6.jpg" class="circlePic" alt="" /></a><!--<span class="nopicCaption">6张图的描述信息</span>--></li>
		</ul>
		<div id="ico" class="ico"> 
			<a class="active" href="javascript:void(0);">1</a>
			<a href="javascript:void(0);">2</a>
			<a href="javascript:void(0);">3</a>
			<a href="javascript:void(0);">4</a>
			<a href="javascript:void(0);">5</a>
			<a href="javascript:void(0);">6</a>
		</div>
<!--		<div id="picCaption" class="picCaption"> 
			<span class="picCaption active">第1张图的描述信息</span>
			<span class="picCaption">第2张图的描述信息</span>
			<span class="picCaption">第3张图的描述信息</span>
			<span class="picCaption">第4张图的描述信息</span>
			<span class="picCaption">第5张图的描述信息</span>
			<span class="picCaption">第6张图的描述信息</span>
		</div>-->
	</div>
</div><!--clearPosition-->
<script type="text/javascript">
// JavaScript Document
   window.onload = function() {
   var oIco = document.getElementById("ico");
   var aBtn = oIco.getElementsByTagName("a");
   var oSlide = document.getElementById("slide");
   var oUl = oSlide.getElementsByTagName("ul");
   var aLi = oUl[0].getElementsByTagName("li");
   var oBtnLeft = document.getElementById("btnLeft");
   var oBtnRight = document.getElementById("btnRight");
   var picCaption= document.getElementById("slidesImgs").getElementsByTagName("span");
   var baseWidth = aLi[0].offsetWidth;
   //alert(baseWidth);
   oUl[0].style.width = baseWidth * (aLi.length+10) + "px";
   var iNow = 0;
   for(var i=0;i<aBtn.length;i++) {
    aBtn[i].index = i;
    aBtn[i].onclick = function() {
     //alert(this.index);
     //alert(oUl[0].style.left);
     move(this.index);
     //aIco[this.index].className = "active";
    }
   }
   oBtnLeft.onclick = function() {
    iNow--;
    //document.title = iNow;
    move(iNow);
   }
   oBtnRight.onclick = function() {
    iNow++;
    document.title = iNow;
    move(iNow);
   }

   var curIndex = 0;
   var timeInterval = 5000;
   setInterval(change,timeInterval);
   function change() {
    if(curIndex == aBtn.length) {
     curIndex =0;  
    } else {
     move(curIndex);
     curIndex += 1;
    } 
    }
    function move(index) {
    //document.title = index;
    if(index>aLi.length-1) {
     index = 0;
     iNow = index;
    }
    if(index<0) {
     index = aLi.length - 1;
     iNow = index;
    }
    for(var n=0;n<aBtn.length;n++) {
     aBtn[n].className = "";
    }
    aBtn[index].className = "active";
    oUl[0].style.left = -index * baseWidth + "px";
	picCaption[index].className = "picCaption active";
    //alert(picCaption[index].innerHTML);
    //buffer(oUl[0],{
    // left: -index * baseWidth
    // },8)

   }
  }
</script>
