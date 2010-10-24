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

class Tests_Zircote_Ccp_Api_Command_Corp_Shareholders 
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2008-09-02 17:45:01</currentTime>
  <result>
    <rowset name="characters" key="shareholderID" columns="shareholderID,shareholderName,shareholderCorporationID,shareholderCorporationName,shares">
      <row shareholderID="126891489" shareholderName="Dragonaire" shareholderCorporationID="632257314" shareholderCorporationName="Corax." shares="1" />
    </rowset>
    <rowset name="corporations" key="shareholderID" columns="shareholderID,shareholderName,shares" />
  </result>
  <cachedUntil>2008-09-02 18:45:01</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testShareholders(){
 		require_once 'Zircote/Ccp/Api.php';
 		require_once 'Zircote/Ccp/Api/Result/Corp/Shareholders.php';
 		$api = new Zircote_Ccp_Api(Tests_AllTests::$tests_config);
 		$out = $api->setScope('Corp')
 			->Shareholders();
// 		print_r($out->result);
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('characters', $out->result['result']);
		$this->assertArrayHasKey('corporations', $out->result['result']);
		
// 		print_r($out->result);
 	}
}