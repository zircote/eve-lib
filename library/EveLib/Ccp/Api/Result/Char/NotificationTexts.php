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
//require_once 'EveLib/Ccp/Api/Result/Abstract.php';

class EveLib_Ccp_Api_Result_Char_NotificationTexts extends EveLib_Ccp_Api_Result_Abstract {
	
	

	
	public function row($sXml){
		if($sXml->count()){
			$result = $this->attr($sXml);
			foreach ($sXml->children() as $child){
				$r = $this->parse($child);
				$result = array_merge($result, $r);
			}
		} else {
			$result = $this->attr($sXml);
			if(null !== (string)$sXml){
				$result['notificationText'] = (string)$sXml;
			}
		}
		return $result;
	}
}