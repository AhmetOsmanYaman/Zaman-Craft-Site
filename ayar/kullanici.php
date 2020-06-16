<?php
  session_start();
ob_start();
require_once 'Rcon.php';
     require_once("WebsenderAPI.php");
require_once 'baglan.php';
require_once 'fonksiyon.php';
$kullanici = $_SESSION['oturum'];
error_reporting(E_ALL);
ini_set("display_errors", 1);
  date_default_timezone_set('Europe/Istanbul');


//rcon bağlantısı

$sunucu = $db->prepare("SELECT * FROM sunucu");
$sunucu->execute();

$sunucucek = $sunucu->fetch(PDO::FETCH_ASSOC);




$host = $sunucucek['sunucu_adres']; // Server host name or IP
$rconport = $sunucucek['sunucu_port'];                      // Port rcon is listening on
$rconsifre =  $sunucucek['sunucu_rconsifre'];   // rcon.password setting set in server.properties
$timeout = 3;                       // How long to timeout.

use Thedudeguy\Rcon;

$rcon = new Rcon($host, $rconport, $rconsifre, $timeout);

$websendport = $sunucucek['sunucu_websendport'];                      // Port rcon is listening on
$websendsifre =  $sunucucek['sunucu_websendsifre'];
  $wsr = new WebsenderAPI("$host","$websendsifre","$websendport"); // HOST , PASSWORD , PORT

//bitis


