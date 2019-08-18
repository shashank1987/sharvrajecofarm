<?php
class DBController {
	// private $host = "localhost";
	// private $database = "sharvraj_sharvra";
	// private $user = "sharvraj_sharvra";
	// private $password = "#sharvRaj#12";

	private $host = "localhost";
	private $user = "root";
	private $database = "sharvraj";
	private $password = "";

	private $conn;

	function __construct() {
		$this->conn = $this->connectDB();
	}

	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}

	function escapeString($val) {
		$res = mysqli_escape_string($this->conn, $val);
		if(!empty($res))
			return $res;
	}

	function runQuery($query) {
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}
		if(!empty($resultset))
			return $resultset;
	}

	function numRows($query) {
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;
	}

	function getId() {
		$id = mysqli_insert_id($this->conn);
		return $id;
	}

	function Query($query) {
		$result = mysqli_query($this->conn,$query);
		return $result;
	}

	function divertMsg($path,$msg) {
		if (isset($msg) && !empty($msg)) {
			// return 1;
		echo"<script type='text/javascript'>
			alert('".$msg."');
			window.location='".$path."';
		</script>";
		}else{
			// return 0;
		echo"<script type='text/javascript'>
			window.location='".$path."';
		</script>";
		}
	}

	function image_upload($path,$img){
	    date_default_timezone_set("Asia/Kolkata");
	    $time=date("d-m-Y-hms");
	    $file_size =$img['size'];
	    $file_exists=array("png","jpg","JPG","jpeg","JPEG");

	    $file_parts =explode('.',$img['name']);
	    // $file_ext=strtolower(end($file_parts));

	    $upload_exists = end ($file_parts);
	    $uniq = uniqid();
	    $newname = "$time"."_".$uniq."_photo.".$upload_exists;
	    $location = $path.$newname;
	    if (move_uploaded_file($img["tmp_name"],$location)){
	      return $newname;
	    }else{
	      $errors='error';
	      return $errors;
	    }
	}

	function imgResize( $img, $source, $dest, $maxw, $maxh ) {
	    $jpg = $source.$img;

	    if( $jpg ) {
	        list( $width, $height  ) = getimagesize( $jpg ); //$type will return the type of the image
	        $source = imagecreatefromjpeg( $jpg );

	        if( $maxw >= $width && $maxh >= $height ) {
	            $ratio = 1;
	        }elseif( $width > $height ) {
	            $ratio = $maxw / $width;
	        }else {
	            $ratio = $maxh / $height;
	        }

	        $thumb_width = round( $width * $ratio ); //get the smaller value from cal # floor()
	        $thumb_height = round( $height * $ratio );

	        $thumb = imagecreatetruecolor( $thumb_width, $thumb_height );
	        imagecopyresampled( $thumb, $source, 0, 0, 0, 0, $thumb_width, $thumb_height, $width, $height );

	        // $path = $dest.$img."_thumb.jpg";
	        $path = $dest.$img;
	        imagejpeg( $thumb, $path, 90 );
	    }
	    imagedestroy( $thumb );
	    imagedestroy( $source );
	}
}

class Admin {
	function chkLogin($user,$pwd) {
		$query = "SELECT * FROM `sharvraj_admin` WHERE `admin_username`='$user' AND `admin_password`='$pwd' LIMIT 1";
		return $query;
	}

	function tempSess($uniq) {
		$query = "UPDATE `sharvraj_admin` SET `admin_temp_sess`='$uniq'";
		return $query;
	}

	function sessNull() {
		$query =  "UPDATE `sharvraj_admin` SET `admin_temp_sess`=''";
		return $query;
	}

	function chkPass($OP,$TS) {
		$query = "SELECT * FROM `sharvraj_admin` WHERE `admin_password`= '$OP' AND `admin_temp_sess`='$TS'";
		return $query;
	}

	function UpdatePassword($UN,$NP,$TS) {
		$query = "UPDATE `sharvraj_admin` SET `admin_username`='$UN',`admin_password`='$NP' WHERE `admin_temp_sess`='$TS'";
		return $query;
	}
}

class SQLQuerys {

	// Main Categeorgy
	function insertMainCategeorgy($main_cate,$main_cate_pic) {
		$query = "INSERT INTO `sharvraj_mian_category`(`m_id`, `m_category`, `m_category_price`) VALUES (NULL,'$main_cate','$main_cate_pic')";
		return $query;
	}

