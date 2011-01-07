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

class Zircote_EveCentral_Api_Result_MarketStatTest extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version="1.0" encoding="utf-8" ?> 
 
<!-- Automatically generated data from EVE-Central.com --> 
<!-- This is the new API :-) --> 
 
 
 
<evec_api version="2.0" method="marketstat_xml"> 
<marketstat> 
 
 
 
<type id="34"> 
 
  <all> 
    <volume>78111403658.00</volume> 
<avg>4.19</avg> 
<max>255.00</max> 
<min>0.20</min> 
<stddev>15.41</stddev> 
<median>2.25</median> 
 
  </all> 
  <buy> 
    <volume>54547753340.00</volume> 
<avg>2.14</avg> 
<max>2.30</max> 
<min>0.20</min> 
<stddev>0.38</stddev> 
<median>2.10</median> 
 
  </buy> 
  <sell> 
    <volume>23563650318.00</volume> 
<avg>2.56</avg> 
<max>255.00</max> 
<min>2.19</min> 
<stddev>19.97</stddev> 
<median>2.40</median> 
 
  </sell> 
</type> 
 
 
 
<type id="35"> 
 
  <all> 
    <volume>26858591439.00</volume> 
<avg>6.32</avg> 
<max>404.00</max> 
<min>0.41</min> 
<stddev>27.80</stddev> 
<median>4.30</median> 
 
  </all> 
  <buy> 
    <volume>15196896640.00</volume> 
<avg>3.92</avg> 
<max>4.35</max> 
<min>0.41</min> 
<stddev>0.72</stddev> 
<median>3.87</median> 
 
  </buy> 
  <sell> 
    <volume>11661694799.00</volume> 
<avg>5.20</avg> 
<max>404.00</max> 
<min>4.20</min> 
<stddev>36.15</stddev> 
<median>4.50</median> 
 
  </sell> 
</type> 
 
 
</marketstat> 
</evec_api> 
EOF;
	}
 	
 	/**
 	 * @group Zircote_EveCentral_Api_Result
 	 */
 	public function testMarketStat(){
 		require_once 'Zircote/EveCentral/Api/Result/MarketStat.php';
 		$out = new Zircote_EveCentral_Api_Result_MarketStat($this->sharedFixture);
		$this->assertArrayHasKey('marketstat', $out->result);
		$this->assertArrayHasKey('marketstat', $out->result);
		$this->assertArrayHasKey('34', $out->result['marketstat']);
		$this->assertArrayHasKey('all', $out->result['marketstat']['34']);
		$this->assertArrayHasKey('volume', $out->result['marketstat']['34']['all']);
		$this->assertEquals($out->result['marketstat']['34']['all']['volume'], '78111403658.00');
 		$api = $out = null;
 	}
}