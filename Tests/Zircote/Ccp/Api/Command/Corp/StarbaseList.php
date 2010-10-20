<?php 


class Tests_Zircote_Ccp_Api_Command_Corp_StarbaseList 
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="1">
  <currentTime>2007-12-02 19:52:12</currentTime>
  <result>
    <rowset name="starbases" key="itemID" columns="itemID,typeID,locationID,moonID,state,stateTimestamp,onlineTimestamp">
      <row itemID="150354725" typeID="12235" locationID="30000380" moonID="40023754"
           state="4" stateTimestamp="0001-01-01 00:00:00" onlineTimestamp="2007-08-06 13:43:16" />
      <row itemID="150354773" typeID="20059" locationID="30001984" moonID="40126738"
           state="1" stateTimestamp="0001-01-01 00:00:00" onlineTimestamp="0001-01-01 00:00:00" />
      <row itemID="150357658" typeID="12235" locationID="30001984" moonID="40126713"
           state="1" stateTimestamp="0001-01-01 00:00:00" onlineTimestamp="0001-01-01 00:00:00" />
      <row itemID="150318232" typeID="16286" locationID="30003109" moonID="40197483"
           state="4" stateTimestamp="0001-01-01 00:00:00" onlineTimestamp="2007-05-23 16:54:43" />
    </rowset>
  </result>
  <cachedUntil>2007-12-03 01:52:12</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testStarbaseList(){
 		require_once 'Zircote/Ccp/Api.php';
 		require_once 'Zircote/Ccp/Api/Result/Corp/StarbaseList.php';
 		$api = new Zircote_Ccp_Api(Tests_AllTests::$tests_config);
 		$out = $api->setScope('Corp')
 			->StarbaseList();
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('starbases', $out->result['result']);
		foreach ($out->result['result']['starbases'] as $itemID => $starbase) {
			$this->assertArrayHasKey('itemID', $starbase);
			$this->assertArrayHasKey('typeID', $starbase);
			$this->assertArrayHasKey('locationID', $starbase);
			$this->assertArrayHasKey('moonID', $starbase);
			$this->assertArrayHasKey('state', $starbase);
			$this->assertArrayHasKey('stateTimestamp', $starbase);
			$this->assertArrayHasKey('onlineTimestamp', $starbase);
			$this->assertEquals($itemID, $starbase['itemID']);
		}
// 		print_r($out->result);
 	}
}