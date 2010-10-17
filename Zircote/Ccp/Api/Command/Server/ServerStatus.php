<?php

require_once 'Zircote/Ccp/Api/Command/Abstract.php';
class Zircote_Ccp_Api_Command_Server_ServerStatus extends Zircote_Ccp_Api_Command_Abstract {
	
	public $path = '/server/ServerStatus.xml.aspx';

	protected $_command = 'ServerStatus';
	
	public function _parseResponse($response){
		require_once 'Zircote/Ccp/Api/Result/Server/ServerStatus.php';
		$response = new Zircote_Ccp_Api_Result_Server_ServerStatus($response);
		return $response;
	}
	
	public function _getRequest(){
		return array();	
	}
	
	public function set_cache_key(){
		$this->_cache_key = md5($this->_command);
	}
}