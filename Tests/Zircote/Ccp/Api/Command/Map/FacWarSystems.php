<?php 


class Tests_Zircote_Ccp_Api_Command_Map_FacWarSystems 
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<eveapi version="2">
  <currentTime>2008-06-30 06:50:05</currentTime>
    <result>
       <rowset name="solarSystems" key="solarSystemID" columns="solarSystemID,solarSystemName,occupyingFactionID,occupyingFactionName,contested">
         <row solarSystemID="30002056" solarSystemName="Resbroko" occupyingFactionID="0" occupyingFactionName="" contested="True"/>
         <row solarSystemID="30002057" solarSystemName="Hadozeko" occupyingFactionID="0" occupyingFactionName="" contested="False"/>
         <row solarSystemID="30003068" solarSystemName="Kourmonen" occupyingFactionID="500002" occupyingFactionName="Minmatar Republic" contested="False"/>
         <row solarSystemID="30003069" solarSystemName="Kamela" occupyingFactionID="500002" occupyingFactionName="Minmatar Republic" contested="True"/>
      </rowset>
   </result>
   <cachedUntil>2008-06-30 07:50:05</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testFacWarSystems(){
 		require_once 'Zircote/Ccp/Api.php';
 		require_once 'Zircote/Ccp/Api/Result/Map/FacWarSystems.php';
 		$api = new Zircote_Ccp_Api;
 		$out = $api->setScope('Map')
 			->FacWarSystems();
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('result', $out->result);
		$this->assertArrayHasKey('solarSystems', $out->result['result']);
		$this->assertArrayHasKey('solarSystemID', $out->result['result']['solarSystems']);
// 		print_r($out->result);
 	}
}