<?php
    require_once("../ayar/baglan.php");
    require_once("functions.php");
ob_start();
session_start();

   $odemeyontem = $db->prepare("SELECT * FROM odeme_yontemi where odeme_id=:id");
 $odemeyontem->execute(array(
   'id' =>2
 ));
 $odecek=$odemeyontem->fetch(PDO::FETCH_ASSOC);
$kullaniciapi=$odecek['odeme_kullaniciapi'];
$sifreapi=$odecek['odeme_sifreapi'];






    if(isset($_POST["kullanici_username"]) && isset($_POST["kullanici_username"])  && isset($_POST["kullanici_mail"]) && isset($_POST["kullanici_tel"]) && isset($_POST["kullanici_adres"]) && isset($_POST["kullanici_country"]) && isset($_POST["kullanici_city"]) && isset($_POST["kullanici_postakod"])  && isset($_POST["kullanici_id"]) && isset($_POST["kredi"])) {
        require_once("api.php");
        $shopier = new Shopier($kullaniciapi, $sifreapi);
$kredi = post("kredi");

        // ÖDEME YAPAN KİŞİNİN BİLGİLERİ
        $shopier->setBuyer([
            'id' => $_POST['kullanici_id'],
            'first_name' => post("kullanici_username"),
            'last_name' => post("kullanici_username"),
            'email' => post("kullanici_mail"),
            'phone' => post("kullanici_tel")
        ]);
        // VERİLEN SİPARİŞİN FATURASI
        $shopier->setOrderBilling([
            'billing_address'   => post("kullanici_adres"),
            'billing_city'      => post("kullanici_city"),
            'billing_country'   => post("kullanici_country"),
            'billing_postcode'  => post("kullanici_postakod")
        ]);
        // SİPARİŞİ VEREN KİŞİ - ÜSTTEKİ İLE AYNI BİLGİLERİ GİREBİLİRSİNİZ.
        $shopier->setOrderShipping([
            'shipping_address'  => post("kullanici_adres"),
            'shipping_city'     => post("kullanici_city"),
            'shipping_country'  => post("kullanici_country"),
            'shipping_postcode' => post("kullanici_postakod")
        ]);

        $insertOrder = $db->prepare("INSERT INTO odeme set
             kullanici_username=:kullanici_username,
             kullanici_mail=:kullanici_mail,
             kullanici_tel=:kullanici_tel,
             kullanici_adres=:kullanici_adres,
             kullanici_country=:kullanici_country,
             kullanici_city=:kullanici_city,
             kullanici_postakod=:kullanici_postakod,
             kredi=:kredi,
             kullanici_id=:kullanici_id,
             odeme_odemeturu=:odeme_odemeturu
             ");
        $insertOrder->execute(array(
                'kullanici_username'=>$_POST['kullanici_username'],        
                'kullanici_mail'=>$_POST['kullanici_mail'], 
                'kullanici_tel'=>$_POST['kullanici_tel'], 
                'kullanici_adres'=>$_POST['kullanici_adres'], 
                'kullanici_country'=>$_POST['kullanici_country'], 
                'kullanici_city'=>$_POST['kullanici_city'], 
                 'kullanici_postakod'=>$_POST['kullanici_postakod'], 
                'kredi'=>$kredi, 
                'kullanici_id'=>$_POST['kullanici_id'],
                'odeme_odemeturu' => "Kredi Kartı"
            
       
        ));
        $orderID = $db->lastInsertId();
       $site = $_SERVER['HTTP_HOST'];
        die($shopier->run($orderID, $kredi, '$site/kredi/callback.php'));
    }
    else {
        go("/");
    }
