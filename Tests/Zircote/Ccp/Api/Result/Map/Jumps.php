<?php 


class Tests_Zircote_Ccp_Api_Result_Map_Jumps 
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
 		require_once 'Zircote/Ccp/Api/Result/Map/Jumps.php';
 		$out = new Zircote_Ccp_Api_Result_Map_Jumps($this->sharedFixture);
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('result', $out->result);
		$this->assertArrayHasKey('dataTime', $out->result['result']);
		$this->assertArrayHasKey('solarSystems', $out->result['result']);
		foreach (explode(',','solarSystemID,shipJumps') as $row) {
			$this->assertArrayHasKey($row, $out->result['result']['solarSystems']['30001984']);
		}
 	}
}