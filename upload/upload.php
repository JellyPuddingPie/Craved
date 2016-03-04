<?php
session_start();
$username = "bjorngv155";
$password = "7gc7e3qn";
$dbh = new PDO('mysql:host=46.21.173.249;dbname=bjorngv155_Craved', $username, $password);
$stmt = $dbh->prepare('SELECT media_id FROM fotos ORDER BY media_id DESC LIMIT 1');
$stmt->execute();
$row = $stmt->fetch();
$id = $row['media_id'] + 1;
$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$ext = strtolower(substr($target_file, strrpos($target_file, '.') + 1));
$target_name = $id .'.'. $ext;
$target_file = $target_dir . $id .'.'. $ext;
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["upload"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

if(isset($_POST['etenstype'])){
		 $etenstype = $_POST['etenstype'];
	 }else{
		 echo "geen etenstype";
		 $uploadOk = 0;
	 }
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
	$city = $_POST["city"];
	$site = $_POST["site"];
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		
		
		$stmt1 = $dbh->prepare("SELECT restaurant_id, naam FROM restaurants WHERE naam=?");
		$stmt1->bindParam(1,$_POST["restname"]);
		$stmt1->execute();
		$row = $stmt1->fetch();
		$row_count = $stmt1->rowCount();
		
		$session_user_id = 1;
		
		$prijs = $_POST["prijs"];
		
		if($row_count > 0){
			//restaurant ID uithalen
			$rest_id = $row['restaurant_id'];
			
			//nieuwe foto in DB toevoegen
			$stmt = $dbh->prepare("INSERT INTO fotos (media_extensie, media_prijsklasse, user_id, restaurant_id)  VALUES (?,?,?,?)");
			$stmt->bindParam(1,$ext);
			$stmt->bindParam(2, $prijs);
			$stmt->bindParam(3,$session_user_id);
			$stmt->bindParam(4,$rest_id);
			$stmt->execute();
			
			//etenstypes per foto in DB toevoegen
			foreach ($etenstype as $etenstypes=>$value)
				{
					$stmt2 = $dbh->prepare("INSERT INTO etenstype_media (media_id, type_id)  VALUES (?,?)");
					$stmt2->bindParam(1,$id);
					$stmt2->bindParam(2,$value);
					$stmt2->execute();
				}
			
		}else{
			//nieuwe ID voor restaurant vinden
			$stmt3 = $dbh->prepare('SELECT restaurant_id FROM restaurants ORDER BY restaurant_id DESC LIMIT 1');
			$stmt3->execute();
			$row = $stmt3->fetch();
			$rest_id = $row['restaurant_id'] + 1;
			
			//nieuw restaurant in DB toevoegen
			$stmt4 = $dbh->prepare("INSERT INTO restaurants (naam, straat, huisnr, plaats, website)  VALUES (?,?,?,?,?)");
			$stmt4->bindParam(1,$_POST["restname"]);
			$stmt4->bindParam(2,$_POST["address"]);
			$stmt4->bindParam(3,$_POST["nr"]);
			$stmt4->bindParam(4,$city);
			$stmt4->bindParam(5,$site);
			$stmt4->execute();
			
			//nieuwe foto in DB toevoegen
			$stmt = $dbh->prepare("INSERT INTO fotos (media_extensie, media_prijsklasse, user_id, restaurant_id)  VALUES (?,?,?,?)");
			$stmt->bindParam(1,$ext);
			$stmt->bindParam(2, $prijs);
			$stmt->bindParam(3,$session_user_id);
			$stmt->bindParam(4,$rest_id);
			$stmt->execute();
			//etenstypes per foto in DB toevoegen
			
			foreach ($etenstype as $etenstypes=>$value)
				{
					$stmt = $dbh->prepare("INSERT INTO etenstype_media (media_id, type_id)  VALUES (?,?)");
					$stmt->bindParam(1,$id);
					$stmt->bindParam(2,$value);
					$stmt->execute();
				}
				
		}
		
		$dbh=null;
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		header('Location: ../cravedApp.php');
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>