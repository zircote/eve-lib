<?php 


class Tests_Zircote_Ccp_Api_Command_Corp_MemberSecurity 
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2008-09-02 18:39:38</currentTime>
  <result>
    <member characterID="123456789" name="Tester">
      <rowset name="roles" key="roleID" columns="roleID,roleName" />
      <rowset name="grantableRoles" key="roleID" columns="roleID,roleName" />
      <rowset name="rolesAtHQ" key="roleID" columns="roleID,roleName" />
      <rowset name="grantableRolesAtHQ" key="roleID" columns="roleID,roleName" />
      <rowset name="rolesAtBase" key="roleID" columns="roleID,roleName" />
      <rowset name="grantableRolesAtBase" key="roleID" columns="roleID,roleName" />
      <rowset name="rolesAtOther" key="roleID" columns="roleID,roleName" />
      <rowset name="grantableRolesAtOther" key="roleID" columns="roleID,roleName" />
      <rowset name="titles" key="titleID" columns="titleID,titleName">
        <row titleID="1" titleName="Member " />
        <row titleID="512" titleName="Gas Attendant" />
        <row titleID="16384" titleName="General Manager" />
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
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('member', $out->result['result']);
		$this->assertArrayHasKey('characterID', $out->result['result']['member']);
		$this->assertArrayHasKey('name', $out->result['result']['member']);
		$this->assertArrayHasKey('roles', $out->result['result']['member']);
		$this->assertArrayHasKey('grantableRoles', $out->result['result']['member']);
		$this->assertArrayHasKey('rolesAtBase', $out->result['result']['member']);
		$this->assertArrayHasKey('grantableRolesAtBase', $out->result['result']['member']);
// 		print_r($out->result);
 	}
}