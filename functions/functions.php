<?php

/*************helper functions***************/

function clean($string) {

	return htmlentities($string);
}

function redirect($location) {

	return header("Location: {$location}");
}


function set_message($message) {

	if(!empty($message)) {

		$_SESSION['message'] = $message;

		}else {

			$message = "";
		}
}


function token_generator() {

	$token = $_SESSION['token'] = md5(uniqid(mt_rand(), true));

	return $token; 
}


function display_message() {

	if(isset($_SESSION['message'])) {

		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}
}


function validation_errors($error_message) {

$error_message = <<<DELIMITER

<div style="background: #000000; color: white;" class="col-md-12 alert alert-danger alert-mg-b alert-success-style6 alert-st-bg3 alert-st-bg14">
    <button type="button" style="color: white;" class="col-md-12 close sucess-op" data-dismiss="modal" aria-label="Close">
		<span class="icon-sc-cl" aria-hidden="true">&times;</span>
									</button>
                 <p style="color: white;"><strong>$error_message </strong></p>
                            </div>
DELIMITER;

   return $error_message;     

}



function validator($error_message) {

$error_message = <<<DELIMITER
<div style="background: #000000; color: white;" class="col-md-12 alert alert-danger alert-mg-b alert-success-style6 alert-st-bg3 alert-st-bg14">
    <button type="button" style="color: white;" class="col-md-12 close sucess-op" data-dismiss="modal" aria-label="Close">
		<span class="icon-sc-cl" aria-hidden="true">&times;</span>
									</button>
                 <p style="color: white;"><strong>$error_message </strong></p>
                            </div>
DELIMITER;

   return $error_message;     

}


/********** validate user functions *******/


function email_exist($email) {

	$sql = "SELECT * FROM user WHERE email = '$email'";
	$result = query($sql);

	if(row_count($result) == 1) {

		return true;

	}else {

		return false;
	} 
}



/**********************validate user registration**********/

$errors = [];

 	if(isset($_POST['name']) && isset($_POST['gend']) && isset($_POST['email']) && isset($_POST['pword']) && isset($_POST['cpword']) && isset($_POST['tel'])) {


		$name 			= clean($_POST['name']);
		$email    		= clean($_POST['email']);
		$gender    		= clean($_POST['gend']);
		$pword    		= clean($_POST['pword']);
		$tel            = clean($_POST['tel']);


		if(email_exist($email)) {

			echo "Sorry! That email already has an account.";

		}else {

   register_user($name, $email, $gender, $pword, $tel);


		}
}

/****register user*****/
function register_user($name, $email, $gender, $pword, $tel) {

	$name 				= escape($name);
	$email   			= escape($email);
	$tel    			= escape($tel);
	$gender				= escape($gender);
	$pword 				= md5($pword);

	$id                 = "DotL".rand(0, 999);


$sql = "INSERT INTO user(`id`, `name`, `email`, `gender`, `pword`, `tel`, `active`, `category`)";
$sql.= " VALUES('$id', '$name', '$email', '$gender', '$pword', '$tel', '0', 'user')";
$result = query($sql);
confirm($result);

verify($email);

	 }



/**********************validate landlord registration**********/

$errors = [];

 	if(isset($_POST['lname']) && isset($_POST['lgend']) && isset($_POST['lemail']) && isset($_POST['lpword']) && isset($_POST['lcpword']) && isset($_POST['ltel']) && isset($_POST['lbank']) && isset($_POST['lacct']) && isset($_POST['lnin'])) {


		$lname 			= clean($_POST['lname']);
		$lemail    		= clean($_POST['lemail']);
		$email    		= clean($_POST['lemail']);
		$lgender   		= clean($_POST['lgend']);
		$lpword    		= clean($_POST['lpword']);
		$ltel           = clean($_POST['ltel']);
		$lbank    		= clean($_POST['lbank']);
		$lacct    		= clean($_POST['lacct']);
		$lnin           = clean($_POST['lnin']);


		if(email_exist($email)) {

			echo "Sorry! That email already has an account.";

		}else {

   register_lnd($lname, $lemail, $lgender, $lpword, $ltel, $lbank, $lacct, $lnin);


		}
}

