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

class Tests_Zircote_Ccp_Api_Result_Corp_MemberSecurity 
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
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
      <rowset name="roles" key="roleID" columns="roleID,roleName"  >
        <row roleID="2048" roleName="Rim Pilot" />
      </rowset>
      <rowset name="grantableRoles" key="roleID" columns="roleID,roleName"  >
        <row roleID="2048" roleName="Rim Pilot" />
      </rowset>
      <rowset name="rolesAtHQ" key="roleID" columns="roleID,roleName"  >
        <row roleID="2048" roleName="Rim Pilot" />
      </rowset>
      <rowset name="grantableRolesAtHQ" key="roleID" columns="roleID,roleName"  >
        <row roleID="2048" roleName="Rim Pilot" />
      </rowset>
      <rowset name="rolesAtBase" key="roleID" columns="roleID,roleName"  >
        <row roleID="2048" roleName="Rim Pilot" />
      </rowset>
      <rowset name="grantableRolesAtBase" key="roleID" columns="roleID,roleName"  >
        <row roleID="2048" roleName="Rim Pilot" />
      </rowset>
      <rowset name="rolesAtOther" key="roleID" columns="roleID,roleName"  >
        <row roleID="2048" roleName="Rim Pilot" />
      </rowset>
      <rowset name="grantableRolesAtOther" key="roleID" columns="roleID,roleName" >
        <row roleID="2048" roleName="Rim Pilot" />
      </rowset>
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
 		require_once 'Zircote/Ccp/Api/Result/Corp/MemberSecurity.php';
 		$out = new Zircote_Ccp_Api_Result_Corp_MemberSecurity($this->sharedFixture);
// 		print_r($out->result);
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$character = $out->result['result']['Gharib Ghar'];
		foreach (explode(',','roleID,roleName') as $row) {
			$this->assertArrayHasKey($row, $character['roles']['2048']);
		}
		foreach (explode(',','roleID,roleName') as $row) {
			$this->assertArrayHasKey($row, $character['grantableRoles']['2048']);
		}
		foreach (explode(',','roleID,roleName') as $row) {
			$this->assertArrayHasKey($row, $character['rolesAtHQ']['2048']);
		}
		foreach (explode(',','roleID,roleName') as $row) {
			$this->assertArrayHasKey($row, $character['grantableRolesAtHQ']['2048']);
		}
		foreach (explode(',','roleID,roleName') as $row) {
			$this->assertArrayHasKey($row, $character['rolesAtBase']['2048']);
		}
		foreach (explode(',','roleID,roleName') as $row) {
			$this->assertArrayHasKey($row, $character['grantableRolesAtBase']['2048']);
		}
		foreach (explode(',','roleID,roleName') as $row) {
			$this->assertArrayHasKey($row, $character['rolesAtOther']['2048']);
		}
		foreach (explode(',','roleID,roleName') as $row) {
			$this->assertArrayHasKey($row, $character['grantableRolesAtOther']['2048']);
		}
		foreach (explode(',','titleID,titleName') as $row) {
			$this->assertArrayHasKey($row, $character['titles']['2048']);
		}
// 		print_r($out->result);
 	}
}