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

class EveLib_Ccp_Api_Result_Corp_MedalsTest 
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2008-12-06 23:20:41</currentTime>
  <result>
    <rowset name="medals" key="medalID" columns="medalID,title,description,creatorID,created" >
    	<row medalID="a" title="d" description="f" creatorID="g" created="h" /> 
    </rowset>
  </result>
  <cachedUntil>2008-12-07 22:20:41</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @group EveLib_Ccp_Api_Result_Corp
 	 */
 	public function testMedals(){
 		require_once 'EveLib/Ccp/Api/Result/Corp/Medals.php';
 		$out = new EveLib_Ccp_Api_Result_Corp_Medals($this->sharedFixture);
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('medals', $out->result['result']);
		foreach (explode(',','medalID,title,description,creatorID,created') as $row) {
			$this->assertArrayHasKey($row, $out->result['result']['medals']['a']);
		}
// 		print_r($out->result);
 	}
}