/****register landlord*****/
function register_lnd($lname, $lemail, $lgender, $lpword, $ltel, $lbank, $lacct, $lnin) {

	$lnam 				= escape($lname);
	$lemai   			= escape($lemail);
	$email   			= escape($lemail);
	$lte    			= escape($ltel);
	$lgend  			= escape($lgender);
	$lpwor  			= md5($lpword);
	$lbnk 				= escape($lbank);
	$lact    			= escape($lacct);
	$lni     			= escape($lnin);

	$id                 = "DotLnd".rand(0, 999);


$sql = "INSERT INTO user(`id`, `name`, `email`, `gender`, `pword`, `tel`, `active`, `category`, `bank`, `acct`, `nin`)";
$sql.= " VALUES('$id', '$lnam', '$lemai', '$lgend', '$lpwor', '$ltel', '0', 'landlord', '$lbnk', '$lact', '$lni')";
$result = query($sql);
confirm($result);

verify($email);

	 }

//--------- Register agent verification ----------//


$errors = [];

 	if(isset($_POST['aname']) && isset($_POST['agend']) && isset($_POST['aemail']) && isset($_POST['apword']) && isset($_POST['acpword']) && isset($_POST['atel']) && isset($_POST['abank']) && isset($_POST['aacct']) && isset($_POST['anin']) && isset($_POST['agtbn'])) {


		$aname 			= clean($_POST['aname']);
		$aemail    		= clean($_POST['aemail']);
		$email    		= clean($_POST['aemail']);
		$agender   		= clean($_POST['agend']);
		$apword    		= clean($_POST['apword']);
		$atel           = clean($_POST['atel']);
		$abank    		= clean($_POST['abank']);
		$aacct    		= clean($_POST['aacct']);
		$anin           = clean($_POST['anin']);
		$agtbn          = clean($_POST['agtbn']);


		if(email_exist($email)) {

			echo "Sorry! That email already has an account.";

		}else {

   register_agt($aname, $aemail, $agender, $apword, $atel, $abank, $aacct, $anin, $agtbn);


		}
}

/****register agent*****/
function register_agt($aname, $aemail, $agender, $apword, $atel, $abank, $aacct, $anin, $agtbn) {

	$anam 				= escape($aname);
	$aemai   			= escape($aemail);
	$email   			= escape($aemail);
	$ate    			= escape($atel);
	$agend  			= escape($agender);
	$apwor  			= md5($apword);
	$abnk 				= escape($abank);
	$aact    			= escape($aacct);
	$ani     			= escape($anin);

	$id                 = "DotAgt".rand(0, 999);


$sql = "INSERT INTO user(`id`, `agtbiz`, `name`, `email`, `gender`, `pword`, `tel`, `active`, `category`, `bank`, `acct`, `nin`)";
$sql.= " VALUES('$id', '$agtbn', '$anam', '$aemai', '$agend', '$apwor', '$atel', '0', 'agent', '$abnk', '$aact', '$ani')";
$result = query($sql);
confirm($result);

verify($email);

	 }

//--------- Activate email registered ------------//

