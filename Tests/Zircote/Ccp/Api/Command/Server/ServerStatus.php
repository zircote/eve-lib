<?php 


class Tests_Zircote_Ccp_Api_Command_Server_ServerStatus 
	extends PHPUnit_Framework_TestCase {
		
	public function setUp(){
		$this->sharedFixture = <<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2008-11-24 20:14:29</currentTime>
  <result>
    <serverOpen>True</serverOpen>
    <onlinePlayers>38102</onlinePlayers>
  </result>
  <cachedUntil>2008-11-24 20:17:29</cachedUntil>
</eveapi>
EOF;
	}
	
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testServerStatus(){
		require_once 'Zircote/Ccp/Api.php';
 		require_once 'Zircote/Ccp/Api/Result/Server/ServerStatus.php';
 		$api = new Zircote_Ccp_Api();
 		$out = $api->setScope('Server')
 			->ServerStatus();
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('serverOpen', $out->result['result']);
		$this->assertArrayHasKey('onlinePlayers', $out->result['result']);
// 		print_r($out->result);
 	}
}