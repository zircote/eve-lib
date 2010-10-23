<?php 


class Tests_Zircote_Ccp_Api_Result_Server_ServerStatus 
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
 		require_once 'Zircote/Ccp/Api/Result/Server/ServerStatus.php';
 		$out = new Zircote_Ccp_Api_Result_Server_ServerStatus($this->sharedFixture);
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('serverOpen', $out->result['result']);
		$this->assertArrayHasKey('onlinePlayers', $out->result['result']);
 	}
}