function verify($email) {

	$_SESSION['you'] = token_generator();
	$verify 		 = $_SESSION['you'];
	$you 			 = $email;

	$_SESSION['email'] = $you;


	$sql = "UPDATE user SET `activator` = '$verify' WHERE `email` = '$you'";
	$res = query($sql);



	$to 		= $you;
    $from 		= "noreply@dotlive.com.ng";
    $cmessage 	= "Best Regards<br/> <i>Team DotLive</i>";

	$headers  = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $from . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
    $headers .= "X-Priority: 1 (Highest)\n";
    $headers .= "X-MSMail-Priority: High\n";
    $headers .= "Importance: High\n";

    $subject = "Email Activation";

    $logo = 'https://dotlive.com.ng/assets/img/logo/2.png';
    $url  = 'https://dotlive.com.ng';
    $link = 'https://dotlive.com.ng/./activate?id='.$verify;

	$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>DotLive from DotEightPlus</title></head><link rel='stylesheet' href='https://dotlive.com.ng/assets/css/bootstrap.min.css'><body style='text-align: center;'>";
	$body .= "<section style='margin: 30px; margin-top: 50px ; background: #000000; color: white;'>";
	$body .= "<img style='margin-top: 35px' src='{$logo}' alt='DotLive'>";
	$body .= "<h1 style='margin-top: 45px; color: #fbb710'>Activate your email to continue</h1>
		<br/>";
	$body .= "<p style='margin-left: 45px; margin-top: 34px; text-align: left; font-size: 17px;'>Hi there! <br/> Thank you for creating an account with us. Kindly activate your email address;</p>
		<br/>";
	$body .= "<p style='margin-left: 45px; text-align: left;'><a target='_blank' href='{$link}' style='color: #fbb710; text-decoration: none'>Click here to activate your email Address</a></p>
		<br/>";
	$body .= "<p style='margin-left: 45px; padding-bottom: 80px; text-align: left;'>Do not bother replying this email. This is a virtual email</p>";	
    $body .= "<p text-align: center;'><img src='https://dotlive.com.ng/assets/img/icon/5.png'>";
    $body .= "<p style='text-align: center;'>Email.: <span style='color: #fbb710'>support@dotlive.com.ng</span></p>";	
	$body .= "<p style='text-align: center;'>Call/Chat.: <span style='color: #fbb710'>+234(0) 810 317 1902</span></p>";	
	$body .= "<p style='text-align: center; padding-bottom: 50px;'>DotLive from DotEightPlus</p>";	
	$body .= "<script src='https://dotlive.com.ng/assets/js/bootstrap.min.js'></script>";
	$body .= "</section>";	
	$body .= "</body></html>";
    $send = mail($to, $subject, $body, $headers);

    echo "Loading...Please wait!";												
	echo '<script>window.location.href ="./verify"</script>';

}




//------------ user login validation ----------//

if (isset($_POST['email']) && isset($_POST['pword'])) {
	

	$usrname 	= clean($_POST['email']);
	$password   = clean($_POST['pword']);
	$email 		= clean($_POST['email']);

 	
		if(!email_exist($email)) {

			echo "Wrong email inputed";
		}

 	else {

 login_user($usrname, $password);

				}
		} 

// user login check
 function login_user($usrname, $password) {

	$pword  	= md5($password);
	$usrname 	= escape($usrname);
	
$sql = "SELECT * FROM `user` WHERE `email` = '$usrname' AND `pword` = '$pword'";
$result = query($sql);
if(row_count($result) == 1) {
	$row = mysqli_fetch_array($result);

	$user 	 = $row['email'];
	$active  =  $row['active'];
	$email   = $row['email']; 

	if ($active == 0) {
		echo "Loading... Please wait";
		verify($email);
		echo '<script>window.location.href ="./verify"</script>';
	} else {

	if($usrname == $user || isset($_SESSION['you'])) {
		$_SESSION['Username'] = $usrname;
		unset($_SESSION['you']);

		echo "Loading...Please wait!";												
		echo '<script>window.location.href ="./apartments"</script>';
	}
}
} else {

		echo "Wrong Password";
	}

}



