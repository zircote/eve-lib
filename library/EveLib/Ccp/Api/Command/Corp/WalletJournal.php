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
require_once 'EveLib/Ccp/Api/Command/Abstract.php';
class EveLib_Ccp_Api_Command_Corp_WalletJournal extends EveLib_Ccp_Api_Command_Abstract {
	
	public $path = '/corp/WalletJournal.xml.aspx';

	protected $_command = 'WalletJournal';
	
	public function _parseResponse($response){
		require_once 'EveLib/Ccp/Api/Result/Corp/WalletJournal.php';
		$response = new EveLib_Ccp_Api_Result_Corp_WalletJournal($response);
//		print_r( $response ); 
		return $response;
	}
	
	public function _getRequest(){
		if(isset($this->_args[0])){
			$args['accountKey'] = $this->_args[0];
		} else {
			throw new EveLib_Ccp_Api_Exception('accountKey [1000..1006] is required to execute this method', 500);
		}
		if(isset($this->_args[1]) && $this->_args[1] !== null){
			$args['fromID'] = $this->_args[1];
		}
		if(isset($this->_args[2]) && $this->_args[2] !== null){
			$args['rowCount'] = $this->_args[2];
		}
		
		$args = array_merge($args, $this->_api->_api);
		return $args;
	}
	
	public function set_cache_key(){
		$this->_cache_key = md5($this->_command . PATH_SEPARATOR . implode(PATH_SEPARATOR, $this->_getRequest()));
	}
}