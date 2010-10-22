<?php

require_once 'Zircote/Ccp/Api/Command/Abstract.php';

/**
 * 
 * Enter description here ...
 * @author zircote
 * 
 * @example
 *
 * $api = new Zircote_Ccp_Api(Tests_AllTests::$tests_config);
 * $out = $api->setScope('Char')
 * 		->WalletTransactions($accountKey, $beforeTransID);
 *
 */
class Zircote_Ccp_Api_Command_Corp_WalletTransactions extends Zircote_Ccp_Api_Command_Abstract {
	
	public $path = '/corp/WalletTransactions.xml.aspx';

	protected $_command = 'WalletTransactions';
	
	public function _parseResponse($response){
		require_once 'Zircote/Ccp/Api/Result/Corp/WalletTransactions.php';
		$response = new Zircote_Ccp_Api_Result_Corp_WalletTransactions($response);
		return $response;
	}
	
	public function _getRequest(){
		$args = array(
			'path' => $this->path
		);
		if(isset($this->_args[0])){
			$args['accountKey'] = $this->_args[0];
		}
		if(isset($this->_args[1])){
			$args['beforeTransID'] = $this->_args[1];
		}
		$args = array_merge($args, $this->_api->_api);
		return $args;
	}
	
	public function set_cache_key(){
		$this->_cache_key = md5($this->_command . PATH_SEPARATOR . implode(PATH_SEPARATOR, $this->_api->_api));
	}
}