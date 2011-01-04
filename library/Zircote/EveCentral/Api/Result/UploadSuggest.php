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
require_once 'Zircote/EveCentral/Api/Result/Abstract.php';

class Zircote_EveCentral_Api_Result_UploadSuggest extends Zircote_EveCentral_Api_Result_Abstract {

	
	public function parse(SimpleXMLElement $sXml){
		$result = array();
		foreach ($sXml->upload_suggest->children() as $item) {
			$result['upload_suggest'][(string)$item['id']] = array('id' => (string)$item['id'] , 'name' => (string) $item);
		}
		return $result;
	}
	
	private function _parseOrder($sXml){
		$result = array();
		foreach ($sXml as $order) {
			foreach ($order->children() as $_key => $xml) {
				$result[(string) $order['id'] ][(string)$_key] = (string) $xml;
			}
		}
		return $result;
	}
}