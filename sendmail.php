<?php
session_start();

$name = $_POST['name'];
$email = $_POST['email'];
$comment = $_POST['comment'];

mb_language("Ja");
mb_internal_encoding("utf-8");

$body = '';
$body2 = '';

$entry_time = date("Y/m/d H:i:s");
$subject = "ホームページより、お問い合わせがありました";
$subject2 = "お問い合わせを受け付けました。";
$to = "hs.sf88me.ey@gmail.com,infomail_2011@yahoo.co.jp";
$from = "info@hananoi-sc.jp";
$header = "From:" .mb_encode_mimeheader("お問い合わせの受付") ."<$email>";
$header2 = "From:" .mb_encode_mimeheader("花野井サッカークラブ") ."<$from>";

$body =<<<MAILBODY
ホームページより、お問い合わせがありました。

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
　■　お問い合わせ内容
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

【お名前】：{$name}　様
【Eメール】：{$email}

【お問い合わせ内容】

{$comment}


MAILBODY;

$body2 = <<<MAILBODY
{$name}　様

お問い合わせありがとうございます。

担当者からご連絡させて頂きますのでお待ち下さい。

花野井サッカークラブ事務局

MAILBODY;

//運営事務局宛メール送信処理
//お客様宛メール送信処理
if(isset($email)){
	$mail_result1 = mb_send_mail($to,$subject,$body,$header,"-f$email");
	$mail_result2 = mb_send_mail($email,$subject2,$body2,$header2,"-f$from");
}

//送信終了メッセージ格納
if($mail_result1 && $mail_result2){
	echo "<script type='text/javascript'>alert('送信されました。');</script>";
	echo "<script type='text/javascript'>location.href = 'index.php'</script>";
	/*}else{
	session_unset();
	header("Location:error.html");*/
}
?>