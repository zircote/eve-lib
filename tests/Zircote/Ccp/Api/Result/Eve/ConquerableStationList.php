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
class Tests_Zircote_Ccp_Api_Result_Eve_ConquerableStationList 
	extends PHPUnit_Framework_TestCase {
		
	public function setUp(){
		$this->sharedFixture = <<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="1">
  <currentTime>2007-12-02 19:55:38</currentTime>
  <result>
    <rowset name="outposts" key="stationID" columns="stationID,stationName,stationTypeID,solarSystemID,corporationID,corporationName">
      <row stationID="60014862" stationName="0-G8NO VIII - Moon 1 - Manufacturing Outpost"
           stationTypeID="12242" solarSystemID="30000480" corporationID="1000135"
           corporationName="Serpentis Corporation" />
      <row stationID="60014863" stationName="4-EFLU VII - Moon 3 - Manufacturing Outpost"
           stationTypeID="12242" solarSystemID="30000576" corporationID="1000135"
           corporationName="Serpentis Corporation" />
      ...
      <row stationID="60014928" stationName="6T3I-L VII - Moon 5 - Cloning Outpost"
           stationTypeID="12295" solarSystemID="30004908" corporationID="1000135"
           corporationName="Serpentis Corporation" />
      <row stationID="61000001" stationName="DB1R-4 II - duperTum Corp Minmatar Service Outpost"
           stationTypeID="21646" solarSystemID="30004470" corporationID="150020944"
           corporationName="duperTum Corp" />
      <row stationID="61000002" stationName="ZS-2LT XI - duperTum Corp Minmatar Service Outpost"
           stationTypeID="21646" solarSystemID="30004469" corporationID="150020944"
           corporationName="duperTum Corp" />
    </rowset>
  </result>
  <cachedUntil>2007-12-02 20:55:38</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testConquerableStationList(){
 		require_once 'Zircote/Ccp/Api/Result/Eve/ConquerableStationList.php';
 		$out = new Zircote_Ccp_Api_Result_Eve_ConquerableStationList($this->sharedFixture);
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('outposts', $out->result['result']);
		foreach ($out->result['result']['outposts'] as $stationID => $outpost) {
			$this->assertArrayHasKey('stationID', $outpost);
			$this->assertArrayHasKey('stationName', $outpost);
			$this->assertArrayHasKey('stationTypeID', $outpost);
			$this->assertArrayHasKey('solarSystemID', $outpost);
			$this->assertArrayHasKey('corporationID', $outpost);
			$this->assertArrayHasKey('corporationName', $outpost);
			$this->assertEquals($stationID, $outpost['stationID']);
		}
		$out = $api = null;
 	}
}