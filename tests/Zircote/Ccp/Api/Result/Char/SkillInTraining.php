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

class Tests_Zircote_Ccp_Api_Result_Char_SkillInTraining
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<eveapi version="2">
  <currentTime>2008-08-17 06:43:00</currentTime>
  <result>
    <currentTQTime offset="0">2008-08-17 06:43:00</currentTQTime>
    <trainingEndTime>2008-08-17 15:29:44</trainingEndTime>
    <trainingStartTime>2008-08-15 04:01:16</trainingStartTime>
    <trainingTypeID>3305</trainingTypeID>
    <trainingStartSP>24000</trainingStartSP>
    <trainingDestinationSP>135765</trainingDestinationSP>
    <trainingToLevel>4</trainingToLevel>
    <skillInTraining>1</skillInTraining>
  </result>
  <cachedUntil>2008-08-17 06:58:00</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testAccountStatus(){
 		require_once 'Zircote/Ccp/Api/Result/Char/SkillInTraining.php';
 		$out = new Zircote_Ccp_Api_Result_Char_SkillInTraining($this->sharedFixture);
// 		print_r($out->result); 
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('currentTQTime', $out->result['result']);
		$this->assertArrayHasKey('trainingEndTime', $out->result['result']);
		$this->assertArrayHasKey('trainingStartTime', $out->result['result']);
		$this->assertArrayHasKey('trainingTypeID', $out->result['result']);
		$this->assertArrayHasKey('trainingStartSP', $out->result['result']);
		$this->assertArrayHasKey('trainingDestinationSP', $out->result['result']);
		$this->assertArrayHasKey('trainingToLevel', $out->result['result']);
		$this->assertArrayHasKey('skillInTraining', $out->result['result']);
 		$api = $out = null;
 	}
}