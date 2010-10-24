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
class Tests_Zircote_Ccp_Api_Command_Eve_FacWarTopStats 
	extends PHPUnit_Framework_TestCase {
	
	public function setUp(){
		$this->sharedFixture = <<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2008-12-29 16:31:48</currentTime>
  <result>
    <characters>
      <rowset name="KillsYesterday" key="characterID" columns="characterID,characterName,kills">
        <row characterID="1007512845" characterName="StonedBoy" kills="14" />
        <row characterID="646053002" characterName="Erick Voliffe" kills="11" />
        <row characterID="1862996889" characterName="Jaster Arcturus" kills="9" />
        <row characterID="868141573" characterName="gunnergonk" kills="8" />
        <row characterID="803923182" characterName="Eato" kills="7" />
        <row characterID="830358222" characterName="Lotty Granat" kills="6" />
        <row characterID="760235915" characterName="Bulwi Nhilathok" kills="6" />
        <row characterID="153010351" characterName="RainMan" kills="5" />
        <row characterID="673662188" characterName="Val Erian" kills="5" />
        <row characterID="1614570939" characterName="Urad Gula" kills="5" />
      </rowset>
      <rowset name="KillsLastWeek" key="characterID" columns="characterID,characterName,kills">
        <row characterID="187452523" characterName="Tigrana Blanque" kills="52" />
      </rowset>
      <rowset name="KillsTotal" key="characterID" columns="characterID,characterName,kills">
        <row characterID="673662188" characterName="Val Erian" kills="451" />
      </rowset>
      <rowset name="VictoryPointsYesterday" key="characterID" columns="characterID,characterName,victoryPoints">
        <row characterID="774720050" characterName="v3nd3tt4" victoryPoints="3151" />
      </rowset>
      <rowset name="VictoryPointsLastWeek" key="characterID" columns="characterID,characterName,victoryPoints">
        <row characterID="161929388" characterName="Ankhesentapemkah" victoryPoints="20851" />
      </rowset>
      <rowset name="VictoryPointsTotal" key="characterID" columns="characterID,characterName,victoryPoints">
        <row characterID="395923478" characterName="sasawong" victoryPoints="197046" />
      </rowset>
    </characters>
    <corporations>
      <rowset name="KillsYesterday" key="corporationID" columns="corporationID,corporationName,kills">
      </rowset>
    </corporations>
    <factions>
      <rowset name="KillsYesterday" key="factionID" columns="factionID,factionName,kills">
        <row factionID="500004" factionName="Gallente Federation" kills="106" />
      </rowset>
    </factions>
  </result>
  <cachedUntil>2008-12-29 17:31:48</cachedUntil>
</eveapi>
EOF;
	}
	
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testFacWarTopStats(){
		require_once 'Zircote/Ccp/Api.php';
 		require_once 'Zircote/Ccp/Api/Result/Eve/FacWarTopStats.php';
 		$api = new Zircote_Ccp_Api;
 		$out = $api->setScope('Eve')
 			->FacWarTopStats();
// 		print_r($out->result); return;
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('characters', $out->result['result']);
			$this->assertArrayHasKey('KillsYesterday', $out->result['result']['characters']);
			$this->assertArrayHasKey('KillsLastWeek', $out->result['result']['characters']);
			$this->assertArrayHasKey('KillsTotal', $out->result['result']['characters']);
			$this->assertArrayHasKey('VictoryPointsYesterday', $out->result['result']['characters']);
			$this->assertArrayHasKey('VictoryPointsLastWeek', $out->result['result']['characters']);
			$this->assertArrayHasKey('VictoryPointsTotal', $out->result['result']['characters']);
		$this->assertArrayHasKey('corporations', $out->result['result']);
			$this->assertArrayHasKey('KillsYesterday', $out->result['result']['corporations']);
			$this->assertArrayHasKey('KillsLastWeek', $out->result['result']['corporations']);
			$this->assertArrayHasKey('KillsTotal', $out->result['result']['corporations']);
			$this->assertArrayHasKey('VictoryPointsYesterday', $out->result['result']['corporations']);
			$this->assertArrayHasKey('VictoryPointsLastWeek', $out->result['result']['corporations']);
			$this->assertArrayHasKey('VictoryPointsTotal', $out->result['result']['corporations']);
		$this->assertArrayHasKey('factions', $out->result['result']);
			$this->assertArrayHasKey('KillsYesterday', $out->result['result']['factions']);
			$this->assertArrayHasKey('KillsLastWeek', $out->result['result']['factions']);
			$this->assertArrayHasKey('KillsTotal', $out->result['result']['factions']);
			$this->assertArrayHasKey('VictoryPointsYesterday', $out->result['result']['factions']);
			$this->assertArrayHasKey('VictoryPointsLastWeek', $out->result['result']['factions']);
			$this->assertArrayHasKey('VictoryPointsTotal', $out->result['result']['factions']);
 	}
}