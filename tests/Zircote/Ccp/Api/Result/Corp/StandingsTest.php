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

class Zircote_Ccp_Api_Result_Corp_StandingsTest 
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2008-09-02 18:08:40</currentTime>
  <result>
    <corporationStandings>
      <standingsTo>
        <rowset name="characters" key="toID" columns="toID,toName,standing">
        </rowset>
        <rowset name="corporations" key="toID" columns="toID,toName,standing">
        </rowset>
        <rowset name="alliances" key="toID" columns="toID,toName,standing">
        </rowset>
      </standingsTo>
      <standingsFrom>
        <rowset name="agents" key="fromID" columns="fromID,fromName,standing">
        </rowset>
        <rowset name="NPCCorporations" key="fromID" columns="fromID,fromName,standing">
        </rowset>
        <rowset name="factions" key="fromID" columns="fromID,fromName,standing">
        </rowset>
      </standingsFrom>
    </corporationStandings>
    <allianceStandings>
      <standingsTo>
        <rowset name="corporations" key="toID" columns="toID,toName,standing">
        </rowset>
        <rowset name="alliances" key="toID" columns="toID,toName,standing">
        </rowset>
      </standingsTo>
    </allianceStandings>
  </result>
  <cachedUntil>2008-09-02 21:08:41</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @group disable
 	 */
 	public function testStandings(){
 		$this->markTestSkipped('Appears there is a difference in TQ1.1 and'.
 			' TQ1.2 data return skipping until more in known');
 		require_once 'Zircote/Ccp/Api/Result/Corp/Standings.php';
 		$out = new Zircote_Ccp_Api_Result_Corp_Standings($this->sharedFixture);
// 		print_r($out->result);
// 		print_r($out->xml);
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('corporationNPCStandings', $out->result['result']);
		$this->assertArrayHasKey('NPCCorporations', $out->result['result']['corporationNPCStandings']);
		$this->assertArrayHasKey('agents', $out->result['result']['corporationNPCStandings']);
		$this->assertArrayHasKey('factions', $out->result['result']['corporationNPCStandings']);
		
// 		print_r($out->result);
 	}
}