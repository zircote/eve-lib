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

class Zircote_EveCentral_Api_Result_UploadSuggestTest
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version="1.0" encoding="utf-8" ?>
<evec_api version="2.0" method="upload_suggest_xml"> 
	<upload_suggest> 
		<item id="12346">200mm Railgun II</item> 
		<item id="440">1MN MicroWarpdrive II</item> 
		<item id="5342">Alfven Surface Targeting Annex I</item> 
		<item id="20000">Arch Angel Depleted Uranium M</item> 
		<item id="9329">800mm Heavy Carbine Repeating Howitzer I</item> 
		<item id="2873">125mm Gatling AutoCannon II</item> 
		<item id="15979">Ammatar Slave Trader Insignia</item> 
		<item id="8863">200mm Light 'Scout' Autocannon I</item> 
		<item id="9209">650mm Medium Carbine Howitzer I</item> 
		<item id="27961">Amarr Basic Outpost Plant Platform</item> 
		<item id="7247">75mm Prototype I Gauss Gun</item> 
		<item id="20409">Armored Warfare Link - Passive Defense</item> 
		<item id="15671">Ammatar Navy Colonel Insignia II</item> 
		<item id="20004">Arch Angel Fusion M</item> 
		<item id="7709">Anode Neutron Particle Cannon I</item> 
		<item id="11202">Ares</item> 
		<item id="19408">9th Tier Overseer's Personal Effects</item> 
		<item id="11487">Astronautic Engineering</item> 
		<item id="7371">250mm Carbide Railgun I</item> 
		<item id="19419">21st Tier Overseer's Personal Effects</item> 
	</upload_suggest> 
</evec_api>
EOF;
	}
 	
 	/**
 	 * @group Zircote_EveCentral_Api_Result
 	 */
 	public function testUploadSuggest(){
 		require_once 'Zircote/EveCentral/Api/Result/UploadSuggest.php';
 		$out = new Zircote_EveCentral_Api_Result_UploadSuggest($this->sharedFixture);
		$this->assertArrayHasKey('quicklook', $out->result);
		$this->assertArrayHasKey('hours', $out->result['quicklook']);
		$this->assertArrayHasKey('minqty', $out->result['quicklook']);
		$this->assertArrayHasKey('sell_orders', $out->result['quicklook']);
		$this->assertArrayHasKey('buy_orders', $out->result['quicklook']);
 		$api = $out = null;
 	}
}