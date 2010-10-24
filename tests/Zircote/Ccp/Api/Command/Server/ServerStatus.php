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

class Tests_Zircote_Ccp_Api_Command_Server_ServerStatus 
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
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testServerStatus(){
		require_once 'Zircote/Ccp/Api.php';
 		require_once 'Zircote/Ccp/Api/Result/Server/ServerStatus.php';
 		$api = new Zircote_Ccp_Api();
 		$out = $api->setScope('Server')
 			->ServerStatus();
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('serverOpen', $out->result['result']);
		$this->assertArrayHasKey('onlinePlayers', $out->result['result']);
// 		print_r($out->result);
 	}
}