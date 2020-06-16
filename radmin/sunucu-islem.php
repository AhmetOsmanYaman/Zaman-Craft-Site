<?php require_once 'header.php'; 
      require_once 'sidebar.php';






?>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
     

        <?php if ($_GET['duzen']=="ok") {
$sunucuu = $db->prepare("SELECT * FROM sunucu where sunucu_id=:id");
$sunucuu->execute(array(
     'id' => $_GET['sunucu_id']
));

$sunucucekk = $sunucuu->fetch(PDO::FETCH_ASSOC);




          ?>
             <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Sunucu Düzenleme</h6>
                </div>
                <div class="card-body">
                  <form method="post" action="ayar/islem.php">
                         <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Sunucu Ad*</label>
                      <div class="col-sm-9">
                        <input type="text" required="" class="form-control" name="sunucu_ad" value="<?= $sunucucekk['sunucu_ad'] ?>" >
                      </div>
                    </div>
                     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Sunucu Adres*</label>
                      <div class="col-sm-9">
                        <input type="text" required="" class="form-control"name="sunucu_adres" value="<?= $sunucucekk['sunucu_adres'] ?>" >
                      </div>
                    </div>
                   
                     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Sunucu Port*</label>
                      <div class="col-sm-9">
                        <input type="text" required="" class="form-control" name="sunucu_port" value="<?= $sunucucekk['sunucu_port'] ?>" >
                      </div>
                    </div>
                      <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Sunucu Sürüm*</label>
                      <div class="col-sm-9">
                        <input type="text" required="" class="form-control" name="sunucu_surum" value="<?= $sunucucekk['sunucu_surum'] ?>" >
                      </div>
                    </div>
               

                   
                      <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Komut Türü*</label>
                      <div class="col-sm-9">
                          <select class="form-control" required="" name="sunucu_baglan" id="baglan">
                           
                   <option <?php  if(!$sunucucekk['sunucu_rconsifre']){ echo "selected";} ?> value="sunucu_websend">Websend / Minecraft</option>
                    <option <?php  if($sunucucekk['sunucu_rconsifre']){ echo "selected";} ?> value="sunucu_rcon">Rcon / Minecraft PE</option>
                        </select>
                      </div>
                    </div>

             <div class="form-group row" id="rcon">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Rcon Şifre*</label>
                      <div class="col-sm-9">
                        <input type="text"  name="sunucu_rconsifre" class="form-control"  placeholder="Rcon şifrenizi giriniz (MinecraftPE serverleri için çalışır)" value="<?= $sunucucekk['sunucu_rconsifre'] ?>" >
                      </div>
                    </div>
                    <div id="websend" >
                          <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Websend Şifre*</label>
                      <div class="col-sm-9">
                        <input type="text"  name="sunucu_websendsifre" class="form-control"  placeholder="Websend şifrenizi giriniz (Minecraft serverleri için çalışır)" value="<?= $sunucucekk['sunucu_websendsifre'] ?>" >
                      </div>
                    </div>
                      <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Websend Port*</label>
                      <div class="col-sm-9">
                        <input type="text"  name="sunucu_websendport" class="form-control" value="<?= $sunucucekk['sunucu_websendport'] ?>" placeholder="Websend portunuzu giriniz" >
                      </div>
                    </div></div>
   <input type="hidden" name="sunucu_id" value="<?= $_GET['sunucu_id'] ?>">
   <div class="form-group row text-right">
                      <div class="col-sm-10">
                        <button type="submit" name="sunucu-guncelle" class="btn btn-primary">Güncelle</button>
                      </div>
                    </div>
                  </form>
                
                </div>
              </div>
         <?php }  if ($_GET['ekle']=="ok") {?>
             <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Genel sunucular</h6>
                </div>
                <div class="card-body">
                  <form method="post" action="ayar/islem.php">
                         <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Sunucu Ad*</label>
                      <div class="col-sm-9">
                        <input type="text" required="" name="sunucu_ad" class="form-control" placeholder="Örn: RowadorTR" >
                      </div>
                    </div>
                     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Sunucu Adres*</label>
                      <div class="col-sm-9">
                        <input type="text" required="" name="sunucu_adres" class="form-control" placeholder="Örn: oyna.rowadortr.net" >
                      </div>
                    </div>
                   
                     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Sunucu Port*</label>
                      <div class="col-sm-9">
                        <input type="text" required="" name="sunucu_port" class="form-control"  placeholder="Örn: 19132" >
                      </div>
                    </div>
                         <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Sunucu Sürüm*</label>
                      <div class="col-sm-9">
                        <input type="text" required="" name="sunucu_surum" class="form-control"  placeholder="Örn: 1.9.4" >
                      </div>
                    </div>
               

                      <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Komut Türü*</label>
                      <div class="col-sm-9">
                          <select class="form-control" required="" id="baglan">
                         <option selected="" >Seçiniz</option>
 
                   <option value="sunucu_websend">Websend / Minecraft</option>
                    <option value="sunucu_rcon">Rcon / Minecraft PE</option>
                        </select>
                      </div>
                    </div>

             <div class="form-group row" id="rcon">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Rcon Şifre*</label>
                      <div class="col-sm-9">
                        <input type="text"  name="sunucu_rconsifre" class="form-control"  placeholder="Rcon şifrenizi giriniz (MinecraftPE serverleri için çalışır)" >
                      </div>
                    </div>
                    <div id="websend" >
                          <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Websend Şifre*</label>
                      <div class="col-sm-9">
                        <input type="text"  name="sunucu_websendsifre" class="form-control"  placeholder="Websend şifrenizi giriniz (Minecraft serverleri için çalışır)" >
                      </div>
                    </div>
                      <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Websend Port*</label>
                      <div class="col-sm-9">
                        <input type="text"  name="sunucu_websendport" class="form-control"  placeholder="Websend portunuzu giriniz" >
                      </div>
                    </div>
                  </div>

   <div class="form-group row text-right">
                      <div class="col-sm-10">
                        <button type="submit" name="sunucu-ekle" class="btn btn-primary">Kaydet</button>
                      </div>
                    </div>
                  </form>
                
                </div>
              </div>
         <?php } ?>
          <!--Row-->

        
       
      <?php require_once 'footer.php';?>

<script type="text/javascript">
    $(document).ready(function(){
   $("#rcon").hide();
     $("#websend").hide();
   $("#baglan").change(function(){
          
           var tur = $(this).val();
           if (tur =="sunucu_websend") {
              $("#rcon").hide();
              $("#websend").show();

           }
           else if (tur =="sunucu_rcon") {
            $("#rcon").show();
              $("#websend").hide();
            


           }


   }).change();



});

</script>