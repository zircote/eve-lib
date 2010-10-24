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

class Tests_Zircote_Ccp_Api_Command_Corp_MemberSecurity 
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2008-09-02 18:39:38</currentTime>
  <result>
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2010-10-21 02:12:23</currentTime>
  <result>
    <member characterID="102407616" name="Tankero">
      <rowset name="roles" key="roleID" columns="roleID,roleName" />
      <rowset name="grantableRoles" key="roleID" columns="roleID,roleName" />
      <rowset name="rolesAtHQ" key="roleID" columns="roleID,roleName" />
      <rowset name="grantableRolesAtHQ" key="roleID" columns="roleID,roleName" />
      <rowset name="rolesAtBase" key="roleID" columns="roleID,roleName" />
      <rowset name="grantableRolesAtBase" key="roleID" columns="roleID,roleName" />
      <rowset name="rolesAtOther" key="roleID" columns="roleID,roleName" />
      <rowset name="grantableRolesAtOther" key="roleID" columns="roleID,roleName" />
      <rowset name="titles" key="titleID" columns="titleID,titleName" />
    </member>
    <member characterID="111981123" name="Gharib Ghar">
      <rowset name="roles" key="roleID" columns="roleID,roleName" />
      <rowset name="grantableRoles" key="roleID" columns="roleID,roleName" />
      <rowset name="rolesAtHQ" key="roleID" columns="roleID,roleName" />
      <rowset name="grantableRolesAtHQ" key="roleID" columns="roleID,roleName" />
      <rowset name="rolesAtBase" key="roleID" columns="roleID,roleName" />
      <rowset name="grantableRolesAtBase" key="roleID" columns="roleID,roleName" />
      <rowset name="rolesAtOther" key="roleID" columns="roleID,roleName" />
      <rowset name="grantableRolesAtOther" key="roleID" columns="roleID,roleName" />
      <rowset name="titles" key="titleID" columns="titleID,titleName">
        <row titleID="2048" titleName="Rim Pilot" />
      </rowset>
    </member>
  </result>
  <cachedUntil>2008-09-02 19:39:38</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testMemberSecurity(){
 		require_once 'Zircote/Ccp/Api.php';
 		require_once 'Zircote/Ccp/Api/Result/Corp/MemberSecurity.php';
 		$api = new Zircote_Ccp_Api(Tests_AllTests::$tests_config);
 		$out = $api->setScope('Corp')
 			->MemberSecurity();
// 		print_r($out->result);
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		foreach ($out->result['result'] as $member) {
			$this->assertArrayHasKey('characterID', $member);
			$this->assertArrayHasKey('name', $member);
			$this->assertArrayHasKey('roles', $member);
			$this->assertArrayHasKey('grantableRoles', $member);
			$this->assertArrayHasKey('rolesAtBase', $member);
			$this->assertArrayHasKey('grantableRolesAtBase', $member);
		}
// 		print_r($out->result);
 	}
}