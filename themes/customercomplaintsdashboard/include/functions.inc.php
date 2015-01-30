<?php 

/** 
	* Common Function for this APP
	*
  * @author redApp <support@rediff-inc.com>
	* @copyright 2011-2014 The Fun Code App Group
	* @license http://opensource.org/licenses/gpl-license.php GNU Public License
	* @package redApp
	* @subpackage redAppFunctions 
  */

//-----------------------------------------------------------------------------------------

/**
	* Get Application Config Value
  * 
	* @method void getAppConfig()
	*	@param string $key String to get the Config value
	* @return string|null It returns the nbAapp::<property> values
	* @example	getAppConfig("APP_PATH") 
  */
function getAppConfig($key="") {
	global $redApp;
	return (isset($redApp->$key)) ? $redApp->$key : null;
}

/**
  * Autoload the class files from clases dir
	* 
	* @method void __autoload()
	* @uses \classes\
  */
function __autoload($class_name) {
	$tmp = getAppConfig("APP_PATH") . "/classes/" . $class_name . '.class.php';
	include_once($tmp);
}

/**
  * Get App Error Message
	* 
	* @method void getAppErrorMsg()
	*	@param string $key String to get the error message from the array
	*	@param string $sep Message seperator
	* @return string|boolean error message
  */
function getAppErrorMsg($key="",$sep="<span class='glyphicon glyphicon-record'></span> ") {
	$tmp_err_msg = getAppConfig("APP_ERROR_MSG");
	return isset($tmp_err_msg[$key]) ? $sep.$tmp_err_msg[$key] : false;
}

/**
  * Get App Random No
	* 
	* @method void getAppRandomNo()
	*	@param Integer $len Length of the strng
	*	@param Boolean $isMD5 Convert to MD5
	* @return string Randome no.
  */
function getAppRandomNo($len=32, $isMD5=false) {
	$tmp = md5( time() . rand(99999, 99999999) . microtime(true));
	if($isMD5){
		return $tmp;
	} else {
		return substr($tmp, 0, $len);
	}
}

/**
	* Set Application Cookie
  * 
	* @method void setAppCok()
	*	@param string $ck_name String to set the cookie name
	*	@param string|boolean|integer $val String to set the cookie value
	*	@param integer $exp The cookie expire value default expires in 12 hour i.e. 43200
	* @return boolean It returns the boolena value is cookie is set/not
	* @example setAppCok ( "scm","22" );
  */
function setAppCok($ck_name, $val, $exp = "", $secure = false){
	$exp = ($exp) ? $exp : 43200 ;/* default expires in 12 hour */
	return setcookie($ck_name, $val, (time()+$exp), "/", getAppConfig("APP_CK_DOMAIN"), $secure);
}

/**
	* Delete Application Cookie
  * 
	* @method void deleteAppCok()
	*	@param string $ck_name String to set the cookie name
	* @return boolean It returns the boolena value is cookie is set/not
	* @example deleteAppCok ( "scm" );
  */
function deleteAppCok($ck_name, $secure = false){
	return setcookie($ck_name, "", (time()-43200), "/", getAppConfig("APP_CK_DOMAIN"), $secure);
}

/**
	* Delete Application Cookie
  * 
	* @method void deleteAppCok()
	*	@param string $view_name View file name
	*	@param array $view_val View variable value
	*	@param string $view_type View type i.e. web|mobile|iphone|ipad
	* @example getAppView ( "home" );
  */
function getAppView($view_name, $view_val = array(), $view_type = ""){
	$view_type = $view_type ? $view_type : "web";
	$str_view_file = getAppConfig("APP_VIEWS_PATH") . '/' . $view_type . '/' . $view_name . '.view.php';
	if( is_file($str_view_file) ){
		if( is_array($view_val) ) extract($view_val);
		include_once( $str_view_file );
	}
	return false;
}

/**
	* Get App URL
  * 
	* @method void getAppUrl()
	*	@param string $module Module name - setting the mod param
	*	@param string $params setting the params & values
	* @return string The valid SEF / Non SEF URL string
	* @example getAppUrl ( "home" );
  */
function getAppUrl($module, $params=""){
	if(getAppConfig("APP_SEF_URL") === true){
		return getAppConfig("APP_URL") . "/".$module;	
	} else {
		return getAppConfig("APP_URL") . "/?mod=".$module;
	}	
}

/**
	* Application Log
  * @method void __log()
	*	@param string $d 
	* @example __log( "home" );
  */
function __log($d=""){
  $path = getAppConfig("APP_LOGS_PATH");
	error_log("[".date("Y-m-d H:i:s")."]"."\t ".$d." \n",3,$path."/app.".date("Ymd").".log");
}