//----------- forgot password ---- //
if (isset($_POST['mail'])) {
	
	$email 				= clean($_POST['mail']);

 if(!email_exist($email)) {

			echo "That email does not have an account";
		}else {

	$_SESSION['me']		= token_generator();
	$me 				= $_SESSION['me'];


	$sql = "UPDATE user SET `activator` = '$me' WHERE `email` = '$email'";
	$res = query($sql);



	$to 		= $email;
    $from 		= "noreply@switch-360.com";
    $cmessage 	= "Best Regards<br/> <i>Switch Team</i>";

	$headers  = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $from . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
    $headers .= "X-Priority: 1 (Highest)\n";
    $headers .= "X-MSMail-Priority: High\n";
    $headers .= "Importance: High\n";

    $subject = "Recover Password";

    $logo = 'https://dotlive.com.ng/assets/img/logo/2.png';
    $url  = 'https://dotlive.com.ng';
    $link = 'https://dotlive.com.ng/./recovery?id='.$me;

	$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>DotLive from DotEightPlus</title></head><link rel='stylesheet' href='https://dotlive.com.ng/assets/css/bootstrap.min.css'><body style='text-align: center;'>";
	$body .= "<section style='margin: 30px; margin-top: 50px ; background: #000000; color: white;'>";
	$body .= "<img style='margin-top: 35px' src='{$logo}' alt='DotLive'>";
	$body .= "<h1 style='margin-top: 45px; color: #fbb710'>Password Recovery</h1>
		<br/>";
	$body .= "<p style='margin-left: 45px; margin-top: 34px; text-align: left; font-size: 17px;'>Hi there! <br/> You requested a reset of your password</p>
		<br/>";
	$body .= "<p style='margin-left: 45px; text-align: left;'><a target='_blank' href='{$link}' style='color: #fbb710; text-decoration: none'>Click here to recover your password</a></p>
		<br/>";
	$body .= "<p style='margin-left: 45px; padding-bottom: 80px; text-align: left;'>Kindly ignore this message if you didn`t request for a password reset.</p>";	
    $body .= "<p text-align: center;'><img src='https://dotlive.com.ng/assets/img/icon/5.png'>";
    $body .= "<p style='text-align: center;'>Email.: <span style='color: #fbb710'>support@dotlive.com.ng</span></p>";	
	$body .= "<p style='text-align: center;'>Call/Chat.: <span style='color: #fbb710'>+234(0) 810 317 1902</span></p>";	
	$body .= "<p style='text-align: center; padding-bottom: 50px;'>DotLive from DotEightPlus</p>";	
	$body .= "<script src='https://dotlive.com.ng/assets/js/bootstrap.min.js'></script>";
	$body .= "</section>";	
	$body .= "</body></html>";

    $send = mail($to, $subject, $body, $headers);

    $_SESSION['femail'] = $to;

   echo "Loading...Please wait!";												
   echo '<script>window.location.href ="./recover"</script>';
}
}



//----------------- recover password ------------//

if (isset($_POST['upword']) && isset($_POST['ucpword'])) {
	
	$pword 		= md5($_POST['upword']);
	$me 		= $_SESSION['recc'];


	$sql = "UPDATE user SET `pword` = '$pword' WHERE `email` = '$me'";
	$res = query($sql);

	echo "Loading... Please wait!";

	echo '<script>window.location.href ="./updated"</script>';

}



//--------------------------- dashboard ---------------------------------------------///

if (isset($_POST['suite']) && isset($_POST['uapty']) && isset($_POST['waterty']) && isset($_POST['pwrsrc']) && isset($_POST['state']) && isset($_POST['ultel']) && isset($_POST['apmail']) && isset($_POST['price']) && isset($_POST['loc']) && isset($_POST['desc']) && isset($_POST['aptact']) && isset($_POST['aptbnk']) && isset($_POST['toi'])) {
	

$suite 			= clean($_POST['suite']);
$apty	 		= clean($_POST['uapty']);
$waterty 		= clean($_POST['waterty']);
$pwrsrc    		= clean($_POST['pwrsrc']);
$state 	 		= clean($_POST['state']);
$ultel    		= clean($_POST['ultel']);
$apmail         = clean($_POST['apmail']);
$price 			= clean($_POST['price']);
$loc            = clean($_POST['loc']);
$desc  			= clean($_POST['desc']);
$aptact			= clean($_POST['aptact']);
$aptbnk			= clean($_POST['aptbnk']);
$toi 			= clean($_POST['toi']);




upload_apt($suite, $apty, $waterty, $pwrsrc, $state, $ultel, $apmail, $price, $loc, $desc, $aptact, $aptbnk, $toi);
}


