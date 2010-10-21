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
		$args = array(
			'characterID' => $this->_args[0]
		);
		if($this->_api->_api['apiKey']){
			foreach ($this->_api->_api as $key => $value) {
				$api[$key] = $value;
			}
		}
		$args = array_merge($api,$args);
		return $args;		
	}
	
	public function set_cache_key(){
		$this->_cache_key = md5($this->_command . PATH_SEPARATOR . implode(PATH_SEPARATOR,$this->_getRequest()));
	}
}