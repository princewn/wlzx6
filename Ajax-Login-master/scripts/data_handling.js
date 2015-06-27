function check_login(){
   	$.ajax({
        type: 'POST',
        url: 'data/login_form.php',
        data: "username=" + $('#username').val() + "&password=" + $('#password').val(),
        success: function(response){
        	//console.log("lla"+response+"lla");
            response=response.replace(/^\s+|\s+$/g,"");
            //console.log("lla"+response+"lla");
            if(response === 'Correct'){
               window.location = "../index.php"
            }
            else if(response === 'napproved'){
            		$('.messageText').empty()
            		$('.messageImage').empty()
	           	 	$('.messageText').append('账户未认证')
	           	 	$(".messageImage").append('<img src="images/error.png" height="50" width="50">')
	           	 	$('.message').slideDown(400).delay(2000).fadeOut(400)
            }
            else if(response === 'Incorrect'){
           		    $('.messageText').empty()
            		$('.messageImage').empty()
	            	$('.messageText').append('登录信息错误')
	            	$(".messageImage").append('<img src="images/error.png" height="50" width="50">')
	           	 	$('.message').slideDown(400).delay(2000).fadeOut(400)
	           	 		           	 	         
	        }
	        else if(response === 'nusername'){
            		$('.messageText').empty()
            		$('.messageImage').empty()
	           	 	$('.messageText').append('请输入用户名.')
	           	 	$(".messageImage").append('<img src="images/error.png" height="50" width="50">')
	           	 	$('.message').slideDown(400).delay(2000).fadeOut(400)
            }
            else if(response === 'npassword'){
            		$('.messageText').empty()
            		$('.messageImage').empty()
	           	 	$('.messageText').append('请输入密码')
	           	 	$(".messageImage").append('<img src="images/error.png" height="50" width="50">')
	           	 	$('.message').slideDown(400).delay(2000).fadeOut(400)
            }
            else{
            		$('.messageText').empty()
            		$('.messageImage').empty()
	      	        $('.messageText').append(response+'未知错误，请重试')
	           	 	$(".messageImage").append('<img src="images/error.png" height="50" width="50">')
	           	 	$('.message').slideDown(400).delay(2000).fadeOut(400)            
           }
       }  
    });
 

};

function registerUser(){
   

    $.ajax({
        type: 'POST',
        url: 'data/register_form.php',
        data: "username=" + $('#registerUsername').val() + "&password=" + $('#registerPassword').val() + "&email=" + $('#registerEmail').val() + "&task=register",
        success: function(response){
        	console.log(response);
			response=response.replace(/^\s+|\s+$/g,"");
            if(response === 'Correct'){
            		$('.messageText').empty()
            		$('.messageImage').empty()
               		$('.messageText').append('请检查邮件进行认证');
	           	 	$(".messageImage").append('<img src="images/success.png" height="50" width="50">');
	           	 	$('.message').slideDown(400).delay(2000).fadeOut(400)
	           	 	$('#registerUsername').empty()
	           	 	$('#registerPassword').empty()
	           	 	$('#registerEmail').empty()
            }
            else if(response === 'utaken'){
            		$('.messageText').empty()
            		$('.messageImage').empty()
	           	 	$('.messageText').append('用户名已占用');
	           	 	$(".messageImage").append('<img src="images/error.png" height="50" width="50">');
	           	 	$('.message').slideDown(400).delay(2000).fadeOut(400)
            }
            else if(response === 'eused'){
            		$('.messageText').empty()
            		$('.messageImage').empty()
	            	$('.messageText').append('邮箱已被注册');
	            	$(".messageImage").append('<img src="images/error.png" height="50" width="50">');
	            	$('.message').slideDown(400).delay(2000).fadeOut(400)
            }
            else if(response === 'nusername'){
            		$('.messageText').empty()
            		$('.messageImage').empty()
	            	$('.messageText').append('请输入用户名');
	            	$(".messageImage").append('<img src="images/error.png" height="50" width="50">');
	            	$('.message').slideDown(400).delay(2000).fadeOut(400)
            }
            else if(response === 'npassword'){
            		$('.messageText').empty()
            		$('.messageImage').empty()
	            	$('.messageText').append('请输入密码');
	            	$(".messageImage").append('<img src="images/error.png" height="50" width="50">');
	            	$('.message').slideDown(400).delay(2000).fadeOut(400)
            }
            else if(response === 'nemail'){
            		$('.messageText').empty()
            		$('.messageImage').empty()
	            	$('.messageText').append('请输入邮件地址');
	            	$(".messageImage").append('<img src="images/error.png" height="50" width="50">');
	            	$('.message').slideDown(400).delay(2000).fadeOut(400)
            }
            else{
            		$('.messageText').empty()
            		$('.messageImage').empty()
	            	$('.messageText').append('未知错误，请重试');
	           	 	$(".messageImage").append('<img src="images/error.png" height="50" width="50">');
	           	 	$('.message').slideDown(400).delay(2000).fadeOut(400)	            
            }            
       }
    });
};

