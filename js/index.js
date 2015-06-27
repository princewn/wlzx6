// JavaScript Document

down=true;
function activity()
{
	ob=document.all(flow);
	if(ob.style.posTop<=50)
	{
		var hei=document.body.clientHeight;
		act(50,hei-100,50);
		}
	}
	function act(yp,yk,yx)
	{
        ob=document.all("flow");
		ob.style.posTop=yp;
		if(yp<yx)
		down=true;
		if(yp>=yk)
		down=false;
		if(down)
	    {step=4;}
		else{step=-4}
		setTimeout('act('+(yp+step)+','+yk+','+yx+')','35')
				
		}
function unactivity()
{
	ob=document.all(flow);
	if(ob.style.posTop<=50)
	{
		var hei=document.body.clientHeight;
		act(50,hei-100,50);
		}
	}
	function myopen(divid)
	{
		divid.style.display='block';
		divid.style.left=(document.body.clientWidth-240)/2;
		divid.style.top=(document.body.clientheight-139)/2;
		
		}
