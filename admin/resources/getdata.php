<?php
// Connection To database
  require_once("../include/dbcontroller.php");
  $db_handle = new DBController();
  $sql_query = new SQLQuerys();
  $sql_admin = new Admin();

if (!isset($_SERVER['HTTP_REFERER'])){
	$db_handle->divertMsg("../index","");
   // echo "uh?";
}else {

	if (isset($_POST['username']) && isset($_POST['password'])) {

		$user	= $db_handle->escapeString($_POST['username']);
		$pwd	= $db_handle->escapeString(md5($_POST['password']));
		// check user information with database
		$logincount = $db_handle->numRows($sql_admin->chkLogin($user,$pwd));
		//if user exists, a row will be returned
		if ($logincount == 1) {
			$uniq = uniqid();
			$set = $db_handle->Query($sql_admin->tempSess($uniq));
		    //create sesstion id and session name
		    if ($set == 1) {
		    	session_start();
				$_SESSION['admin'] = $uniq;
				$db_handle->divertMsg("../index","");
		    }else{
		    	$db_handle->divertMsg("../login","Wrong Username or Password");
		    }
		} else {
			$db_handle->divertMsg("../login","Wrong Username or Password");
		}
	}

	if (!empty($_POST['M_id']) || isset($_POST['action']) && $_POST['action'] == 'insert_main_cate') {
		
		$main_cate = $db_handle->escapeString($_POST['main_cate']);
		$main_cate_pic = $db_handle->escapeString($_POST['main_cate_price']);
		
		if (isset($_POST['action']) && $_POST['action'] == 'insert_main_cate') {
			// print_r($main_cate);
			$insertMainCategeorgy = $db_handle->Query($sql_query->insertMainCategeorgy($main_cate,$main_cate_pic));
			print_r($insertMainCategeorgy);
		}
		if (!empty($_POST['M_id'])) {
			$M_id = $db_handle->escapeString($_POST['M_id']);
			$updateMainCategeorgy = $db_handle->Query($sql_query->updateMainCategeorgy($M_id,$main_cate,$main_cate_pic));
			print_r($updateMainCategeorgy);
		}
	}

	if (isset($_GET['MCateDel']) && !empty($_GET['MCateDel'])) {
		$del = $db_handle->escapeString($_GET['MCateDel']);
		$numRows = $db_handle->numRows($sql_query->getOfferPackageByMid($del));
		if ($numRows == 0) {
			$deleteMainCategeorgy = $db_handle->Query($sql_query->deleteMainCategeorgy($del));
			echo "1";
		}else{
			echo "0";
		}
	}

	if (!empty($_POST['S_id']) || isset($_POST['insert_sub_cate'])) {
		
		$m_id = $db_handle->escapeString($_POST['main_cate']);
		$s_cate = $db_handle->escapeString($_POST['sub_cate']);
			
		if (isset($_POST['insert_sub_cate'])) {
			$insertSubCat = $db_handle->Query($sql_query->insertSubCategeorgy($m_id,$s_cate));
			print($insertSubCat);
		}
		if (!empty($_POST['S_id'])) {
			$S_id = $db_handle->escapeString($_POST['S_id']);
			$updateSubCate = $db_handle->Query($sql_query->updateSubCategeorgy($S_id,$m_id,$s_cate));
			print_r($updateSubCate);
		}
	}

	if (isset($_GET['SCateDel']) && !empty($_GET['SCateDel'])) {
		$s_del = $db_handle->escapeString($_GET['SCateDel']);
		$deleteSubCategeorgy = $db_handle->Query($sql_query->deleteSubCategeorgy($s_del));
		$db_handle->divertMsg("../services","");
	}

	// Gallery Insert
	if (isset($_FILES['gallery']) && !empty($_FILES['gallery'])) {
		$target_path = "../../assets/img/gallery/"; //Declaring Path for uploaded images
	    for ($i = 0; $i < count($_FILES['gallery']['name']); $i++)
	     { 
	     	//loop to get individual element from the array
	    	date_default_timezone_set("Asia/Kolkata");
	    	$time=date("d-m-Y")."_".uniqid();
	        $validextensions = array("jpeg", "jpg", "JPG", "png"); //Extensions which are allowed
	        $ext = explode('.', basename($_FILES['gallery']['name'][$i])); //explode file name from dot(.) 
	        $file_extension = end($ext); //store extensions in the variable
	        $new_name = "$time"."_photo.".$ext[count($ext) - 1];//set the target path with a new name of image
	        	$location = $target_path.$new_name;
	        if (($_FILES["gallery"]["size"][$i] > 2000) //Approx. 2MB files can be uploaded.

	            && in_array($file_extension, $validextensions))
	        {
	            if (move_uploaded_file($_FILES['gallery']['tmp_name'][$i], $location)) 
	            { 
	            	//if file moved to uploads folder
	                // $db_handle->imgResize( $new_name, $target_path, $target_path, 1152, 768 );
	            	$db_handle->Query($sql_query->insertGallery($new_name));
	            	$message = "Gallery Images Uploaded.";
	            } else { 
	            	//if file was not moved.
	            	$message = "Please Try Again!.";
	            }
	        } else { 
	        	//if file size and file type was incorrect.
	        	$message = "***Invalid file Size or Type***";
	        }
	    }
	        echo $message;
	}

	// Gallery Delete
	if (isset($_GET['delImg']) && !empty($_GET['delImg'])) {
		$G_del = $db_handle->escapeString($_GET['delImg']);
		$chk = $db_handle->runQuery($sql_query->galleryViewD($G_del));
		// print_r($chk);
		foreach ($chk as $checked) {
			if ($checked['gallery_id'] == $_GET['delImg']) {
				$file = $checked['gallery_image'];
				$delete = $db_handle->Query($sql_query->deleteGallery($G_del));
				if ($delete == 1) {
					unlink("../../assets/img/gallery/".$file);
				}
			}
		}
		$db_handle->divertMsg("../gallery","");
	}

	// Change Password
	if (isset($_POST['action']) && $_POST['action']=='changepass') {
		
		session_start();
		$temp = $_SESSION['admin'];
		$username = $db_handle->escapeString($_POST['username']);
		$old_pwd = $db_handle->escapeString(md5($_POST['old_password']));
		$new_pwd = $db_handle->escapeString($_POST['new_password']);
		$cofi_pwd = $db_handle->escapeString($_POST['confirm_password']);

		$chk = $db_handle->numRows($sql_admin->chkPass($old_pwd,$temp));
		if ($chk > 0) {
			if ($new_pwd!=$cofi_pwd) {
				echo"2";
			}else{
				$pwd = md5($new_pwd);
				$db_handle->Query($sql_admin->UpdatePassword($username,$pwd,$temp));
				echo "1";
			}
		}else{
			echo"0";
		}
	}

	// Offer
	if(!empty($_POST['offer_package'])) {
		$offer_name = $db_handle->escapeString($_POST['offer_name']);
		$dis_amount = $db_handle->escapeString($_POST['dis_amount']);
		$offer_ends = $db_handle->escapeString($_POST['offer_ends']);

		$insertoffer = $db_handle->Query($sql_query->insertoffer($offer_name,$dis_amount,$offer_ends));
		$offer_id = $db_handle->getId();

		foreach ($_POST['offer_package'] as $selected) {
			$insertofferpackage = $db_handle->Query($sql_query->insertofferpackage($offer_id,$selected));
		}
		print_r($insertofferpackage);
	}

	// Offer Delete
	if (isset($_GET['OfferDel']) && !empty($_GET['OfferDel'])) {
		$F_del = $db_handle->escapeString($_GET['OfferDel']);
		$delete = $db_handle->Query($sql_query->deleteOffer($F_del));
		$db_handle->divertMsg("../offer","");
	}

	// echo "string";
} 
?>