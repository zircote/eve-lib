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

class EveLib_EveCentral_Api_Command_QuickLookTest
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
EOF;
	}
 	
 	/**
 	 * @group EveLib_EveCentral_Api_Command
 	 */
 	public function testQuickLook(){
 		$api = new EveLib_EveCentral_Api();
//		$data = $api->QuickLook(array('typeid' => 34, 'regionlimit' => 10000002));
		$data = $api->QuickLook(array('typeid' => 34));
		$this->assertArrayHasKey('quicklook', $data->result);
		$this->assertArrayHasKey('hours', $data->result['quicklook']);
		$this->assertArrayHasKey('minqty', $data->result['quicklook']);
		$this->assertArrayHasKey('sell_orders', $data->result['quicklook']);
		$this->assertArrayHasKey('buy_orders', $data->result['quicklook']);
		foreach ($data->result['quicklook']['sell_orders'] as $key => $value) {
			$this->assertArrayHasKey('region',$data->result['quicklook']['sell_orders'][$key]);
			$this->assertArrayHasKey('station',$data->result['quicklook']['sell_orders'][$key]);
			$this->assertArrayHasKey('station_name',$data->result['quicklook']['sell_orders'][$key]);
			$this->assertArrayHasKey('security',$data->result['quicklook']['sell_orders'][$key]);
			$this->assertArrayHasKey('range',$data->result['quicklook']['sell_orders'][$key]);
			$this->assertArrayHasKey('price',$data->result['quicklook']['sell_orders'][$key]);
			$this->assertArrayHasKey('vol_remain',$data->result['quicklook']['sell_orders'][$key]);
			$this->assertArrayHasKey('min_volume',$data->result['quicklook']['sell_orders'][$key]);
			$this->assertArrayHasKey('expires',$data->result['quicklook']['sell_orders'][$key]);
			$this->assertArrayHasKey('reported_time',$data->result['quicklook']['sell_orders'][$key]);
		}
		foreach ($data->result['quicklook']['buy_orders'] as $key => $value) {
			$this->assertArrayHasKey('region',$data->result['quicklook']['buy_orders'][$key]);
			$this->assertArrayHasKey('station',$data->result['quicklook']['buy_orders'][$key]);
			$this->assertArrayHasKey('station_name',$data->result['quicklook']['buy_orders'][$key]);
			$this->assertArrayHasKey('security',$data->result['quicklook']['buy_orders'][$key]);
			$this->assertArrayHasKey('range',$data->result['quicklook']['buy_orders'][$key]);
			$this->assertArrayHasKey('price',$data->result['quicklook']['buy_orders'][$key]);
			$this->assertArrayHasKey('vol_remain',$data->result['quicklook']['buy_orders'][$key]);
			$this->assertArrayHasKey('min_volume',$data->result['quicklook']['buy_orders'][$key]);
			$this->assertArrayHasKey('expires',$data->result['quicklook']['buy_orders'][$key]);
			$this->assertArrayHasKey('reported_time',$data->result['quicklook']['buy_orders'][$key]);
		}
 	}
}