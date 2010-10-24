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

class Zircote_Ccp_Api_Result_Map_FacWarSystemsTest 
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
 		require_once 'Zircote/Ccp/Api/Result/Map/FacWarSystems.php';
 		$out = new Zircote_Ccp_Api_Result_Map_FacWarSystems($this->sharedFixture);
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('result', $out->result);
		$this->assertArrayHasKey('solarSystems', $out->result['result']);
		foreach (explode(',','solarSystemID,solarSystemName,occupyingFactionID,occupyingFactionName,contested') as $row) {
			$this->assertArrayHasKey($row, $out->result['result']['solarSystems']['30002056']);
			$this->assertArrayHasKey($row, $out->result['result']['solarSystems']['30003068']);
			$this->assertArrayHasKey($row, $out->result['result']['solarSystems']['30003069']);
		}
 	}
}