function forgot(){
   	$.ajax({
        type: 'POST',
        url: 'data/forgot_form.php',
        data: "email=" + $('#forgotEmail').val(),
        success: function(response){
        	console.log(response);
            response=response.replace(/^\s+|\s+$/g,"");
            if(response === 'Correct'){
            		$('.messageText').empty()
            		$('.messageImage').empty()
               		$('.messageText').append('请检查邮箱进行重置');
	           	 	$(".messageImage").append('<img src="images/success.png" height="50" width="50">');
	           	 	$('.message').slideDown(400).delay(2000).fadeOut(400)
	           	 	$('#forgotEmail').empty()
            }
            else if(response === 'nemail'){
            		$('.messageText').empty()
            		$('.messageImage').empty()
	           	 	$('.messageText').append('请输入邮箱地址');
	           	 	$(".messageImage").append('<img src="images/error.png" height="50" width="50">');
	           	 	$('.message').slideDown(400).delay(2000).fadeOut(400)
            }
            else if(response === 'enot'){
            		$('.messageText').empty()
            		$('.messageImage').empty()
	            	$('.messageText').append('邮箱地址已占用');
	            	$(".messageImage").append('<img src="images/error.png" height="50" width="50">');
	            	$('.message').slideDown(400).delay(2000).fadeOut(400)
            }
            else{
            		$('.messageText').empty()
            		$('.messageImage').empty()
	      	        $('.messageText').append('未知错误，请重试'.response);
	           	 	$(".messageImage").append('<img src="images/error.png" height="50" width="50">');
	           	 	$('.message').slideDown(400).delay(2000).fadeOut(400)	            
           }
       }
    });
 };

function reset_password(){
   	$.ajax({
        type: 'POST',
        url: 'data/reset_form.php',
        data: "ticket=" + $('#ticket').val() + "&newPassword=" + $('#newPassword').val() + "&email=" + $('#email').val(),
        success: function(response){
        	console.log(response);
            response=response.replace(/^\s+|\s+$/g,"");
            if(response === 'reset'){
            		$('.messageText').empty()
            		$('.messageImage').empty()
               		$('.messageText').append('您的密码为 <i style="color:#00bfff;">"' + $('#newPassword').val() + '"</i>');
	           	 	$(".messageImage").append('<img src="images/success.png" height="50" width="50">');
	           	 	$('.message').slideDown(400).delay(2000).fadeOut(400)
	           	 	$('#newPassword').empty()
            }
            else if(response === 'npassword'){
            		$('.messageText').empty()
            		$('.messageImage').empty()
               		$('.messageText').append('请输入新密码');
	           	 	$(".messageImage").append('<img src="images/error.png" height="50" width="50">');
	           	 	$('.message').slideDown(400).delay(2000).fadeOut(400)
	           	 	$('#newPassword').empty()
            }
            else if(response === 'brequest'){
            		$('.messageText').empty()
            		$('.messageImage').empty()
	           	 	$('.messageText').append('错误的重置请求，请重新获取重置邮件');
	           	 	$(".messageImage").append('<img src="images/error.png" height="50" width="50">');
	           	 	$('.message').slideDown(400).delay(2000).fadeOut(400)
            }
            else{
            		$('.messageText').empty()
            		$('.messageImage').empty()
	      	        $('.messageText').append('未知错误，请重试');
	           	 	$(".messageImage").append('<img src="images/error.png" height="50" width="50">');
	           	 	$('.message').slideDown(400).delay(2000).fadeOut(400)	            
           }
       }
    });
 };

function change_password(){
   	$.ajax({
        type: 'POST',
        url: 'data/change_form.php',
        data: "ticket=" + $('#ticket').val() + "&newPassword=" + $('#newPassword').val() + "&username=" + $('#username').val(),
        success: function(response){
        	console.log(response);
			response=response.replace(/(^\s*)|(\s*$)/g, "");  
            if(response ==='reset'){
            		$('.messageText').empty()
            		$('.messageImage').empty()
               		$('.messageText').append('您的密码为<i style="color:#00bfff;">"' + $('#newPassword').val() + '"</i>');
	           	 	$(".messageImage").append('<img src="images/success.png" height="50" width="50">');
	           	 	$('.message').slideDown(400).delay(2000).fadeOut(400)
	           	 	$('#newPassword').empty()
            }
            else if(response === 'npassword'){
            		$('.messageText').empty()
            		$('.messageImage').empty()
               		$('.messageText').append('请输入密码');
	           	 	$(".messageImage").append('<img src="images/error.png" height="50" width="50">');
	           	 	$('.message').slideDown(400).delay(2000).fadeOut(400)
	           	 	$('#newPassword').empty()
            }
            else{
            		$('.messageText').empty()
            		$('.messageImage').empty()
	      	        $('.messageText').append('aaa'+response+'未知错误，请重试');
	           	 	$(".messageImage").append('<img src="images/error.png" height="50" width="50">');
	           	 	$('.message').slideDown(400).delay(2000).fadeOut(400)	            
           }
       }
    });
 };
