<?php

/**
 * 
 * 
 * @author zircote
 *
 */
  class Tests_Zircote_Ccp_Api_Result_Abstract extends PHPUnit_Framework_TestCase {
 	
 	public function setUp(){
 		require_once 'Zircote/Ccp/Api/Result/Abstract.php';

		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2007-12-22 21:51:40</currentTime>
  <result>
    <rowset name="skillGroups" key="groupID" columns="groupName,groupID">
      <row groupName="Corporation Management" groupID="266">
        <rowset name="skills" key="typeID" columns="typeName,groupID,typeID">
          <row typeName="Anchoring" groupID="266" typeID="11584">
            <description>Skill at Anchoring Deployables. Can not be trained on Trial Accounts.</description>
            <rank>3</rank>
            <rowset name="requiredSkills" key="typeID" columns="typeID,skillLevel" />
            <requiredAttributes>
              <primaryAttribute>memory</primaryAttribute>
              <secondaryAttribute>charisma</secondaryAttribute>
            </requiredAttributes>
            <rowset name="skillBonusCollection" key="bonusType" columns="bonusType,bonusValue">
              <row bonusType="canNotBeTrainedOnTrial" bonusValue="1" />
            </rowset>
          </row>
          <row typeName="CFO Training" groupID="266" typeID="3369">
            <description>Skill at managing corp finances. 5% discount on all fees at non-hostile NPC station if acting as CFO of a corp. </description>
            <rank>3</rank>
            <rowset name="requiredSkills" key="typeID" columns="typeID,skillLevel">
              <row typeID="3363" skillLevel="2" />
              <row typeID="3444" skillLevel="3" />
            </rowset>
            <requiredAttributes>
              <primaryAttribute>memory</primaryAttribute>
              <secondaryAttribute>charisma</secondaryAttribute>
            </requiredAttributes>
            <rowset name="skillBonusCollection" key="bonusType" columns="bonusType,bonusValue" />
          </row>
          <row typeName="Corporation Management" groupID="266" typeID="3363">
            <description>Basic corporation operation. +10 corporation members allowed per level.
 
Notice:  the CEO must update his corporation through the corporation user interface before the skill takes effect</description>
            <rank>1</rank>
            <rowset name="requiredSkills" key="typeID" columns="typeID,skillLevel" />
            <requiredAttributes>
              <primaryAttribute>memory</primaryAttribute>
              <secondaryAttribute>charisma</secondaryAttribute>
            </requiredAttributes>
            <rowset name="skillBonusCollection" key="bonusType" columns="bonusType,bonusValue">
              <row bonusType="corporationMemberBonus" bonusValue="10" />
            </rowset>
          </row>
        </rowset>
      </row>
    </rowset>
  </result>
  <cachedUntil>2007-12-23 21:51:40</cachedUntil>
</eveapi>
EOF;

 	}

 	public function testAbstract(){
// 		$xml = simplexml_load_string($this->sharedFixture['all']);
		require_once 'Zircote/Ccp/Api/Result/Abstract.php';
 		$o = new Zircote_Ccp_Api_Result_Abstract($this->sharedFixture);
 		$this->assertArrayHasKey('currentTime', $o->result);
 		$this->assertEquals('2010-10-18 02:11:50', $o->result['currentTime']);
 		$this->assertArrayHasKey('cachedUntil', $o->result);
 		$this->assertEquals('2010-10-18 03:11:50', $o->result['cachedUntil']);
 		$this->assertArrayHasKey('totals', $o->result['result']);
 		$this->assertArrayHasKey('factions', $o->result['result']);
 		foreach ($o->result['result']['factions'] as $value) {
 			$this->assertArrayHasKey('factionID', $value);
 		}
 		$this->assertArrayHasKey('factionWars', $o->result['result']);
 		foreach ($o->result['result']['factionWars'] as $value) {
 			$this->assertArrayHasKey('factionID', $value);
 		}
 	}
 }
 	