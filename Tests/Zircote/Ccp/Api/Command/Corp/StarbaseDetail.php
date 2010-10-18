<?php 


class Tests_Zircote_Ccp_Api_Command_Corp_StarbaseDetail 
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2010-05-29 20:36:56</currentTime>
  <result>
    <state>4</state>
    <stateTimestamp>2009-05-02 21:31:36</stateTimestamp>
    <onlineTimestamp>2009-04-18 23:30:29</onlineTimestamp>
    <generalSettings>
      <usageFlags>3</usageFlags>
      <deployFlags>0</deployFlags>
      <allowCorporationMembers>1</allowCorporationMembers>
      <allowAllianceMembers>1</allowAllianceMembers>
    </generalSettings>
    <combatSettings>
      <useStandingsFrom ownerID="154683985" />
      <onStandingDrop standing="990" />
      <onStatusDrop enabled="0" standing="0" />
      <onAggression enabled="0" />
      <onCorporationWar enabled="1" />
    </combatSettings>
    <rowset name="fuel" key="typeID" columns="typeID,quantity">
      <row typeID="16275" quantity="2447" />
      <row typeID="16274" quantity="18758" />
      <row typeID="9848" quantity="166" />
      <row typeID="9832" quantity="332" />
      <row typeID="3689" quantity="332" />
      <row typeID="44" quantity="166" />
      <row typeID="16273" quantity="6142" />
      <row typeID="16272" quantity="5644" />
      <row typeID="3683" quantity="1162" />
    </rowset>
  </result>
  <cachedUntil>2010-05-29 21:36:56</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testStarbaseDetail(){
 		require_once 'Zircote/Ccp/Api.php';
 		require_once 'Zircote/Ccp/Api/Result/Corp/StarbaseDetail.php';
 		$api = new Zircote_Ccp_Api;
 		$out = $api->setScope('Corp')
 			->StarbaseDetail();
// 		print_r($out->result);
 	}
}