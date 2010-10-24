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

class Tests_Zircote_Ccp_Api_Command_Corp_MemberSecurityLog 
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2008-09-02 18:43:51</currentTime>
  <result>
    <rowset name="roleHistory" key="changeTime" columns="changeTime,characterID,issuerID,roleLocationType">
      <row changeTime="2008-08-07 17:57:00" characterID="1234567890" characterName="Tester" issuerID="1234567890" issuerName="Tester" roleLocationType="rolesAtOther">
        <rowset name="oldRoles" key="roleID" columns="roleID,roleName">
          <row roleID="8192" roleName="roleHangarCanTake1" />
          <row roleID="1048576" roleName="roleHangarCanQuery1" />
          <row roleID="2097152" roleName="roleHangarCanQuery2" />
          <row roleID="4194304" roleName="roleHangarCanQuery3" />
          <row roleID="8388608" roleName="roleHangarCanQuery4" />
          <row roleID="16777216" roleName="roleHangarCanQuery5" />
          <row roleID="33554432" roleName="roleHangarCanQuery6" />
          <row roleID="4398046511104" roleName="roleContainerCanTake1" />
        </rowset>
        <rowset name="newRoles" key="roleID" columns="roleID,roleName" />
      </row>
      <row changeTime="2008-08-07 17:57:00" characterID="1234567890" characterName="Tester" issuerID="1234567890" issuerName="Tester" roleLocationType="rolesAtOther">
        <rowset name="oldRoles" key="roleID" columns="roleID,roleName">
          <row roleID="8192" roleName="roleHangarCanTake1" />
          <row roleID="1048576" roleName="roleHangarCanQuery1" />
          <row roleID="2097152" roleName="roleHangarCanQuery2" />
          <row roleID="4194304" roleName="roleHangarCanQuery3" />
          <row roleID="8388608" roleName="roleHangarCanQuery4" />
          <row roleID="16777216" roleName="roleHangarCanQuery5" />
          <row roleID="33554432" roleName="roleHangarCanQuery6" />
          <row roleID="4398046511104" roleName="roleContainerCanTake1" />
        </rowset>
        <rowset name="newRoles" key="roleID" columns="roleID,roleName" />
      </row>
      <row changeTime="2008-08-07 17:57:00" characterID="1234567890" characterName="Tester" issuerID="1234567890" issuerName="Tester" roleLocationType="rolesAtOther">
        <rowset name="oldRoles" key="roleID" columns="roleID,roleName">
          <row roleID="8192" roleName="roleHangarCanTake1" />
          <row roleID="1048576" roleName="roleHangarCanQuery1" />
          <row roleID="2097152" roleName="roleHangarCanQuery2" />
          <row roleID="4194304" roleName="roleHangarCanQuery3" />
          <row roleID="8388608" roleName="roleHangarCanQuery4" />
          <row roleID="16777216" roleName="roleHangarCanQuery5" />
          <row roleID="33554432" roleName="roleHangarCanQuery6" />
          <row roleID="4398046511104" roleName="roleContainerCanTake1" />
        </rowset>
        <rowset name="newRoles" key="roleID" columns="roleID,roleName" />
      </row>
      <row changeTime="2008-08-07 17:57:00" characterID="1234567890" characterName="Tester" issuerID="1234567890" issuerName="Tester" roleLocationType="rolesAtOther">
        <rowset name="oldRoles" key="roleID" columns="roleID,roleName">
          <row roleID="2199023255552" roleName="roleEquipmentConfig" />
          <row roleID="4503599627370496" roleName="roleJuniorAccountant" />
        </rowset>
        <rowset name="newRoles" key="roleID" columns="roleID,roleName" />
      </row>
    </rowset>
  </result>
  <cachedUntil>2008-09-02 19:43:51</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testMemberSecurityLog(){
 		require_once 'Zircote/Ccp/Api.php';
 		require_once 'Zircote/Ccp/Api/Result/Corp/MemberSecurityLog.php';
 		$api = new Zircote_Ccp_Api(Tests_AllTests::$tests_config);
 		$out = $api->setScope('Corp')
 			->MemberSecurityLog();
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('roleHistory', $out->result['result']);
// 		print_r($out->result);
 	}
}