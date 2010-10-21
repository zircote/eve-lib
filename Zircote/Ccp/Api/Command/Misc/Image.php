<?php

require_once 'Zircote/Ccp/Api/Command/Abstract.php';
class Zircote_Ccp_Api_Command_Misc_Image extends Zircote_Ccp_Api_Command_Abstract {
	
	public $path = '/misc/Image.xml.aspx';

	protected $_command = 'Image';
	
	public function _parseResponse($response){
		require_once 'Zircote/Ccp/Api/Result/Misc/Image.php';
		$response = new Zircote_Ccp_Api_Result_Misc_Image($response);
		return $response;
	}
	
	public function _getRequest(){
		return array();	
	}
	
	public function set_cache_key(){
		$this->_cache_key = md5($this->_command);
	}
}

