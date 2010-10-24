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
class Tests_Zircote_Ccp_Api_Result_Eve_SkillTree 
	extends PHPUnit_Framework_TestCase {
		
	public function setUp(){
		$this->sharedFixture = <<<EOF
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
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testSkillTree(){
 		require_once 'Zircote/Ccp/Api/Result/Eve/SkillTree.php';
 		$out = new Zircote_Ccp_Api_Result_Eve_SkillTree($this->sharedFixture);
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
 		$this->assertArrayHasKey('skillGroups', $out->result['result']);
 		foreach ($out->result['result']['skillGroups'] as $groupID => $skillGroup) {
 			$this->assertArrayHasKey('groupName', $skillGroup);
 			$this->assertArrayHasKey('groupID', $skillGroup);
 			$this->assertEquals($groupID, $skillGroup['groupID']);
 			$this->assertArrayHasKey('skills', $skillGroup);
 			foreach ($skillGroup['skills'] as $typeID => $skills) {
 				$this->assertArrayHasKey('description', $skills);
 				$this->assertArrayHasKey('rank', $skills);
 				$this->assertArrayHasKey('primaryAttribute', $skills['requiredAttributes']);
 				$this->assertArrayHasKey('secondaryAttribute', $skills['requiredAttributes']);
 				$this->assertArrayHasKey('typeName', $skills);
 				$this->assertArrayHasKey('groupID', $skills);
 				$this->assertArrayHasKey('typeID', $skills);
 			}
 		}
		foreach (explode(',','groupName,groupID') as $row) {
			$this->assertArrayHasKey($row, $out->result['result']['skillGroups']['266']);
		}
		foreach (explode(',','typeName,groupID,typeID') as $row) {
			$this->assertArrayHasKey($row, $out->result['result']['skillGroups']['266']['skills']['11584']);
		}
 		$api = $out = null;
 	}
}