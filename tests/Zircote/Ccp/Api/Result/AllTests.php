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

		
/**
 * 
 * @package Zircote
 * Enter description here ...
 * @author zircote@gmail.com
 *
 */
class Tests_Zircote_Ccp_Api_Result_AllTests {
	public static function suite(){
		$suite = new PHPUnit_Framework_TestSuite('Tests_Zircote_Ccp_Api_Result');
		// Results
		// Account
		require_once 'Tests/Zircote/Ccp/Api/Result/Account/AccountStatus.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Account_AccountStatus');
		require_once 'Tests/Zircote/Ccp/Api/Result/Account/Characters.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Account_Characters');
		//Char
		require_once 'Tests/Zircote/Ccp/Api/Result/Char/AccountBalance.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Char_AccountBalance');
		require_once 'Tests/Zircote/Ccp/Api/Result/Char/AssetList.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Char_AssetList');
		require_once 'Tests/Zircote/Ccp/Api/Result/Char/CalendarEventAttendees.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Char_CalendarEventAttendees');
		require_once 'Tests/Zircote/Ccp/Api/Result/Char/CharacterSheet.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Char_CharacterSheet');
		require_once 'Tests/Zircote/Ccp/Api/Result/Char/ContactList.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Char_ContactList');
		require_once 'Tests/Zircote/Ccp/Api/Result/Char/ContactNotifications.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Char_ContactNotifications');
		require_once 'Tests/Zircote/Ccp/Api/Result/Char/FacWarStats.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Char_FacWarStats');
		require_once 'Tests/Zircote/Ccp/Api/Result/Char/IndustryJobs.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Char_IndustryJobs');
		require_once 'Tests/Zircote/Ccp/Api/Result/Char/Killlog.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Char_Killlog');
		require_once 'Tests/Zircote/Ccp/Api/Result/Char/MailBodies.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Char_MailBodies');
		require_once 'Tests/Zircote/Ccp/Api/Result/Char/MailMessages.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Char_MailMessages');
		require_once 'Tests/Zircote/Ccp/Api/Result/Char/MailingLists.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Char_MailingLists');
		require_once 'Tests/Zircote/Ccp/Api/Result/Char/MarketOrders.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Char_MarketOrders');
		require_once 'Tests/Zircote/Ccp/Api/Result/Char/Medals.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Char_Medals');
		require_once 'Tests/Zircote/Ccp/Api/Result/Char/Notifications.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Char_Notifications');
		require_once 'Tests/Zircote/Ccp/Api/Result/Char/Research.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Char_Research');
		require_once 'Tests/Zircote/Ccp/Api/Result/Char/SkillInQueue.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Char_SkillInQueue');
		require_once 'Tests/Zircote/Ccp/Api/Result/Char/SkillInTraining.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Char_SkillInTraining');
		require_once 'Tests/Zircote/Ccp/Api/Result/Char/Standings.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Char_Standings');
		require_once 'Tests/Zircote/Ccp/Api/Result/Char/UpcomingCalendarEvents.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Char_UpcomingCalendarEvents');
		require_once 'Tests/Zircote/Ccp/Api/Result/Char/WalletJournal.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Char_WalletJournal');
		require_once 'Tests/Zircote/Ccp/Api/Result/Char/WalletTransactions.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Char_WalletTransactions');

		// Corp
		require_once 'Tests/Zircote/Ccp/Api/Result/Corp/AccountBalance.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Corp_AccountBalance');
		require_once 'Tests/Zircote/Ccp/Api/Result/Corp/AssetList.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Corp_AssetList');
		require_once 'Tests/Zircote/Ccp/Api/Result/Corp/CalendarEventAttendees.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Corp_CalendarEventAttendees');
		require_once 'Tests/Zircote/Ccp/Api/Result/Corp/ContactList.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Corp_ContactList');
		require_once 'Tests/Zircote/Ccp/Api/Result/Corp/ContainerLog.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Corp_ContainerLog');
		require_once 'Tests/Zircote/Ccp/Api/Result/Corp/CorporationSheet.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Corp_CorporationSheet');
		require_once 'Tests/Zircote/Ccp/Api/Result/Corp/FacWarStats.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Corp_FacWarStats');
		require_once 'Tests/Zircote/Ccp/Api/Result/Corp/IndustryJobs.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Corp_IndustryJobs');
		require_once 'Tests/Zircote/Ccp/Api/Result/Corp/Killlog.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Corp_Killlog');
		require_once 'Tests/Zircote/Ccp/Api/Result/Corp/MarketOrders.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Corp_MarketOrders');
		require_once 'Tests/Zircote/Ccp/Api/Result/Corp/Medals.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Corp_Medals');
		require_once 'Tests/Zircote/Ccp/Api/Result/Corp/MemberMedals.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Corp_MemberMedals');
		require_once 'Tests/Zircote/Ccp/Api/Result/Corp/MemberSecurity.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Corp_MemberSecurity');
		require_once 'Tests/Zircote/Ccp/Api/Result/Corp/MemberSecurityLog.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Corp_MemberSecurityLog');
		require_once 'Tests/Zircote/Ccp/Api/Result/Corp/MemberTracking.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Corp_MemberTracking');
		require_once 'Tests/Zircote/Ccp/Api/Result/Corp/OutpostList.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Corp_OutpostList');
		require_once 'Tests/Zircote/Ccp/Api/Result/Corp/OutpostServiceDetail.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Corp_OutpostServiceDetail');
		require_once 'Tests/Zircote/Ccp/Api/Result/Corp/Shareholders.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Corp_Shareholders');
		require_once 'Tests/Zircote/Ccp/Api/Result/Corp/Standings.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Corp_Standings');
		require_once 'Tests/Zircote/Ccp/Api/Result/Corp/StarbaseList.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Corp_StarbaseList');
		require_once 'Tests/Zircote/Ccp/Api/Result/Corp/StarbaseDetail.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Corp_StarbaseDetail');		
		require_once 'Tests/Zircote/Ccp/Api/Result/Corp/Titles.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Corp_Titles');
		require_once 'Tests/Zircote/Ccp/Api/Result/Corp/WalletJournal.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Corp_WalletJournal');
		require_once 'Tests/Zircote/Ccp/Api/Result/Corp/WalletTransactions.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Corp_WalletTransactions');

		
		//Eve
		require_once 'Tests/Zircote/Ccp/Api/Result/Eve/CharacterInfo.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Eve_CharacterInfo');
		require_once 'Tests/Zircote/Ccp/Api/Result/Eve/CharacterID.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Eve_CharacterID');
		require_once 'Tests/Zircote/Ccp/Api/Result/Eve/CharacterName.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Eve_CharacterName');
		require_once 'Tests/Zircote/Ccp/Api/Result/Eve/ErrorList.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Eve_ErrorList');
		require_once 'Tests/Zircote/Ccp/Api/Result/Eve/FacWarStats.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Eve_FacWarStats');
		require_once 'Tests/Zircote/Ccp/Api/Result/Eve/AllianceList.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Eve_AllianceList');
		require_once 'Tests/Zircote/Ccp/Api/Result/Eve/CertificateTree.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Eve_CertificateTree');
		require_once 'Tests/Zircote/Ccp/Api/Result/Eve/ConquerableStationList.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Eve_ConquerableStationList');
		require_once 'Tests/Zircote/Ccp/Api/Result/Eve/FacWarTopStats.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Eve_FacWarTopStats');
		require_once 'Tests/Zircote/Ccp/Api/Result/Eve/RefTypes.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Eve_RefTypes');
		require_once 'Tests/Zircote/Ccp/Api/Result/Eve/SkillTree.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Eve_SkillTree');

		
		//Map
		require_once 'Tests/Zircote/Ccp/Api/Result/Map/FacWarSystems.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Map_FacWarSystems');
		require_once 'Tests/Zircote/Ccp/Api/Result/Map/Jumps.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Map_Jumps');
		require_once 'Tests/Zircote/Ccp/Api/Result/Map/Kills.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Map_Kills');
		require_once 'Tests/Zircote/Ccp/Api/Result/Map/Sovereignty.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Map_Sovereignty');
		require_once 'Tests/Zircote/Ccp/Api/Result/Map/SovereigntyStatus.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Map_SovereigntyStatus');
		
		
		//Misc
//		require_once 'Tests/Zircote/Ccp/Api/Result/Misc/';
//		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Misc_');
// Server
		require_once 'Tests/Zircote/Ccp/Api/Result/Server/ServerStatus.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Result_Server_ServerStatus');
		
		return $suite;
	}
	
}