<?php 


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