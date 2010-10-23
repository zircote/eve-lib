<?php 


class Tests_Zircote_Ccp_Api_Result_Map_Kills 
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2007-12-16 11:21:59</currentTime>
  <result>
    <rowset name="solarSystems" key="solarSystemID" columns="solarSystemID,shipKills,factionKills,podKills">
      <row solarSystemID="30001343" shipKills="0" factionKills="17" podKills="0" />
      <row solarSystemID="30002671" shipKills="0" factionKills="340" podKills="0" />
      <row solarSystemID="30005327" shipKills="0" factionKills="21" podKills="0" />
      <row solarSystemID="30002410" shipKills="0" factionKills="3" podKills="0" />
      <row solarSystemID="30001082" shipKills="0" factionKills="3" podKills="0" />
      <row solarSystemID="30001105" shipKills="0" factionKills="6" podKills="0" />
      <row solarSystemID="30001937" shipKills="0" factionKills="14" podKills="0" />
      <row solarSystemID="30003560" shipKills="0" factionKills="3" podKills="0" />
      <row solarSystemID="30002478" shipKills="3" factionKills="15" podKills="2" />
      <row solarSystemID="30004101" shipKills="0" factionKills="22" podKills="0" />
    </rowset>
    <dataTime>2007-12-16 10:57:53</dataTime>
  </result>
  <cachedUntil>2007-12-16 12:21:59</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testKills(){
 		require_once 'Zircote/Ccp/Api/Result/Map/Kills.php';
 		$out = new Zircote_Ccp_Api_Result_Map_Kills($this->sharedFixture);
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('result', $out->result);
		$this->assertArrayHasKey('solarSystems', $out->result['result']);
		foreach (explode(',','solarSystemID,shipKills,factionKills,podKills') as $row) {
			$this->assertArrayHasKey($row, $out->result['result']['solarSystems']['30001343']);
			$this->assertArrayHasKey($row, $out->result['result']['solarSystems']['30001082']);
			$this->assertArrayHasKey($row, $out->result['result']['solarSystems']['30004101']);
		}
// 		print_r($out->result);
 	}
}