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

class Zircote_Ccp_Api_Result_Corp_MemberMedalsTest 
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2009-05-03 22:52:26</currentTime>
  <result>
    <rowset name="issuedMedals" key="medalID" columns="medalID,characterID,reason,status,issuerID,issued">
      <row medalID="24216" characterID="1302462525" reason="Its True" status="public" issuerID="1824523597" issued="2009-05-03 03:03:55" />
    </rowset>
  </result>
  <cachedUntil>2009-05-04 21:52:26</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @group Zircote_Ccp_Api_Result_Corp
 	 */
 	public function testMemberMedals(){
 		require_once 'Zircote/Ccp/Api/Result/Corp/MemberMedals.php';
 		$out = new Zircote_Ccp_Api_Result_Corp_MemberMedals($this->sharedFixture);
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('issuedMedals', $out->result['result']);
		foreach (explode(',','medalID,characterID,reason,status,issuerID,issued') as $row) {
			$this->assertArrayHasKey($row, $out->result['result']['issuedMedals']['24216']);
		}
// 		print_r($out->result);
 	}
}