//upload apartment
function upload_apt($suite, $apty, $waterty, $pwrsrc, $state, $ultel, $apmail, $price, $loc, $desc, $aptact, $aptbnk, $toi) {

$sql = "INSERT INTO apartment(`sn`, `apt`, `apartment`, `location`, `description`, `price`, `water`, `power`, `status`, `uploader`, `tel`, `acct`, `bank`, `state`, `toilet`)";
$sql.= " VALUES('1' , '$suite', '$apty', '$loc', '$desc', '$price', '$waterty', '$pwrsrc', 'available', '$apmail', '$ultel', '$aptact', '$aptbnk', '$state', '$toi')";
$result = query($sql);

echo 'Loading... Please wait!';
echo '<script>window.location.href ="./uploadagreed?id='.$suite.'"</script>';
	 }		



//Apartment image
if (!empty($_FILES["file"]["name"])) {
	
			$target_dir = "../upload/apartment/";
			$target_file =  basename($_FILES["file"]["name"]);
			$targetFilePath = $target_dir . $target_file;
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	
			   
			// Check if file already exists
			if (file_exists($targetFilePath)) {
			    echo "Sorry, this apartment Image is already registered on our database. Kindly rename your file and try again.";
			    $uploadOk = 0;
			} else {

			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "jpeg") {
			    echo "Sorry, only JPG and JPEG files are allowed.";
			    $uploadOk = 0;
			} else {
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			   echo "Sorry, your apartment Image was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			   
			   move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);
			   img_prod($target_file);
			   echo 'Loading.. Please wait!';
   			echo '<script>window.location.href ="./uploaded"</script>';
		}
	}	    	
}
}


///sql update product image
function img_prod($target_file) {

	$proid    = $_SESSION['aptimg'];

	$sql 	  = "UPDATE apartment SET `pix` = '$target_file' WHERE `apt` = '$proid'";
	$res = query($sql);

	echo 'Loading.. Please wait!';

	unset($_SESSION['aptimg']);
}




/************validate update password*******/
function validate_update() {
$errors = [];

	

	if($_SERVER['REQUEST_METHOD'] == "POST") {

			$pword           = md5($_POST['pword']);
			$cpword      	 = md5($_POST['cpword']);


if($pword != $cpword) {

			$errors[] = "Password doesn`t match!";
		}

			if(!empty($errors)) {

				foreach ($errors as $error) {
			
	                echo validation_errors($error); 

				}

			} else {

				if(updte($pword, $cpword)) {
					
					echo validation_errors("Wrong Password or Username!");
				} else {

					
					echo validation_errors("Password updated successfully");
				}
			} 

		}

} //function

/************************ user login functions**********/

function updte($pword, $cpword) {

	$us 		= $_SESSION['Username'];
	
$sqll = "UPDATE user SET `pword` ='$pword' WHERE `email`= '$us'";
$res = query($sqll);
	}



function rev() {
	$errors = [];
if($_SERVER['REQUEST_METHOD'] == "POST") {

$msg 			= $_POST['msg'];
$ref	 		= rand(0, 9999999);
$usname	 		= $_SESSION['Username'];
$date    		= date("Y-m-d h-i-sa");
$stat 	 		= "Open";


$sql = "INSERT INTO support(`sn`, `SupportRef`, `Username`, `Msg`, `Datesent`, `Status`)";
$sql.= " VALUES('1', '$ref', '$usname', '$msg', '$date', '$stat')";
$result = query($sql);
redirect("./sent");
}
}	

