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

class Zircote_EveCentral_Api_Result_MarketStat extends Zircote_EveCentral_Api_Result_Abstract {

	
	public function parse(SimpleXMLElement $sXml){
		$result = array();
		foreach ($sXml->marketstat->type as $types) {
			foreach ($types->attributes() as $key => $value) {
				(string)$key == 'id' ? $id = (string) $value: null;
			}
			foreach ($types as $items) {
				$t1 = array();
				foreach ($items as $_key => $_vale ) {
					$t1[(string)$_key] = (string)$_vale;
				}
				$result['marketstat'][$id][(string)$items->getName()] = $t1;
			}
		}
		return $result;
	}
}