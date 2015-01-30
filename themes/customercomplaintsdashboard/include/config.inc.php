<?php 
/** 
	* redApp Configuaratoin File 
	*
  * @author redApp <support@rediff-inc.com>
	* @copyright 2011-2014 The Fun Code App Group
	* @license http://opensource.org/licenses/gpl-license.php GNU Public License
	* @package redApp
  */

//-----------------------------------------------------------------------------------------

/** @global string|integer error_reporting Options are E_ALL^E_WARNING^E_NOTICE | E_ALL^E_NOTICE | 0 */
error_reporting(E_ALL^E_NOTICE);

/** 
	* @global boolean NBMASTERCHK allows access to the class/inc files
	*/
define("NBMASTERCHK", true);

/** 
	* @global boolean NBCRYPTSALT allows ato add extra hashing to the encryption key
	*/
define("NBCRYPTSALT", "bcb04b7eja8smss");


/** 
	* @global string JSONAPPKEY Sets the common json parent container key
	*/
define("JSONAPPKEY", "redApp");

//-----------------------------------------------------------------------------------------

/** 
	* General Object Class File 
	*
	* @class Object
	* @abstract
  * @author redApp <support@rediff-inc.com>
	* @copyright 2011-2014 The Fun Code App Group
	* @license http://opensource.org/licenses/gpl-license.php GNU Public License
	* @package redApp	
	* @subpackage modulesApp
  */
class Object{};
$redApp = new Object();


/** 
  * @type string APP_URL Should contain the APP Main URL (no forward slash) 
	*/
$redApp->APP_URL		= "http://localhost/test/bootstrap/themes/customercomplaintsdashboard";

/** 
	* @type string APP_CK_DOMAIN Should contain the APP Cookie Domain (ex: www.domain.com)
	*/
$redApp->APP_CK_DOMAIN		= "localhost";

/** 
	* @type string APP_PATH Should contain the APP Absolute Path (no forward slash)
	*/
$redApp->APP_PATH	= "C:\\xampp\\htdocs\\test\\bootstrap\\themes\\customercomplaintsdashboard";

/** 
	* @type string APP_VIEWS_PATH Should contain the APP Absolute Path for views (no forward slash)
	*/
$redApp->APP_VIEWS_PATH	= $redApp->APP_PATH . "/templates";

/** 
	* @type string APP_LOGS_PATH Should contain the APP Absolute Path for all logs (no forward slash)
	*/
$redApp->APP_LOGS_PATH	= $redApp->APP_PATH . "/logs";

/** 
	* @type string APP_MEDIA_PATH Should contain the APP Absolute Path for all media/images (no forward slash)
	*/
$redApp->APP_MEDIA_PATH	= $redApp->APP_PATH . "/media";

/** 
	* @type string APP_MEDIA_URL Should contain the APP Web URL for all media/images (no forward slash)
	*/
$redApp->APP_MEDIA_URL = $redApp->APP_URL . "/media";

/** 
	* @type boolean APP_SEF_URL whether to add index.php or use SEF format
	*/
$redApp->APP_SEF_URL	= false;

/** 
	* @type array APP_IGNORE_LOGIN list of url/modes where login is ignored
	*/
$redApp->APP_IGNORE_LOGIN = array("signin","login","signincheck", "signout", "sessionerror");

/** 
	* @type array APP_ERROR_MSG list of app error msgs
	*/
$redApp->APP_ERROR_MSG	= array();
$redApp->APP_ERROR_MSG["common_insert_success"]	= "Wow!! congratulations a new %s has been added successfully";
$redApp->APP_ERROR_MSG["common_update_success"]	= "Wow!! congratulations the %s has been updated successfully";
$redApp->APP_ERROR_MSG["common_delete_error"]		= "Sorry, the %s could not be deleted now. Please try again later";
$redApp->APP_ERROR_MSG["common_delete_success"]	= "Wow!! congratulations the %s has been deleted successfully";
$redApp->APP_ERROR_MSG["common_duplicate_error"] = "We found another record with %s, please change the %s";
$redApp->APP_ERROR_MSG["common_validate_error"] = "Please enter a valid %s";


//EOF
?>