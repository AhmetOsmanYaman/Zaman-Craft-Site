<?php 

require_once 'header.php';
if (!$kullanici) { 
 header("Location:index.php?giris=no"); 
 }?>



 
    <div class="container mt-5 mb-5 ">
    
    <div class="row">
   <div class="col-md-8 text-<?= $sitecek['site_yazirenk'] ?>">
     <?php if ($_GET['odeme']=="no") {?>
                <div class=" alert bg-success  alert-dismissible fade show">Hata! İşlem Başarısız.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div> <?php }

if ($_POST) {
if (isset($_POST['odemeyontemi'])) {
  
if ($_POST['odeme']=="banka") {?>
    <div class="card">
              <div class="card-header" style="background:<?= $sitecek['site_renk'] ?>">
                Kredi Yükle
              </div>
              <div class="card-body" style="background:<?= $sitecek['site_sidebarrenk'] ?>">
                <form id="creditChargeForm" action="kredi/payment.php" method="post">
                  <div class="form-group row">
                    <label for="inputPrice" class="col-sm-3 col-form-label">Miktar</label>
                    <div class="col-sm-9">
                      <div  class="input-group">
                        <input style="background:<?= $sitecek['site_sidebarrenk'] ?>" type="number" id="inputPrice" class="form-control" name="kredi" placeholder="Yüklenecek Miktar" aria-label="Yüklenecek Miktar" aria-describedby="ariaPrice" min="1" max="500">
                       
                      </div>
                    </div>
                  </div>
                    <div class="clearfix">
                    <div class="float-right">
                        
        
<input type="hidden" value="<?php echo $kullanici["kullanici_username"] ?>" name="kullanici_username">
    <input type="hidden" value="<?php echo $kullanici["kullanici_mail"] ?>" name="kullanici_mail">
    <input type="hidden" value="<?php echo $kullanici["kullanici_id"] ?>" name="kullanici_id">
    <input type="hidden" value="" name="kullanici_tel">
    <input type="hidden" value="turkiye" name="kullanici_adres">
<input type="hidden" value="turkiye" name="kullanici_country">
<input type="hidden" value="istanbul" name="kullanici_city">
<input type="hidden" value="34000" name="kullanici_postakod">

                      <button type="submit" class="btn btn-rounded btn-success" name="chargeCredit">Kredi Yükle</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
<?php }


if ($_POST['odeme']=="ininal") {
$odesor = $db->prepare("SELECT * FROM odeme_yontemi WHERE odeme_id=1");
$odesor->execute();
$odecek=$odesor->fetch(PDO::FETCH_ASSOC);

  ?>
    <div class="card" style="background:<?= $sitecek['site_sidebarrenk'] ?>">
              <div class="card-header " style="background:<?= $sitecek['site_renk'] ?>">
                Kredi Yükle
              </div>
              <div class="card-body">
                <form id="creditChargeForm" action="kredi/payment.php" method="post">
                  <div class="form-group row">
                    <div class="col-sm-9">
                     
                    </div>
                  </div>
                    <div class="clearfix">
                    <div class="float-right">
                        
     
1- Ininal Cep Uygulamasına Giriş Yapın <br>  
2- Alt Kısımda Bulunan "İşlemler" simgesine tıklayın<br> 
3- Açılan sayfada "Para Gönder" simgesine tıklayın<br> 
4- Gelen bölümde "Alıcı Kart Barkodu" yazısına tıklayın<br> 
5- Alt tarafta Bulunan "Barkod numarasını kendim girmek istiyorum" yazısına tıklayın<br> 
6- Barkod numarası bölmesine "<b class="text-warning"><?=$odecek['ininal_barkod']?></b>" numarasını yazıp devam et seçeneğine tıklayın<br> 
7- Açıklamaya oyun içi kullanıcı adınızı yazın (Örnek:Alpha)<br> 
8- Devam et tuşuna basıp "Onaylıyorum" tuşuna basın işlem tamamlanmış olacaktır<br> 
9- Son olarak ticket talebi açın veya canlı destek den kullanıcı adınız ve gönderdiğiniz fiyatı Bildirin<br><br> <br>  

                     <a href="destek-olustur.php"> <button  class="btn btn-rounded btn-success">Ödemeyi Tamamladım Destek Talebi Oluştur</a></button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
<?php }
}






  ?>

                        </div>
        
    <?php 
     require_once 'sidebar.php';
  
    

    
}
 ?>



