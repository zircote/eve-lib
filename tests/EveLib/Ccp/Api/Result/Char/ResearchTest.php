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

class EveLib_Ccp_Api_Result_Char_ResearchTest
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2010-01-22 22:02:46</currentTime>
  <result>
    <rowset name="research" key="agentID" 
    columns="agentID,skillTypeID,researchStartDate,pointsPerDay,remainderPoints">
      <row agentID="3011113" skillTypeID="11452" researchStartDate="2009-09-08 06:19:29" pointsPerDay="66.64" remainderPoints="6.293213773155" />
      <row agentID="3011154" skillTypeID="11452" researchStartDate="2009-09-02 06:49:35" pointsPerDay="65.66" remainderPoints="33.0962187499972" />
      <row agentID="3011165" skillTypeID="11452" researchStartDate="2007-10-19 22:18:37" pointsPerDay="68.48" remainderPoints="-29285.7593840278" />
      <row agentID="3011534" skillTypeID="11453" researchStartDate="2009-09-08 06:36:20" pointsPerDay="85.76" remainderPoints="31.7952812500007" />
    </rowset>
  </result>
  <cachedUntil>2010-01-22 22:17:46</cachedUntil>
</eveapi>
 
EOF;
	}
 	
 	/**
 	 * @group EveLib_Ccp_Api_Result_Char
 	 */
 	public function testAccountStatus(){
 		require_once 'EveLib/Ccp/Api/Result/Char/Research.php';
 		$out = new EveLib_Ccp_Api_Result_Char_Research($this->sharedFixture);
// 		print_r($out->result); 
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('research', $out->result['result']);
		foreach (explode(',','agentID,skillTypeID,researchStartDate,pointsPerDay,remainderPoints') as $row) {
			$this->assertArrayHasKey($row, $out->result['result']['research']['3011113']);
			$this->assertArrayHasKey($row, $out->result['result']['research']['3011165']);
			$this->assertArrayHasKey($row, $out->result['result']['research']['3011534']);
		}
 		$api = $out = null;
 	}
}