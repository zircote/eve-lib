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

class Zircote_Ccp_Api_Connection {
	
	private $_curl;
	
	protected $_uri;
	
	public function __construct(array $options){
		$uri = "{$options['protocol']}://{$options['host']}:{$options['port']}";
		$this->setUri($uri); 
	}
	
	public function get_curl($url){
		$this->_curl = curl_init($url);
		curl_setopt($this->_curl, CURLOPT_POST, true);
		curl_setopt($this->_curl, CURLOPT_HEADER, false);
		curl_setopt($this->_curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($this->_curl, CURLOPT_FOLLOWLOCATION, false);
		return $this->_curl;
	}
	
	public function setUri($uri){
		require_once 'Zend/Uri.php';
		if(!Zend_Uri::check($uri)){
			require_once 'Zircote/Ccp/Api/Exception.php';
			throw new Zircote_Ccp_Api_Exception("URI provided is inValid [{$url}]", 500);
		}
		$this->_uri = $uri;
		return $this;
	}
	
	public function get_uri(){
		return $this->_uri;
	}
	
	public function handle(Zircote_Ccp_Api_Command_Abstract $command){
		$options = $command->_getRequest();
		$this->get_curl($this->get_uri() . $command->path);
		if(is_array($options) && count($options)){
			$params = null;
			foreach ($options as $key => $value) {
				$params .= "{$key}=".urlencode($value) . "&";
			}
			$params = rtrim($params, '&');
			curl_setopt($this->_curl, CURLOPT_POSTFIELDS, $params);
		}
		return $command->_parseResponse(curl_exec($this->_curl));
	}
}