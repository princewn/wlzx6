<?php
//295��mail�Ѿ�ע��
session_start();
//Include config
require_once('class_config.php');
require_once('class_mailwn.php');

ob_start();

//Instance class
function createInstance(){
	
	//Instancing
	$obj = new declarations;
    return $obj;
}

//Execute database query
function executeDatabase($payload){
	
	//Create instance of class
	$obj = createInstance();
	
	//Make query
	//$result = mysqli_query($obj->connectDB(), $payload);
	$con=$obj->connectDB();
    $result = mysql_query($payload, $con);
 //   while($row = mysql_fetch_array($result)) echo "$row[password] $row[username] <br />";


	//Return query
	return $result;
	
}

//Clean strings for security ɾ����б��
function secureStrings($input){
	
	//Strip slashes
	$output = stripslashes($input);
	
	//Return
	return $output;
}

//Check if user exists
function checkIfUserExists($username, $password){
	//Create database query
	$databaseQuery = "SELECT * FROM login WHERE username='$username' and password='$password'";
	
	//Execute query
	$result = executeDatabase($databaseQuery);
	
	
	//Count entries
	$count = mysql_num_rows($result);
	//echo $count."checkIfUserExists mysql_num_rows<br>";
	
	//Return result
	if($count == 1){
	
		//True if yes
		return 'true';
		
	}
	
	else if($count == 0){
		
		//False if no
		return 'false';
		
	}
	
}

//Check if user already exists��ϣ��������password
function checkIfUserAlreadyExists($username, $password){
	
	//Encrypt Password
	$password = sha1($password);
	
	//Create database query
	$databaseQuery = "SELECT * FROM login WHERE username='$username'";
	
	//Execute query
	$result = executeDatabase($databaseQuery);
	
	
	//Count entries
	$count = mysql_num_rows($result);
	//echo $count." checkIfUserAlreadyExists mysql_num_rows<br>";
	//Return result
	if($count == 1){
	
		//True if yes
		return 'true';
		
	}
	
	else if($count == 0){
		
		//False if no
		return 'false';
		
	}
	
}

//Checks if email address already exists
function checkIfEmailExists($emailAddress){
	
	//Create database query
	$databaseQuery = "SELECT * FROM login WHERE emailAddress='$emailAddress'";
	
	//Execute query
	$result = executeDatabase($databaseQuery);
	
	//Count entries
	$count = mysql_num_rows($result);
	//echo $count." checkIfEmailExists mysql_num_rows<br>";

	//Return result
	if($count == 1){
	
		//True if yes
		return true;
		
	}
	
	else if($count ==0){
		
		//False if no
		return false;
		
	}
	
}


//Check if user  is approved
function checkIfApproved($username, $password){
	
	//Create database query
	$databaseQuery = "SELECT * FROM login WHERE username='$username' and password='$password' and confirmed='true'";

	//Execute query
	$result = executeDatabase($databaseQuery);
	
	//Count entries
	$count = mysql_num_rows($result);
	
	//Return result
	//echo $count." checkIfApproved mysql_num_rows<br>";
	if($count == 1){
	
		//True if yes
		return 'true';
		
	}
	
	else if($count == 0){
		
		//False if no
		return 'false';
		
	}
	
}

//Checks Login
function checkLogin($username, $password){
	
	//Clean strings for security
	$username =secureStrings($username);
	$password = secureStrings($password);
	//echo $username ;
	//echo $password;
	//Salt password
	$password = saltPassword($password);

	//Check if user exists
	//echo " checkLogin".(boolean)checkIfUserExists($username,$password)."<br>";
	if (checkIfUserExists($username,$password) == 'true'){
	

	   //Check if approved 
	   if (checkIfApproved($username, $password) == 'true'){
			//Create Session 
			createSession($username, $password);
		}
		
		else{
		
			print ('napproved');
			
		}
	
	}

	else{

		print('Incorrect');
		
	}	

}

//Salt Password  ��ϣ��ֵ
function saltPassword($password){
	
	//SHA1
	$password = sha1($password);
	
	//Return
	return $password;
	
}

//Create session
function createSession($username, $password){
	
	$_SESSION['username'] = $username;
	$_SESSION['password'] = $password; 
	//echo "createSession<br>";
	print ('Correct');
	
}
	
//Insert user
function insertUser($username, $password, $emailAddress){
	
	//Instance class
	$obj = createInstance();
	
	//Clean strings for security
	$username=secureStrings($username, $password);
	$password=secureStrings($username, $password);
/*	secureStrings($username, $password)->$username;
	secureStrings($username, $password)->$password;*/
	//Salt password
	$password = saltPassword($password);

	//Check if username already exists
	if (!checkIfUserAlreadyExists($username, $password)){
		
		echo "utaken";
		
	}
		
	//Check if email address is already registered
	else if (checkIfEmailExists($emailAddress)){
		
		echo "eused";
		
	}

	else {
		//Hash username
		$hash = saltPassword($username);
		
		//Get structure string
		$structure_login = $obj->structure_login();

		//Create query
		$databaseQuery = "INSERT INTO login $structure_login VALUES ('$username', '$password', '$emailAddress', '$hash', 'false')";
	
		//Execute database query
		executeDatabase($databaseQuery);
	
		//Get email address string
		$email_webmaster = $obj->email_webmaster();
	
		//Get confirmation url
		$url_confirm = $obj->confirm_url();
	
	
		//Create message
		$message = "感谢您的注册<br>
		用户名: $username<br>
		邮箱: $emailAddress<br>
		认证账号: $url_confirm".$hash."&emailAddress=".$emailAddress."</a><br>";
		$subject = "感谢您的注册";
/*		$message = "Thank you for registering!<br>
		Username: $username<br>
		Email Address: $emailAddress<br>
		Confirm User:<a href='$url_confirm".$hash."&emailAddress=".$emailAddress."'>
		 $url_confirm".$hash."&emailAddress=".$emailAddress."</a><br>";
		$subject = "Thank you for registering!";
*/

	
		//Send Email
		sendEmail($message, $emailAddress, $subject);
	    //echo "sendEmail<br>";
		print ('Correct');
	
	}
	
}

