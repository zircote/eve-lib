<?php 


class Tests_Zircote_Ccp_Api_Command_Map_Jumps 
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="1">
  <currentTime>2007-12-12 11:50:38</currentTime>
  <result>
    <rowset name="solarSystems" key="solarSystemID" columns="solarSystemID,shipJumps">
      <row solarSystemID="30001984" shipJumps="10" />
    </rowset>
    <dataTime>2007-12-12 11:50:38</dataTime>
  </result>
  <cachedUntil>2007-12-12 12:50:38</cachedUntil>
</eveapi>	
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testJumps(){
 		require_once 'Zircote/Ccp/Api.php';
 		require_once 'Zircote/Ccp/Api/Result/Map/Jumps.php';
 		$api = new Zircote_Ccp_Api;
 		$out = $api->setScope('Map')
 			->Jumps();
// 		print_r($out->result);
 	}
}