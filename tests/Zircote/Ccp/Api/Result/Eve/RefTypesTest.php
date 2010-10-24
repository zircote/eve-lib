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
class Zircote_Ccp_Api_Result_Eve_RefTypesTest 
	extends PHPUnit_Framework_TestCase {
	
	public function setUp(){
		$this->sharedFixture = <<<EOF
<eveapi version="2">
  <currentTime>2010-05-29 23:35:38</currentTime>
  <result>
    <rowset name="refTypes" key="refTypeID" columns="refTypeID,refTypeName">
      <row refTypeID="0" refTypeName="Undefined" />
      <row refTypeID="1" refTypeName="Player Trading" />
      <row refTypeID="2" refTypeName="Market Transaction" />
      <row refTypeID="3" refTypeName="GM Cash Transfer" />
      <row refTypeID="4" refTypeName="ATM Withdraw" />
      <row refTypeID="5" refTypeName="ATM Deposit" />
      <row refTypeID="6" refTypeName="Backward Compatible" />
      <row refTypeID="7" refTypeName="Mission Reward" />
      <row refTypeID="8" refTypeName="Clone Activation" />
      <row refTypeID="9" refTypeName="Inheritance" />
      <row refTypeID="10" refTypeName="Player Donation" />
      <row refTypeID="11" refTypeName="Corporation Payment" />
      <row refTypeID="12" refTypeName="Docking Fee" />
      <row refTypeID="13" refTypeName="Office Rental Fee" />
      <row refTypeID="14" refTypeName="Factory Slot Rental Fee" />
      <row refTypeID="15" refTypeName="Repair Bill" />
      <row refTypeID="16" refTypeName="Bounty" />
      <row refTypeID="17" refTypeName="Bounty Prize" />
      <row refTypeID="18" refTypeName="Agents_temporary" />
      <row refTypeID="19" refTypeName="Insurance" />
      <row refTypeID="20" refTypeName="Mission Expiration" />
      <row refTypeID="21" refTypeName="Mission Completion" />
      <row refTypeID="22" refTypeName="Shares" />
      <row refTypeID="23" refTypeName="Courier Mission Escrow" />
      <row refTypeID="24" refTypeName="Mission Cost" />
      <row refTypeID="25" refTypeName="Agent Miscellaneous" />
      <row refTypeID="26" refTypeName="LP Store" />
      <row refTypeID="27" refTypeName="Agent Location Services" />
      <row refTypeID="28" refTypeName="Agent Donation" />
      <row refTypeID="29" refTypeName="Agent Security Services" />
      <row refTypeID="30" refTypeName="Agent Mission Collateral Paid" />
      <row refTypeID="31" refTypeName="Agent Mission Collateral Refunded" />
      <row refTypeID="32" refTypeName="Agents_preward" />
      <row refTypeID="33" refTypeName="Agent Mission Reward" />
      <row refTypeID="34" refTypeName="Agent Mission Time Bonus Reward" />
      <row refTypeID="35" refTypeName="CSPA" />
      <row refTypeID="36" refTypeName="CSPAOfflineRefund" />
      <row refTypeID="37" refTypeName="Corporation Account Withdrawal" />
      <row refTypeID="38" refTypeName="Corporation Dividend Payment" />
      <row refTypeID="39" refTypeName="Corporation Registration Fee" />
      <row refTypeID="40" refTypeName="Corporation Logo Change Cost" />
      <row refTypeID="41" refTypeName="Release Of Impounded Property" />
      <row refTypeID="42" refTypeName="Market Escrow" />
      <row refTypeID="43" refTypeName="Agent Services Rendered" />
      <row refTypeID="44" refTypeName="Market Fine Paid" />
      <row refTypeID="45" refTypeName="Corporation Liquidation" />
      <row refTypeID="46" refTypeName="Brokers Fee" />
      <row refTypeID="47" refTypeName="Corporation Bulk Payment" />
      <row refTypeID="48" refTypeName="Alliance Registration Fee" />
      <row refTypeID="49" refTypeName="War Fee" />
      <row refTypeID="50" refTypeName="Alliance Maintainance Fee" />
      <row refTypeID="51" refTypeName="Contraband Fine" />
      <row refTypeID="52" refTypeName="Clone Transfer" />
      <row refTypeID="53" refTypeName="Acceleration Gate Fee" />
      <row refTypeID="54" refTypeName="Transaction Tax" />
      <row refTypeID="55" refTypeName="Jump Clone Installation Fee" />
      <row refTypeID="56" refTypeName="Manufacturing" />
      <row refTypeID="57" refTypeName="Researching Technology" />
      <row refTypeID="58" refTypeName="Researching Time Productivity" />
      <row refTypeID="59" refTypeName="Researching Material Productivity" />
      <row refTypeID="60" refTypeName="Copying" />
      <row refTypeID="61" refTypeName="Duplicating" />
      <row refTypeID="62" refTypeName="Reverse Engineering" />
      <row refTypeID="63" refTypeName="Contract Auction Bid" />
      <row refTypeID="64" refTypeName="Contract Auction Bid Refund" />
      <row refTypeID="65" refTypeName="Contract Collateral" />
      <row refTypeID="66" refTypeName="Contract Reward Refund" />
      <row refTypeID="67" refTypeName="Contract Auction Sold" />
      <row refTypeID="68" refTypeName="Contract Reward" />
      <row refTypeID="69" refTypeName="Contract Collateral Refund" />
      <row refTypeID="70" refTypeName="Contract Collateral Payout" />
      <row refTypeID="71" refTypeName="Contract Price" />
      <row refTypeID="72" refTypeName="Contract Brokers Fee" />
      <row refTypeID="73" refTypeName="Contract Sales Tax" />
      <row refTypeID="74" refTypeName="Contract Deposit" />
      <row refTypeID="75" refTypeName="Contract Deposit Sales Tax" />
      <row refTypeID="76" refTypeName="Secure EVE Time Code Exchange" />
      <row refTypeID="77" refTypeName="Contract Auction Bid (corp)" />
      <row refTypeID="78" refTypeName="Contract Collateral Deposited (corp)" />
      <row refTypeID="79" refTypeName="Contract Price Payment (corp)" />
      <row refTypeID="80" refTypeName="Contract Brokers Fee (corp)" />
      <row refTypeID="81" refTypeName="Contract Deposit (corp)" />
      <row refTypeID="82" refTypeName="Contract Deposit Refund" />
      <row refTypeID="83" refTypeName="Contract Reward Deposited" />
      <row refTypeID="84" refTypeName="Contract Reward Deposited (corp)" />
      <row refTypeID="85" refTypeName="Bounty Prizes" />
      <row refTypeID="86" refTypeName="Advertisement Listing Fee" />
      <row refTypeID="87" refTypeName="Medal Creation" />
      <row refTypeID="88" refTypeName="Medal Issued" />
      <row refTypeID="89" refTypeName="Betting" />
      <row refTypeID="90" refTypeName="DNA Modification Fee" />
      <row refTypeID="91" refTypeName="Sovereignity bill" />
      <row refTypeID="92" refTypeName="Bounty Prize Corporation Tax" />
      <row refTypeID="93" refTypeName="Agent Mission Reward Corporation Tax" />
      <row refTypeID="94" refTypeName="Agent Mission Time Bonus Reward Corporation Tax" />
      <row refTypeID="95" refTypeName="Upkeep adjustment fee" />
      <row refTypeID="96" refTypeName="Planetary Import Tax" />
      <row refTypeID="97" refTypeName="Planetary Export Tax" />
      <row refTypeID="98" refTypeName="Planetary Construction" />
    </rowset>
  </result>
  <cachedUntil>2010-05-30 23:35:38</cachedUntil>
</eveapi>	
EOF;
	}
	
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testRefTypes(){
 		require_once 'Zircote/Ccp/Api/Result/Eve/RefTypes.php';
 		$out = new Zircote_Ccp_Api_Result_Eve_RefTypes($this->sharedFixture);
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
 		foreach ($out->result['result'] as $key => $value) {
 			foreach ($value as $_key => $_value) {
	 			$this->assertEquals($_key, $_value['refTypeID']);
	 			$this->assertArrayHasKey('refTypeName', $_value);
 			}
 		}
 		$api = $out = null;
 	}
}