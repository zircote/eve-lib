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

class EveLib_Ccp_Api_Result_Corp_WalletTransactionsTest 
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
	<currentTime>2008-08-12 17:00:46</currentTime>
	<result>
		<rowset name="transactions" key="transactionID" 
			columns="transactionDateTime,transactionID,quantity,typeName,
				typeID,price,clientID,clientName,characterID,characterName,
				stationID,stationName,transactionType,transactionFor">
			<row transactionDateTime="2008-08-04 22:01:00" transactionID="705664738" 
				quantity="50000" typeName="Oxygen Isotopes" typeID="17887" price="250.00" 
				clientID="174312871" clientName="ACHAR" characterID="000000000" 
				characterName="SELLER" stationID="60004375" 
				stationName="SYSTEM IV - Moon 10 - Corporate Police Force Testing Facilities" 
				transactionType="buy" transactionFor="corporation"/>
			<row transactionDateTime="2008-08-03 09:21:00" transactionID="000000000" 
				quantity="25000" typeName="Nitrogen Isotopes" typeID="17888" price="499.00" 
				clientID="403173533" clientName="CHARACTER" characterID="000000000" 
				characterName="SELLER" stationID="61000176" 
				stationName="Hydrasphere" transactionType="buy" transactionFor="corporation"/>
			<row transactionDateTime="2008-07-24 17:14:00" transactionID="698977440" 
				quantity="2" typeName="Capacitor Power Relay II" typeID="1447" price="1039998.00" 
				clientID="780902489" clientName="BUYER" characterID="789970839" 
				characterName="SELLER" stationID="61000121" stationName="Sort Your Lives Out" 
				transactionType="buy" transactionFor="corporation"/>
			<row transactionDateTime="2008-07-17 19:53:00" transactionID="692346479" 
				quantity="1" typeName="Bestower" typeID="1944" price="800000.00" 
				clientID="1026681561" clientName="BUYER" characterID="789970839"
				characterName="SELLER" stationID="61000137" stationName="Cor  Hydrae II" 
				transactionType="buy" transactionFor="corporation"/>
		</rowset>
	</result>
	<cachedUntil>2008-08-12 17:15:46</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @group EveLib_Ccp_Api_Result_Corp
 	 */
 	public function testWalletTransactions(){
 		require_once 'EveLib/Ccp/Api/Result/Corp/WalletTransactions.php';
 		$out = new EveLib_Ccp_Api_Result_Corp_WalletTransactions($this->sharedFixture);
// 		print_r($out->result);
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('transactions', $out->result['result']);
		foreach (explode(',','transactionDateTime,transactionID,quantity,typeName,'.
				'typeID,price,clientID,clientName,characterID,characterName,'.
				'stationID,stationName,transactionType,transactionFor') as $row) {
			$this->assertArrayHasKey($row, $out->result['result']['transactions']['705664738']);
			$this->assertArrayHasKey($row, $out->result['result']['transactions']['000000000']);
			$this->assertArrayHasKey($row, $out->result['result']['transactions']['698977440']);
			$this->assertArrayHasKey($row, $out->result['result']['transactions']['692346479']);
		}
		
// 		print_r($out->result);
 	}
}