/**
	* Upload Media File
	*
  * @method void uploadMedia()
	*	@param array $s 
	* @return string|boolean filename or '0' 
	* @example uploadMedia( $_FILE['s'] );
  */
function uploadMedia($s=''){
  $upload_source    = $s["tmp_name"];
  $upload_filename  = $s["name"];
  $upload_filetype  = $s["type"];
  $upload_filesize  = $s["size"];
  $upload_error     = $s["error"];
  
  $tmp_pathinfo = pathinfo($upload_filename);
  $ext = $tmp_pathinfo["extension"];
  $media_path = getAppConfig("APP_MEDIA_PATH");
  $upload_filename = strtolower(preg_replace("#[^a-z0-9-]#i", "-", $tmp_pathinfo["filename"]));
  $new_filename = ($upload_filename)."-".time()."-".date("jSMY").".".$ext;
  $destination = $media_path."/".$new_filename;

  if($upload_filesize <= 0){
    __log(__CLASS__."[Error] filesize is 0, file upload issue");
    return false;
  }

  if(!move_uploaded_file($upload_source, $destination)){
    __log(__CLASS__."[Error] file upload issue : ".$destination);
    return false;
  }else{
    __log(__CLASS__."[Success] file upload successfully : ".$destination);
    return $new_filename;
  }
  return false;
}

/**
	* Get Media/Uploaded File
	*
  * @method void getMediaFile()
	*	@param string $f filename/media name 
	*	@param integer $abs check absolute path
	*	@param string $ret return the full path of the media
	* @return string|boolean filename or '0' 
	* @example 
	* Check if file exists - getMediaFile( $filename, 1 );
	* Check if file exists and return the file - getMediaFile( $filename, 1, 1 );
	* Check if file exists and return the file - getMediaFile( $filename );
  */
function getMediaFile($f='',$abs=0,$ret=0){

	//check if file exists
	$media_path = getAppConfig("APP_MEDIA_PATH");
	$destination = $media_path."/".$f;
	$chk_file = is_file($destination);
	if($chk_file){
		if($abs == 1){
			if($ret == 1){
				return ($destination);
			}else{
				return $chk_file;
			}
		}else{
			$media_path = getAppConfig("APP_MEDIA_URL");
			$destination = $media_path."/".$f;
			return $destination;
		}
	}
  return false;
}

/**
	* Get Media/Uploaded File
	*
  * @method void getMediaFile()
	*	@param string $f filename/media name 
	*	@param integer $abs check absolute path
	*	@param string $ret return the full path of the media
	* @return string|boolean filename or '0' 
	* @example 
	* Check if file exists - getMediaFile( $filename, 1 );
	* Check if file exists and return the file - getMediaFile( $filename, 1, 1 );
	* Check if file exists and return the file - getMediaFile( $filename );
  */
function getImgFile($f='',$size="small"){

	//check if file exists
	$f_arr = pathinfo($f);
	if($f_arr["filename"]){
		return str_replace($f_arr["filename"], $f_arr["filename"]."-$size", $f);
	}
  return false;
}

/**
	* Set Application Pagination
	*
  * @method void setAppPagination()
	*	@param integer $total_pages total records/pages
	*	@param string $link module link
	* @return string pagination string 
	* @example setAppPagination( 100, "domain.com/module/" );
  */
