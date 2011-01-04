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
require_once 'Zircote/EveCentral/Api/Command/Abstract.php';
class Zircote_EveCentral_Api_Command_QuickLook extends Zircote_EveCentral_Api_Command_Abstract {
	
	public $path = '/api/quicklook';

	protected $_command = 'QuickLook';
	
	public function _parseResponse($response){
		require_once 'Zircote/EveCentral/Api/Result/QuickLook.php';
		$response = new Zircote_EveCentral_Api_Result_QuickLook($response);
		return $response;
	}
	
	public function _getRequest(){
		if(is_array($this->_args[0]) && array_key_exists('typeid', $this->_args[0])){
			return $this->_args[0];
		}
		if(isset($this->_args[0])){
			$args['typeid'] = $this->_args[0];
		} else {
			throw new Zircote_EveCentral_Api_Exception('typeid [The type ID to be queried] is required', 500);
		}
		if(isset($this->_args[1])){
			$args['sethours'] = $this->_args[1];
		}
		if(isset($this->_args[2])){
			$args['regionlimit'] = $this->_args[2];
		}
		if(isset($this->_args[3])){
			$args['usesystem'] = $this->_args[3];
		}
		if(isset($this->_args[4])){
			$args['setminQ'] = $this->_args[4];
		}
		return $args;
	}
	
	public function set_cache_key(){
		$this->_cache_key = md5($this->_command . PATH_SEPARATOR . implode(PATH_SEPARATOR, $this->_getRequest()));
	}
}