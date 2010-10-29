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

class Zircote_Ccp_Api_Result_Corp_AccountBalanceTest 
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2007-06-18 22:40:16</currentTime>
  <result>
    <rowset name="accounts" key="accountID" columns="accountID,accountKey,balance">
      <row accountID="4759" accountKey="1000" balance="74171957.08"/>
      <row accountID="5687" accountKey="1001" balance="6.05"/>
      <row accountID="5688" accountKey="1002" balance="0.00"/>
      <row accountID="5689" accountKey="1003" balance="17349111.00"/>
      <row accountID="5690" accountKey="1004" balance="0.00"/>
      <row accountID="5691" accountKey="1005" balance="0.00"/>
      <row accountID="5692" accountKey="1006" balance="0.00"/>
    </rowset>
  </result>
  <cachedUntil>2007-06-18 22:40:26</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @group Zircote_Ccp_Api_Result_Corp
 	 */
 	public function testAccountBalance(){
 		require_once 'Zircote/Ccp/Api/Result/Corp/AccountBalance.php';
 		$out = new Zircote_Ccp_Api_Result_Corp_AccountBalance($this->sharedFixture);
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('accounts', $out->result['result']);
		foreach (explode(',','accountID,accountKey,balance') as $row) {
			$this->assertArrayHasKey($row, $out->result['result']['accounts']['4759']);
		}
// 		print_r($out->result);
 	}
}