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

class Zircote_Ccp_Api_Result_Char_MedalsTest
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2008-12-06 23:18:18</currentTime>
  <result>
    <rowset name="currentCorporation" key="medalID" columns="medalID,reason,status,issuerID,issued" />
    <rowset name="otherCorporations" key="medalID" columns="medalID,reason,status,issuerID,issued,corporationID,title,description">
        <row medalID="4106" reason="For continued support, loyalty and dedication towards the Centre for Advanced Studies"
            status="private" issuerID="132533870" issued="2008-11-25 10:36:01" corporationID="1711141370" title="Medal of Service"
            description="For taking initiative and making an extraordinary contribution towards the corporation"/>
    </rowset>
  </result>
  <cachedUntil>2008-12-07 22:18:18</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @group Zircote_Ccp_Api_Result_Char
 	 */
 	public function testAccountStatus(){
 		require_once 'Zircote/Ccp/Api/Result/Char/Medals.php';
 		$out = new Zircote_Ccp_Api_Result_Char_Medals($this->sharedFixture);
// 		print_r($out->result); 
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('currentCorporation', $out->result['result']);
		$this->assertArrayHasKey('otherCorporations', $out->result['result']);
		foreach (explode(',','medalID,reason,status,issuerID,issued,corporationID,title,description') as $row) {
			$this->assertArrayHasKey($row, $out->result['result']['otherCorporations']['4106']);
		}
 		$api = $out = null;
 	}
}