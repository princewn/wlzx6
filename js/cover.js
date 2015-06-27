    /*动态加入link*/
	function addCssByStyle(cssString){
		var doc=document;
		var cssString="./civer.css";
		var style=doc.createElement("style");
		style.setAttribute("type", "text/css");
	
		if(style.styleSheet){// IE
			style.styleSheet.cssText = cssString;
		} else {// w3c
			var cssText = doc.createTextNode(cssString);
			style.appendChild(cssText);
		}
	
		var heads = doc.getElementsByTagName("head");
		if(heads.length)
			heads[0].appendChild(style);
		else
			doc.documentElement.appendChild(style);
	}

	
	function regiAction()
	{
				$("#calculate").click(function(){
					calculator();
				});
				$(".inputBox").click(function(){
							 var oriValue= $(this).val();
							 $(this).val("");
							 $(this).focus();
							 $(this).blur(function(){
								 if ($(this).val()=='') 
								 {
									 $(this).css("text-align","center");
									 $(this).val(oriValue);
								 }
								 else{
								 }	   
							});
				});
				$('#register').click(function(){
					var ch=$(window).height();
					var h=ch/2;
					var cw=$(window).width(); 
					var w=cw/2;
					$("#coverBox").css({'position':'absolute','left':w+'px','margin-left':'-180px'});//����Ϊcenter ����������
					$("#coverBox").css({'position':'absolute','top':h+'px',"margin-top":"-240px"});//����Ϊcenter ����������
					$("#bg").css({'height':ch+'px',"width":cw+"px"});
		            $('#bg').fadeIn(800);
					$('#coverBox').fadeIn(800);
				});
				$('#closeBg').click(function(){
					$('#bg').fadeOut(800);
					$('#coverBox').fadeOut(800);
				});
				
				$(window).resize(function(){			  
					var ch=$(window).height();
					var h=ch/2;
					var cw=$(window).width(); 
					var w=cw/2;
					$("#coverBox").css({'position':'absolute','left':w+'px','margin-left':'-180px'});//����Ϊcenter ����������
					$("#coverBox").css({'position':'absolute','top':h+'px',"margin-top":"-240px"});//����Ϊcenter ����������
					$("#bg").css({'height':ch+'px',"width":cw+"px"});
				});
				funPlaceholder(document.getElementById("username"));
				funPlaceholder(document.getElementById("emailAddress"));
				funPlaceholder(document.getElementById("password"));
				funPlaceholder(document.getElementById("repassword"));
				formValidate();
	}
	
  function calculator() {
		var s = ""; 
		s += " ��ҳ�ɼ�������"+ document.body.clientWidth; 
		s += " ��ҳ�ɼ�����ߣ�"+ document.body.clientHeight; 
		s += " ��ҳ�ɼ�������"+ document.body.offsetWidth + " (�������ߺ͹������Ŀ�)"; 
		s += " ��ҳ�ɼ�����ߣ�"+ document.body.offsetHeight + " (�������ߵĿ�)"; 
		s += " ��ҳ����ȫ�Ŀ��"+ document.body.scrollWidth; 
		s += " ��ҳ����ȫ�ĸߣ�"+ document.body.scrollHeight; 
		s += " ��ҳ����ȥ�ĸ�(ff)��"+ document.body.scrollTop; 
		s += " ��ҳ����ȥ�ĸ�(ie)��"+ document.documentElement.scrollTop; 
		s += " ��ҳ����ȥ����"+ document.body.scrollLeft; 
		s += " ��ҳ���Ĳ����ϣ�"+ window.screenTop; 
		s += " ��ҳ���Ĳ�����"+ window.screenLeft; 
		s += " ��Ļ�ֱ��ʵĸߣ�"+ window.screen.height; 
		s += " ��Ļ�ֱ��ʵĿ��"+ window.screen.width; 
		s += " ��Ļ���ù������߶ȣ�"+ window.screen.availHeight; 
		s += " ��Ļ���ù�������ȣ�"+ window.screen.availWidth; 
		s += " �����Ļ������ "+ window.screen.colorDepth +" λ��ɫ"; 
		s += " �����Ļ���� "+ window.screen.deviceXDPI +" ����/Ӣ��"; 
		alert (s); 
  }
  
  
  
  
  /*placehoder*/
