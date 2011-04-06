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

class EveLib_Ccp_Api_Result_Map_SovereigntyTest 
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
 	 * @group EveLib_Ccp_Api_Result_Map
 	 */
 	public function testSovereignty(){
 		//include_once 'EveLib/Ccp/Api/Result/Map/Sovereignty.php';
 		$out = new EveLib_Ccp_Api_Result_Map_Sovereignty($this->sharedFixture);
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('result', $out->result);
		$this->assertArrayHasKey('solarSystems', $out->result['result']);
		$this->assertArrayHasKey('dataTime', $out->result['result']);
		foreach (explode(',','solarSystemID,allianceID,factionID,solarSystemName,corporationID') as $row) {
			$this->assertArrayHasKey($row, $out->result['result']['solarSystems']['30023410']);
			$this->assertArrayHasKey($row, $out->result['result']['solarSystems']['30001815']);
			$this->assertArrayHasKey($row, $out->result['result']['solarSystems']['30000480']);
		}
 	}
}