<?php 
/**
 * @license Copyright 2010 Robert Allen
 * 
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * 
 * http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
//require_once 'EveLib/Ccp/Api/Command/Abstract.php';

/**
 * @todo args: ids	 string	 Comma-separated list of character IDs to query
 * Enter description here ...
 * @author EveLib
 *
 */
class EveLib_Ccp_Api_Command_Eve_CharacterName extends EveLib_Ccp_Api_Command_Abstract {
	public $path = '/eve/CharacterName.xml.aspx';

	protected $_command = 'CharacterName';
	
	public function _parseResponse($response){
		//require_once 'EveLib/Ccp/Api/Result/Eve/CharacterName.php';
		$response = new EveLib_Ccp_Api_Result_Eve_CharacterName($response);
		return $response;
	}
	
	public function _getRequest(){
		$args = array(
			'ids' => implode(',', $this->_args[0])
		);
		return $args;	
	}
	
	public function set_cache_key(){
		$this->_cache_key = md5($this->_command);
	}
}