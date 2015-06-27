 <?php
require( '../../Public/PHPMailer-master/class.phpmailer.php');
require_once("../../Public/PHPMailer-master/class.smtp.php"); 
function mailwn($destination, $subject, $payload, $headers){
$mail = new PHPMailer(); //ʵ���� 
$mail->IsSMTP(); // ����SMTP 
$mail->Host = "smtp.163.com"; //SMTP������ ��163����Ϊ���� 
$mail->Port = 25;  //�ʼ����Ͷ˿� 
$mail->SMTPAuth   = true;  //����SMTP��֤ 
 
$mail->CharSet  = "UTF-8"; //�ַ��� 
$mail->Encoding = "base64"; //���뷽ʽ 
 
$mail->Username = "peaceoftheprince@163.com";  //������� 
$mail->Password = "13948376389";  //������� 
$mail->Subject = $subject; //�ʼ����� 
 
$mail->From = "peaceoftheprince@163.com";  //�����˵�ַ��Ҳ����������䣩 
$mail->FromName = "大工软件网络中心";  //���������� 
 
$address = $destination;//�ռ���email 
$mail->AddAddress($address, "��");//����ռ��ˣ���ַ���ǳƣ� 
 
$mail->IsHTML(true); //֧��html��ʽ���� 
$mail->Body = $payload.'<br><br>'.$headers; //�ʼ��������� 
 
//���� 
$mail->Send();

}


?>