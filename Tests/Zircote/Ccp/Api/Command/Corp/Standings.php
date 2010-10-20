<?php 


class Tests_Zircote_Ccp_Api_Command_Corp_Standings 
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2008-09-02 18:08:40</currentTime>
  <result>
    <corporationStandings>
      <standingsTo>
        <rowset name="characters" key="toID" columns="toID,toName,standing">
        </rowset>
        <rowset name="corporations" key="toID" columns="toID,toName,standing">
        </rowset>
        <rowset name="alliances" key="toID" columns="toID,toName,standing">
        </rowset>
      </standingsTo>
      <standingsFrom>
        <rowset name="agents" key="fromID" columns="fromID,fromName,standing">
        </rowset>
        <rowset name="NPCCorporations" key="fromID" columns="fromID,fromName,standing">
        </rowset>
        <rowset name="factions" key="fromID" columns="fromID,fromName,standing">
        </rowset>
      </standingsFrom>
    </corporationStandings>
    <allianceStandings>
      <standingsTo>
        <rowset name="corporations" key="toID" columns="toID,toName,standing">
        </rowset>
        <rowset name="alliances" key="toID" columns="toID,toName,standing">
        </rowset>
      </standingsTo>
    </allianceStandings>
  </result>
  <cachedUntil>2008-09-02 21:08:41</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testStandings(){
 		require_once 'Zircote/Ccp/Api.php';
 		require_once 'Zircote/Ccp/Api/Result/Corp/Standings.php';
 		$api = new Zircote_Ccp_Api(Tests_AllTests::$tests_config);
 		$out = $api->setScope('Corp')
 			->Standings();
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('corporationStandings', $out->result['result']);
		$this->assertArrayHasKey('standingsTo', $out->result['result']['corporationStandings']);
		$this->assertArrayHasKey('standingsFrom', $out->result['result']['corporationStandings']);
		
// 		print_r($out->result);
 	}
}