<?php     
	  require_once('../../ayar/Rcon.php');
	  require_once('../../ayar/baglan.php');
    require_once('../../ayar/fonksiyon.php');
         require_once("../../ayar/WebsenderAPI.php");
ob_start();
session_start();


 date_default_timezone_set('Europe/Istanbul');
error_reporting(E_ALL);
ini_set("display_errors", 1);
$kullanici=$_SESSION['oturum'];




if (isset($_POST['kullanici-guncelle'])) {
$kullanici_username = $_POST['kullanici_username'];
  
  $profil = $db->prepare("UPDATE kullanici set 
         kullanici_mail=:kullanici_mail,
         kullanici_username=:kullanici_username,
         kullanici_kredi=:kullanici_kredi,
         kullanici_guvenlikkod=:kullanici_guvenlikkod,
         kullanici_yetki=:kullanici_yetki
         where kullanici_id= {$_POST['kullanici_id']}  
 
    ");
$islem = $profil->execute(array(
           'kullanici_mail' => htmlspecialchars($_POST['kullanici_mail']),
           'kullanici_username' => htmlspecialchars($_POST['kullanici_username']),
             'kullanici_kredi' => htmlspecialchars($_POST['kullanici_kredi']),
           'kullanici_guvenlikkod' => htmlspecialchars($_POST['kullanici_guvenlikkod']),
              'kullanici_yetki' => htmlspecialchars($_POST['kullanici_yetki'])
  ));
if ($islem) {

  header("Location:  ../oyuncu-islem.php?oyuncu=$kullanici_username&islem=ok");
}

else{
  header("Location:  ../oyuncu-islem.php?oyuncu=$kullanici_username&islem=no");


   }
}
if (isset($_GET['kullanici-sil'])=="ok") {

  
  $profil = $db->prepare("DELETE FROM kullanici
       
         where kullanici_id= {$_GET['kullanici_id']}  
 
    ");
$islem = $profil->execute();
if ($islem) {

  header("Location:../oyuncular.php?islem=ok");
}
}











if (isset($_POST['odemeyontem'])) {

$ode = $db->prepare("UPDATE odeme_yontemi set 
   odeme_kullaniciapi=:odeme_kullaniciapi,
   odeme_ad=:odeme_ad,
   odeme_sifreapi=:odeme_sifreapi
	where odeme_id=2");


$islem = $ode->execute(array(
       'odeme_kullaniciapi' => htmlspecialchars($_POST['odeme_kullaniciapi']),
       'odeme_sifreapi' => htmlspecialchars($_POST['odeme_sifreapi']),
         'odeme_ad' => htmlspecialchars($_POST['odeme_ad'])
 ));
$ininal = $db->prepare("UPDATE odeme_yontemi set 
   ininal_barkod=:ininal_barkod,
   ininal_hediye=:ininal_hediye
	where odeme_id=1");

$ininal->execute(array(
       'ininal_barkod' => htmlspecialchars($_POST['ininal_barkod']),
        'ininal_hediye' => htmlspecialchars($_POST['ininal_hediye'])
    
 ));
if ($islem) {
	header("Location: ../odeme.php?durum=ok");
   }
else{
	header("Location: ../odeme.php?durum=no");
 }
}



if (isset($_POST['giris'])) {

 $kullanicisor = $db->prepare("SELECT * FROM kullanici where kullanici_username=:kullanici_username and kullanici_password=:kullanici_password and kullanici_yetki=:yetki");
 $kullanicisor->execute(array(
        'kullanici_username' => htmlspecialchars($_POST['kullanici_username']),
        'kullanici_password' => htmlspecialchars(md5($_POST['kullanici_password'])),
        'yetki' => "admin"
 ));

  $kullanicisay = $kullanicisor->rowCount();
  $kullanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC);

 
 if ($kullanicisay == 1) {
$kullanici=$_SESSION['oturum'];
 $_SESSION['oturum'] = array(
    'kullanici_id' => $kullanicicek['kullanici_id'],
    'kullanici_username' => $kullanicicek['kullanici_username'],
    'kullanici_mail' => $kullanicicek['kullanici_mail'],
    'kullanici_kredi' => $kullanicicek['kullanici_kredi'],
    'kullanici_yetki' => $kullanicicek['kullanici_yetki'],
    'kullanici_kayittarih' => $kullanicicek['kullanici_kayittarih'],
    'kullanici_skype' => $kullanicicek['kullanici_skype'],
    'kullanici_discord' => $kullanicicek['kullanici_discord'],
            'kullanici_resim' => $kullanicicek['kullanici_resim']
 );
   header("Location: ../index.php");
   }
else{
 header("Location: ../giris.php?giris=error");
 }

}


if (isset($_POST['sunucu-ekle'])) {



	$sunucu = $db->prepare("INSERT INTO  sunucu set 
		    sunucu_ad=:sunucu_ad,
            sunucu_adres=:sunucu_adres,
           sunucu_port=:sunucu_port,
            sunucu_surum=:sunucu_surum,
           sunucu_rconsifre=:sunucu_rconsifre,
            sunucu_websendsifre=:sunucu_websendsifre,
            sunucu_websendport=:sunucu_websendport

		");
	$kontrol = $sunucu->execute(array(
		'sunucu_ad' => htmlspecialchars($_POST['sunucu_ad']),
       'sunucu_adres' => htmlspecialchars($_POST['sunucu_adres']),
       'sunucu_port' => htmlspecialchars($_POST['sunucu_port']),
       'sunucu_surum' => htmlspecialchars($_POST['sunucu_surum']),
          'sunucu_rconsifre' => htmlspecialchars($_POST['sunucu_rconsifre']),
          'sunucu_websendsifre' => htmlspecialchars($_POST['sunucu_websendsifre']),
          'sunucu_websendport' => htmlspecialchars($_POST['sunucu_websendport'])
	));
if ($kontrol) {
	header("Location: ../sunucum.php?islem=ok");
}else{
	header("Location: ../sunucum.php?islem=no");
}
}




if (isset($_POST['sunucu-guncelle'])) {

	$sunucu = $db->prepare("UPDATE sunucu set 
		    sunucu_ad=:sunucu_ad,
            sunucu_adres=:sunucu_adres,
           sunucu_port=:sunucu_port,
            sunucu_surum=:sunucu_surum,
           sunucu_rconsifre=:sunucu_rconsifre,
            sunucu_websendsifre=:sunucu_websendsifre,
            sunucu_websendport=:sunucu_websendport
            where sunucu_id = {$_POST['sunucu_id']}

		");
	$kontrol = $sunucu->execute(array(
		'sunucu_ad' => htmlspecialchars($_POST['sunucu_ad']),
       'sunucu_adres' => htmlspecialchars($_POST['sunucu_adres']),
       'sunucu_port' => htmlspecialchars($_POST['sunucu_port']),
       'sunucu_surum' => htmlspecialchars($_POST['sunucu_surum']),
          'sunucu_rconsifre' => htmlspecialchars($_POST['sunucu_rconsifre']),
          'sunucu_websendsifre' => htmlspecialchars($_POST['sunucu_websendsifre']),
          'sunucu_websendport' => htmlspecialchars($_POST['sunucu_websendport'])
	));
if ($kontrol) {
	header("Location: ../sunucum.php?islem=ok");
}else{
	header("Location: ../sunucum.php?islem=no");
}
}
if (isset($_POST['duyuru-guncelle'])) {

	$izinli_uzantilar=array('jpg','gif','png','jpeg','BMP','EPS','TIFF','PSD','PICT','RAW');
	//echo $_FILES['ayar_logo']["name"];

	$ext=strtolower(substr($_FILES['duyuru_resim']["name"],strpos($_FILES['duyuru_resim']["name"],'.')+1));

	if (in_array($ext, $izinli_uzantilar) === false) {
		echo "Bu uzantı kabul edilmiyor";
	header("Location: ../duyuru-duzenle.php?islem=formathata");

		exit;
	}
	$uploads_dir = '../../dimg/yazilar';

	@$tmp_name = $_FILES['duyuru_resim']["tmp_name"];
	@$name = $_FILES['duyuru_resim']["name"];

	$benzersizsayi4=rand(20000,32000);
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");

	
	$duyuru = $db->prepare("UPDATE duyuru set 
		    duyuru_baslik=:duyuru_baslik,
            duyuru_detay=:duyuru_detay,
            duyuru_kategoriad=:duyuru_kategoriad,
            duyuru_resim=:duyuru_resim
           where duyuru_id = {$_POST['duyuru_id']}

		");
	$kontrol = $duyuru->execute(array(
		'duyuru_baslik' => htmlspecialchars($_POST['duyuru_baslik']),
       'duyuru_detay' => $_POST['duyuru_detay'],
       'duyuru_kategoriad' => htmlspecialchars($_POST['duyuru_kategoriad']),
       'duyuru_resim' => $refimgyol

	));
if ($kontrol) {



 $resimsilunlink=$_POST['duyuru_resimm'];
    unlink("../../$resimsilunlink");


	header("Location: ../duyuru.php?islem=ok");
}else{
	header("Location: ../duyuru.php?islem=no");
}
}
if (isset($_GET['duyurusil'])=="ok") {
	$sil = $db->prepare("DELETE FROM duyuru where duyuru_id = {$_GET['duyuru_id']}");
	$islem = $sil->execute();

	if ($islem) {
		header("Location: ../duyuru.php?sil=ok");
	}
}
if (isset($_POST['duyuru-kaydet'])) {

	$seobaslik=seo(htmlspecialchars($_POST['duyuru_baslik']));

	$izinli_uzantilar=array('jpg','gif','png','jpeg','BMP','EPS','TIFF','PSD','PICT','RAW');

	//echo $_FILES['ayar_logo']["name"];

	$ext=strtolower(substr($_FILES['duyuru_resim']["name"],strpos($_FILES['duyuru_resim']["name"],'.')+1));

	if (in_array($ext, $izinli_uzantilar) === false) {
		echo "Bu uzantı kabul edilmiyor";
	header("Location: ../duyuru-ekle.php?islem=format");

		exit;
	}
	$uploads_dir = '../../dimg/yazilar';

	@$tmp_name = $_FILES['duyuru_resim']["tmp_name"];
	@$name = $_FILES['duyuru_resim']["name"];

	$benzersizsayi4=rand(20000,32000);
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");


	$duyuru = $db->prepare("INSERT INTO duyuru set 
		   duyuru_yazar=:duyuru_yazar,
		    duyuru_baslik=:duyuru_baslik,
            duyuru_detay=:duyuru_detay,
            duyuru_kategoriad=:duyuru_kategoriad,
            duyuru_resim=:duyuru_resim,
            duyuru_seobaslik=:duyuru_seobaslik
");
	$kontrol = $duyuru->execute(array(
	  'duyuru_yazar' => $kullanici['kullanici_username'],
		'duyuru_baslik' => htmlspecialchars($_POST['duyuru_baslik']),
       'duyuru_detay' => $_POST['duyuru_detay'],
       'duyuru_kategoriad' => htmlspecialchars($_POST['duyuru_kategoriad']),
       'duyuru_resim' => $refimgyol,
       'duyuru_seobaslik' => $seobaslik

	));

if ($kontrol) {
	header("Location: ../duyuru.php?islem=ok");
}else{
	header("Location: ../duyuru.php?islem=no");
}
}


if (isset($_POST['destek-kaydet'])) {



	$destek = $db->prepare("INSERT INTO destek set 
		    kullanici_id=:kullanici_id,
		    destek_baslik=:destek_baslik,
            destek_detay=:destek_detay,
            destekkategori_id=:destekkategori_id
");
	$kontrol = $destek->execute(array(
	  'kullanici_id' => $kullanici['kullanici_id'],
		'destek_baslik' => htmlspecialchars($_POST['destek_baslik']),
       'destek_detay' => $_POST['destek_detay'],
       'destekkategori_id' => htmlspecialchars($_POST['destekkategori_id'])
       

	));

if ($kontrol) {
	header("Location: ../../destek.php?islem=ok");
}else{
	header("Location: ../../destek-olustur.php?islem=no");
}
}

if (isset($_POST['destek-cevap'])) {
	$destek = $db->prepare("UPDATE destek set 
		   destek_cevap=:destek_cevap,
           destek_durum=:destek_durum
        
           where destek_id = {$_POST['destek_id']}

		");
	$kontrol = $destek->execute(array(
		'destek_cevap' => htmlspecialchars($_POST['destek_cevap']),
       'destek_durum' => 0

	));
if ($kontrol) {
	header("Location: ../destek.php?islem=ok");
}else{
	header("Location: ../destek.php?islem=no");
}
}
if (isset($_POST['desteksil'])) {
  $sil = $db->prepare("DELETE FROM destek 
    where destek_id = {$_POST['destek_id']} ");
 $islem = $sil->execute();

  if ($islem) {
  	
 $resimsilunlink=$_POST['destek_resim'];
    unlink("../../$resimsilunlink");

     header("Location: ../../destek.php?sil=ok");
  }else{
     header("Location: ../../destek.php?sil=no");
  }
}

if (isset($_POST['urun-kategorikaydet'])) {
$seaoad = seo($_POST['kategori_ad']);

	$duyuru = $db->prepare("INSERT INTO urun_kategori set 
            kategori_ad=:kategori_ad,
            kategori_seoad=:kategori_seoad
");
	$kontrol = $duyuru->execute(array(
       'kategori_ad' => htmlspecialchars($_POST['kategori_ad']),
        'kategori_seoad' =>$seaoad
	));

if ($kontrol) {
	header("Location: ../market-kategori.php?islem=ok");
}else{
	header("Location: ../market-kategori.php?islem=no");
}
}

if (isset($_POST['urun-kaydet'])) {

	
	$izinli_uzantilar=array('jpg','gif','png','jpeg','BMP','EPS','TIFF','PSD','PICT','RAW');

	//echo $_FILES['ayar_logo']["name"];

	$ext=strtolower(substr($_FILES['urun_resim']["name"],strpos($_FILES['urun_resim']["name"],'.')+1));

	if (in_array($ext, $izinli_uzantilar) === false) {
		echo "Bu uzantı kabul edilmiyor";
	header("Location: ../urun-ekle.php?islem=format");

		exit;
	}
	$uploads_dir = '../../dimg/urunler';

	@$tmp_name = $_FILES['urun_resim']["tmp_name"];
	@$name = $_FILES['urun_resim']["name"];

	$benzersizsayi4=rand(20000,32000);
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");

$seobaslik= seo(htmlspecialchars($_POST['urun_baslik']));
	$urun = $db->prepare("INSERT INTO urun set 
		    kategori_id=:kategori_id,
		    urun_baslik=:urun_baslik,
		     urun_seobaslik=:urun_seobaslik,
            urun_detay=:urun_detay,
            urun_fiyat=:urun_fiyat,
            urun_sure=:urun_sure,
            urun_resim=:urun_resim,
                   urun_komut=:urun_komut,
             urun_baslangickod=:urun_baslangickod,
              urun_bitiskod=:urun_bitiskod
");
	$kontrol = $urun->execute(array(
'kategori_id' => htmlspecialchars($_POST['kategori_id']),
'urun_seobaslik' => $seobaslik,
'urun_baslik' => htmlspecialchars($_POST['urun_baslik']),
'urun_detay' => $_POST['urun_detay'],
'urun_fiyat' => htmlspecialchars($_POST['urun_fiyat']),
'urun_sure' => htmlspecialchars($_POST['urun_sure']),
'urun_komut' => htmlspecialchars($_POST['urun_komut']),
'urun_baslangickod' => htmlspecialchars($_POST['urun_baslangickod']),
'urun_bitiskod' => htmlspecialchars($_POST['urun_bitiskod']),
'urun_resim' => $refimgyol

	));

if ($kontrol) {
	header("Location: ../market.php?islem=ok");
}else{
	header("Location: ../market.php?islem=no");
}
}
if (isset($_GET['urun-kategorisil'])=="ok") {
	$sil= $db->prepare("DELETE FROM urun_kategori 
      where kategori_id={$_GET['kategori_id']}
	  ");
    $islem = $sil->execute();
    if ($islem) {
    		header("Location: ../market-kategori.php?durum=ok");
    }

}
if (isset($_POST['urunsil'])) {


	$sil= $db->prepare("DELETE FROM urun
      where urun_id={$_POST['urun_id']}
	  ");
    $islem = $sil->execute();
    if ($islem) {
   


 

    		header("Location: ../market.php?durum=ok");
    }

}



if (isset($_POST['yorum-onay'])) {
	$onay= $db->prepare("UPDATE yorum set 
		yorum_onay='1'
      where yorum_id={$_POST['yorum_id']}
	  ");
    $islem = $onay->execute();
    if ($islem) {
   
header("Location: ../yorumlar.php?durum=ok");
    }

}
if (isset($_POST['yorum-sil'])) {
		$sil= $db->prepare("DELETE FROM yorum
      where yorum_id={$_POST['yorum_id']}
	  ");
    $islem = $sil->execute();
    if ($islem) {
   
header("Location: ../yorumlar.php?durum=ok");
    }
}


if (isset($_POST['logo-ayar'])) {


 $ayarsor = $db->prepare("SELECT * from ayar where ayar_id = '0' ");
	 $ayarsor->execute();
	$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

	$izinli_uzantilar=array('jpg','gif','png','jpeg','BMP','EPS','TIFF','PSD','PICT','RAW');

	//echo $_FILES['ayar_logo']["name"];

	$ext=strtolower(substr($_FILES['ayar_logo']["name"],strpos($_FILES['ayar_logo']["name"],'.')+1));

	if (in_array($ext, $izinli_uzantilar) === false) {
		echo "Bu uzantı kabul edilmiyor";
	header("Location: ../logo-ayar.php?islem=format");

		exit;
	}
		$uploads_dirr = '../../dimg/logo';
	@$tmp_namee = $_FILES['ayar_logo']["tmp_name"];
	@$namee = $_FILES['ayar_logo']["name"];

	$benzersizsayi5=rand(20000,32000);
	$refimgyol=substr($uploads_dirr, 6)."/".$benzersizsayi5.$namee;

	@move_uploaded_file($tmp_namee, "$uploads_dirr/$benzersizsayi5$namee");


 
	
	
	$duyuru = $db->prepare("UPDATE ayar set 
            ayar_logo=:ayar_logo
           where ayar_id =:id

		");
	$kontrol = $duyuru->execute(array(
          'ayar_logo' => $refimgyol,
       'id' => '0'

	));
if ($kontrol) {



 $ayar_logo=$_POST['ayar_logo'];

    unlink("../../$ayar_logo");

	header("Location: ../logo-ayar.php?islem=ok");
}else{
	header("Location: ../logo-ayar.php?islem=no");
}
}

if (isset($_POST['genel-ayar'])) {

	$duyuru = $db->prepare("UPDATE ayar set 
		    ayar_title=:ayar_title,
		    ayar_description=:ayar_description,
		    ayar_keywords=:ayar_keywords,
		    ayar_arkaplan=:ayar_arkaplan
           where ayar_id =:id

		");
	$kontrol = $duyuru->execute(array(
		'ayar_title' => htmlspecialchars($_POST['ayar_title']),
       'ayar_description' => htmlspecialchars($_POST['ayar_description']),
       'ayar_keywords' => htmlspecialchars($_POST['ayar_keywords']),
         'ayar_arkaplan' => htmlspecialchars($_POST['ayar_arkaplan']),
       'id' => '0'

	));
if ($kontrol) {

	header("Location: ../genel-ayar.php?islem=ok");
}else{
	header("Location: ../genel-ayar.php?islem=no");
}
}




if (isset($_POST['kuralguncelle'])) {
	$kural = $db->prepare("UPDATE kural set 
		    kural_detay=:kural_detay
           where kural_id =:id

		");
	$kontrol = $kural->execute(array(
       'kural_detay' => $_POST['kural_detay'],
       'id' => 1

	));
if ($kontrol) {
	header("Location: ../kural.php?islem=ok");
}else{
	header("Location: ../kural.php?islem=no");
}
}


if (isset($_POST['smtpkaydet'])) {

	 $kayit = $db->prepare("UPDATE ayar set 
		   ayar_smtphost=:ayar_smtphost,
		    ayar_smtpuser=:ayar_smtpuser,
            ayar_smtpsifre=:ayar_smtpsifre,
            ayar_smtpport=:ayar_smtpport
            where ayar_id =:id
");
	 $kontrol = $kayit->execute(array(
	    'ayar_smtphost' => htmlspecialchars($_POST['ayar_smtphost']),
		'ayar_smtpuser' => htmlspecialchars($_POST['ayar_smtpuser']),
        'ayar_smtpsifre' => htmlspecialchars(md5($_POST['ayar_smtpsifre'])),
        'ayar_smtpport' => htmlspecialchars($_POST['ayar_smtpport']),
        'id' => 0


	));

if ($kontrol) {
	header("Location: ../mail-ayar.php?islem=ok");
}else{
	header("Location: ../mail-ayar.php?islem=no");
}
}






if (isset($_POST['urun-guncelle'])) {
	

	$izinli_uzantilar=array('jpg','gif','png','jpeg','BMP','EPS','TIFF','PSD','PICT','RAW');

	//echo $_FILES['ayar_logo']["name"];

	$ext=strtolower(substr($_FILES['urun_resim']["name"],strpos($_FILES['urun_resim']["name"],'.')+1));

	if (in_array($ext, $izinli_uzantilar) === false) {
		echo "Bu uzantı kabul edilmiyor";
	header("Location: ../urun-duzenle.php?islem=formathata");

		exit;
	}
	$uploads_dir = '../../dimg/urunler';

	@$tmp_name = $_FILES['urun_resim']["tmp_name"];
	@$name = $_FILES['urun_resim']["name"];

	$benzersizsayi4=rand(20000,32000);
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");

	 $seobaslik = seo($_POST['urun_baslik']);
	
	$urun = $db->prepare("UPDATE urun set 
		   kategori_id=:kategori_id,
		    urun_baslik=:urun_baslik,
		     urun_seobaslik=:urun_seobaslik,
            urun_detay=:urun_detay,
            urun_fiyat=:urun_fiyat,
            urun_sure=:urun_sure,
            urun_resim=:urun_resim,
                   urun_komut=:urun_komut,
             urun_baslangickod=:urun_baslangickod,
              urun_bitiskod=:urun_bitiskod
           where urun_id = {$_POST['urun_id']}

		");
	$kontrol = $urun->execute(array(
'kategori_id' => htmlspecialchars($_POST['kategori_id']),
'urun_seobaslik' => $seobaslik,
'urun_baslik' => htmlspecialchars($_POST['urun_baslik']),
'urun_detay' => $_POST['urun_detay'],
'urun_fiyat' => htmlspecialchars($_POST['urun_fiyat']),
'urun_sure' => htmlspecialchars($_POST['urun_sure']),
'urun_komut' => htmlspecialchars($_POST['urun_komut']),
'urun_baslangickod' => htmlspecialchars($_POST['urun_baslangickod']),
'urun_bitiskod' => htmlspecialchars($_POST['urun_bitiskod']),
'urun_resim' => $refimgyol

	));
if ($kontrol) {



 $resimsilunlink=$_POST['urun_resimm'];
    unlink("../../$resimsilunlink");


	header("Location: ../market.php?islem=ok");
}else{
	header("Location: ../market.php?islem=no");
}
}

if (isset($_POST['destek-kategorikaydet'])) {
$seaoad = seo($_POST['kategori_ad']);

	$duyuru = $db->prepare("INSERT INTO destek_kategori set 
            kategori_ad=:kategori_ad
");
	$kontrol = $duyuru->execute(array(
       'kategori_ad' => htmlspecialchars($_POST['kategori_ad'])
	));

if ($kontrol) {
	header("Location: ../destek-kategori.php?islem=ok");
}else{
	header("Location: ../destek-kategori.php?islem=no");
}
}

if (isset($_GET['destek-kategorisil'])=="ok") {
	$sil= $db->prepare("DELETE FROM destek_kategori 
      where destekkategori_id={$_GET['destekkategori_id']}
	  ");
    $islem = $sil->execute();
    if ($islem) {
    		header("Location: ../destek-kategori.php?durum=ok");
    }

}

if (isset($_POST['sunucu-ayar'])) {

	$duyuru = $db->prepare("UPDATE ayar set 
		    ayar_oy=:ayar_oy,
		    ayar_indir=:ayar_indir
		   
           where ayar_id =:id

		");
	$kontrol = $duyuru->execute(array(
		'ayar_oy' => htmlspecialchars($_POST['ayar_oy']),
       'ayar_indir' => htmlspecialchars($_POST['ayar_indir']),
       'id' => '0'

	));
if ($kontrol) {



	header("Location: ../sunucu-ayar.php?islem=ok");
}else{
	header("Location: ../sunucu-ayar.php?islem=no");
}
}



if (isset($_POST['odeme-kayit'])) {
	$kullanici_username =htmlspecialchars($_POST['kullanici_username']);
	$kulsor = $db->prepare("SELECT * FROM kullanici where kullanici_username=:kullanici_username");
	$kulsor->execute(array(
         'kullanici_username' =>$kullanici_username
	));

		$kulcek = $kulsor->fetch(PDO::FETCH_ASSOC);
if ($kulcek['kullanici_mail']!=$_POST['kullanici_mail']) {
	header("Location: ../odeme-kayit?islem=hatalibilgi");
	exit();
}



	$duyuru = $db->prepare("INSERT INTO odeme set 
            kullanici_id=:kullanici_id,
            kullanici_username=:kullanici_username,
            kullanici_mail=:kullanici_mail,
            kredi=:kredi,
            durum=:durum,
            shopier_order_id=:shopier_order_id,
            odeme_odemeturu=:odeme_odemeturu
");
	$kontrol = $duyuru->execute(array(
       'kullanici_id' => $kulcek['kullanici_id'],
       'kullanici_username' => htmlspecialchars($_POST['kullanici_username']),
       'kullanici_mail' => htmlspecialchars($_POST['kullanici_mail']),
       'kredi' => htmlspecialchars($_POST['kredi']),
       'durum' => 1,
       'shopier_order_id'=> 1,
       'odeme_odemeturu' => "ininal"
	));

if ($kontrol) {

  $profil = $db->prepare("UPDATE kullanici set 
       kullanici_kredi=:kullanici_kredi
        where kullanici_id= {$kulcek['kullanici_id']}  
 
    ");
 $profil->execute(array(
           'kullanici_kredi' => htmlspecialchars($_POST['kredi'])+$kulcek['kullanici_kredi']
  ));


	header("Location: ../odeme-kayit.php?islem=ok");
}else{
	header("Location: ../odeme-kayit.php?islem=no");
}
}


if (isset($_POST['kupon-ekle'])) {



	$kupon = $db->prepare("INSERT INTO kupon set 
		    kupon_ad=:kupon_ad,
           kupon_komut=:kupon_komut,
            kupon_komutmiktar=:kupon_komutmiktar,
           kupon_miktar=:kupon_miktar,
            kupon_durum=:kupon_durum

		");
	$kontrol = $kupon->execute(array(
		'kupon_ad' =>strtolower(htmlspecialchars($_POST['kupon_ad'])),
       'kupon_komut' => htmlspecialchars($_POST['kupon_komut']),
       'kupon_komutmiktar' => htmlspecialchars($_POST['kupon_komutmiktar']),
       'kupon_miktar' => htmlspecialchars($_POST['kupon_miktar']),
          'kupon_durum' => 1
	));
if ($kontrol) {
	header("Location: ../kupon.php?islem=ok");
}else{
	header("Location: ../kupon.php?islem=no");
}
}


if (isset($_POST['kupon-duzenle'])) {



	$kupon = $db->prepare("UPDATE kupon set 
		    kupon_ad=:kupon_ad,
           kupon_komut=:kupon_komut,
            kupon_komutmiktar=:kupon_komutmiktar,
           kupon_miktar=:kupon_miktar,
            kupon_durum=:kupon_durum
            where kupon_id = {$_POST['kupon_id']}

		");
	$kontrol = $kupon->execute(array(
		'kupon_ad' => strtolower(htmlspecialchars($_POST['kupon_ad'])),
       'kupon_komut' => htmlspecialchars($_POST['kupon_komut']),
       'kupon_komutmiktar' => htmlspecialchars($_POST['kupon_komutmiktar']),
       'kupon_miktar' => htmlspecialchars($_POST['kupon_miktar']),
          'kupon_durum' => 1
	));
if ($kontrol) {
	header("Location: ../kupon.php?islem=ok");
}else{
	header("Location: ../kupon.php?islem=no");
}
}

if (isset($_GET['kuponsil'])=="ok") {

  
  $kuponkayit = $db->prepare("DELETE FROM kuponkayit
       
         where kupon_id = {$_GET['kupon_id']}  
  ");
$islem = $kuponkayit->execute();
if ($islem) {
 $kupon = $db->prepare("DELETE FROM kupon
       
         where kupon_id = {$_GET['kupon_id']}  
  ");
$kupon->execute();


  header("Location:../kupon.php?islem=ok");
}
}

if (isset($_POST['eklenti-guncelle'])) {

	$eklenti = $db->prepare("UPDATE eklenti set 
           eklenti_kod=:eklenti_kod,
            eklenti_durum=:eklenti_durum
            where eklenti_id = {$_POST['eklenti_id']}

		");
	$kontrol = $eklenti->execute(array(
          'eklenti_kod' => $_POST['eklenti_kod'],
          'eklenti_durum' => htmlspecialchars($_POST['eklenti_durum'])
	));
if ($kontrol) {
	header("Location: ../eklenti.php?islem=ok");
}else{
	header("Location: ../eklenti.php?islem=no");
}
}

if (isset($_POST['site-ozellestir'])) {

	$site = $db->prepare("UPDATE siteozellestir set 
           site_renk=:site_renk,
            site_arkarenk=:site_arkarenk,
            site_arkarenkresim=:site_arkarenkresim,
            site_sidebarrenk=:site_sidebarrenk,
            site_yazirenk=:site_yazirenk
            where site_id = 0

		");
	$kontrol = $site->execute(array(
          'site_renk' => $_POST['site_renk'],
          'site_arkarenk' => $_POST['site_arkarenk'],
          'site_arkarenkresim' => $_POST['site_arkarenkresim'],
          'site_sidebarrenk' => $_POST['site_sidebarrenk'],
          'site_yazirenk' => $_POST['site_yazirenk']
	));
if ($kontrol) {
	header("Location: ../site-ozellestir.php?islem=ok");
}else{
	header("Location: ../site-ozellestir.php?islem=no");
}
}





 ?>