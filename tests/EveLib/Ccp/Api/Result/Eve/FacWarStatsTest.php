<?php 
/**
 * @license Copyright 2010 Robert Allen
 * 
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * 
 * http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
class EveLib_Ccp_Api_Result_Eve_FacWarStatsTest 
	extends PHPUnit_Framework_TestCase {
		
	public function setUp(){
		$this->sharedFixture = <<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2009-10-25 12:37:01</currentTime>
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
  <cachedUntil>2009-10-25 13:37:03</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @group EveLib_Ccp_Api_Result_Eve
 	 */
 	public function testFacWarStats(){
 		require_once 'EveLib/Ccp/Api/Result/Eve/FacWarStats.php';
 		$out = new EveLib_Ccp_Api_Result_Eve_FacWarStats ($this->sharedFixture);
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('totals', $out->result['result']);
			$this->assertArrayHasKey('killsYesterday', $out->result['result']['totals']);
			$this->assertArrayHasKey('killsLastWeek', $out->result['result']['totals']);
			$this->assertArrayHasKey('killsTotal', $out->result['result']['totals']);
			$this->assertArrayHasKey('victoryPointsYesterday', $out->result['result']['totals']);
			$this->assertArrayHasKey('victoryPointsLastWeek', $out->result['result']['totals']);
			$this->assertArrayHasKey('victoryPointsTotal', $out->result['result']['totals']);
		$this->assertArrayHasKey('factions', $out->result['result']);
		foreach ($out->result['result']['factions'] as $factionID => $faction) {
			$this->assertEquals($factionID, $faction['factionID']);
			$this->assertArrayHasKey('factionID', $faction);
			$this->assertArrayHasKey('factionName', $faction);
			$this->assertArrayHasKey('pilots', $faction);
			$this->assertArrayHasKey('systemsControlled', $faction);
			$this->assertArrayHasKey('killsYesterday', $faction);
			$this->assertArrayHasKey('killsLastWeek', $faction);
			$this->assertArrayHasKey('killsTotal', $faction);
			$this->assertArrayHasKey('victoryPointsYesterday', $faction);
			$this->assertArrayHasKey('victoryPointsLastWeek', $faction);
			$this->assertArrayHasKey('victoryPointsTotal', $faction);
		}
		$this->assertArrayHasKey('factionWars', $out->result['result']);
		foreach ($out->result['result']['factionWars'] as $factionWar) {
			$this->assertArrayHasKey('factionID', $factionWar);
			$this->assertArrayHasKey('factionName', $factionWar);
			$this->assertArrayHasKey('againstID', $factionWar);
			$this->assertArrayHasKey('againstName', $factionWar);
		}
 	}
}