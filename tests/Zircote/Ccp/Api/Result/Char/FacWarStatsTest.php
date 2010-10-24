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

class Zircote_Ccp_Api_Result_Char_FacWarStatsTest
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2008-07-10 13:12:49</currentTime>
  <result>
    <factionID>500001</factionID>
    <factionName>Caldari State</factionName>
    <enlisted>2008-06-10 22:10:00</enlisted>
    <currentRank>4</currentRank>
    <highestRank>4</highestRank>
    <killsYesterday>0</killsYesterday>
    <killsLastWeek>0</killsLastWeek>
    <killsTotal>0</killsTotal>
    <victoryPointsYesterday>0</victoryPointsYesterday>
    <victoryPointsLastWeek>1044</victoryPointsLastWeek>
    <victoryPointsTotal>0</victoryPointsTotal>
  </result>
  <cachedUntil>2008-07-10 14:12:49</cachedUntil>
</eveapi>
 
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testAccountStatus(){
 		require_once 'Zircote/Ccp/Api/Result/Char/FacWarStats.php';
 		$out = new Zircote_Ccp_Api_Result_Char_FacWarStats($this->sharedFixture);
// 		print_r($out->result); 
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('factionID', $out->result['result']);
		$this->assertArrayHasKey('factionName', $out->result['result']);
		$this->assertArrayHasKey('enlisted', $out->result['result']);
		$this->assertArrayHasKey('currentRank', $out->result['result']);
		$this->assertArrayHasKey('highestRank', $out->result['result']);
		$this->assertArrayHasKey('killsYesterday', $out->result['result']);
		$this->assertArrayHasKey('killsLastWeek', $out->result['result']);
		$this->assertArrayHasKey('killsTotal', $out->result['result']);
		$this->assertArrayHasKey('victoryPointsYesterday', $out->result['result']);
		$this->assertArrayHasKey('victoryPointsLastWeek', $out->result['result']);
		$this->assertArrayHasKey('victoryPointsTotal', $out->result['result']);
 		$api = $out = null;
 	}
}