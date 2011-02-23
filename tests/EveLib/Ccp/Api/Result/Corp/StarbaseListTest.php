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

class EveLib_Ccp_Api_Result_Corp_StarbaseListTest 
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="1">
  <currentTime>2007-12-02 19:52:12</currentTime>
  <result>
    <rowset name="starbases" key="itemID" columns="itemID,typeID,locationID,moonID,state,stateTimestamp,onlineTimestamp">
      <row itemID="150354725" typeID="12235" locationID="30000380" moonID="40023754"
           state="4" stateTimestamp="0001-01-01 00:00:00" onlineTimestamp="2007-08-06 13:43:16" />
      <row itemID="150354773" typeID="20059" locationID="30001984" moonID="40126738"
           state="1" stateTimestamp="0001-01-01 00:00:00" onlineTimestamp="0001-01-01 00:00:00" />
      <row itemID="150357658" typeID="12235" locationID="30001984" moonID="40126713"
           state="1" stateTimestamp="0001-01-01 00:00:00" onlineTimestamp="0001-01-01 00:00:00" />
      <row itemID="150318232" typeID="16286" locationID="30003109" moonID="40197483"
           state="4" stateTimestamp="0001-01-01 00:00:00" onlineTimestamp="2007-05-23 16:54:43" />
    </rowset>
  </result>
  <cachedUntil>2007-12-03 01:52:12</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @group EveLib_Ccp_Api_Result_Corp
 	 */
 	public function testStarbaseList(){
 		require_once 'EveLib/Ccp/Api/Result/Corp/StarbaseList.php';
 		$out = new EveLib_Ccp_Api_Result_Corp_StarbaseList($this->sharedFixture);
// 		print_r($out->result);
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('starbases', $out->result['result']);
		foreach (explode(',','itemID,typeID,locationID,moonID,state,stateTimestamp,onlineTimestamp') as $row) {
			$this->assertArrayHasKey($row, $out->result['result']['starbases']['150354725']);
			$this->assertArrayHasKey($row, $out->result['result']['starbases']['150357658']);
			$this->assertArrayHasKey($row, $out->result['result']['starbases']['150318232']);
		}
 	}
}