<?php 
/*require_once('./classes/class_config.php');
require_once('./classes/class_login.php');
	$obj = new declarations;
	$con=$obj->connectDB();

    $q = "SELECT * FROM login";

    $rs = mysql_query($q, $con);

while($row = mysql_fetch_array($rs)) echo "$row[password] $row[username] <br />";           

		$databaseQuery = "SELECT * FROM login WHERE username='wn'";
        executeDatabase($databaseQuery); */
?>
<?php
require( 'C:\wampconfile\wamp\www\Public\PHPMailer-master/class.phpmailer.php');
require_once("C:\wampconfile\wamp\www\Public\PHPMailer-master/class.smtp.php"); 
 
$mail = new PHPMailer(); //ʵ���� 
$mail->IsSMTP(); // ����SMTP 
$mail->Host = "smtp.163.com"; //SMTP������ ��163����Ϊ���� 
$mail->Port = 25;  //�ʼ����Ͷ˿� 
$mail->SMTPAuth   = true;  //����SMTP��֤ 
 
$mail->CharSet  = "UTF-8"; //�ַ��� 
$mail->Encoding = "base64"; //���뷽ʽ 
 
$mail->Username = "peaceoftheprince@163.com";  //������� 
$mail->Password = "13948376389";  //������� 
$mail->Subject = "���"; //�ʼ����� 
 
$mail->From = "peaceoftheprince@163.com";  //�����˵�ַ��Ҳ����������䣩 
$mail->FromName = "����";  //���������� 
 
$address = "peaceoftheprince@163.com";//�ռ���email 
$mail->AddAddress($address, "��");//����ռ��ˣ���ַ���ǳƣ� 
 
$mail->AddAttachment('C:\wampconfile\wamp\www\bdream\login\register.png','�ҵĸ���.xls'); // ��Ӹ���,��ָ������ 
$mail->IsHTML(true); //֧��html��ʽ���� 
$mail->AddEmbeddedImage('C:\wampconfile\wamp\www\bdream\login\register.png', "my-attach", "logo.jpg"); //�����ʼ��е�ͼƬ 
$mail->Body = '���, <b>����</b>! <br/>����һ������<a href="http://www.helloweba.com"  
target="_blank">helloweba.com</a>���ʼ���<br/> 
<img alt="helloweba" src="cid:my-attach">'; //�ʼ��������� 
 
//���� 
if(!$mail->Send()) { 
  echo "Mailer Error: " . $mail->ErrorInfo; 
} else { 
  echo "Message sent!"; 
} 
?>
