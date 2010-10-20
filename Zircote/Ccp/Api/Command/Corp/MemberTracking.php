<?php

require_once 'Zircote/Ccp/Api/Command/Abstract.php';
class Zircote_Ccp_Api_Command_Corp_MemberTracking extends Zircote_Ccp_Api_Command_Abstract {
	
	public $path = '/corp/MemberTracking.xml.aspx';

	protected $_command = 'MemberTracking';
	
	public function _parseResponse($response){
		require_once 'Zircote/Ccp/Api/Result/Corp/MemberTracking.php';
		$response = new Zircote_Ccp_Api_Result_Corp_MemberTracking($response);
		return $response;
	}
	
	public function _getRequest(){
		$args = array(
			'path' => $this->path
		);
		$args = array_merge($args, $this->_api->_api);
		return $args;
	}
	
	public function set_cache_key(){
		$this->_cache_key = md5($this->_command . PATH_SEPARATOR . implode(PATH_SEPARATOR, $this->_api->_api));
	}
}