//--------------- edit apartment --------------//
if (isset($_POST['edsuite']) && isset($_POST['eduapty']) && isset($_POST['edwaterty']) && isset($_POST['edpwrsrc']) && isset($_POST['edstate']) && isset($_POST['edultel']) && isset($_POST['edapmail']) && isset($_POST['edprice']) && isset($_POST['edloc']) && isset($_POST['eddesc']) && isset($_POST['edaptact']) && isset($_POST['edaptbnk']) && isset($_POST['edtoi'])) {
	

$suite 			= clean($_POST['edsuite']);
$apty	 		= clean($_POST['eduapty']);
$waterty 		= clean($_POST['edwaterty']);
$pwrsrc    		= clean($_POST['edpwrsrc']);
$state 	 		= clean($_POST['edstate']);
$ultel    		= clean($_POST['edultel']);
$apmail         = clean($_POST['edapmail']);
$price 			= clean($_POST['edprice']);
$loc            = clean($_POST['edloc']);
$desc  			= clean($_POST['eddesc']);
$aptact			= clean($_POST['edaptact']);
$aptbnk			= clean($_POST['edaptbnk']);
$toi 			= clean($_POST['edtoi']);




edupload_apt($suite, $apty, $waterty, $pwrsrc, $state, $ultel, $apmail, $price, $loc, $desc, $aptact, $aptbnk, $toi);
}


//upload apartment
function edupload_apt($suite, $apty, $waterty, $pwrsrc, $state, $ultel, $apmail, $price, $loc, $desc, $aptact, $aptbnk, $toi) {

$sql = "UPDATE apartment SET `sn` = '1', `apartment` = '$apty', `location` = '$loc', `description` = '$desc', `price` = '$price', `water` = '$waterty', `power` = '$pwrsrc', `status` = 'available', `uploader` = '$apmail', `tel` = '$ultel', `acct` = '$aptact', `bank` = '$aptbnk', `state` = '$state', `toilet` = '$toi' WHERE `apt` = '$suite'";
$result = query($sql);

echo 'Loading... Please wait!';
echo '<script>window.location.href ="./eduploadagreed?id='.$suite.'"</script>';
	 }



//-------------------- ads upload ------------------//
if (isset($_POST['adsid']) && isset($_POST['tagl']) && isset($_POST['dura']) && isset($_POST['targ']) && isset($_POST['link']) && isset($_POST['descp'])) {
	
$adsid			= clean($_POST['adsid']);
$tagl	 		= clean($_POST['tagl']);
$dura   		= clean($_POST['dura']); 
$targ   		= clean($_POST['targ']);
$link   		= clean($_POST['link']);
$descp    		= clean($_POST['descp']);

$r 				= $_SESSION['Username'];


//get ads pricing
if ($dura == "A Day") {
	
	$price = 500;
} else {

if ($dura == "A Week") {
	
	$price = 3000;
} else {

if ($dura == "3 Days") {
	
	$price = 1000;
} else {

if ($dura == "A Month") {
	
	$price = 14000;
} else {

if ($dura == "A Year") {
	
	$price = 160000;
}
}
}
}
}

//check if user has enough funds
$sql = "SELECT * FROM user WHERE `email` = '$r'";
$res = query($sql);
$row = mysqli_fetch_array($res);

$avlamt = $row['wallet'];
$tel    = $row['tel'];

if ($avlamt >= $price) {
	
	activateads($adsid, $tagl, $dura, $targ, $link, $descp, $price, $tel, $r);
} else {

	echo "You don`t have enough funds in your wallet to run this advert.<br/> Kindly fund your wallet with an amount greater than NGN".number_format($price)." to run this ad.";
}
}


