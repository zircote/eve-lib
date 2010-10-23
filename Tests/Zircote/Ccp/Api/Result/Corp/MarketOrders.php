<?php 


class Tests_Zircote_Ccp_Api_Result_Corp_MarketOrders 
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="1">
  <currentTime>2007-12-02 14:55:43</currentTime>
  <result>
    <rowset name="orders" key="orderID" columns="orderID,charID,stationID,volEntered,volRemaining,minVolume,
           orderState,typeID,range,accountKey,duration,escrow,price,bid,issued">
      <row orderID="5630641" charID="150208955" stationID="60010783" volEntered="2891" volRemaining="2889"
           minVolume="1" orderState="0" typeID="27351" range="32767" accountKey="1000" duration="90"
           escrow="0.00" price="325.00" bid="0" issued="2007-12-02 12:18:18" />
      <row orderID="5630643" charID="150208955" stationID="60010783" volEntered="10" volRemaining="10"
           minVolume="1" orderState="0" typeID="20418" range="32767" accountKey="1000" duration="30"
           escrow="0.00" price="435333.00" bid="0" issued="2007-12-02 13:57:02" />
      <row orderID="5630645" charID="150208955" stationID="60010783" volEntered="8" volRemaining="7"
           minVolume="1" orderState="3" typeID="5441" range="32767" accountKey="1000" duration="14"
           escrow="0.00" price="19628.00" bid="0" issued="2007-12-02 12:19:04" />
      <row orderID="5630647" charID="150208955" stationID="60010783" volEntered="7" volRemaining="0"
           minVolume="1" orderState="2" typeID="21583" range="32767" accountKey="1000" duration="14"
           escrow="0.00" price="56887.00" bid="0" issued="2007-12-02 12:19:22" />
      <row orderID="5630652" charID="150208955" stationID="60010783" volEntered="155" volRemaining="155"
           minVolume="1" orderState="0" typeID="27359" range="-1" accountKey="1000" duration="1"
           escrow="9195.56" price="250.00" bid="1" issued="2007-12-02 13:58:23" />
      <row orderID="5630653" charID="150208955" stationID="60010783" volEntered="155" volRemaining="155"
           minVolume="1" orderState="0" typeID="27359" range="0" accountKey="1000" duration="1"
           escrow="9195.56" price="250.00" bid="1" issued="2007-12-02 13:58:31" />
      <row orderID="5630654" charID="150208955" stationID="60010783" volEntered="1234" volRemaining="1234"
           minVolume="1" orderState="0" typeID="27359" range="32767" accountKey="1000" duration="1"
           escrow="73208.50" price="250.00" bid="1" issued="2007-12-02 13:58:41" />
      <row orderID="5630655" charID="150208955" stationID="60010783" volEntered="131" volRemaining="131"
           minVolume="1" orderState="0" typeID="27359" range="1" accountKey="1000" duration="1"
           escrow="7771.73" price="250.00" bid="1" issued="2007-12-02 13:58:48" />
      <row orderID="5630656" charID="150208955" stationID="60010783" volEntered="1334" volRemaining="1334"
           minVolume="1" orderState="0" typeID="27359" range="2" accountKey="1000" duration="1"
           escrow="79141.11" price="250.00" bid="1" issued="2007-12-02 13:58:56" />
    </rowset>
  </result>
  <cachedUntil>2007-12-02 15:55:43</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testMarketOrders(){
 		require_once 'Zircote/Ccp/Api/Result/Corp/MarketOrders.php';
 		$out = new Zircote_Ccp_Api_Result_Corp_MarketOrders($this->sharedFixture);
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('orders', $out->result['result']);
		foreach (explode(',','orderID,charID,stationID,volEntered,volRemaining,minVolume,'.
           'orderState,typeID,range,accountKey,duration,escrow,price,bid,issued') as $row) {
			$this->assertArrayHasKey($row, $out->result['result']['orders']['5630641']);
			$this->assertArrayHasKey($row, $out->result['result']['orders']['5630656']);
		}
// 		print_r($out->result);
 	}
}