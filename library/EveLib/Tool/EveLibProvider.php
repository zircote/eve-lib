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
/*
 * zircote@flame:~$ zf enable config.provider EveLib_Tool_EveLibProvider
 * Provider/Manifest 'EveLib_Tool_EveLibProvider' was enabled for usage with Zend Tool.
 */
require_once 'Zend/Tool/Project/Provider/Abstract.php';
require_once 'Zend/Tool/Framework/Provider/Pretendable.php';

class EveLib_Tool_EveLibProvider extends Zend_Tool_Project_Provider_Abstract implements Zend_Tool_Framework_Provider_Pretendable {
	protected $_evelibRegistry;
	
	protected $_apiKey;
	protected $_characterID;
	protected $_userID;
	protected $_scope;
	
	public function initialize (){
		require_once 'Zend/Loader/Autoloader.php';
		$autoloader = Zend_Loader_Autoloader::getInstance()
			->registerNamespace('EveLib_');
		parent::initialize();
	}
	
	private function _loadConfig() {
	
	}
	/*
	 * evelib.Api.userID = "666413"
	 * evelib.Api.apiKey = "7E87B3A4DC214E08A35B8722C844AC40CD898FE3692A4E85982D45F640EC5A3F"
	 * evelib.Api.characterID = "543321"
	 * evelib.Cache.backend.name = "File"
	 * evelib.Cache.backend.options.cache_dir = "/tmp"
	 * evelib.Connection.host = "api.eve-central.com"
	 * evelib.Connection.port = "80"
	 * evelib.Connection.protocol = "http"
	 * 
	 */
	public function setConfig() {
		$userID = $this->_registry->getClient ()
			->promptInteractiveInput ( "Enter the EvE Api userID" );
		$apiKey = $this->_registry->getClient ()
			->promptInteractiveInput ( "Enter the EvE Api apiKey", "54312" );
		$this->_registry->getConfig ()
			->evelib = array('Api' => array(
				'userID' => $userID->getContent(),
				'apiKey' => $apiKey->getContent(),
			));
		$this->_registry->getConfig ()->save ();
		$this->setCharacterId();
		echo "EveLib Api Configuration Saved\n";
	}
	
	public function setCharacterId(){
		require_once 'EveLib/Ccp/Api.php';
		$_api = $this->_registry->getConfig ()
				->getConfigInstance()->toArray();
		$config = array(
	        'Scope' => array( 'scope' => 'account' ),
	        'Api' => $_api['evelib']['Api']
			);
		$api = new EveLib_Ccp_Api($config);
		$data = $api->Characters();
		$characters = $data->result['result']['characters'];
		$string = "Select the Character:\n";
		$i = 1;
		foreach ($characters as $cID => $character) {
			$c[$i] = $cID;
			$string .= PHP_EOL . $i++ . ")\t" . $character['name'] . "::" .
				$character['corporationName'] . PHP_EOL;
		}
		$success = null;
		while(!$success){
			$characterID = $this->_registry->getClient ()
				->promptInteractiveInput ( $string );
			if(array_key_exists($characterID->getContent(), $c)){
				$evelib = $this->_registry->getConfig ()
					->evelib;
				$evelib->Api->characterID = $c[$characterID->getContent()];
				$this->_registry->getConfig ()
					->evelib = $evelib;
				$this->_registry->getConfig ()->save ();
				$success = true;
			}
		}
	}
	/**
	 * @todo decide how I intend to handle options...need more reading time on Zend_Tool_Framework..
	 * Enter description here ...
	 */
	public function setCache(){
		
	}

	public function charInfo($characterID){
		if(!is_numeric($characterID)){
			$getCharId = $this->_getCharId($characterID);
			foreach ($getCharId->result['result']['characters'] as $id => $list) {
				if($characterID == $list['name']){
					$characterID =  $id;
				}
			}
		}
		$evelib = $this->_registry->getConfig ()
			->getConfigInstance()->toArray();
		$config = array(
	        'Scope' => array( 'scope' => 'eve' ),
	        'Api' => $evelib['evelib']['Api']
		);
		$api = new EveLib_Ccp_Api($config);
		$data = $api->CharacterInfo($characterID);
//		print_r($data->result['result']);
		$table = new Zend_Text_Table(array('columnWidths' => array(25, 30), 'padding' => 1,'decorator' => 'ascii' ));
		foreach ($data->result['result'] as $key => $value) {
			$table->appendRow(array($key, $value));
		}
		echo $table;
	}
	
	public function charSheet(){
		$evelib = $this->_registry->getConfig ()
			->getConfigInstance()->toArray();
		$config = array(
	        'Scope' => array( 'scope' => 'char' ),
	        'Api' => $evelib['evelib']['Api']
		);
		$api = new EveLib_Ccp_Api($config);
		$data = $api->CharacterSheet();
		unset($data->result['result']['skills']);
		unset($data->result['result']['certificates']);
		unset($data->result['result']['corporationRolesAtHQ']);
		unset($data->result['result']['corporationRoles']);
		unset($data->result['result']['corporationRolesAtBase']);
		unset($data->result['result']['corporationRolesAtOther']);
		unset($data->result['result']['corporationTitles']);
		unset($data->result['result']['attributeEnhancers']);
		unset($data->result['result']['attributes']);
		print_r($data->result['result']);
	}
	
	protected function _getCharId($characterName){
		$evelib = $this->_registry->getConfig ()
			->getConfigInstance()->toArray();
		$config = array(
	        'Scope' => array( 'scope' => 'eve' ),
	        'Api' => $evelib['evelib']['Api']
		);
		$api = new EveLib_Ccp_Api($config);
		$characterName = explode (',',$characterName);
		$data = $api->CharacterID($characterName);
		return $data;
	}
	
	public function getCharId($characterName){
		$data = $this->_getCharID($characterName);
		print_r($data->result['result']['characters']);
	}
	
	/**
	 * @todo probably next task.
	 * Enter description here ...
	 */
	public function setConnection(){
	}
	
	public function getConfig() {
		$evelib = $this->_registry->getConfig ()
				->getConfigInstance()->toArray();
		echo "characterID::{$evelib['evelib']['Api']['characterID']}", PHP_EOL;
		echo "userID::{$evelib['evelib']['Api']['userID']}", PHP_EOL;
		echo "apiKey::{$evelib['evelib']['Api']['apiKey']}", PHP_EOL;
	}
	
}
