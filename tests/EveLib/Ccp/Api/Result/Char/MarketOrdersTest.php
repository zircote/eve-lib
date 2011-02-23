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

class EveLib_Ccp_Api_Result_Char_MarketOrdersTest
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<eveapi version="2">
<currentTime>2008-02-04 13:28:18</currentTime>
<result>
<rowset name="orders" key="orderID" 
columns="orderID,charID,stationID,volEntered,volRemaining,minVolume,orderState,typeID,range,accountKey,duration,escrow,price,bid,issued">
<row orderID="639356913" charID="118406849" stationID="60008494" volEntered="25" volRemaining="18" minVolume="1" orderState="0" typeID="26082" range="32767" accountKey="1000" duration="3" escrow="0.00" price="3398000.00" bid="0" issued="2008-02-03 13:54:11"/>
<row orderID="639477821" charID="118406849" stationID="60004357" volEntered="25" volRemaining="24" minVolume="1" orderState="0" typeID="26082" range="32767" accountKey="1000" duration="3" escrow="0.00" price="3200000.00" bid="0" issued="2008-02-02 16:39:25"/>
<row orderID="639587440" charID="118406849" stationID="60003760" volEntered="25" volRemaining="4" minVolume="1" orderState="0" typeID="26082" range="32767" accountKey="1000" duration="1" escrow="0.00" price="3399999.98" bid="0" issued="2008-02-03 22:35:54"/>
</rowset>
</result>
<cachedUntil>2008-02-04 14:28:18</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @group EveLib_Ccp_Api_Result_Char
 	 */
 	public function testAccountStatus(){
 		require_once 'EveLib/Ccp/Api/Result/Char/MarketOrders.php';
 		$out = new EveLib_Ccp_Api_Result_Char_MarketOrders($this->sharedFixture);
// 		print_r($out->result); 
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('orders', $out->result['result']);
		foreach (explode(',','orderID,charID,stationID,volEntered,volRemaining,minVolume,orderState,typeID,range,accountKey,duration,escrow,price,bid,issued') as $row) {
			$this->assertArrayHasKey($row, $out->result['result']['orders']['639356913']);
			$this->assertArrayHasKey($row, $out->result['result']['orders']['639477821']);
			$this->assertArrayHasKey($row, $out->result['result']['orders']['639587440']);
		}
 		$api = $out = null;
 	}
}