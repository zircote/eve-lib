<?php 


class Tests_Zircote_Ccp_Api_Command_Char_Standings
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2008-09-03 12:20:19</currentTime>
  <result>
    <standingsTo>
      <rowset name="characters" key="toID" columns="toID,toName,standing">
        <row toID="123456" toName="Test Ally" standing="1" />
        <row toID="234567" toName="Test Friend" standing="0.5" />
        <row toID="345678" toName="Test Enemy" standing="-0.8" />
      </rowset>
      <rowset name="corporations" key="toID" columns="toID,toName,standing">
        <row toID="456789" toName="Test Bad Guy Corp" standing="-1" />
      </rowset>
    </standingsTo>
    <standingsFrom>
      <rowset name="agents" key="fromID" columns="fromID,fromName,standing">
        <row fromID="3009841" fromName="Pausent Ansin" standing="0.1" />
        <row fromID="3009846" fromName="Charie Octienne" standing="0.19" />
      </rowset>
      <rowset name="NPCCorporations" key="fromID" columns="fromID,fromName,standing">
        <row fromID="1000061" fromName="Freedom Extension" standing="0" />
        <row fromID="1000064" fromName="Carthum Conglomerate" standing="0.34" />
        <row fromID="1000094" fromName="TransStellar Shipping" standing="0.02" />
      </rowset>
      <rowset name="factions" key="fromID" columns="fromID,fromName,standing">
        <row fromID="500003" fromName="Amarr Empire" standing="-0.1" />
        <row fromID="500020" fromName="Serpentis" standing="-1" />
      </rowset>
    </standingsFrom>
  </result>
  <cachedUntil>2008-09-03 15:20:19</cachedUntil>
</eveapi>
 
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testAccountStatus(){
 		$this->markTestSkipped();
 		require_once 'Zircote/Ccp/Api.php';
 		require_once 'Zircote/Ccp/Api/Result/Char/Standings.php';
 		$api = new Zircote_Ccp_Api(Tests_AllTests::$tests_config);
 		$out = $api->setScope('Char')
 			->AccountStatus();
// 		print_r($out->result); 
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('standingsTo', $out->result['result']);
		$this->assertArrayHasKey('standingsTo', $out->result['result']);
		$this->assertArrayHasKey('standingsFrom', $out->result['result']);
		$this->assertArrayHasKey('agents', $out->result['result']['standingsFrom']);
		$this->assertArrayHasKey('NPCCorporations', $out->result['result']['standingsFrom']);
		$this->assertArrayHasKey('factions', $out->result['result']['standingsFrom']);
	
 		$api = $out = null;
 	}
}