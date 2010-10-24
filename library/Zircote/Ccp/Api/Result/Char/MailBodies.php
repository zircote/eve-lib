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
require_once 'Zircote/Ccp/Api/Result/Abstract.php';

class Zircote_Ccp_Api_Result_Char_MailBodies extends Zircote_Ccp_Api_Result_Abstract {
	

	
	public function parse(SimpleXMLElement $sXml){
		$result = array();
		switch ($sXml->getName()) {
			case 'rowset':
				$result = $this->rowset($sXml);
			break;
			
			case 'message':
				$result = $this->row($sXml);
			break;
			
			case 'row':
				$result = $this->row($sXml);
			break;
			
			case 'error':
				$result = $this->error($sXml);
			break;
			
			default:
				$result[$sXml->getName()] = array();
				if($sXml->count()){
					foreach ($sXml as $xml) {
						$rs = $this->parse($xml);
						$result[$sXml->getName()] = array_merge($result[$sXml->getName()], $rs);
					}
				} else {
					$result[$sXml->getName()] = (string) $sXml;
				}
				if(count($attr = $this->attr($sXml))){
					foreach ($attr as $key => $value) {
						$result[$sXml->getName()][$key] = $value;
					}
				}
			break;
		}
		return $result;
	}
}