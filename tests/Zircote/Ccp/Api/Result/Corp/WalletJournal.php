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

class Tests_Zircote_Ccp_Api_Result_Corp_WalletJournal 
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2010-04-10 01:24:46</currentTime>
  <result>
    <rowset name="entries" key="refID" 
	columns="date,refID,refTypeID,ownerName1,ownerID1,ownerName2,ownerID2,argName1,argID1,amount,balance,reason,
	taxReceiverID,taxAmount">
      <row date="2010-04-09 16:54:00" refID="2566223382" refTypeID="35" ownerName1="corpslave" 
		ownerID1="150337897" ownerName2="CONCORD" ownerID2="1000125" argName1="anonymous" argID1="30497503" 
		amount="-2950.00" balance="318851502.61" reason="" taxReceiverID="" taxAmount="" />
      <row date="2010-04-09 16:07:00" refID="2566058222" refTypeID="42" ownerName1="corpslave" 
		ownerID1="150337897" ownerName2="" ownerID2="0" argName1="" argID1="0" 
		amount="-1519995.96" balance="318854452.61" reason="" taxReceiverID="" taxAmount="" />
      <row date="2010-04-09 16:03:00" refID="2566044581" refTypeID="42" ownerName1="corpslave" 
		ownerID1="150337897" ownerName2="" ownerID2="0" argName1="" argID1="0" 
		amount="-30996.95" balance="320374448.57" reason="" taxReceiverID="" taxAmount="" />
      <row date="2010-04-09 16:01:00" refID="2566038069" refTypeID="71" ownerName1="corpslave" 
		ownerID1="150337897" ownerName2="anonymous" ownerID2="30497503" argName1="27285523" argID1="0" 
		amount="-17000000.00" balance="320405445.52" reason="" taxReceiverID="" taxAmount="" />
      <row date="2010-04-09 15:53:00" refID="2566012762" refTypeID="42" ownerName1="corpslave" 
		ownerID1="150337897" ownerName2="" ownerID2="0" argName1="" argID1="0" 
		amount="-589996.29" balance="337405445.52" reason="" taxReceiverID="" taxAmount="" />
      <row date="2010-04-08 20:05:00" refID="2562897021" refTypeID="66" ownerName1="Secure Commerce Commission" 
		ownerID1="1000132" ownerName2="corpslave" ownerID2="150337897" argName1="-1" argID1="0" 
		amount="45000000.00" balance="337995441.81" reason="" taxReceiverID="" taxAmount="" />
      <row date="2010-04-08 20:05:00" refID="2562896960" refTypeID="66" ownerName1="Secure Commerce Commission" 
		ownerID1="1000132" ownerName2="corpslave" ownerID2="150337897" argName1="-1" argID1="0" 
		amount="45000000.00" balance="292995441.81" reason="" taxReceiverID="" taxAmount="" />
      <row date="2010-04-08 20:05:00" refID="2562896914" refTypeID="66" ownerName1="Secure Commerce Commission" 
		ownerID1="1000132" ownerName2="corpslave" ownerID2="150337897" argName1="-1" argID1="0" 
		amount="40000000.00" balance="247995441.81" reason="" taxReceiverID="" taxAmount="" />
      <row date="2010-04-08 16:24:00" refID="2562053806" refTypeID="15" ownerName1="corpslave" 
		ownerID1="150337897" ownerName2="Federation Customs" ownerID2="1000122" argName1="" argID1="1" 
		amount="-937590.00" balance="208481441.81" reason="" taxReceiverID="" taxAmount="" />
      <row date="2010-04-08 09:26:00" refID="2561067466" refTypeID="19" ownerName1="" 
		ownerID1="2" ownerName2="corpslave" ownerID2="150337897" argName1="17932" argID1="0" 
		amount="112000.00" balance="209419031.81" reason="" taxReceiverID="" taxAmount="" />
      <row date="2010-10-21 14:35:00" refID="3403127306" refTypeID="52" ownerName1="Achura StargazerF" 
      	ownerID1="588896683" ownerName2="Rim Collection RC" ownerID2="440722254" argName1="VPLLost My Tengu to Gurista" 
      	argID1="61000405" amount="5600.00" balance="1042921647.75" reason="" taxReceiverID="" taxAmount="" />
    </rowset>
  </result>
  <cachedUntil>2010-04-10 01:25:20</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testWalletJournal(){
 		require_once 'Zircote/Ccp/Api/Result/Corp/WalletJournal.php';
 		$out = new Zircote_Ccp_Api_Result_Corp_WalletJournal($this->sharedFixture);
// 		print_r($out->xml);
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		foreach (explode(',','date,refID,refTypeID,ownerName1,ownerID1,ownerName2,ownerID2,'.
			'argName1,argID1,amount,balance,reason,taxReceiverID,taxAmount') as $row) {
			$this->assertArrayHasKey($row, $out->result['result']['entries']['2566044581']);
			$this->assertArrayHasKey($row, $out->result['result']['entries']['2566038069']);
			$this->assertArrayHasKey($row, $out->result['result']['entries']['2562897021']);
			$this->assertArrayHasKey($row, $out->result['result']['entries']['3403127306']);
		}
// 		print_r($out->result);
 	}
}