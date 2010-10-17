<?php 

require_once 'Zircote/Ccp/Api/Command/Abstract.php';
class Zircote_Ccp_Api_Command_Eve_CertificateTree extends Zircote_Ccp_Api_Command_Abstract {
	public $path = '/eve/CertificateTree.xml.aspx';

	protected $_command = 'CertificateTree';
	
	public function _parseResponse($response){
		require_once 'Zircote/Ccp/Api/Result/Eve/CertificateTree.php';
		$response = new Zircote_Ccp_Api_Result_Eve_CertificateTree($response);
		return $response;
	}
	
	public function _getRequest(){
		return array();	
	}
	
	public function set_cache_key(){
		$this->_cache_key = md5($this->_command);
	}
}