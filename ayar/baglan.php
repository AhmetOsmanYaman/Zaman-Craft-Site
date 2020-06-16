<?php 

try {
	$db = new PDO("mysql:host=localhost;dbname=veritabanıadı;charset=utf8","veritabanı_kullaniciadi","veritabanışifresi");
	
} catch (Exception $e) {
	echo $e->getmessage();
}


 ?>