<?php 

require_once 'Zircote/Ccp/Api/Command/Abstract.php';

/**
 * @todo args: characterID| apiKey, userID
 * Enter description here ...
 * @author zircote
 *
 */
class Zircote_Ccp_Api_Command_Eve_CharacterInfo extends Zircote_Ccp_Api_Command_Abstract {
	public $path = '/eve/CharacterInfo.xml.aspx';

	protected $_command = 'CharacterInfo';
	
	public function _parseResponse($response){
		require_once 'Zircote/Ccp/Api/Result/Eve/CharacterInfo.php';
		$response = new Zircote_Ccp_Api_Result_Eve_CharacterInfo($response);
		return $response;
	}
	
	public function _getRequest(){
		return array();	
	}
	
	public function set_cache_key(){
		$this->_cache_key = md5($this->_command);
	}
}