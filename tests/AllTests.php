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
require_once 'PHPUnit/Framework.php';

$addPath = realpath(dirname(__FILE__) . '/../');
set_include_path($addPath . PATH_SEPARATOR . get_include_path());
$filename = realpath(dirname(__FILE__)) . '/tests_config.xml';
if(file_exists($filename)){
	require_once 'Zend/Config/Xml.php';
	$c = new Zend_Config_Xml($filename);
	Tests_AllTests::$tests_config = $c->toArray();
}
		
/**
 * 
 * @package Zircote
 * Enter description here ...
 * @author zircote@gmail.com
 *
 */
class Tests_AllTests {
	public static $tests_config;
	public static function suite(){
		$suite = new PHPUnit_Framework_TestSuite('Tests');
//		require_once 'Tests/Zircote/Ccp/Api.php';
//		$suite->addTestSuite('Tests_Zircote_Ccp_Api');
		// Commands
		// Account
		require_once 'Tests/Zircote/Ccp/Api/Command/Account/AccountStatus.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Account_AccountStatus');
		require_once 'Tests/Zircote/Ccp/Api/Command/Account/Characters.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Account_Characters');
		//Char
//		require_once 'Tests/Zircote/Ccp/Api/Command/Char/';
//		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Char_');

		// Corp
		require_once 'Tests/Zircote/Ccp/Api/Command/Corp/AccountBalance.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Corp_AccountBalance');
		require_once 'Tests/Zircote/Ccp/Api/Command/Corp/AssetList.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Corp_AssetList');
//		require_once 'Tests/Zircote/Ccp/Api/Command/Corp/CalendarEventAttendees.php';
//		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Corp_CalendarEventAttendees');
		require_once 'Tests/Zircote/Ccp/Api/Command/Corp/ContactList.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Corp_ContactList');
		require_once 'Tests/Zircote/Ccp/Api/Command/Corp/ContainerLog.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Corp_ContainerLog');
		require_once 'Tests/Zircote/Ccp/Api/Command/Corp/CorporationSheet.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Corp_CorporationSheet');
		require_once 'Tests/Zircote/Ccp/Api/Command/Corp/FacWarStats.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Corp_FacWarStats');
		require_once 'Tests/Zircote/Ccp/Api/Command/Corp/IndustryJobs.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Corp_IndustryJobs');
		require_once 'Tests/Zircote/Ccp/Api/Command/Corp/Killlog.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Corp_Killlog');
		require_once 'Tests/Zircote/Ccp/Api/Command/Corp/MarketOrders.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Corp_MarketOrders');
		require_once 'Tests/Zircote/Ccp/Api/Command/Corp/Medals.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Corp_Medals');
		require_once 'Tests/Zircote/Ccp/Api/Command/Corp/MemberMedals.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Corp_MemberMedals');
		require_once 'Tests/Zircote/Ccp/Api/Command/Corp/MemberSecurity.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Corp_MemberSecurity');
		require_once 'Tests/Zircote/Ccp/Api/Command/Corp/MemberSecurityLog.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Corp_MemberSecurityLog');
		require_once 'Tests/Zircote/Ccp/Api/Command/Corp/MemberTracking.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Corp_MemberTracking');
		require_once 'Tests/Zircote/Ccp/Api/Command/Corp/OutpostList.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Corp_OutpostList');
		require_once 'Tests/Zircote/Ccp/Api/Command/Corp/OutpostServiceDetail.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Corp_OutpostServiceDetail');
		require_once 'Tests/Zircote/Ccp/Api/Command/Corp/Shareholders.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Corp_Shareholders');
		require_once 'Tests/Zircote/Ccp/Api/Command/Corp/Standings.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Corp_Standings');
//		require_once 'Tests/Zircote/Ccp/Api/Command/Corp/StarbaseList.php';
//		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Corp_StarbaseList');
//		require_once 'Tests/Zircote/Ccp/Api/Command/Corp/StarbaseDetail.php';
//		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Corp_StarbaseDetail');		
		require_once 'Tests/Zircote/Ccp/Api/Command/Corp/Titles.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Corp_Titles');
//		require_once 'Tests/Zircote/Ccp/Api/Command/Corp/WalletJournal.php';
//		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Corp_WalletJournal');
//		require_once 'Tests/Zircote/Ccp/Api/Command/Corp/WalletTransactions.php';
//		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Corp_WalletTransactions');
		//Eve
//		require_once 'Tests/Zircote/Ccp/Api/Command/Eve/CharacterInfo.php';
//		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Eve_CharacterInfo');
//		require_once 'Tests/Zircote/Ccp/Api/Command/Eve/CharacterID.php';
//		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Eve_CharacterID');
//		require_once 'Tests/Zircote/Ccp/Api/Command/Eve/CharacterName.php';
//		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Eve_CharacterName');
//		require_once 'Tests/Zircote/Ccp/Api/Command/Eve/ErrorList.php';
//		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Eve_ErrorList');
//		require_once 'Tests/Zircote/Ccp/Api/Command/Eve/FacWarStats.php';
//		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Eve_FacWarStats');
//		require_once 'Tests/Zircote/Ccp/Api/Command/Eve/AllianceList.php';
//		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Eve_AllianceList');
//		require_once 'Tests/Zircote/Ccp/Api/Command/Eve/CertificateTree.php';
//		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Eve_CertificateTree');
//		require_once 'Tests/Zircote/Ccp/Api/Command/Eve/ConquerableStationList.php';
//		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Eve_ConquerableStationList');
//		require_once 'Tests/Zircote/Ccp/Api/Command/Eve/FacWarTopStats.php';
//		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Eve_FacWarTopStats');
//		require_once 'Tests/Zircote/Ccp/Api/Command/Eve/RefTypes.php';
//		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Eve_RefTypes');
//		require_once 'Tests/Zircote/Ccp/Api/Command/Eve/SkillTree.php';
//		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Eve_SkillTree');
		//Map
//		require_once 'Tests/Zircote/Ccp/Api/Command/Map/';
//		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Map_');
		//Misc
//		require_once 'Tests/Zircote/Ccp/Api/Command/Misc/';
//		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Misc_');
// Server
		require_once 'Tests/Zircote/Ccp/Api/Command/Server/ServerStatus.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Server_ServerStatus');
		
		return $suite;
	}
	
}