if (isset($_POST['kayit-ol'])) {
 $kullanici_username = strtolower(htmlspecialchars($_POST['kullanici_username']));

  $kullanici_mail = strtolower(htmlspecialchars($_POST['kullanici_mail']));
  $password1 = htmlspecialchars(trim($_POST['password1']));
  $password2 = htmlspecialchars(trim($_POST['password2']));


if ($password1!=$password2) {
  $error = true;
 header("Location: ../kayit.php?durum=sifreuyusmuyor");
 exit();
}
if (strlen($password1)<6) {
  $error = true;
  header("Location: ../kayit.php?durum=sifrekisa");
 exit();
}
 $kullanicisor = $db->prepare("SELECT * FROM kullanici where kullanici_username=:kullanici_username or kullanici_mail=:mail");
 $kullanicisor->execute(array(
        'kullanici_username' =>  $kullanici_username,
        'mail' =>  $kullanici_mail 
 ));
  $kullanicisay = $kullanicisor->rowCount();
 if ($kullanicisay == 1) {
  $error = true;
  header("Location: ../kayit.php?durum=uyemevcut");
 exit();
}
if ($_POST and !$error) {
    $password=md5($password1);
 
$kul = $db->prepare("INSERT INTO kullanici set 
       kullanici_username=:kullanici_username,
       kullanici_password=:kullanici_password,
       kullanici_mail=:kullanici_mail,
      kullanici_guvenlikkod=:kullanici_guvenlikkod
 ");
$kayit = $kul->execute(array(
     'kullanici_mail' => $kullanici_mail,
     'kullanici_username' => $kullanici_username,
     'kullanici_password' => $password,
     'kullanici_guvenlikkod' => htmlspecialchars($_POST['kullanici_guvenlikkod'])


));
if ($kayit) {
  header("Location: ../kayit.php?durum=ok");
}else{
  header("Location: ../kayit.php?durum=no");
}










}


}



















if (isset($_POST['giris-yap'])) {

 $kullanicisor = $db->prepare("SELECT * FROM kullanici where kullanici_username=:kullanici_username and kullanici_password=:kullanici_password");
 $kullanicisor->execute(array(
        'kullanici_username' => strtolower(htmlspecialchars($_POST['kullanici_username'])),
        'kullanici_password' => htmlspecialchars(md5($_POST['kullanici_password'])) 
 ));
  $kullanicisay = $kullanicisor->rowCount();
  $kullanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC);
 if ($kullanicisay == 1) {

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



if (isset($_POST['profil-guncelle'])) {

 $kullanicisor = $db->prepare("SELECT * FROM kullanici where kullanici_username=:kullanici_username and kullanici_password=:kullanici_password");
 $kullanicisor->execute(array(
        'kullanici_username' =>  strtolower(htmlspecialchars($_POST['kullanici_username'])),
        'kullanici_password' => htmlspecialchars(md5($_POST['kullanici_password'])) 
 ));
   $kullanicisay = $kullanicisor->rowCount();
   if ($kullanicisay == 1) {
   
  $profil = $db->prepare("UPDATE kullanici set 
         kullanici_mail=:kullanici_mail,
         kullanici_skype=:kullanici_skype,
         kullanici_discord=:kullanici_discord

         where kullanici_id= {$kullanici['kullanici_id']}  
 
    ");
$islem = $profil->execute(array(
           'kullanici_mail' => htmlspecialchars($_POST['kullanici_mail']),
           'kullanici_skype' => htmlspecialchars($_POST['kullanici_skype']),
           'kullanici_discord' => htmlspecialchars($_POST['kullanici_discord'])
  ));
if ($islem) {

  header("Location:  ../profil-duzenle.php?durum=ok");
}



   }else{
    header("Location: ../profil-duzenle.php?durum=error");
   }
}

if (isset($_POST['profil-sifreguncelle'])) {
   $mevcut_password = htmlspecialchars($_POST['kullanici_password']);
    $password1 = htmlspecialchars($_POST['password1']);
    $password2 = htmlspecialchars($_POST['password2']);

    if ($password1!=$password2) {
   header("Location: ../sifre-degis.php?durum=sifreuyusmuyor");
   exit();
    }
     if (strlen($password1)<6) {
      header("Location: ../sifre-degis.php?durum=sifrekisa");
      exit();
    }
        if ($password1==$mevcut_password) {
      header("Location: ../sifre-degis.php?durum=hata");
      exit();
    }

 $kullanicisor = $db->prepare("SELECT * FROM kullanici where kullanici_username=:kullanici_username and kullanici_password=:kullanici_password");
 $kullanicisor->execute(array(
        'kullanici_username' => strtolower(htmlspecialchars($_POST['kullanici_username'])),
        'kullanici_password' => md5($mevcut_password) 
 ));
   $kullanicisay = $kullanicisor->rowCount();
   if ($kullanicisay == 1) {

   
  $profil = $db->prepare("UPDATE kullanici set 
         kullanici_password=:kullanici_password
         where kullanici_id= {$kullanici['kullanici_id']}  
 
    ");
  $password = md5($password1);
$islem = $profil->execute(array(
           'kullanici_password' => $password

  ));
if ($islem) {

  header("Location: ../sifre-degis.php?durum=ok");
}



   }else{
    header("Location: ../sifre-degis.php?durum=error");
   }
}



if (isset($_POST['yorumkaydet'])) {
 $duyuru_baslik = htmlspecialchars($_POST['duyuru_baslik']);

  $duyuru_id = htmlspecialchars($_POST['duyuru_id']);
  $yorum = $db->prepare("INSERT INTO yorum set 
         duyuru_id=:duyuru_id,
         kullanici_id=:kullanici_id,
         yorum_detay=:yorum_detay
    ");
 $islem = $yorum->execute(array(
        'duyuru_id' =>htmlspecialchars($_POST['duyuru_id']),
        'kullanici_id' => htmlspecialchars($kullanici['kullanici_id']),
        'yorum_detay' => htmlspecialchars($_POST['yorum_detay'])
  ));
  if ($islem) {
   header("Location: ../duyuru-$duyuru_baslik-$duyuru_id?yorum=ok");
  }
}

if (isset($_POST['kredi-gonder'])) {

 $miktar = $_POST['miktar'];
 if ($miktar>0) {




 $kullanicikredisi = $db->prepare("SELECT * FROM kullanici where kullanici_username=:kullanici_username");
 $kullanicikredisi->execute(array(
      'kullanici_username' => strtolower(htmlspecialchars($_POST['kullanici_username'])),
 ));
 $kullanicikredisicek = $kullanicikredisi->fetch(PDO::FETCH_ASSOC);
 $kredisi = $kullanicikredisicek['kullanici_kredi'];




 $gonderen = $kullanici['kullanici_username'];
 $alan = strtolower(htmlspecialchars($_POST['kullanici_username']));
if ($gonderen==$alan) {
  $error=true;
     header("Location: ../kredi-gonder.php?durum=hata");
 }
$kullsorr = $db->prepare("SELECT * FROM kullanici where kullanici_id=:kullanici_id");
 $kullsorr->execute(array(
      'kullanici_id' => $kullanici['kullanici_id']
 ));
 $kullanicicek = $kullsorr->fetch(PDO::FETCH_ASSOC);

 $kredim = $kullanicicek['kullanici_kredi'];

 

$alanyenibakiye= $kredisi+$miktar;
$gonderenyenibakiye= $kredim-$miktar;
$kullanici_id = $kullanici['kullanici_id'];

 
 if ($kredim<$miktar) {
   $error=true;
    header("Location: ../kredi-gonder.php?durum=bakiyeyetersiz");
 }
 $kullanici = $db->prepare("SELECT * FROM kullanici where kullanici_username=:alan");
 $kullanici->execute(array(
      'alan' => $alan
 ));
 $kullanicisor = $kullanici->rowCount();
  if ($kullanicisor==0) {
     $error=true;
    header("Location: ../kredi-gonder.php?durum=kullanicibulunamadı");
 } 


if (!$error && $_POST) {
 $gonderensor = $db->prepare("UPDATE kullanici set 
          kullanici_kredi=:kullanici_kredi
           where kullanici_id={$kullanici_id}
  ");
 $gonderislem = $gonderensor->execute(array(
      'kullanici_kredi' => $gonderenyenibakiye
 ));
 if ($gonderislem) {
$alansor = $db->prepare("UPDATE kullanici set 
        kullanici_kredi=:kullanici_kredi
        where kullanici_id = {$kullanicikredisicek['kullanici_id']}
  ");
 $alislem = $alansor->execute(array(
      'kullanici_kredi' => $alanyenibakiye
 ));
 if ($alislem) {
    header("Location: ../kredi-gonder.php?durum=ok");
 }else{
    header("Location: ../kredi-gonder.php?durum=error");
 }
 }else{
    header("Location: ../kredi-gonder.php?durum=error");
 }
 }

}else{
    header("Location: ../kredi-gonder.php?durum=error");
 }
}
if (isset($_POST['sipariskayit'])) {

$urun_baslik = seo(htmlspecialchars($_POST['urun_baslik']));
$urun_id = htmlspecialchars($_POST['urun_id']);
$urun_fiyat = htmlspecialchars($_POST['urun_fiyat']);
  $kullanici_id = $kullanici['kullanici_id'];

 $kulsor = $db->prepare("SELECT * FROM kullanici
           where kullanici_id=:id
  ");
 $kulsor->execute(array(
    'id' => $kullanici_id
 ));
 $kulcek = $kulsor->fetch(PDO::FETCH_ASSOC);

if ($kulcek['kullanici_kredi']<$urun_fiyat) {
   header("Location: ../urun-$urun_baslik-$urun_id?kredi=yetersiz");
 exit();
}





 $siparis= $db->prepare("INSERT INTO siparis set 
      kullanici_id=:kullanici_id,
      urun_id=:urun_id,
      urun_baslik=:urun_baslik,
      urun_fiyat=:urun_fiyat,
      siparis_sure=:siparis_sure
  
");
 $islem = $siparis->execute(array(
      'kullanici_id' => $kullanici['kullanici_id'],
      'urun_id' => $urun_id,
      'urun_baslik' => $urun_baslik,
      'urun_fiyat' => $urun_fiyat,
      'siparis_sure'=> $_POST['urun_sure']


 ));

if ($islem) {


 $oyuncukredi = $kulcek['kullanici_kredi'];
$urun_fiyat = htmlspecialchars($_POST['urun_fiyat']);
$kredi = ($oyuncukredi-$urun_fiyat);


$kullanici = $db->prepare("UPDATE kullanici set 
        kullanici_kredi=:kullanici_kredi
        where kullanici_id = {$kulcek['kullanici_id']}
  ");
 $islem = $kullanici->execute(array(
    'kullanici_kredi' => $kredi
 ));

 if ($islem) {
  header("Location: ../depo.php?siparis=basarılı");
 }

   
}else{
      header("Location: ../kredi-gonder.php?odeme=no");
}

}


if (isset($_POST['urunsure-baslat'])) {

$ceksiparissor= $db->prepare("SELECT * FROM siparis where kullanici_id=:kullanici_id and urun_id=:urun_id and  siparis_durum=:siparis_durum  order by siparis_id desc limit 5 ");
$ceksiparissor->execute(array(
       'kullanici_id' => $kullanici['kullanici_id'],
       'urun_id' => $_POST['urun_id'],
       'siparis_durum' => 0

));
$ceksiparis= $ceksiparissor->fetch(PDO::FETCH_ASSOC);




     $kod = $_POST['urun_komut'];
       $nick = $kullanici['kullanici_username'];
       $urun = $_POST['urun_baslangickod'];
   
if($wsr->connect()){ //Open Connect
 $wsr->sendCommand("$kod $nick $urun");
  
  }

if ($rcon->connect())
{
   $rcon->sendCommand("$kod $nick $urun");

}


 $zaman = $_POST['urun_sure'];



 $simdikizaman=  date("y-m-d H:i:s"); 
$yenizaman = strtotime("$zaman day",strtotime($simdikizaman));
  $yenizaman = date('y-m-d H:i:s'
,$yenizaman ); 


 $siparisislem= $db->prepare("INSERT INTO siparis_islem set 

       urun_id=:urun_id,
       siparis_id=:siparis_id,
        kullanici_id=:kullanici_id,
         siparisislem_kayitzaman=:siparisislem_kayitzaman,
        siparisislem_bitiszaman=:siparisislem_bitiszaman

  
");
$kayit = $siparisislem->execute(array(
       'siparis_id' => $ceksiparis['siparis_id'],
      'kullanici_id' => $kullanici['kullanici_id'],
      'urun_id' => $_POST['urun_id'],
      'siparisislem_kayitzaman' => $simdikizaman,
      'siparisislem_bitiszaman' => $yenizaman



 ));
if ($kayit) {

  $siparis = $db->prepare("UPDATE siparis set 
        siparis_kayit=:siparis_kayit,
        siparis_bitis=:siparis_bitis,
        siparis_durum=:siparis_durum
        where siparis_id = {$_POST['siparis_id']}
  ");
 $islem = $siparis->execute(array(
    'siparis_kayit' => $simdikizaman,
    'siparis_bitis' =>  $yenizaman,
    'siparis_durum' => 1
 ));

if ($islem) {
  header("Location: ../depo.php");
}

}

}

if (isset($_POST['kupon'])) {

$kupon = $db->prepare("SELECT * FROM kupon where kupon_ad=:kupon_ad");
$kupon->execute(array(
      'kupon_ad' => strtolower(htmlspecialchars($_POST['kupon_ad']))
));
$kuponcek = $kupon->fetch(PDO::FETCH_ASSOC);
$kupon_id = $kuponcek['kupon_id'];
if ($kupon->rowCount()==0) {
header("Location: ../kupon.php?kupon=no");
 exit();
}
$kuponkayit = $db->prepare("SELECT * FROM kuponkayit where kupon_id=:kupon_id and kullanici_id=:kullanici_id");
$kuponkayit->execute(array(
      'kupon_id' => $kuponcek['kupon_id'],
       'kullanici_id' => $kullanici['kullanici_id']
));
if ($kuponkayit->rowCount()>0) {
header("Location: ../kupon.php?kupon=hakkinizyok");
 exit();
}


if ($kuponcek['kupon_miktar']==0) {
$kuponguncel = $db->prepare("UPDATE kupon set 
  kupon_durum=:kupon_durum
  where kupon_id = $kupon_id");
$kuponguncel->execute(array(
      'kupon_durum' => 0
));

 header("Location: ../kupon.php?kupon=no");
 exit();
}


if ($kuponcek['kupon_durum']==0) {
header("Location: ../kupon.php?kupon=no");
 exit();
}








if ($kupon->rowCount()>0 && $kuponcek['kupon_durum']==1 ) {
  $kuponkayit = $db->prepare("INSERT INTO kuponkayit set 

         kupon_id=:kupon_id,
         kullanici_id=:kullanici_id
    ");
 $islem = $kuponkayit->execute(array(
        'kupon_id' =>$kupon_id,
        'kullanici_id' => $kullanici['kullanici_id']
  ));
  if ($islem) {

$kuponguncel = $db->prepare("UPDATE kupon set 
  kupon_miktar=:kupon_miktar
  where kupon_id = {$kupon_id}");
$kuponguncel->execute(array(
      'kupon_miktar' => $kuponcek['kupon_miktar']-1
));


     $kod = $kuponcek['kupon_komut'];
      $miktar = $kuponcek['kupon_komutmiktar'];
       $nick = $kullanici['kullanici_username'];
   
if($wsr->connect()){ //Open Connect
 $wsr->sendCommand("$kod $nick  $miktar ");
  
  }

if ($rcon->connect())
{
   $rcon->sendCommand("$kod $nick  $miktar");

}




   header("Location: ../kupon?kupon=ok");
  }
}

}

 