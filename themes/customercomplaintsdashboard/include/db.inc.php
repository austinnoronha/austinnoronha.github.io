<?php
if(!NBMASTERCHK) die("Sorry, you don't have access to this page");

/** 
	* Database Connection File 
	*
  * @author redApp <support@rediff-inc.com>
	* @copyright 2011-2014 The Fun Code App Group
	* @license http://opensource.org/licenses/gpl-license.php GNU Public License
	* @package redApp
	* @subpackage modulesApp
  */

//-----------------------------------------------------------------------------------------

#Create DB Connection

/** @type array $init_param set the db connection string*/
$init_param = array("host" => "localhost", "username" => "root", "password" => "", "dbname" => "");
$redApp->db = new dbDriver($init_param);
//$redApp->db->connect();

/** @type integer APP_DB_RECORDS set the db module per page records*/
$redApp->APP_DB_RECORDS = 50;
//EOF
?>