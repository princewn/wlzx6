			<script>
				function formSubmit(){
					//alert(document.forms.leaveNote);
					document.forms.leaveNote.submit();
					//alert("what's the hell with you");
				}
				function loginAlert(){
						alert("请登录后留言");
				}
			</script>
		<?php 
		if(isAdministrator()){
			echo '
			<form name="leaveNote" method="post" action="./add_message.php" AUTOCOMPLETE="OFF" >
				<p>
					<span class="title left"> 留言栏</span>
				</p>
				<textarea id="leaveNote" name="leaveNote"  placeholder="请登录后留言"></textarea>
				<a  class="right functionClick" style="color:#36F" href="#" onclick="formSubmit();">提交</a>
			</form> 
			';
		}
		else{
			echo '
			<form name="leaveNote" method="post" action="./add_message.php" AUTOCOMPLETE="OFF" >
				<p>
					<span class="title left"> 留言栏</span>
				</p>
				<textarea id="leaveNote" name="leaveNote"  placeholder="请登录后留言"></textarea>
				<a  class="right functionClick" style="color:#36F" href="#" onclick="loginAlert();">提交</a>
			</form> 
			';		
		}
?>