function setAppPagination($total_pages = 0, $link=""){
  
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	$reqApp = new requestApp();
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
     $total_pages = 0
   
     $prev_text
     $next_text
	*/
	$prev_text = "<span class=\"glyphicon glyphicon-circle-arrow-left\"></span> prev";
  $next_text = "next <span class=\"glyphicon glyphicon-circle-arrow-right\"></span>";
  $page = $reqApp->getParam("page");
	/* Setup vars for query. */
	$limit = getAppConfig("APP_DB_RECORDS");//how many items to show per page
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	//$query = "SELECT category, uname, title FROM portfolio LIMIT $start, $limit";
	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
  
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination pagination-sm pull-right\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<li><a href=\"$link/page@$prev\">$prev_text</a></li>";
		else
			$pagination.= "<li class=\"disabled\"><a href=\"javascript:;\">$prev_text</a></li>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<li class=\"active\"><a href=\"javascript:;\">$counter</a></li>";
				else
					$pagination.= "<li><a href=\"$link/page@$counter\">$counter</a></li>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li class=\"active\"><a href=\"javascript:;\">$counter</a></li>";
					else
						$pagination.= "<li><a href=\"$link/page@$counter\">$counter</a>";					
				}
				$pagination.= "<li class=\"disabled\"><a href=\"javascript:;\">...</a></li>";
				$pagination.= "<li><a href=\"$link/page@$lpm1\">$lpm1</a></li>";
				$pagination.= "<li><a href=\"$link/page@$lastpage\">$lastpage</a></li>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<li><a href=\"$link/page@1\">1</a></li>";
				$pagination.= "<li><a href=\"$link/page@2\">2</a></li>";
				$pagination.= "<li><a href=\"javascript:;\">...</a></li>";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li class=\"active\"><a href=\"javascript:;\">$counter</a></li>";
					else
						$pagination.= "<li><a href=\"$link/page@$counter\">$counter</a></li>";					
				}
				$pagination.= "<li><a href=\"javascript:;\">...</a></li>";
				$pagination.= "<li><a href=\"$link/page@$lpm1\">$lpm1</a></li>";
				$pagination.= "<li><a href=\"$link/page@$lastpage\">$lastpage</a></li>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<li><a href=\"$link/page@1\">1</a></li>";
				$pagination.= "<li><a href=\"$link/page@2\">2</a></li>";
				$pagination.= "<li><a href=\"javascript:;\">...</a></li>";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li class=\"active\"><a href=\"javascript:;\">$counter</a></li>";
					else
						$pagination.= "<li><a href=\"$link/page@$counter\">$counter</a></li>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<li><a href=\"$link/page@$next\">$next_text</a></li>";
		else
			$pagination.= "<li class=\"disabled\"><a href=\"javascript:;\">$next_text</a></li>";
		$pagination.= "</div><div class=\"clearfix\"></div>\n";		
	}
  
  return $pagination;
}


/**
	* Set App Encryption
	*
  * @method void setAppEncryption()
	*	@param string $key module link
	* @return string encrypted key
	* @example $encrypted_b64_str = setAppEncryption("rls","this is a test");
  */
function setAppEncryption($key="",$val=""){
	
	# --- ENCRYPTION ---
	
	# create a random IV to use with CBC encoding
	$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
  $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);

	# creates a cipher text compatible with AES (Rijndael block size = 128)
	# to keep the text confidential 
	# only suitable for encoded input that never ends with value 00h
	# (because of default zero padding)
  $encrypted_text = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, (NBCRYPTSALT . $key), $val, MCRYPT_MODE_ECB, $iv);
  
	# encode the resulting cipher text so it can be represented by a string
	$ciphertext_base64 = base64_encode($encrypted_text);
	
	return $ciphertext_base64;

	# === WARNING ===

	# Resulting cipher text has no integrity or authenticity added
	# and is not protected against padding oracle attacks.
}

/**
	* Set App Encryption
	*
  * @method void setAppEncryption()
	*	@param string $key Cipher Key
	*	@param string $ciphertext_base64 Cipher text base64
	* @return string encrypted key
	* @example $dec = getAppDecryption("rls", $encrypted_b64_str);
  */
function getAppDecryption($key="", $ciphertext_base64=""){

	# --- DECRYPTION ---

	# create a random IV to use with CBC encoding
	$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
  $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);

	# decode the b64 to mcrypt code
	$ciphertext_str = base64_decode($ciphertext_base64);
	
	# may remove 00h valued characters from end of plain text
	$decrypted_text = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, (NBCRYPTSALT . $key ), $ciphertext_str, MCRYPT_MODE_ECB, $iv);

	#The returned string is padded out to fill n * blocksize bytes using the null character \0 so that is why you are seeing the extra data.
	$plaintext_dec= rtrim($decrypted_text, "\0");

	return $plaintext_dec;
}


/**
	* Get App User Info from cookie
	*
  * @method void getAppUserInfo()
	*	@param string $key user Info Key
	* @return string|array|bolean cookie value
	* @example $dec = getAppUserInfo("id");
  */
function getAppUserInfo($key=""){
	$tmp_ck = $_COOKIE["nbIns"];
	if(!empty($tmp_ck)){
		$tp_ar_ck = unserialize(base64_decode($tmp_ck));		
		if($key && isset($tp_ar_ck[$key])){
			return $tp_ar_ck[$key];	
		} else {
			return $tp_ar_ck;
		}
	}
	return false;
}

/**
	* Get App Date in user format
	*
  * @method void getAppDateFormat()
	*	@param string $dt Date string
	*	@param string $format Date formt to be converted to
	* @return string|bolean formated date
	* @example $dec = getAppDateFormat("2012-10-09 00:01:33");
  */
function getAppDateFormat($dt="", $format = "jS, M Y - H:i a"){
	if($dt){
		return date($format, strtotime($dt));
	}
	return false;
}

/**
	* Get App View Content
	*
  * @method void getAppViewContent()
	*	@param string $file File/View Name
	*	@param array $params Parameters
	* @return string View Content
	* @example $dec = getAppViewContent("__view_name__");
  */
