<?php 


class Tests_Zircote_Ccp_Api_Result_Corp_FacWarStats 
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2008-07-10 13:13:28</currentTime>
  <result>
    <factionID>500001</factionID>
    <factionName>Caldari State</factionName>
    <enlisted>2008-06-10 22:10:00</enlisted>
    <pilots>6</pilots>
 
    <killsYesterday>0</killsYesterday>
    <killsLastWeek>0</killsLastWeek>
    <killsTotal>0</killsTotal>
    <victoryPointsYesterday>0</victoryPointsYesterday>
    <victoryPointsLastWeek>1144</victoryPointsLastWeek>
    <victoryPointsTotal>0</victoryPointsTotal>
 
  </result>
  <cachedUntil>2008-07-10 14:13:28</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testFacWarStats(){
 		require_once 'Zircote/Ccp/Api/Result/Corp/FacWarStats.php';
 		$out = new Zircote_Ccp_Api_Result_Corp_FacWarStats($this->sharedFixture);
// 		print_r($out->result);
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('factionID', $out->result['result']);
		$this->assertArrayHasKey('killsTotal', $out->result['result']);
		$this->assertArrayHasKey('victoryPointsTotal', $out->result['result']);
 	}
}