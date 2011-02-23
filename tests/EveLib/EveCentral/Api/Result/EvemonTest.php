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

class EveLib_EveCentral_Api_Result_EvemonTest
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<minerals> 
 <mineral> 
 <name>Tritanium</name> <price>2.1899999999999999</price> </mineral> 
 <mineral> 
 <name>Pyerite</name> <price>3.9900000000000002</price> </mineral> 
 <mineral> 
 <name>Mexallon</name> <price>28.0</price> </mineral> 
 <mineral> 
 <name>Isogen</name> <price>59.909999999999997</price> </mineral> 
 <mineral> 
 <name>Nocxium</name> <price>470.625</price> </mineral> 
 <mineral> 
 <name>Zydrine</name> <price>1053.0149999999999</price> </mineral> 
 <mineral> 
 <name>Megacyte</name> <price>2892.0100000000002</price> </mineral> 
 <mineral> 
 <name>Morphite</name> <price>4122.5050000000001</price> </mineral> 
</minerals> 
EOF;
	}
 	
 	/**
 	 * @group EveLib_EveCentral_Api_Result
 	 */
 	public function testEveMon(){
 		require_once 'EveLib/EveCentral/Api/Result/Evemon.php';
 		$out = new EveLib_EveCentral_Api_Result_Evemon($this->sharedFixture);
		$this->assertArrayHasKey('minerals', $out->result);
		$this->assertArrayHasKey('Tritanium', $out->result['minerals']);
		$this->assertArrayHasKey('Morphite', $out->result['minerals']);
		$this->assertEquals($out->result['minerals']['Tritanium'], '2.1899999999999999');
		$this->assertEquals($out->result['minerals']['Morphite'], '4122.5050000000001');
 		$api = $out = null;
 	}
}