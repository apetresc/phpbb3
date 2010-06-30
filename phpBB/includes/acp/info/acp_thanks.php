<?php
/**
*
* @package acp
* @version $Id: acp_thanks.php,v 125 2009-12-01 10:02:51 Палыч$
* @copyright (c) 2005 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @package module_install
*/
if (!defined('IN_PHPBB'))
{
   exit;
}

class acp_thanks_info
{
	function module()
	{
		return array(
			'filename'	=> 'acp_thanks',
			'title'		=> 'ACP_THANKS',
			'version'	=> '1.2.3',
			'modes'		=> array(
				'thanks'			=> array('title' => 'ACP_THANKS', 'auth' => 'acl_a_board', 'cat' => array('ACP_MESSAGES')),
			),
		);
	}

	function install()
	{
	}

	function uninstall()
	{
	}
}

?>