//Send Email??
function sendEmail($payload, $destination, $subject){
	
	//Create instance
	$obj = createInstance();
	
	//Get server email
	$email_from = $obj->email_from();
	
	//Send Email
	$headers = "From:" . $email_from;
	//mail($destination, $subject, $payload, $headers);
    mailwn($destination, $subject, $payload, $headers);
}

//Authorize user
function authorizeUser($hash, $emailAddress){
	
	//Generate database query
	$databaseQuery = "UPDATE login SET confirmed='true' WHERE hash='$hash'";
	
	//Execute query
	executeDatabase($databaseQuery);
	
	//Create message
	$message = "账号已认证！";
	$subject = "账号已认证！";
	//echo "authorizeUser<br>";
	//Send Email
	sendEmail($message, $emailAddress, $subject);
	
	
}

//Sends email to user with credentials
function forgotCredentials($emailAddress){
	//Checks if email address exists
	if(!checkIfEmailExists($emailAddress)){
		print ('enot');
	}
	
	//Create database query
	$databaseQuery = "SELECT * FROM login WHERE emailAddress='$emailAddress'";
	
	//Execute query
	$result = executeDatabase($databaseQuery);
	
	//While statement... Get data from database
	while($row = mysql_fetch_array($result))
   	{
   		$obj = createInstance();
   		//Strings
   		$username = $row['username'];
   		$password = $row['password'];
   		$hash = $row['hash'];
   		$confirmHash = $hash.$password;
   		$reset_url = $obj->reset_url().$confirmHash."&email=".$emailAddress;
   		
		//Create Email
  		$subject = '需要登录密码';
  		$message = "用户名:$username\nPassword:$reset_url";
	//echo "forgotCredentials<br>";
		//Send email
		sendEmail($message, $row['emailAddress'], $subject);
		print ('Correct');
	}

}

//Logs out
function logout(){

	session_destroy();
	//echo "logout<br>";
}

//Get's unauthorized users
function getUnauthorizedUsers(){
	
	//Create query
	$databaseQuery = "SELECT * FROM login WHERE confirmed='false'";
	
	//Execute database query
	executeDatabase($databaseQuery);
	//echo "getUnauthorizedUsers<br>";
}

//Delete user
function deleteUser($hash){
	
	//Create database query
	$databaseQuery = "DELETE FROM login WHERE hash='$hash'";
	
	//Execute database query
	executeDatabase($databaseQuery);
	//echo "deleteUser<br>";
}

//Checks if logged in
function isLoggedIn(){
	
	if(!isset($_SESSION['username'])){
			echo '<script type="text/javascript">
window.location = "index.html"
</script>';
	}
	
	
}
//resetPassword

function resetPassword($ticket, $emailAddress, $newPassword){
	//Create query
	$databaseQuery = "SELECT * FROM login WHERE emailAddress='$emailAddress'";
	
	//Execute Database query
	$result = executeDatabase($databaseQuery);
	
	//Fetch array
	while($row = mysql_fetch_array($result)){

		//Create ticket based off database
		$hash = $row['hash'];
		$password = $row['password'];
		$checkTicket = $hash.$password;
		
		if ($checkTicket == $ticket){
			$newPassword = saltPassword($newPassword);
			$databaseQuery = "UPDATE login SET password='$newPassword' WHERE emailAddress='$emailAddress'";
			executeDatabase($databaseQuery);
	//echo "resetPassword<br>";
			print ('reset');
		}
		
		else {
			print ('brequest');
		}
				
	}
	
}
//changePassword

function changePassword($ticket, $username, $newPassword){
	
	//Create query
	$databaseQuery = "SELECT * FROM login WHERE username='$username'";
	
	//Execute Database query
	$result = executeDatabase($databaseQuery);
	
	//Fetch array
	while($row = mysql_fetch_array($result)){
		//Create ticket based off database
		$hash = $row['hash'];
		$password = $row['password'];
		$checkTicket = $hash;
		
		if ($checkTicket == $ticket){
			$newPassword = saltPassword($newPassword);
			$databaseQuery = "UPDATE login SET password='$newPassword' WHERE username='$username'";			
			executeDatabase($databaseQuery);
	//echo "changePassword<br>";
		    print ('reset');
		}
		
		else {
		    print ('error');
		}
				
	}
	
}
ob_end_flush();
?>
