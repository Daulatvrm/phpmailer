<?php
include('smtp/PHPMailerAutoload.php');
$html = 'message';
echo smtp_mailer('daulatvrm@gmail.com','subject',$html);
function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	//$mail->SMTPDebug=3;
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'type'; //change
	$mail->Host = "host";//change
	$mail->Port = "post";//change 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "email";//our**
	$mail->Password = 'password';//our
	$mail->SetFrom("email");//** same
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		echo 'Sent';
	}
}
?>