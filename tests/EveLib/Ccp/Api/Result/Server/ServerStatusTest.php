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

class EveLib_Ccp_Api_Result_Server_ServerStatusTest
	extends PHPUnit_Framework_TestCase {
		
	public function setUp(){
		$this->sharedFixture = <<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2008-11-24 20:14:29</currentTime>
  <result>
    <serverOpen>True</serverOpen>
    <onlinePlayers>38102</onlinePlayers>
  </result>
  <cachedUntil>2008-11-24 20:17:29</cachedUntil>
</eveapi>
EOF;
	}
	
 	
 	/**
 	 * @group EveLib_Ccp_Api_Result_Server
 	 */
 	public function testServerStatus(){
 		//include_once 'EveLib/Ccp/Api/Result/Server/ServerStatus.php';
 		$out = new EveLib_Ccp_Api_Result_Server_ServerStatus($this->sharedFixture);
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('serverOpen', $out->result['result']);
		$this->assertArrayHasKey('onlinePlayers', $out->result['result']);
 	}
}