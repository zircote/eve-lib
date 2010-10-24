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

class Tests_Zircote_Ccp_Api_Command_Char_CharacterSheet
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2009-08-26 12:00:09</currentTime>
  <result>
    <characterID>150337897</characterID>
    <name>corpslave</name>
    <race>Minmatar</race>
    <bloodLine>Brutor</bloodLine>
    <gender>Female</gender>
    <corporationName>corpexport Corp</corporationName>
    <corporationID>150337746</corporationID>
    <cloneName>Clone Grade Pi</cloneName>
    <cloneSkillPoints>54600000</cloneSkillPoints>
    <balance>190210393.87</balance>
    <attributeEnhancers>
      <intelligenceBonus>
        <augmentatorName>Snake Delta</augmentatorName>
        <augmentatorValue>3</augmentatorValue>
      </intelligenceBonus>
      <memoryBonus>
        <augmentatorName>Memory Augmentation - Basic</augmentatorName>
        <augmentatorValue>3</augmentatorValue>
      </memoryBonus>
    </attributeEnhancers>
    <attributes>
      <intelligence>6</intelligence>
      <memory>4</memory>
      <charisma>7</charisma>
      <perception>12</perception>
      <willpower>10</willpower>
    </attributes>
    <rowset name="skills" key="typeID" columns="typeID,skillpoints,level,unpublished">
      <row typeID="3431" skillpoints="8000" level="3"/>
      <row typeID="3413" skillpoints="8000" level="3"/>
      <row typeID="21059" skillpoints="500" level="1"/>
      <row typeID="3416" skillpoints="8000" level="3"/>
      <row typeID="3445" skillpoints="277578" unpublished="1"/>
    </rowset>
    <rowset name="certificates" key="certificateID" columns="certificateID">
      <row certificateID="1"/>
      <row certificateID="5"/>
      <row certificateID="19"/>
      <row certificateID="239"/>
      <row certificateID="282"/>
      <row certificateID="32"/>
      <row certificateID="258"/>
    </rowset>
    <rowset name="corporationRoles" key="roleID" columns="roleID,roleName">
      <row roleID="1" roleName="roleDirector" />
    </rowset>
    <rowset name="corporationRolesAtHQ" key="roleID" columns="roleID,roleName">
      <row roleID="1" roleName="roleDirector" />
    </rowset>
    <rowset name="corporationRolesAtBase" key="roleID" columns="roleID,roleName">
      <row roleID="1" roleName="roleDirector" />
    </rowset>
    <rowset name="corporationRolesAtOther" key="roleID" columns="roleID,roleName">
      <row roleID="1" roleName="roleDirector" />
    </rowset>
    <rowset name="corporationTitles" key="titleID" columns="titleID,titleName">
      <row titleID="1" titleName="Member" />
    </rowset>
  </result>
  <cachedUntil>2009-08-26 13:00:09</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testAccountStatus(){
 		$this->markTestSkipped();
 		require_once 'Zircote/Ccp/Api.php';
 		require_once 'Zircote/Ccp/Api/Result/Char/CharacterSheet.php';
 		$api = new Zircote_Ccp_Api(Tests_AllTests::$tests_config);
 		$out = $api->setScope('Char')
 			->CharacterSheet();
// 		print_r($out->result); 
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('characterID', $out->result['result']);
 		$api = $out = null;
 	}
}