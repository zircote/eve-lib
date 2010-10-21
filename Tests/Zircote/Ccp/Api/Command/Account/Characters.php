<?php 


class Tests_Zircote_Ccp_Api_Command_Account_Characters 
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="1">
  <currentTime>2007-12-02 19:37:55</currentTime>
  <result>
    <rowset name="alliances" key="allianceID" columns="name,shortName,allianceID,executorCorpID,memberCount,startDate">
      <row name="Starbase Anchoring Alliance" shortName="MATT" allianceID="150382481"
           executorCorpID="150279367" memberCount="4" startDate="2007-09-18 11:04:00">
        <rowset name="memberCorporations" key="corporationID" columns="corporationID,startDate">
          <row corporationID="150279367" startDate="2007-09-18 11:04:00" />
          <row corporationID="150333466" startDate="2007-09-19 11:04:00" />
        </rowset>
      </row>
      <row name="The Dead Rabbits" shortName="TL.DR" allianceID="150430947"
           executorCorpID="150212025" memberCount="3" startDate="2007-11-12 16:00:00">
        <rowset name="memberCorporations" key="corporationID" columns="corporationID,startDate">
          <row corporationID="150212025" startDate="2007-11-12 16:00:00" />
        </rowset>
      </row>
    </rowset>
  </result>
  <cachedUntil>2007-12-02 20:37:55</cachedUntil>
</eveapi>	
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testAllianceList(){
 		require_once 'Zircote/Ccp/Api.php';
 		require_once 'Zircote/Ccp/Api/Result/Account/Characters.php';
 		$api = new Zircote_Ccp_Api(Tests_AllTests::$tests_config);
 		$out = $api->setScope('Account')
 			->Characters();
// 		print_r($out->result);
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
 		$api = $out = null;
 	}
}