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

class Zircote_EveCentral_Api_Result_Abstract {

	public $xml;
	public $result;
	
	public function __construct($xml = null){
		if($xml){
			$this->loadXML($xml);
		} 
	}
	
	public function loadXML($xml){
			$this->xml = $xml;
			if(!$sXml = simplexml_load_string($this->xml)){
				require_once 'Zircote/Ccp/Api/Exception.php';
				throw new Zircote_Ccp_Api_Exception('failed to load valid XML EVE-API Endpoint may be down', 500);
				return;
			}else {
			}
			$result = $this->parse($sXml);
			$this->result = $result;
	}
	
	public function parse(SimpleXMLElement $sXml){
		return array();
	}

	public function __wakeup(){
		$this->loadXML($this->xml);
	}
}