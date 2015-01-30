<?php 
/** 
	* Index File 
	*
  * @author redApp <support@rediff-inc.com>
	* @copyright 2011-2014 The Fun Code App Group
	* @license http://opensource.org/licenses/gpl-license.php GNU Public License
	* @package redApp
	* @uses \include\config.inc.php
	* @uses \include\functions.inc.php
  */

include_once("./include/config.inc.php");
include_once($redApp->APP_PATH . "/include/functions.inc.php");
include_once($redApp->APP_PATH . "/include/db.inc.php");
include_once($redApp->APP_PATH . "/classes/requestApp.class.php");

$reqApp = new requestApp();

//-----------------------------------------------------------------
include_once($redApp->APP_PATH . "/include/smarty/libs/Smarty.class.php");
$smarty = new Smarty();
//require_once($redApp->APP_PATH . "/include/smarty/libs/SmartyBC.class.php");
//$smarty = new SmartyBC();
//$smarty->force_compile = true;
//$smarty->debugging = true;
$smarty->caching = true;
$smarty->cache_lifetime = 300;//5min

// chaining of method calls
$smarty->setTemplateDir('./templates')
       ->setCompileDir('./templates_c')
       ->setCacheDir('./cache');

$smarty->assign("APPFULLPATH",getAppConfig("APP_PATH"));
$smarty->assign("APPURL",getAppConfig("APP_URL"));
$smarty->assign("IMAGESURL",getAppConfig("APP_URL")."/images");
$smarty->assign("MEDIAURL",getAppConfig("APP_MEDIA_URL"));
$smarty->assign("SITEAPPURL",getAppUrl(""));
$smarty->assign("CSSCACHE","v120062014");
$smarty->assign("JSCACHE","v120062014");

$smarty->assign("APP_NAME","Rediffmail Customer Complaint Dashboard");
$smarty->assign("APP_VER","v1.0");
$smarty->assign("APP_FORM_CONTROL_URL","http://jqtouch.rediffmailpro.com/customercomplaintsdashboard");

//-----------------------------------------------------------------

$glb_str_mod = $reqApp->getParam("mod");
$glb_str_output = $reqApp->getParam("output");

switch($glb_str_mod){
	default:
	case "home":
	{
		$smarty->assign("APP_PAGE_HEAD","Dashboard");
		$smarty->display('index.tpl');
		break;
	}

	case "ngprovisioning":
	{
		$smarty->assign("APP_PAGE_HEAD","NG Provisioning for Domain");
		$smarty->display('ngprovisioning.tpl');
		break;
	}

	case "rprouserstatus":
	{
		$smarty->assign("APP_PAGE_HEAD","RPRO User Status");
		$smarty->display('rprouserstatus.tpl');
		break;
	}

	case "rprouserdetails":
	{
		$smarty->assign("APP_PAGE_HEAD","RPRO/EPRO User Details");
		$smarty->display('rprouserdetails.tpl');
		break;
	}

	case "login":
	{
		$smarty->display('login.tpl');
		break;
	}
}
?>