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

class Tests_Zircote_Ccp_Api_Command_Char_SkillinQueue
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2009-03-18 13:19:43</currentTime>
  <result>
    <rowset name="skillqueue" key="queuePosition" columns="queuePosition,typeID,level,startSP,endSP,startTime,endTime">
      <row queuePosition="1" typeID="11441" level="3" startSP="7072" endSP="40000" startTime="2009-03-18 02:01:06" endTime="2009-03-18 15:19:21" />
      <row queuePosition="2" typeID="20533" level="4" startSP="112000" endSP="633542" startTime="2009-03-18 15:19:21" endTime="2009-03-30 03:16:14" />
    </rowset>
  </result>
  <cachedUntil>2009-03-18 13:34:43</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testAccountStatus(){
 		$this->markTestSkipped();
 		require_once 'Zircote/Ccp/Api.php';
 		require_once 'Zircote/Ccp/Api/Result/Char/SkillinQueue';
 		$api = new Zircote_Ccp_Api(Tests_AllTests::$tests_config);
 		$out = $api->setScope('Char')
 			->SkillinQueue();
// 		print_r($out->result); 
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('skillqueue', $out->result['result']);
 		$api = $out = null;
 	}
}