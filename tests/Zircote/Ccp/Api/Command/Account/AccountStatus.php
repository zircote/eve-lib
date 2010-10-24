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

class Tests_Zircote_Ccp_Api_Command_Account_AccountStatus
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="1">
  <currentTime>2007-12-02 19:37:55</currentTime>
  <result>
    <rowset name="alliances" key="allianceID" columns="name,shortName,allianceID,executorCorpID,memberCount,startDate">
      <row name="Starbase Anchoring Alliance" shortName="MATT" allianceID="150382481"
           executorCorpID="150279367" memberCount="4" startDate="2007-09-18 11:04:00">
        <rowset name="memberCorporations" key="corporationID" columns="corporationID,startDate">
          <row corporationID="150279367" startDate="2007-09-18 11:04:00" />
          <row corporationID="150333466" startDate="2007-09-19 11:04:00" />
        </rowset>
      </row>
      <row name="The Dead Rabbits" shortName="TL.DR" allianceID="150430947"
           executorCorpID="150212025" memberCount="3" startDate="2007-11-12 16:00:00">
        <rowset name="memberCorporations" key="corporationID" columns="corporationID,startDate">
          <row corporationID="150212025" startDate="2007-11-12 16:00:00" />
        </rowset>
      </row>
    </rowset>
  </result>
  <cachedUntil>2007-12-02 20:37:55</cachedUntil>
</eveapi>	
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testAccountStatus(){
// 		$this->markTestSkipped();
 		require_once 'Zircote/Ccp/Api.php';
 		require_once 'Zircote/Ccp/Api/Result/Account/AccountStatus.php';
 		$api = new Zircote_Ccp_Api(Tests_AllTests::$tests_config);
 		$out = $api->setScope('Account')
 			->AccountStatus();
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('result', $out->result);
			$this->assertArrayHasKey('userID', $out->result['result']);
			$this->assertArrayHasKey('paidUntil', $out->result['result']);
			$this->assertArrayHasKey('createDate', $out->result['result']);
			$this->assertArrayHasKey('logonCount', $out->result['result']);
			$this->assertArrayHasKey('logonMinutes', $out->result['result']);
 		$api = $out = null;
 	}
}