<?php 


class Tests_Zircote_Ccp_Api_Command_Corp_Killlog 
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2010-06-17 18:15:01</currentTime>
  <result>
    <rowset name="kills" key="killID" columns="killID,solarSystemID,killTime,moonID">
      <row killID="63" solarSystemID="30000848" killTime="2007-11-15 15:36:00" moonID="0">
        <victim characterID="150340823" characterName="Dieinafire" corporationID="1000169"
                corporationName="Center for Advanced Studies" allianceID="0"
                damageTaken="6378" shipTypeID="12003" />
        <rowset name="attackers" columns="characterID,characterName,corporationID,corporationName,allianceID,allianceName,
                factionID,factionName,securityStatus,damageDone,finalBlow,weaponTypeID,shipTypeID">
          <row characterID="0" characterName="" corporationID="1000127" corporationName="Guristas"
               allianceID="0" allianceName="" factionID="0" factionName="" securityStatus="0" 
               damageDone="6313" finalBlow="1" weaponTypeID="0" shipTypeID="203" />
          <row characterID="0" characterName="" corporationID="150279367" corporationName="Starbase Anchoring Corp"
               allianceID="0" allianceName="" securityStatus="0" damageDone="65" finalBlow="0"
               weaponTypeID="0" shipTypeID="16632" />
        </rowset>
        <rowset name="items" columns="typeID,flag,qtyDropped,qtyDestroyed" />
      </row>
      <row killID="62" solarSystemID="30000848" killTime="2007-11-15 14:48:00" moonID="0">
        <victim characterID="150340823" characterName="Dieinafire" corporationID="1000169"
                corporationName="Center for Advanced Studies" allianceID="0" damageTaken="455"
                shipTypeID="606" />
        <rowset name="attackers" columns="characterID,characterName,corporationID,corporationName,allianceID,allianceName,
                factionID,factionName,securityStatus,damageDone,finalBlow,weaponTypeID,shipTypeID">
          <row characterID="0" characterName="" corporationID="1000127" corporationName="Guristas"
               allianceID="0" allianceName="" factionID="0" factionName="" securityStatus="0" 
               damageDone="394" finalBlow="1" weaponTypeID="0" shipTypeID="23328" />
          <row characterID="150131146" characterName="Mark Player" corporationID="150147571"
               corporationName="Peanut Butter Jelly Time" allianceID="150148475"
               allianceName="Margaritaville" securityStatus="0.3" damageDone="0"
               finalBlow="0" weaponTypeID="25715" shipTypeID="24698" />
        </rowset>
        <rowset name="items" columns="typeID,flag,qtyDropped,qtyDestroyed">
          <row typeID="3520" flag="0" qtyDropped="3" qtyDestroyed="1" />
          <row typeID="12076" flag="0" qtyDropped="0" qtyDestroyed="1">
            <rowset name="items" columns="typeID,flag,qtyDropped,qtyDestroyed">
              <row typeID="12259" flag="0" qtyDropped="0" qtyDestroyed="1" />
              <row typeID="1236" flag="0" qtyDropped="2" qtyDestroyed="1" />
              <row typeID="2032" flag="0" qtyDropped="1" qtyDestroyed="1" />
            </rowset>
          </row>
          <row typeID="12814" flag="0" qtyDropped="1" qtyDestroyed="3" />
          <row typeID="2364" flag="0" qtyDropped="0" qtyDestroyed="3" />
          <row typeID="26070" flag="0" qtyDropped="0" qtyDestroyed="2" />
          <row typeID="2605" flag="0" qtyDropped="1" qtyDestroyed="0" />
        </rowset>
      </row>
    </rowset>
  </result>
  <cachedUntil>2010-06-17 19:15:01</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testKilllog(){
 		require_once 'Zircote/Ccp/Api.php';
 		require_once 'Zircote/Ccp/Api/Result/Corp/Killlog.php';
 		$api = new Zircote_Ccp_Api(Tests_AllTests::$tests_config);
 		$out = $api->setScope('Corp')
 			->Killlog();
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('kills', $out->result['result']);
// 		print_r($out->result);
 	}
}