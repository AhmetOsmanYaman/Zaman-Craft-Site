<?php

ob_start();
session_start();
    require_once("../ayar/baglan.php");
    require_once("functions.php");

   $odemeyontem = $db->prepare("SELECT * FROM odeme_yontemi where odeme_id=:id");
 $odemeyontem->execute(array(
   'id' =>0
 ));
 $odecekk=$odemeyontem->fetch(PDO::FETCH_ASSOC);
$kullaniciapi=$odecekk['odeme_kullaniciapi'];



    if (isset($_POST["platform_order_id"]) && isset($_POST["status"]) && isset($_POST["installment"]) && isset($_POST["payment_id"]) && isset($_POST["random_nr"]) && isset($_POST["signature"])) {
        $signature  = base64_decode(post("signature"));

        $data       = post("random_nr").post("platform_order_id").post("total_order_value").post("currency");
        $expected   = hash_hmac('SHA256', $data, $kullaniciapi, true);

             if (post("status") == 'success') {
                $checkOrder = $db->prepare("SELECT odeme_id, durum FROM odeme WHERE odeme_id = ?");
                $checkOrder->execute(array((int)post("platform_order_id")));
                $orderRead = $checkOrder->fetch();

                if ($checkOrder->rowCount() > 0 && $orderRead["durum"] == 0) {
                   $updateOrder = $db->prepare("UPDATE odeme SET shopier_order_id = ?, durum = ? WHERE id = ?");
                  $updateOrder->execute(array((int)post("payment_id"), 1, $orderRead["odeme_id"]));
                 
        $odemesor = $db->prepare("SELECT * FROM odeme where odeme_id=:id");
                                           $odemesor->execute(array(
 
                                     'id' => $_POST["platform_order_id"]
                                   ));
                              $odemecek=$odemesor->fetch(PDO::FETCH_ASSOC);
                          
                           $sipdurum = $db->prepare("UPDATE odeme set
                                durum=:durum

                             where kullanici_id=:id");
                                           $sipdurum->execute(array(
                              'durum'=> 1,
                                    
                                     'id' => $odemecek['kullanici_id']
                                   ));
                            
                            

                            $kulsor = $db->prepare("SELECT * FROM kullanici where kullanici_id=:id");
                                           $kulsor->execute(array(
 
                                     'id' => $odemecek['kullanici_id']
                                   ));
                              $kulcek=$kulsor->fetch(PDO::FETCH_ASSOC);
                              
                                  
                              
                             $krediislem = $db->prepare("UPDATE kullanici set
                                kullanici_kredi=:kullanici_kredi
                             where kullanici_id=:id");
                                           $krediislem->execute(array(
                                    'kullanici_kredi'=>$kulcek['kullanici_kredi']+$odemecek['kredi'],
                                     'id' => $odemecek['kullanici_id']
                                   ));
                            
                  
                }
         

            
               go("../profil.php?odeme=ok");
                echo "sa";
            }
            else {
               
               go("../kredi-yukle.php?odeme=no");
            }
        
    }
    else {
        go("../kredi-yukle.php?odeme=no");
        
       // go("error.php"); 
    }