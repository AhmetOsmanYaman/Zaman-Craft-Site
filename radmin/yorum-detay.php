<?php require_once 'header.php'; 
      require_once 'sidebar.php';

$yorumsor = $db->prepare("SELECT yorum.*,kullanici.*,duyuru.* FROM yorum 
	INNER JOIN duyuru ON duyuru.duyuru_id=yorum.duyuru_id INNER JOIN kullanici ON kullanici.kullanici_id=yorum.kullanici_id where yorum.yorum_id=:id");
$yorumsor->execute(array(
     'id' => $_GET['yorum_id']
));
$yorumcek = $yorumsor->fetch(PDO::FETCH_ASSOC)





?>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
     

             <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"><?= $yorumcek['kullanici_username'] ?> adlı oyuncunun yorum detayları</h6>
                </div>
                <div class="card-body"><form method="post" action="ayar/islem.php" >

	     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Duyuru Başlık</label>
                      <div class="col-sm-9">
                        <input type="text" disabled="" class="form-control" value="<?= $yorumcek['duyuru_baslik'] ?>" >
                      </div>
                    </div>
                		     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Yorum Zaman</label>
                      <div class="col-sm-9">
                        <input type="text" disabled="" class="form-control" value="<?= $yorumcek['yorum_zaman'] ?>" >
                      </div>
                    </div>
                     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Yorum Detay*</label>
                      <div class="col-sm-9">
                             <textarea  disabled="" class="form-control"  ><?= $yorumcek['yorum_detay'] ?></textarea>
                      </div>
                    </div>

   <div class="form-group row text-right">
                      <div class="col-sm-10">
                      	<form method="post" action="ayar/islem.php">
                      		<input type="hidden" name="yorum_id" value="<?= $yorumcek['yorum_id'] ?>">
                      <button  type="submit" name="yorum-onay" class="btn btn-success">Onayla</button>
                       </form>
                        	<form method="post" action="ayar/islem.php">
                      		<input type="hidden" name="yorum_id" value="<?= $yorumcek['yorum_id'] ?>">
                      <button type="submit" name="yorum-sil" class="btn btn-danger">Sil</button>
                       </form>
                      </div>
                    </div>
                
                
                </div>
              </div>
          <!--Row-->

        
       
      <?php require_once 'footer.php';?>

 <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>