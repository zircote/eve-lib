<?php

require_once 'PHPUnit/Framework.php';

$addPath = realpath(dirname(__FILE__) . '/../');
set_include_path($addPath . PATH_SEPARATOR . get_include_path());
		
		
/**
 * 
 * @package Ibp_Api
 * Enter description here ...
 * @author rallen@ifbyphone.com
 *
 */
class Tests_AllTests {
	public static function suite(){
		$suite = new PHPUnit_Framework_TestSuite('Tests');
		require_once 'Tests/Zircote/Ccp/Api.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api');
		// Server
		require_once 'Tests/Zircote/Ccp/Api/Command/Server/ServerStatus.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Server_ServerStatus');
		// Commands
		require_once 'Tests/Zircote/Ccp/Api/Command/Eve/AllianceList.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Eve_AllianceList');
		require_once 'Tests/Zircote/Ccp/Api/Command/Eve/CertificateTree.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Eve_CertificateTree');
//		require_once 'Tests/Zircote/Ccp/Api/Command/Eve/CharacterID.php';
//		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Eve_CharacterID');
//		require_once 'Tests/Zircote/Ccp/Api/Command/Eve/CharacterInfo.php';
//		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Eve_CharacterInfo');
//		require_once 'Tests/Zircote/Ccp/Api/Command/Eve/CharacterName.php';
//		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Eve_CharacterName');
		require_once 'Tests/Zircote/Ccp/Api/Command/Eve/ConquerableStationList.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Eve_ConquerableStationList');
		require_once 'Tests/Zircote/Ccp/Api/Command/Eve/ErrorList.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Eve_ErrorList');
//		require_once 'Tests/Zircote/Ccp/Api/Command/Eve/FacWarStats.php';
//		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Eve_FacWarStats');
//		require_once 'Tests/Zircote/Ccp/Api/Command/Eve/FacWarTopStats.php';
//		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Eve_FacWarTopStats');
		require_once 'Tests/Zircote/Ccp/Api/Command/Eve/RefTypes.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Eve_RefTypes');
		require_once 'Tests/Zircote/Ccp/Api/Command/Eve/SkillTree.php';
		$suite->addTestSuite('Tests_Zircote_Ccp_Api_Command_Eve_SkillTree');
		
		return $suite;
	}
	
}