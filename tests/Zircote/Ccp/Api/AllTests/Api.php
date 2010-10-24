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

 class Tests_Zircote_Ccp_Api extends PHPUnit_Framework_TestCase {
 	
 	public function setup(){
		require_once 'Zircote/Ccp/Api/Result/Server/ServerStatus.php';
 		require_once 'Zircote/Ccp/Api.php';
 	}
 	/**
 	 * 
 	 * @return Zircote_Ccp_Api
 	 */
 	public function testApiInstantion(){
 		$api = new Zircote_Ccp_Api();
 		$this->assertObjectHasAttribute('_scope', $api);
 		return $api;
 	}
 	
 	/**
 	 * @depends testApiInstantion
 	 * @param Zircote_Ccp_Api $api
 	 * @return Zircote_Ccp_Api
 	 */
 	public function testSetScope(Zircote_Ccp_Api $api){
 		$api->setScope('Eve');
 		$this->assertEquals('eve', $api->getScope());
 		$api->setScope('Character');
 		$this->assertEquals('character', $api->getScope());
 		return $api;
 	}
 	
 	/**
 	 * @depends testSetScope
 	 * @param Zircote_Ccp_Api $api
 	 * @return Zircote_Ccp_Api
 	 */
 	public function testGetApi(Zircote_Ccp_Api $api){
 		$newApi = array (
 			'apiKey' => '5432132121',
 			'userID' => '123456',
 			'characterID' => '654321'
 		);
 		$api->setApi($newApi);
 		$this->assertTrue($api instanceof Zircote_Ccp_Api);
 		$array = $api->getApi();
 		$this->assertArrayHasKey('apiKey', $array);
 		$this->assertEquals($newApi['apiKey'], $array['apiKey']);
 		$this->assertArrayHasKey('userID', $array);
 		$this->assertEquals($newApi['userID'], $array['userID']);
 		$this->assertArrayHasKey('characterID', $array);
 		$this->assertEquals($newApi['characterID'], $array['characterID']);
 		return $api;
 	}
 	
 	/**
 	 * @depends testGetApi
 	 * @param Zircote_Ccp_Api $api
 	 * @return Zircote_Ccp_Api
 	 */
 	public function testCacheAvailable($api){
 		$c = $api->getCache();
 		$this->assertTrue($c instanceof Zend_Cache_Core);
 		return $api;
 	}
 	
 	/**
 	 * @depends testCacheAvailable
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testConnection(Zircote_Ccp_Api $api){
 		$this->assertTrue($api->getConnection() instanceof Zircote_Ccp_Api_Connection);
 	}
 	
 	/**
 	 * @expectedException Zircote_Ccp_Api_Exception
 	 * @param Zircote_Ccp_Api $api
 	 * @return Zircote_Ccp_Api
 	 */
 	public function testSetScopeFail(){
 		$api = new Zircote_Ccp_Api;
 		$api->setScope('BullSHIT');
 		return $api;
 	}
 	
 	public function testCacheSave(){
 		$api = new Zircote_Ccp_Api;
 		$cache = $api->getCache();
 		$cache->setLifetime(6);
 		$dataSaved = rand(10,10000);
 		$key = md5(time());
 		$cache->save($dataSaved, $key);
 		$dataLoad = $cache->load($key);
 		$this->assertEquals($dataSaved, $dataLoad);
 	}
 	
// 	public function testCacheTimeSet(){
// 		$api = new Zircote_Ccp_Api;
// 		$cache = $api->getCache();
// 		$cache->setLifetime(1);
// 		$dataSaved = rand(10,10000);
// 		$key = md5(time());
// 		$cache->save($dataSaved, $key);
// 		$cache->clean('old');
// 		sleep(2);
// 		$dataLoad = $cache->load($key);
// 		$this->assertNotEquals($dataSaved, $dataLoad);
// 	}
 }
