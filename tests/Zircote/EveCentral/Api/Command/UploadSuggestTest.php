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

class Zircote_EveCentral_Api_Command_UploadSuggestTest
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
EOF;
	}
 	
 	/**
 	 * @group Zircote_EveCentral_Api_Command
 	 */
 	public function testUploadSuggest(){
 		$api = new Zircote_EveCentral_Api();
		$data = $api->UploadSuggest(array('region' => '10000002'));
		print_r($data->result); exit;
		$this->assertArrayHasKey('upload_suggest', $data->result);
		foreach ($data->result['upload_suggest'] as $key => $value) {
			$this->assertArrayHasKey('id', $data->result['upload_suggest'][$key]);
			$this->assertArrayHasKey('name', $data->result['upload_suggest'][$key]);
		}
 	}
}