function hasPlaceholderSupport() {
var input = document.createElement('input');
return ('placeholder' in input);
}
	
	
	
	
	
	
var funPlaceholder = function(element) {
    //����Ƿ���Ҫģ��placeholder
    var placeholder = '';
/*			alert (element);
			alert (!("placeholder" in document.createElement("input")));
			alert ((placeholder = element.getAttribute("placeholder")));*/
    if (element && !("placeholder" in document.createElement("input")) && (placeholder = element.getAttribute("placeholder"))) {
        //��ǰ�ı��ؼ��Ƿ���id, û���򴴽�
        var idLabel = element.id ;
		//alert (idLabel);
        if (!idLabel) {
            idLabel = "placeholder_" + new Date().getTime();
            element.id = idLabel;
        }

        //����labelԪ��
        var eleLabel = document.createElement("label");
        eleLabel.htmlFor = idLabel;
		//label.setAttribute("for","id");
        eleLabel.style.position = "absolute";
        eleLabel.style.textAlign="center";
        //�����ı���ʵ�ʳߴ��޸������marginֵ
        //eleLabel.style.margin = "5px auto 5px auto";
		//eleLabel.style.padding = "0 auto";
        eleLabel.style.color = "graytext";
        eleLabel.style.cursor = "text";
		eleLabel.style.lineHeight="38px";
		//eleLabel.style.paddingLeft=(width-line-width)/2
		//eleLabel.style.align="center";
        //���봴����labelԪ�ؽڵ�
        element.parentNode.insertBefore(eleLabel, element);
        //�¼�
        element.onfocus = function() {
            eleLabel.innerHTML = "";
        };
        element.onblur = function() {
            if (this.value === "") {
                eleLabel.innerHTML = placeholder;  
            }
        };

        //��ʽ��ʼ��
        if (element.value === "") {
            eleLabel.innerHTML = placeholder;   
        }
    }	
};



/*验证表单*/
	function formValidate(){
 
                var ok1=false;
                var ok2=false;
                var ok3=false;
                var ok4=false;
/*		$("form :input.required").each(function(){
            var $required = $("<strong class='high'> *</strong>"); //创建元素
            $(this).parent().append($required); //然后将它追加到文档中
        });*/
                // 验证用户名
                $('input[name="username"]').focus(function(){
                    $(this).next().text('用户名应在3-20位之间').removeClass('state1').addClass('state2');
                }).blur(function(){
                    if($(this).val().length >= 3 && $(this).val().length <=12 && $(this).val()!=''){
                        $(this).next().text('输入成功').removeClass('state1').addClass('state4');
                        ok1=true;
						dataHanding(usename);
                    }else{
                        $(this).next().text('用户名应在3-20位之间').removeClass('state1').addClass('state3');
                    }
                     
                });
 
                //验证密码
                $('input[name="password"]').focus(function(){
                    $(this).next().text('密码应在6-20位之间').removeClass('state1').addClass('state2');
                }).blur(function(){
                    if($(this).val().length >= 6 && $(this).val().length <=20 && $(this).val()!=''){
                        $(this).next().text('输入成功').removeClass('state1').addClass('state4');
                        ok2=true;
                    }else{
                        $(this).next().text('密码应该为6-20位之间').removeClass('state1').addClass('state3');
                    }
                     
                });
 
                //验证确认密码
                    $('input[name="repassword"]').focus(function(){
                    $(this).next().text('输入的确认密码要和上面的密码一致').removeClass('state1').addClass('state2');
                }).blur(function(){
                    if($(this).val().length >= 6 && $(this).val().length <=20 && $(this).val()!='' && $(this).val() == $('input[name="password"]').val()){
                        $(this).next().text('输入成功').removeClass('state1').addClass('state4');
                        ok3=true;
                    }else{
                        $(this).next().text('输入的确认密码要和上面的密码一致').removeClass('state1').addClass('state3');
                    }
                     
                });
 
                //验证邮箱
                $('input[name="emailAddress"]').focus(function(){
                    $(this).next().text('非法的EMAIL格式').removeClass('state1').addClass('state2');
                }).blur(function(){
                    if($(this).val().search(/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/)==-1){
                        $(this).next().text('非法的EMAIL格式').removeClass('state1').addClass('state3');
                    }else{                  
                        $(this).next().text('输入成功').removeClass('state1').addClass('state4');
                        ok4=true;
                    }
                     
                });
 
                //提交按钮,所有验证通过方可提交
 
                $('.submit').click(function(){
                    if(ok1 && ok2 && ok3 && ok4){
                        $('form').submit();
                    }else{
                        return false;
                    }
                });
                 

	}
	
	
	
	/*处理数据*/
	
function dataHanding(whichOne){
	if(whichOne==="username"){
	   $.ajax({
			type: 'POST',
			url:'x' ,
			data: "username=" + $('#username').val(),
			success: function(response){
				//console.log("lla"+response+"lla");
				response=response.replace(/^\s+|\s+$/g,"");
				//console.log("lla"+response+"lla");
/*				if(response === 'Correct'){
				   window.location = "home.php"
				}
				else */if(response === 'napproved'){
						$('#username').next().empty()
						$('#username').append('�˻�δ����')
				}
				else{
						$('#username').next().empty()
						$('.messageText').append('δ֪����������')         
			   }
		   }  
		});
	}
	else if(whichOne==="password"){
	   $.ajax({
			type: 'POST',
			url:'s' ,
			data: "&password=" + $('#password').val(),
			success: function(response){
				//console.log("lla"+response+"lla");
				response=response.replace(/^\s+|\s+$/g,"");
				//console.log("lla"+response+"lla");
/*				if(response === 'Correct'){
				   window.location = ;
				}
				else*/ if(response === 'Incorrect'){
						$('#password').next().empty()
						$('#password').append('�û������������')
													 
				}
				else{
						$('#password').next().empty()
						$('.messageText').append('δ֪����������')           
			   }
		   }  
		});
	}

	
}

	regiAction()