function activateads($adsid, $tagl, $dura, $targ, $link, $descp, $price, $tel, $r) {

$date = date("Y-m-d h:i:sa");

$sql = "INSERT INTO ads(`sn`, `ads_id`, `tagline`, `descrip`, `user`, `date`, `duration`, `price`, `session`, `tel`, `link`, `target`, `click`)";
$sql.= " VALUES('1', '$adsid', '$tagl', '$descp', '$r', '$date', '$dura', '$price', 'active', '$tel', '$link', '$targ', '0')";
$result = query($sql);

echo "Loading.. Please wait";
echo '<script>window.location.href ="./adfile?id='.$adsid.'"</script>';
}


//ads image upload
if (!empty($_FILES["fle"]["name"])) {
	
			$target_dir = "../upload/ads/";
			$target_file =  basename($_FILES["fle"]["name"]);
			$targetFilePath = $target_dir . $target_file;
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	
			
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "jpeg") {
			    echo "Sorry, only JPG and JPEG files are allowed.";
			    $uploadOk = 0;
			} else {
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			   echo "Sorry, your ads image was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			   
			   move_uploaded_file($_FILES["fle"]["tmp_name"], $targetFilePath);
			   img_ads($target_file);
   			
		
	}	    	
}
}


///sql update ads image
function img_ads($target_file) {

	$code     = $_SESSION['adsimg'];

	$sql 	  = "UPDATE ads SET `file` = '$target_file' WHERE `ads_id` = '$code'";
	$res 	  = query($sql);

	echo 'Loading.. Please wait';
	echo '<script>window.location.href ="./done"</script>';

}


//------- edit ads ----------//
if (isset($_POST['edadsid']) && isset($_POST['edtagl']) && isset($_POST['eddura']) && isset($_POST['edtarg']) && isset($_POST['edlink']) && isset($_POST['eddescp'])) {
	
$edadsid		= clean($_POST['edadsid']);
$edtagl	 		= clean($_POST['edtagl']);
$eddura   		= clean($_POST['eddura']); 
$edtarg   		= clean($_POST['edtarg']);
$edlink   		= clean($_POST['edlink']);
$eddescp    	= clean($_POST['eddescp']);

$edr			= $_SESSION['Username'];


//get ads pricing
if ($eddura == "A Day") {
	
	$edprice = 500;
} else {

if ($eddura == "A Week") {
	
	$edprice = 3000;
} else {

if ($eddura == "3 Days") {
	
	$edprice = 1000;
} else {

if ($eddura == "A Month") {
	
	$edprice = 14000;
} else {

if ($eddura == "A Year") {
	
	$edprice = 160000;
}
}
}
}
}

//check if user has enough funds
$sql = "SELECT * FROM user WHERE `email` = '$edr'";
$res = query($sql);
$row = mysqli_fetch_array($res);

$edavlamt = $row['wallet'];
$edtel    = $row['tel'];

if ($edavlamt >= $edprice) {
	
	edactivateads($edadsid, $edtagl, $eddura, $edtarg, $edlink, $eddescp, $edprice, $edtel, $edr);
} else {

	echo "You don`t have enough funds in your wallet to run this advert.<br/> Kindly fund your wallet with an amount greater than NGN".number_format($edprice)." to run this ad.";
}
}


function edactivateads($edadsid, $edtagl, $eddura, $edtarg, $edlink, $eddescp, $edprice, $edtel, $edr) {

$sql = "UPDATE ads SET `tagline` = '$edtagl', `descrip` = '$eddescp', `duration` = '$eddura', `price` = '$edprice', `session` = 'active', `tel` = '$edtel', `link` = '$edlink', `target` = '$edtarg' WHERE `ads_id` = '$edadsid' AND `user` = '$edr'";
$result = query($sql);

echo "Loading.. Please wait";
echo '<script>window.location.href ="./edadfile?id='.$edadsid.'"</script>';
}


//---- count ads click ----//
if (isset($_POST['adsid']) && isset($_POST['click'])) {
	
	$ads = $_POST['adsid'];
	$clc = $_POST['click'];

	$clck = $clc + 1;

	$sql = "UPDATE ads SET `click` = '$clck' WHERE `ads_id` = '$ads'";
	$res = query($sql);

}
?>