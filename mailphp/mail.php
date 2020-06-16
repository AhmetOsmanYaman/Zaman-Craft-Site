<?
include 'ayar/baglan.php';
require("class.phpmailer.php");

if ($_POST['toplam']!=$_POST['islem']) {
	
	echo "bot kontrolü";
	exit;
} {



	//Mysql den mail bilgilerimizi çekiyoruz.
	$ayarsor=$db->prepare("select * from ayar where ayar_id=?");
	$ayarsor->execute(array(0));
	$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);


	$mail = new PHPMailer();
	$mail->IsSMTP();  
	$mail->CharSet="SET NAMES UTF8";                               // send via SMTP
	$mail->Host     =  'mail.ismailbecit.com' // SMTP servers
	$mail->SMTPAuth = true;     // turn on SMTP authentication
	$mail->Username = 'destek.ismailbecit.com'  // SMTP username
	$mail->Password = '1200ismailbjk';// SMTP password
	$mail->Port     = ' 587'
	$mail->From     = 'ismail'; // smtp kullanýcý adýnýz ile ayný olmalý
	$mail->Fromname = "sdaadsddassdi Test Mail";
	//Çoklu mail için bu satırı çoğal
	$mail->AddAddress("JoyAkademi@emrahyuksel.com.tr","Form Mail");
	

	$mail->Subject  =  $_POST['adsoyad'];
	$mail->Body     =  implode("    ",$_POST);

if(!$mail->Send())
{
	echo "Mesaj Gönderilemedi <p>";
	echo "Mailer Error: " . $mail->ErrorInfo;
	exit;
}

echo "Mesaj Gönderildi";
exit;
}

?>
<!--<meta http-equiv="refresh" content="0;URL=../iletisim.php?durum=ok">-->