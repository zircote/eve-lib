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
require_once 'EveLib/EveCentral/Api/Command/Abstract.php';
class EveLib_EveCentral_Api_Command_Evemon extends EveLib_EveCentral_Api_Command_Abstract {
	
	public $path = '/api/evemon';

	protected $_command = 'Evemon';
	
	public function _parseResponse($response){
		require_once 'EveLib/EveCentral/Api/Result/Evemon.php';
		$response = new EveLib_EveCentral_Api_Result_Evemon($response);
		return $response;
	}
	
	public function _getRequest(){
		return null;
	}
	
	public function set_cache_key(){
		$this->_cache_key = md5($this->_command );
	}
}