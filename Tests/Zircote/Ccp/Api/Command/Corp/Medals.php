<?php 


class Tests_Zircote_Ccp_Api_Command_Corp_Medals 
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2008-12-06 23:20:41</currentTime>
  <result>
    <rowset name="medals" key="medalID" columns="medalID,title,description,creatorID,created" />
  </result>
  <cachedUntil>2008-12-07 22:20:41</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testMedals(){
 		require_once 'Zircote/Ccp/Api.php';
 		require_once 'Zircote/Ccp/Api/Result/Corp/Medals.php';
 		$api = new Zircote_Ccp_Api(Tests_AllTests::$tests_config);
 		$out = $api->setScope('Corp')
 			->Medals();
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('medals', $out->result['result']);
// 		print_r($out->result);
 	}
}