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

class EveLib_Ccp_Api_Result_Corp_ContactListTest 
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<eveapi version="2">
  <currentTime>2010-05-29 22:35:46</currentTime>
  <result>
    <rowset name="corporateContactList" key="contactID" columns="contactID,contactName,standing">
      <row contactID="797400947" contactName="CCP Garthagk" standing="-10" />
    </rowset>
    <rowset name="allianceContactList" key="contactID" columns="contactID,contactName,standing">
      <row contactID="797400947" contactName="CCP Garthagk" standing="5" />
    </rowset>
  </result>
  <cachedUntil>2010-05-29 22:50:46</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @group EveLib_Ccp_Api_Result_Corp
 	 */
 	public function testContactList(){
 		require_once 'EveLib/Ccp/Api/Result/Corp/ContactList.php';
 		$out = new EveLib_Ccp_Api_Result_Corp_ContactList($this->sharedFixture);
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('corporateContactList', $out->result['result']);
		foreach (explode(',','contactID,contactName,standing') as $row) {
			$this->assertArrayHasKey($row, $out->result['result']['corporateContactList']['797400947']);
			$this->assertArrayHasKey($row, $out->result['result']['allianceContactList']['797400947']);
		}
 	}
}