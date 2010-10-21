<?php

require_once 'Zircote/Ccp/Api/Command/Abstract.php';
class Zircote_Ccp_Api_Command_Account_Characters extends Zircote_Ccp_Api_Command_Abstract {
	
	public $path = '/account/Characters.xml.aspx';

	protected $_command = 'Characters';
	
	public function _parseResponse($response){
		require_once 'Zircote/Ccp/Api/Result/Account/Characters.php';
		$response = new Zircote_Ccp_Api_Result_Account_Characters($response);
		return $response;
	}
	
	public function _getRequest(){
		$args = array(
			'path' => $this->path
		);
		$api = $this->_api->_api;
		unset($api['characterID']);
		$args = array_merge($args, $api);
		return $args;
	}
	
	public function set_cache_key(){
		$this->_cache_key = md5($this->_command . PATH_SEPARATOR . implode(PATH_SEPARATOR, $this->_getRequest()));
	}
}