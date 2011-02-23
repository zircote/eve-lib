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

class EveLib_EveCentral_Api_Result_QuickLookTest
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version="1.0" encoding="utf-8" ?>
<evec_api version="2.0" method="quicklook">
	<quicklook>
		<item>34</item>
		<itemname>Tritanium</itemname>
		<regions>
		</regions>
		<hours>360</hours>
		<minqty>0</minqty>
		<sell_orders>
			<order id="1852540670">
				<region>10000022</region>
				<station>60014239</station>
				<station_name>ZH-KEV VI - Moon 6 - True Creations Storage Bay</station_name>
				<security>0.0</security>
				<range>-2</range>
				<price>0.94</price>
				<vol_remain>27693335</vol_remain>
				<min_volume>1</min_volume>
				<expires>2011-03-24</expires>
				<reported_time>12-25 23:21:27</reported_time>
			</order>
			<order id="1852524290">
				<region>10000022</region>
				<station>60014308</station>
				<station_name>J-AYLV III - Moon 14 - True Power Mining Outpost</station_name>
				<security>0.0</security>
				<range>-2</range>
				<price>0.94</price>
				<vol_remain>6846</vol_remain>
				<min_volume>1</min_volume>
				<expires>2011-03-24</expires>
				<reported_time>12-25 23:21:27</reported_time>
			</order>
		</sell_orders>
		<buy_orders>
			<order id="1772721832">
				<region>10000069</region>
				<station>60015147</station>
				<station_name>Ichoriya Player Outpost (no name provided yet)</station_name>
				<security>0.5</security>
				<range>32767</range>
				<price>0.01</price>
				<vol_remain>10000000</vol_remain>
				<min_volume>1</min_volume>
				<expires>2011-01-12</expires>
				<reported_time>12-28 10:51:37</reported_time>
			</order>
				<order id="1852641717">
				<region>10000037</region>
				<station>60012652</station>
				<station_name>Gicodel VII - Moon 14 - Sisters of EVE Bureau</station_name>
				<security>0.9</security>
				<range>32767</range>
				<price>0.01</price>
				<vol_remain>800000000</vol_remain>
				<min_volume>1</min_volume>
				<expires>2011-03-24</expires>
				<reported_time>01-04 02:13:20</reported_time>
			</order>
		</buy_orders>
	</quicklook>
</evec_api>
EOF;
	}
 	
 	/**
 	 * @group EveLib_EveCentral_Api_Result
 	 */
 	public function testQuickLook(){
 		require_once 'EveLib/EveCentral/Api/Result/QuickLook.php';
 		$out = new EveLib_EveCentral_Api_Result_QuickLook($this->sharedFixture);
		$this->assertArrayHasKey('quicklook', $out->result);
		$this->assertArrayHasKey('hours', $out->result['quicklook']);
		$this->assertArrayHasKey('minqty', $out->result['quicklook']);
		$this->assertArrayHasKey('sell_orders', $out->result['quicklook']);
		$this->assertArrayHasKey('buy_orders', $out->result['quicklook']);
		$this->assertArrayHasKey('price',$out->result['quicklook']['sell_orders']['1852540670']);
		$this->assertArrayHasKey('security',$out->result['quicklook']['sell_orders']['1852540670']);
		$this->assertArrayHasKey('vol_remain',$out->result['quicklook']['sell_orders']['1852540670']);
		$this->assertArrayHasKey('price',$out->result['quicklook']['sell_orders']['1852524290']);
		$this->assertArrayHasKey('security',$out->result['quicklook']['sell_orders']['1852524290']);
		$this->assertArrayHasKey('vol_remain',$out->result['quicklook']['sell_orders']['1852524290']);
		$this->assertArrayHasKey('price',$out->result['quicklook']['buy_orders']['1772721832']);
		$this->assertArrayHasKey('security',$out->result['quicklook']['buy_orders']['1772721832']);
		$this->assertArrayHasKey('vol_remain',$out->result['quicklook']['buy_orders']['1772721832']);
		$this->assertArrayHasKey('price',$out->result['quicklook']['buy_orders']['1852641717']);
		$this->assertArrayHasKey('security',$out->result['quicklook']['buy_orders']['1852641717']);
		$this->assertArrayHasKey('vol_remain',$out->result['quicklook']['buy_orders']['1852641717']);
 		$api = $out = null;
 	}
}