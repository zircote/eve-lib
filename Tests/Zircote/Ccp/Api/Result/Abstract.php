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
 		
		$result=<<<EOF
  <result>
    <totals>
      <killsYesterday>677</killsYesterday>
      <killsLastWeek>3246</killsLastWeek>
      <killsTotal>232772</killsTotal>
      <victoryPointsYesterday>55087</victoryPointsYesterday>
      <victoryPointsLastWeek>414049</victoryPointsLastWeek>
      <victoryPointsTotal>44045189</victoryPointsTotal>
    </totals>
    <rowset name="factions" key="factionID" columns="factionID,factionName,pilots,systemsControlled,killsYesterday,killsLastWeek,killsTotal,victoryPointsYesterday,victoryPointsLastWeek,victoryPointsTotal">
      <row factionID="500001" factionName="Caldari State" pilots="5324" systemsControlled="61" killsYesterday="115" killsLastWeek="627" killsTotal="59239" victoryPointsYesterday="9934" victoryPointsLastWeek="64548" victoryPointsTotal="4506493" />
      <row factionID="500002" factionName="Minmatar Republic" pilots="4068" systemsControlled="0" killsYesterday="213" killsLastWeek="952" killsTotal="56736" victoryPointsYesterday="2925" victoryPointsLastWeek="51211" victoryPointsTotal="3627522" />
      <row factionID="500003" factionName="Amarr Empire" pilots="3960" systemsControlled="11" killsYesterday="225" killsLastWeek="1000" killsTotal="55717" victoryPointsYesterday="3330" victoryPointsLastWeek="50518" victoryPointsTotal="3670190" />
      <row factionID="500004" factionName="Gallente Federation" pilots="3663" systemsControlled="0" killsYesterday="124" killsLastWeek="667" killsTotal="61080" victoryPointsYesterday="10343" victoryPointsLastWeek="62118" victoryPointsTotal="4098366" />
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
EOF;
 
		$rowset=<<<EOF
<rowset name="alliances" key="allianceID" columns="name,shortName,allianceID,executorCorpID,memberCount,startDate">
	<row name="Starbase Anchoring Alliance" shortName="MATT" allianceID="150382481"
		executorCorpID="150279367" memberCount="4" startDate="2007-09-18 11:04:00">
		<rowset name="memberCorporations" key="corporationID" columns="corporationID,startDate">
			<row corporationID="150279367" startDate="2007-09-18 11:04:00" />
			<row corporationID="150333466" startDate="2007-09-19 11:04:00" />
		</rowset>
	</row>
	<row name="The Dead Rabbits" shortName="TL.DR" allianceID="150430947"
		executorCorpID="150212025" memberCount="3" startDate="2007-11-12 16:00:00">
		<rowset name="memberCorporations" key="corporationID" columns="corporationID,startDate">
			<row corporationID="150212025" startDate="2007-11-12 16:00:00" />
		</rowset>
	</row>
</rowset>
EOF;
		$row=<<<EOF
<row name="The Dead Rabbits" shortName="TL.DR" allianceID="150430947"
	executorCorpID="150212025" memberCount="3" startDate="2007-11-12 16:00:00">
	<rowset name="memberCorporations" key="corporationID" columns="corporationID,startDate">
		<row corporationID="150212025" startDate="2007-11-12 16:00:00" />
	</rowset>
</row>
EOF;
		$all =<<<EOF
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

			$basic =<<<EOF
    <totals>
      <killsYesterday>677</killsYesterday>
      <killsLastWeek>3246</killsLastWeek>
      <killsTotal>232772</killsTotal>
      <victoryPointsYesterday>55087</victoryPointsYesterday>
      <victoryPointsLastWeek>414049</victoryPointsLastWeek>
      <victoryPointsTotal>44045189</victoryPointsTotal>
    </totals>		
EOF;
		$this->sharedFixture = array (
			'all' => $all,
			'result' => $result,
			'rowset' => $rowset,
			'row' => $row,
			'basic' => $basic
		);
 	}

 	public function testRow(){
// 		$xml = simplexml_load_string($this->sharedFixture['all']);
 		$o = new Zircote_Ccp_Api_Result_Abstract($this->sharedFixture['all']);
 		print_r($o->result);
 	}
 }
 	