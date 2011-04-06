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

class EveLib_Ccp_Api_Result_Eve_CertificateTreeTest 
	extends PHPUnit_Framework_TestCase {
		
	public function setUp(){
		$this->sharedFixture = <<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2008-11-13 20:21:45</currentTime>
    <result>
      <rowset name="categories" key="categoryID" columns="categoryID,categoryName">
        <row categoryID="3" categoryName="Core">
          <rowset name="classes" key="classID" columns="classID,className">
            <row classID="2" className="Core Fitting">
              <rowset name="certificates" key="certificateID" columns="certificateID,grade,corporationID,description">
                <row certificateID="5" grade="1" corporationID="1000125" description="This certificate represents a basic level of competence in fitting ships. It certifies that the holder is able to use baseline modules which improve power and CPU capabilities such as Co-Processors, Power Diagnostic Systems and Reactor Control Units. This is the first step towards broadening your fitting options.">
                  <rowset name="requiredSkills" key="typeID" columns="typeID,skillLevel">
                    <row typeID="3413" level="3"/>
                    <row typeID="3424" level="2"/>
                    <row typeID="3426" level="3"/>
                    <row typeID="3432" level="1"/>
                  </rowset>
                  <rowset name="requiredCertificates" key="certificateID" columns="certificateID,grade"/>
                 </row>
                 <row certificateID="6" grade="2" corporationID="1000125" description="This certificate represents a standard level of competence in fitting ships. It certifies that the holder is able to use Micro Auxiliary Power Cores and many Tech 2 fitting modules. The holder knows that MAPCs are the best way to increase power output on Frigate-class ships. This provides you with a broad range of fitting options">
                   <rowset name="requiredSkills" key="typeID" columns="typeID,skillLevel">
                     <row typeID="3318" level="4"/>
                     <row typeID="3413" level="5"/>
                     <row typeID="3418" level="4"/>
                     <row typeID="3426" level="5"/>
                     <row typeID="3432" level="4"/>
                   </rowset>
                   <rowset name="requiredCertificates" key="certificateID" columns="certificateID,grade">
                     <row certificateID="5" grade="1"/>
                   </rowset>
                 </row>
                 <row certificateID="292" grade="5" corporationID="1000125" description="This certificate represents an elite level of competence in advanced trade skills. It certifies that the holder is able to work the market with minimal friction and massage the best deals out of any situation. With this level of skill you can run financial rings around smaller players without ever troubling your gargantuan bank balance.">
                   <rowset name="requiredSkills" key="typeID" columns="typeID,skillLevel">
                     <row typeID="18580" level="5"/>
                     <row typeID="16594" level="5"/>
                     <row typeID="16597" level="5"/>
                     <row typeID="16595" level="5"/>
                   </rowset>
                   <rowset name="requiredCertificates" key="certificateID" columns="certificateID,grade">
                     <row certificateID="291" grade="1"/>
                  </rowset>
                </row>
              </rowset>
            </row>
        </rowset>
      </row>
    </rowset>
  </result>
  <cachedUntil>2008-11-13 21:21:45</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @group EveLib_Ccp_Api_Result_Eve
 	 */
 	public function testCertificateTree(){
 		//include_once 'EveLib/Ccp/Api/Result/Eve/CertificateTree.php';
 		$out = new EveLib_Ccp_Api_Result_Eve_CertificateTree($this->sharedFixture);
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('categories', $out->result['result']);
		foreach ($out->result['result']['categories'] as $categoryID => $category) {
			$this->assertEquals($categoryID, $category['categoryID']);
			$this->assertArrayHasKey('categoryID', $category);
			$this->assertArrayHasKey('categoryName', $category);
			$this->assertArrayHasKey('classes', $category);
			foreach ($category['classes'] as $classID => $class) {
				$this->assertEquals($classID, $class['classID']);
				$this->assertArrayHasKey('classID', $class);
				$this->assertArrayHasKey('className', $class);
				$this->assertArrayHasKey('certificates', $class);
				foreach ($class['certificates'] as $certificateID => $certificate) {
					$this->assertEquals($certificateID, $certificate['certificateID']);
					$this->assertArrayHasKey('grade', $certificate);
					$this->assertArrayHasKey('corporationID', $certificate);
					$this->assertArrayHasKey('description', $certificate);
					foreach ($certificate['requiredSkills'] as $typeID => $requiredSkill) {
						$this->assertEquals($typeID, $requiredSkill['typeID']);
						$this->assertArrayHasKey('typeID', $requiredSkill);
						$this->assertArrayHasKey('level', $requiredSkill);
					}
					if(array_key_exists('requiredCertificates', $certificate)) {
						foreach ($certificate['requiredCertificates'] as $certificateID => $requiredCertificate) {
							$this->assertEquals($certificateID, $requiredCertificate['certificateID']);
							$this->assertArrayHasKey('certificateID', $requiredCertificate);
							$this->assertArrayHasKey('grade', $requiredCertificate);
						}
					}
				}
			}
		}
 		$api = $out = null;
 	}
}