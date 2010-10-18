<?php

/**
 * 
 * 
 * @author zircote
 *
 */
  class Tests_Zircote_Ccp_Api_Result_Abstract extends PHPUnit_Framework_TestCase {
 	
 	public function setUp(){
 		require_once 'Zircote/Ccp/Api/Result/Abstract.php';

		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2"> 
  <currentTime>2010-10-18 02:11:50</currentTime> 
  <result> 
    <totals> 
      <killsYesterday>485</killsYesterday> 
      <killsLastWeek>2708</killsLastWeek> 
      <killsTotal>382544</killsTotal> 
      <victoryPointsYesterday>30916</victoryPointsYesterday> 
      <victoryPointsLastWeek>183355</victoryPointsLastWeek> 
      <victoryPointsTotal>58876569</victoryPointsTotal> 
    </totals> 
    <rowset name="factions" key="factionID" columns="factionID,factionName,pilots,systemsControlled,killsYesterday,killsLastWeek,killsTotal,victoryPointsYesterday,victoryPointsLastWeek,victoryPointsTotal"> 
      <row factionID="500001" factionName="Caldari State" pilots="6986" systemsControlled="20" killsYesterday="99" killsLastWeek="593" killsTotal="91309" victoryPointsYesterday="5283" victoryPointsLastWeek="31542" victoryPointsTotal="6526954" /> 
      <row factionID="500002" factionName="Minmatar Republic" pilots="4933" systemsControlled="18" killsYesterday="152" killsLastWeek="808" killsTotal="92944" victoryPointsYesterday="5782" victoryPointsLastWeek="34656" victoryPointsTotal="5815901" /> 
      <row factionID="500003" factionName="Amarr Empire" pilots="4004" systemsControlled="18" killsYesterday="141" killsLastWeek="746" killsTotal="97194" victoryPointsYesterday="6255" victoryPointsLastWeek="36722" victoryPointsTotal="5757077" /> 
      <row factionID="500004" factionName="Gallente Federation" pilots="4501" systemsControlled="46" killsYesterday="93" killsLastWeek="561" killsTotal="101097" victoryPointsYesterday="4351" victoryPointsLastWeek="28968" victoryPointsTotal="6075373" /> 
    </rowset> 
    <rowset name="factionWars" columns="factionID,factionName,againstID,againstName"> 
      <row factionID="500001" factionName="Caldari State" againstID="500002" againstName="Minmatar Republic" /> 
      <row factionID="500001" factionName="Caldari State" againstID="500004" againstName="Gallente Federation" /> 
      <row factionID="500002" factionName="Minmatar Republic" againstID="500001" againstName="Caldari State" /> 
      <row factionID="500002" factionName="Minmatar Republic" againstID="500003" againstName="Amarr Empire" /> 
      <row factionID="500003" factionName="Amarr Empire" againstID="500002" againstName="Minmatar Republic" /> 
      <row factionID="500003" factionName="Amarr Empire" againstID="500004" againstName="Gallente Federation" /> 
      <row factionID="500004" factionName="Gallente Federation" againstID="500001" againstName="Caldari State" /> 
      <row factionID="500004" factionName="Gallente Federation" againstID="500003" againstName="Amarr Empire" /> 
    </rowset> 
  </result> 
  <cachedUntil>2010-10-18 03:11:50</cachedUntil> 
</eveapi>
EOF;

 	}

 	public function testAbstract(){
// 		$xml = simplexml_load_string($this->sharedFixture['all']);
		require_once 'Zircote/Ccp/Api/Result/Abstract.php';
 		$o = new Zircote_Ccp_Api_Result_Abstract($this->sharedFixture);
 		$this->assertArrayHasKey('currentTime', $o->result);
 		$this->assertEquals('2010-10-18 02:11:50', $o->result['currentTime']);
 		$this->assertArrayHasKey('cachedUntil', $o->result);
 		$this->assertEquals('2010-10-18 03:11:50', $o->result['cachedUntil']);
 		$this->assertArrayHasKey('totals', $o->result['result']);
 		$this->assertArrayHasKey('factions', $o->result['result']);
 		foreach ($o->result['result']['factions'] as $value) {
 			$this->assertArrayHasKey('factionID', $value);
 		}
 		$this->assertArrayHasKey('factionWars', $o->result['result']);
 		foreach ($o->result['result']['factionWars'] as $value) {
 			$this->assertArrayHasKey('factionID', $value);
 		}
 	}
 }
 	