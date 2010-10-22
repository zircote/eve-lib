<?php 


class Tests_Zircote_Ccp_Api_Command_Char_SkillInTraining
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<eveapi version="2">
  <currentTime>2008-08-17 06:43:00</currentTime>
  <result>
    <currentTQTime offset="0">2008-08-17 06:43:00</currentTQTime>
    <trainingEndTime>2008-08-17 15:29:44</trainingEndTime>
    <trainingStartTime>2008-08-15 04:01:16</trainingStartTime>
    <trainingTypeID>3305</trainingTypeID>
    <trainingStartSP>24000</trainingStartSP>
    <trainingDestinationSP>135765</trainingDestinationSP>
    <trainingToLevel>4</trainingToLevel>
    <skillInTraining>1</skillInTraining>
  </result>
  <cachedUntil>2008-08-17 06:58:00</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testAccountStatus(){
 		$this->markTestSkipped();
 		require_once 'Zircote/Ccp/Api.php';
 		require_once 'Zircote/Ccp/Api/Result/Char/SkillInTraining.php';
 		$api = new Zircote_Ccp_Api(Tests_AllTests::$tests_config);
 		$out = $api->setScope('Char')
 			->SkillInTraining();
// 		print_r($out->result); 
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('currentTQTime', $out->result['result']);
 		$api = $out = null;
 	}
}