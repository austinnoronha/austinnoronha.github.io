<?php 
if(!NBMASTERCHK) die("Sorry, you don't have access to this page");

/** 
	* Request App Class File 
	*
	* @class request
  * @author redApp <support@rediff-inc.com>
	* @copyright 2011-2014 The Fun Code App Group
	* @license http://opensource.org/licenses/gpl-license.php GNU Public License
	* @package redApp
	* @subpackage requestApp
  */

//-----------------------------------------------------------------------------------------

class requestApp{
	
	/**
		* @property string $login Login ID of the User
		*/
	public $login;

	/**
		* @property string $session_id Current Session ID of the User
		*/
	public $sessionid;

	/**
		* @property string $glb_ar_skipinputs Skip these values from cleaning the request value, it will use attackXSS()
		*/
	var $glb_ar_skipinputs = array("captcha","secureimg");

	/**
		* Constructor
		* @method void __construct()
		*/	
	function __construct(){
		$this->login = $_COOKIE["nbL"];
		$this->sessionid = $_COOKIE["nbSc"];
	}

	/**
		* Get Request Parameter
		* @method void getParam()
		*	@param string $name String to get the value from GET|POST|COOKIE|REQUEST
		* @return string|null It returns the REQUEST value
		* @example getParam("firstName")
		*/
	function getParam($name){
		
		if(empty($name)) return "";
		
		if ( !in_array($name,$this->glb_ar_skipinputs) ) {
			if ( array_key_exists("amp;" . $name,$_REQUEST) ) {
				$name = "amp;" . $name;
			}

			$_REQUEST[$name] = str_replace("../","",$_REQUEST[$name]);
			$_REQUEST[$name] = str_replace("~/","",$_REQUEST[$name]);
			
			return $this->attackXSS($_REQUEST[$name]);
		} else {
			
			$str = html_entity_decode($_REQUEST[$name], ENT_COMPAT, "UTF-8");

			/*oneventhandlers*/
			$str = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $str);
			$str = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $str);
			$str = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $str);
			$str = preg_replace('#(<[^>]+[\s\r\n\"\'])(on|xmlns)[^>]*>#iU',"$1>",$str);

			$str = preg_replace('#</*\w+:\w[^>]*>#i',"",$str);
			do {
				$oldstr = $str;
				$str = preg_replace('#</*(applet|meta|xml|blink|link|style|script|em-bed|ob-ject|i-frame|frame|frameset|ilayer|layer|bgsound|title|base)[^>]*>#i',"",$str);
			 } while ($oldstr != $str);

			$str = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $str);
			$str = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $str);
			$str = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $str);

			$str = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $str);
			$str = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $str);
			$str = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $str);


			$str = preg_replace('!<sc-ript([^>]*)(>)?!si', '&lt;script$1&gt;', $str);
			$str = preg_replace('!<ob-ject([^>]*)(>)?!si', '&lt;object$1&gt;', $str);
			$str = preg_replace('!<em-bed([^>]*)(>)?!si', '&lt;embed$1&gt;', $str);
			$str = preg_replace('!<i-frame([^>]*)(>)?!si', '&lt;iframe$1&gt;', $str);
			$str = str_ireplace('</script>', '&lt;/script&gt;', $str);
			$str = preg_replace('!(\S+)script\s*:!si', '$1scriipt:', $str);
			$str = preg_replace('!\bon[a-zA-Z]*\s*=!si', 'onHack=', $str);
			$str = preg_replace('!(.*):[\s]*expression[\s]*\(!si', '$1:ex-pression', $str);
			$str = preg_replace('!<meta([^>]*)>!si', '&lt;meta$1&gt;', $str);
			$str = preg_replace('#alert\(#i', '', $str);
			$str = preg_replace('#prompt\(#i', '', $str);
			$str = preg_replace('#confirm\(#i', '', $str);
			$str = preg_replace('#eval\(#i', '', $str);
			$str = preg_replace('#document\.#i', '', $str);
			return $str;
		}
	}

	/**
		* Attack XSS 
		* @method void attackXSS()
		*	@param string $name String to filter the value
		* @return string It returns the filtered value
		* @example attackXSS("temp value")
		*/
	function attackXSS($str){
		if (is_array($str)) {
			foreach($str as $key => $value){
				$str[$key] = $this->attackXSS($value);
			}
		} else {
			$str = htmlentities($str,ENT_QUOTES);
		}
		return $str;
	}
}

//EOF
?>