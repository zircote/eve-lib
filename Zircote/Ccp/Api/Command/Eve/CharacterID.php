<?php 

require_once 'Zircote/Ccp/Api/Command/Abstract.php';

/**
 * @todo args: names	 string	 Comma-separated list of character names to query
 * Enter description here ...
 * @author zircote
 *
 */
class Zircote_Ccp_Api_Command_Eve_CharacterID extends Zircote_Ccp_Api_Command_Abstract {
	public $path = '/eve/CharacterID.xml.aspx';

	protected $_command = 'CharacterID';
	
	public function _parseResponse($response){
		require_once 'Zircote/Ccp/Api/Result/Eve/CharacterID.php';
		$response = new Zircote_Ccp_Api_Result_Eve_CharacterID($response);
		return $response;
	}
	
	public function _getRequest(){
		$args = array(
			'names' => implode(',', $this->_args[0]),
			'path' => $this->path
		);
		return $args;	
	}
	
	public function set_cache_key(){
		$this->_cache_key = md5($this->_command);
	}
}