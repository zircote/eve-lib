<?php 


class Tests_Zircote_Ccp_Api_Command_Map_Sovereignty 
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2009-12-23 05:38:47</currentTime>
  <result>
    <rowset name="solarSystems" key="solarSystemID" columns="solarSystemID,allianceID,factionID,solarSystemName,corporationID">
      <row solarSystemID="30023410" allianceID="0" factionID="500002" solarSystemName="Embod" corporationID="0"/>
      <row solarSystemID="30001597" allianceID="1028876240" factionID="0" solarSystemName="M-NP5O" corporationID="421957727" />
      <row solarSystemID="30001815" allianceID="389924442" factionID="0" solarSystemName="4AZV-W" corporationID="123456789"/>
      <row solarSystemID="30001816" allianceID="0" factionID="0" solarSystemName="UNV-3J" corporationID="123456789"/>
      <row solarSystemID="30000479" allianceID="0" factionID="0" solarSystemName="SLVP-D" corporationID="123456789"/>
      <row solarSystemID="30000480" allianceID="824518128" factionID="0" solarSystemName="0-G8NO" corporationID="123456789"/>
    </rowset>
    <dataTime>2009-12-23 05:16:38</dataTime>
  </result>
  <cachedUntil>2009-12-23 06:38:47</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testSovereignty(){
 		require_once 'Zircote/Ccp/Api.php';
 		require_once 'Zircote/Ccp/Api/Result/Map/Sovereignty.php';
 		$api = new Zircote_Ccp_Api;
 		$out = $api->setScope('Map')
 			->Sovereignty();
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('result', $out->result);
		$this->assertArrayHasKey('solarSystems', $out->result['result']);
		$this->assertArrayHasKey('solarSystemID', $out->result['result']['solarSystems']);
// 		print_r($out->result);
 	}
}