	function updateMainCategeorgy($M_id,$main_cate,$main_cate_pic) {
		$query = "UPDATE `sharvraj_mian_category` SET `m_category`='$main_cate',`m_category_price`='$main_cate_pic' WHERE `m_id`='$M_id'";
		return $query;
	}

	function getMainCategeorgy() {
		$query = "SELECT * FROM `sharvraj_mian_category`";
		return $query;
	}

	function getMainCateById($M_id) {
		$query = "SELECT * FROM `sharvraj_mian_category` WHERE `m_id`='$M_id'";
		return $query;
	}

	function deleteMainCategeorgy($M_del) {
		$query = "DELETE FROM `sharvraj_mian_category` WHERE `m_id`='$M_del'";
		return $query;
	}
	// End Main Categeorgy


	// Sub Categeorgy
	function insertSubCategeorgy($m_id,$s_cate) {
		$query = "INSERT INTO `sharvraj_sub_category`(`s_id`, `m_id`, `s_category`) VALUES (NULL,'$m_id','$s_cate')";
		return $query;
	}

	function updateSubCategeorgy($S_id,$m_id,$s_cate) {
		$query = "UPDATE `sharvraj_sub_category` SET `m_id` = '$m_id', `s_category` = '$s_cate' WHERE `s_id`='$S_id'";
		return $query;
	}

	function getSubCateData() {
		$query = "SELECT * FROM sharvraj_sub_category";
		return $query;
	}

	function getSubCateById($Sid) {
		$query = "SELECT * FROM `sharvraj_sub_category` WHERE `s_id`='$Sid'";
		return $query;
	}

	function getSubCateByMid($Mid) {
		$query = "SELECT * FROM `sharvraj_sub_category` WHERE `m_id`='$Mid'";
		return $query;
	}

	function deleteSubCategeorgy($S_del) {
		$query = "DELETE FROM `sharvraj_sub_category` WHERE `s_id`='$S_del'";
		return $query;
	}
	// End Sub Categeorgy


	// Gallery
	function insertGallery($img) {
		$query = "INSERT INTO `sharvraj_gallery`(`gallery_id`, `gallery_image`) VALUES (NULL,'$img')";
		return $query;
	}

	function galleryViewD() {
		$query = "SELECT * FROM `sharvraj_gallery` ORDER BY `gallery_id` DESC";
		return $query;
	}

	function deleteGallery($S_del) {
		$query = "DELETE FROM `sharvraj_gallery` WHERE `gallery_id`='$S_del'";
		return $query;
	}
	// End Gallery

	// Offer
	function insertoffer($N,$D,$E) {
		$query = "INSERT INTO `sharvraj_offer`(`offer_id`, `offer_name`, `offer_dis_amt`, `offer_ends`) VALUES (NULL,'$N','$D','$E')";
		return $query;
	}

	function getOffer() {
		$query = "SELECT * FROM `sharvraj_offer`";
		return $query;
	}

	function deleteOffer($fid) {
		$query = "DELETE FROM `sharvraj_offer` WHERE `offer_id`='$fid'";
		return $query;
	}
	// End Offer

	// Offer Package
	function insertofferpackage($fid,$Mid) {
		$query = "INSERT INTO `sharvraj_offer_package`(`offer_id`, `m_id`) VALUES ('$fid','$Mid')";
		return $query;
	}

	function getPrice($fid) {
		$query = "SELECT SUM(`m_category_price`) FROM `sharvraj_mian_category` WHERE `m_id` IN(SELECT `m_id` FROM `sharvraj_offer_package` WHERE `offer_id`='$fid')";
		return $query;
	}

	function getOfferPackageByMid($Mid) {
		$query = "SELECT * FROM `sharvraj_offer_package` WHERE `m_id`='$Mid'";
		return $query;
	}
	// End Offer Package

	// Joins
	function offerPackages($fid) {
		$query = "SELECT GROUP_CONCAT(sharvraj_mian_category.m_category SEPARATOR ' + '),GROUP_CONCAT(sharvraj_mian_category.m_category_price SEPARATOR ' + '),SUM(sharvraj_mian_category.`m_category_price`) FROM sharvraj_mian_category INNER JOIN sharvraj_offer_package ON sharvraj_offer_package.m_id = sharvraj_mian_category.m_id WHERE sharvraj_offer_package.offer_id = '$fid' GROUP BY 'all' ";
		return $query;
	}

	function MCByOfferPackages($fid) {
		$query = "SELECT * FROM `sharvraj_mian_category` WHERE `m_id` IN(SELECT `m_id` FROM `sharvraj_offer_package` WHERE `offer_id`='$fid')";
		return $query;
	}

}
?>
