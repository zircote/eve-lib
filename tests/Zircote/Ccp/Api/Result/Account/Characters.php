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

class Tests_Zircote_Ccp_Api_Result_Account_Characters 
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="1">
  <currentTime>2007-12-12 11:48:50</currentTime>
  <result>
    <rowset name="characters" key="characterID" columns="name,characterID,corporationName,corporationID">
      <row name="Mary" characterID="150267069"
           corporationName="Starbase Anchoring Corp" corporationID="150279367" />
      <row name="Marcus" characterID="150302299"
           corporationName="Marcus Corp" corporationID="150333466" />
      <row name="Dieinafire" characterID="150340823"
           corporationName="Center for Advanced Studies" corporationID="1000169" />
    </rowset>
  </result>
  <cachedUntil>2007-12-12 12:48:50</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testAllianceList(){
 		require_once 'Zircote/Ccp/Api/Result/Account/Characters.php';
 		$out = new Zircote_Ccp_Api_Result_Account_Characters($this->sharedFixture);
// 		print_r($out->result);
 		
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('result', $out->result);
		$this->assertArrayHasKey('characters', $out->result['result']);
		foreach (explode(',', 'name,characterID,corporationName,corporationID') as $item){
			$this->assertArrayHasKey($item, $out->result['result']['characters']['150267069']);
		}
 		$api = $out = null;
 	}
}