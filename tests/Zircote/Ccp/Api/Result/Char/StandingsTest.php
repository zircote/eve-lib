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

class Zircote_Ccp_Api_Result_Char_StandingsTest
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2008-09-03 12:20:19</currentTime>
  <result>
    <standingsTo>
      <rowset name="characters" key="toID" columns="toID,toName,standing">
        <row toID="123456" toName="Test Ally" standing="1" />
        <row toID="234567" toName="Test Friend" standing="0.5" />
        <row toID="345678" toName="Test Enemy" standing="-0.8" />
      </rowset>
      <rowset name="corporations" key="toID" columns="toID,toName,standing">
        <row toID="456789" toName="Test Bad Guy Corp" standing="-1" />
      </rowset>
    </standingsTo>
    <standingsFrom>
      <rowset name="agents" key="fromID" columns="fromID,fromName,standing">
        <row fromID="3009841" fromName="Pausent Ansin" standing="0.1" />
        <row fromID="3009846" fromName="Charie Octienne" standing="0.19" />
      </rowset>
      <rowset name="NPCCorporations" key="fromID" columns="fromID,fromName,standing">
        <row fromID="1000061" fromName="Freedom Extension" standing="0" />
        <row fromID="1000064" fromName="Carthum Conglomerate" standing="0.34" />
        <row fromID="1000094" fromName="TransStellar Shipping" standing="0.02" />
      </rowset>
      <rowset name="factions" key="fromID" columns="fromID,fromName,standing">
        <row fromID="500003" fromName="Amarr Empire" standing="-0.1" />
        <row fromID="500020" fromName="Serpentis" standing="-1" />
      </rowset>
    </standingsFrom>
  </result>
  <cachedUntil>2008-09-03 15:20:19</cachedUntil>
</eveapi>
 
EOF;
	}
 	
 	/**
 	 * @group Zircote_Ccp_Api_Result_Char
 	 */
 	public function testAccountStatus(){
 		require_once 'Zircote/Ccp/Api.php';
 		require_once 'Zircote/Ccp/Api/Result/Char/Standings.php';
 		$out = new Zircote_Ccp_Api_Result_Char_Standings($this->sharedFixture);
// 		print_r($out->result); 
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('standingsTo', $out->result['result']);
		$this->assertArrayHasKey('standingsTo', $out->result['result']);
		$this->assertArrayHasKey('standingsFrom', $out->result['result']);
		$this->assertArrayHasKey('agents', $out->result['result']['standingsFrom']);
		$this->assertArrayHasKey('NPCCorporations', $out->result['result']['standingsFrom']);
		$this->assertArrayHasKey('factions', $out->result['result']['standingsFrom']);
		
		foreach (explode(',','toID,toName,standing') as $row) {
			$this->assertArrayHasKey($row, $out->result['result']['standingsTo']['characters']['123456']);
			$this->assertArrayHasKey($row, $out->result['result']['standingsTo']['characters']['234567']);
			$this->assertArrayHasKey($row, $out->result['result']['standingsTo']['characters']['345678']);
		}
		foreach (explode(',','toID,toName,standing') as $row) {
			$this->assertArrayHasKey($row, $out->result['result']['standingsTo']['corporations']['456789']);
		}
		foreach (explode(',','fromID,fromName,standing') as $row) {
			$this->assertArrayHasKey($row, $out->result['result']['standingsFrom']['agents']['3009841']);
			$this->assertArrayHasKey($row, $out->result['result']['standingsFrom']['agents']['3009846']);
		}
		foreach (explode(',','fromID,fromName,standing') as $row) {
			$this->assertArrayHasKey($row, $out->result['result']['standingsFrom']['NPCCorporations']['1000061']);
			$this->assertArrayHasKey($row, $out->result['result']['standingsFrom']['NPCCorporations']['1000094']);
		}
		foreach (explode(',','fromID,fromName,standing') as $row) {
			$this->assertArrayHasKey($row, $out->result['result']['standingsFrom']['factions']['500003']);
			$this->assertArrayHasKey($row, $out->result['result']['standingsFrom']['factions']['500020']);
		}
	
 		$api = $out = null;
 	}
}