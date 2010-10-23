<?php 


class Tests_Zircote_Ccp_Api_Result_Corp_StarbaseDetail 
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2010-05-29 20:36:56</currentTime>
  <result>
    <state>4</state>
    <stateTimestamp>2009-05-02 21:31:36</stateTimestamp>
    <onlineTimestamp>2009-04-18 23:30:29</onlineTimestamp>
    <generalSettings>
      <usageFlags>3</usageFlags>
      <deployFlags>0</deployFlags>
      <allowCorporationMembers>1</allowCorporationMembers>
      <allowAllianceMembers>1</allowAllianceMembers>
    </generalSettings>
    <combatSettings>
      <useStandingsFrom ownerID="154683985" />
      <onStandingDrop standing="990" />
      <onStatusDrop enabled="0" standing="0" />
      <onAggression enabled="0" />
      <onCorporationWar enabled="1" />
    </combatSettings>
    <rowset name="fuel" key="typeID" columns="typeID,quantity">
      <row typeID="16275" quantity="2447" />
      <row typeID="16274" quantity="18758" />
      <row typeID="9848" quantity="166" />
      <row typeID="9832" quantity="332" />
      <row typeID="3689" quantity="332" />
      <row typeID="44" quantity="166" />
      <row typeID="16273" quantity="6142" />
      <row typeID="16272" quantity="5644" />
      <row typeID="3683" quantity="1162" />
    </rowset>
  </result>
  <cachedUntil>2010-05-29 21:36:56</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testStarbaseDetail(){
 		require_once 'Zircote/Ccp/Api/Result/Corp/StarbaseDetail.php';
 		$out = new Zircote_Ccp_Api_Result_Corp_StarbaseDetail($this->sharedFixture);
// 		print_r($out->xml);
// 		print_r($out->result);
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('state', $out->result['result']);
		$this->assertArrayHasKey('stateTimestamp', $out->result['result']);
		$this->assertArrayHasKey('onlineTimestamp', $out->result['result']);
		$this->assertArrayHasKey('generalSettings', $out->result['result']);
			$this->assertArrayHasKey('usageFlags', $out->result['result']['generalSettings']);
			$this->assertArrayHasKey('deployFlags', $out->result['result']['generalSettings']);
			$this->assertArrayHasKey('allowCorporationMembers', $out->result['result']['generalSettings']);
			$this->assertArrayHasKey('allowAllianceMembers', $out->result['result']['generalSettings']);
		$this->assertArrayHasKey('combatSettings', $out->result['result']);
			$this->assertArrayHasKey('useStandingsFrom', $out->result['result']['combatSettings']);
				$this->assertArrayHasKey('ownerID', $out->result['result']['combatSettings']['useStandingsFrom']);
			$this->assertArrayHasKey('onStandingDrop', $out->result['result']['combatSettings']);
				$this->assertArrayHasKey('standing', $out->result['result']['combatSettings']['onStandingDrop']);
			$this->assertArrayHasKey('onStatusDrop', $out->result['result']['combatSettings']);
				$this->assertArrayHasKey('enabled', $out->result['result']['combatSettings']['onStatusDrop']);
				$this->assertArrayHasKey('standing', $out->result['result']['combatSettings']['onStatusDrop']);
			$this->assertArrayHasKey('onCorporationWar', $out->result['result']['combatSettings']);
				$this->assertArrayHasKey('enabled', $out->result['result']['combatSettings']['onCorporationWar']);
		$this->assertArrayHasKey('fuel', $out->result['result']);
		foreach ($out->result['result']['fuel'] as $typeID => $fuel) {
			$this->assertArrayHasKey('typeID', $fuel);
			$this->assertArrayHasKey('quantity', $fuel);
			$this->assertEquals($typeID, $fuel['typeID']);
		}
 	}
}