function getAppViewContent($file="", $params = array()){
	$tmp_str = "";
	if(is_file($file)) {
		extract($params);

		ob_start();  // start buffer
		include($file);  // read in buffer
		$tmp_str = ob_get_contents();  // get buffer content
		ob_end_clean();  // delete buffer content
	}
	return $tmp_str;
}

/**
	* Send App SMTP Mail
	*
  * @method void sendSMTPMail()
	*	@param array $params set of config
	* @example sendSMTPMail( "Simple Box", "exBox", "1" );
  */
function sendSMTPMail($params = array()){
	
	include_once( getAppConfig("APP_PATH") . "/include/PHPMailerMaster/class.phpmailer.php" );
	include_once( getAppConfig("APP_PATH") . "/include/PHPMailerMaster/class.smtp.php" );

	$mail = new PHPMailer;

	/*$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup server
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'jswan';                            // SMTP username
	$mail->Password = 'secret';                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted*/

	$mail->From = $params["from"];
	if(isset($params["fromname"])) $mail->FromName = $params["fromname"];
	if(is_array($params["to"])){
		foreach($params["to"] as $k => $val){
			$mail->addAddress($val["email"], $val["name"]);  // Add a recipient	- Name is optional
		}	
	}else{
		$mail->addAddress($params["to"], $val["toname"]);  // Add a recipient	- Name is optional	
	}

	if($val["replyto"]) $mail->addReplyTo($val["replyto"], $val["replytoname"]);
	//$mail->addCC('cc@example.com');
	//$mail->addBCC('bcc@example.com');

	$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
	//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = $params["subject"] ? $params["subject"] : "Email Subject";
	$mail->Body    = $params["body"];
	$tmp_alt_body = str_replace("\n","___NL___",$params["body"]);
	$tmp_alt_body = strip_tags($tmp_alt_body);
	$tmp_alt_body = str_replace("___NL___","\n",$tmp_alt_body);
	$mail->AltBody = $tmp_alt_body;
	if(!$mail->send()) {		
		__log('Message could not be sent.');
		__log('Mailer Error: ' . $mail->ErrorInfo);
		return $mail->ErrorInfo;
	}
	__log('Message has been sent');
	return true;
}

/**
	* App Validate Email ID
	*
  * @method void validateAppEmailId()
	*	@param array $email Emaill ID
	* @return boolean
	* @example validateAppEmailId( "abc@news.com" );
  */
function validateAppEmailId($email=""){
	return preg_match("#^(.*?)@(.*?)\.(.*?)$#", $email);
}

/**
	* App Get Client IP
	*
  * @method void getAppClientIP()
	* @return string client ip address
	* @example getAppClientIP();
  */
function getAppClientIP() {
     $ipaddress = '';
     if ($_SERVER['HTTP_CLIENT_IP'])
         $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
     else if($_SERVER['HTTP_X_FORWARDED_FOR'])
         $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
     else if($_SERVER['HTTP_X_FORWARDED'])
         $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
     else if($_SERVER['HTTP_FORWARDED_FOR'])
         $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
     else if($_SERVER['HTTP_FORWARDED'])
         $ipaddress = $_SERVER['HTTP_FORWARDED'];
     else if($_SERVER['REMOTE_ADDR'])
         $ipaddress = $_SERVER['REMOTE_ADDR'];
     else
         $ipaddress = 'UNKNOWN';

     return $ipaddress; 
}

/**
	* App Get Client Referrer
	*
  * @method void getAppClientReferrer()
	* @return string client referrer address
	* @example getAppClientReferrer();
  */
function getAppClientReferrer(){
	return (isset($_SERVER["HTTP_REFERER"])) ? $_SERVER["HTTP_REFERER"] : "UNKNOWN";
}


/**
	* App Get Client User Agent
	*
  * @method void getAppClientUserAgent()
	* @return string client user agnet like msie, mozilla ...
	* @example getAppClientUserAgent();
  */
function getAppClientUserAgent(){
	return (isset($_SERVER['HTTP_USER_AGENT'])) ? $_SERVER['HTTP_USER_AGENT'] : "UNKNOWN"; 
}

/**
	* App Get Limit text
	*
  * @method void getLimitText()
	* @return string client user agnet like msie, mozilla ...
	* @example getLimitText("hello !! test user", 5);
  */
function getLimitText($text="", $limit=10, $sep="...") {
	return ($text) ? substr($text, 0, $limit) .$sep : false;
}

function getSefUrl($str=''){
	$tmp = strtolower(preg_replace("#[^a-z0-9-]#i", "-", $str));
	$tmp = preg_replace("#-[-]#","",$tmp);
	return $tmp;
}
//EOF
?>