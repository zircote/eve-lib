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
//require_once 'EveLib/Ccp/Api/Command/Interface.php';

abstract class EveLib_Ccp_Api_Command_Abstract implements EveLib_Ccp_Api_Command_Interface {
	
	/**
	 * 
	 * @var EveLib_Ccp_Api
	 */
	public $_api;
	
	protected $_args;
	
	protected $_scope;
	
	protected $_command;
	
	public $path;
	
	protected $_cache_key;
	
	protected $_cache_time = 14400;
	
	public function __construct(EveLib_Ccp_Api $api, $name, $args){
		$this->_api = $api;
		$this->_args = $args;
	}
	
	protected function _parseResponse($response){
		return $response;
	}
	
	
	public function get_path(){
		return $this->path;
	}
	
	protected function setCacheTime($current, $cachedTill){
		echo $this->_cacheTime =  (integer) strtotime($cachedTill) - strtotime($current);
	}
	
	protected function isExpired($cachedValues){
//		print_r($cachedValues);
		if(array_key_exists('cachedUntil',$cachedValues->result)){
			return strtotime($cachedValues->result['cachedUntil']) < strtotime(gmdate('Y-m-d H:i:s')) ? true : false;
		} elseif(array_key_exists('cachedUntil',$cachedValues->result['result'])){
			return strtotime($cachedValues->result['result']['cachedUntil']) < strtotime(gmdate('Y-m-d H:i:s')) ? true : false;
		} else {
			return false;
		}
	}
	
	public function write(){
		$this->set_cache_key();
		$this->_api->getCache()
			->setLifetime($this->_cache_time);
	}

	public function read(){
		$cache = $this->_api->getCache();
		$key = $this->get_cache_key();
		$result = $cache->load($key);
		if(!$result || $this->isExpired($result)){
			$result = $this->_api->getConnection()->handle($this);
			if($result && !$this->isError($result) && !empty($result->result['result'])){
				$cache->save($result, $this->get_cache_key());
			}
		}
		return $result;
	}
	
	public function isError($result){
		if(key_exists('error', $result)){
			return true;
		} else {
			return false;
		}
	}
	
	public function set_cache_key(){
		return $this->_command . PATH_SEPARATOR . 
		implode(DIRECTORY_SEPARATOR, $this->_getRequest());
	}
	
	public function get_cache_key(){
		return $this->_cache_key;
	}
}