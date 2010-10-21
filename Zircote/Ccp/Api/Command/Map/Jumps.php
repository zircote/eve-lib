<?php

require_once 'Zircote/Ccp/Api/Command/Abstract.php';
class Zircote_Ccp_Api_Command_Map_Jumps extends Zircote_Ccp_Api_Command_Abstract {
	
	public $path = '/map/Jumps.xml.aspx';

	protected $_command = 'Jumps';
	
	public function _parseResponse($response){
		require_once 'Zircote/Ccp/Api/Result/Map/Jumps.php';
		$response = new Zircote_Ccp_Api_Result_Map_Jumps($response);
		return $response;
	}
	
	public function _getRequest(){
		return array();	
	}
	
	public function set_cache_key(){
		$this->_cache_key = md5($this->_command);
	}
}

