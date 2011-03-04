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
 * 
 * 
 */
require_once 'Zend/Tool/Framework/Provider/Abstract.php';
require_once 'Zend/Tool/Framework/Provider/Pretendable.php';

class EveLib_Tool_EveLibProvider extends Zend_Tool_Framework_Provider_Abstract
	implements Zend_Tool_Framework_Provider_Pretendable {
	protected $_evelibRegistry;
	
	protected $_apiKey;
	protected $_characterID;
	protected $_userID;
	protected $_scope;
	
	public function __construct (){
		require_once 'Zend/Loader/Autoloader.php';
		$autoloader = Zend_Loader_Autoloader::getInstance()
			->registerNamespace('EveLib_');
//		parent::__construct();
	}
	
	private function _loadConfig() {
	
	}
	/*
	 * @var $dsn
	 */
	public function setDsn($dsnId = 'default'){
		/*
		 * evelib.dsn.default = http[s]://userID:apiKey@host:port/characterID
		 */
		$dsn = $this->_registry->getClient ()
			->promptInteractiveInput ( "Provide the EvE Api Dsn in the following format:\n".
			"http[s]://userID:apiKey@host:port/characterID\n",array('color' => 'green') );
		require_once 'EveLib/Ccp/Api.php';
		$api = new EveLib_Ccp_Api($dsn->getContent());
		$options = $api->get_options();
		$_dsn = $this->_registry->getConfig ()->getConfigInstance()->toArray();
		$_dsn['eve_lib']['dsn'][$dsnId]['dsn'] = $dsn->getContent();
		$this->_registry->getConfig ()->eve_lib = $_dsn['eve_lib'];
		$this->_registry->getConfig ()->save ();
	}
	
	public function setConfig() {
		$userID = $this->_registry->getClient ()
			->promptInteractiveInput ( "Enter the EvE Api userID" );
		$apiKey = $this->_registry->getClient ()
			->promptInteractiveInput ( "Enter the EvE Api apiKey");
		$this->_registry->getConfig ()
			->evelib = array('Api' => array(
				'userID' => $userID->getContent(),
				'apiKey' => $apiKey->getContent(),
			));
		$this->_registry->getConfig ()->save ();
		$this->setCharacterId();
		echo "EveLib Api Configuration Saved\n";
	}
	/**
	 * @todo decide how I intend to handle options...need more reading time on Zend_Tool_Framework..
	 * Enter description here ...
	 */
	public function setCache($name_backend, $options_backend = null, $customBackendNaming = false, $autoload = false ){
		if(strlen($options_backend) && is_array(explode('&', $options_backend))){
			Zend_Tool_Framework_Client_Console_ResponseDecorator_Blockize();
		} else {
                $this->_print("options_backend should be provided in the following format:", array('color' => 'green'));
                $this->_print("cache_dir=/tmp&read_control=0&read_control_type=crc32&file_name_prefix=eve-lib-cache", 
                	array('color' => 'green'));
			return;
		}
	}

	protected function _getChars($dsnId = 'default'){
		require_once 'EveLib/Ccp/Api.php';
		$api = new EveLib_Ccp_Api($this->getDsn($dsnId));
		return $result = $api->setScope('account')->Characters();
	}
	
	public function getChars($dsnId = 'default'){
		
		$table = new Zend_Text_Table(array('columnWidths' => array(25, 25, 25, 25), 
			'padding' => 1,'decorator' => 'ascii'));
		$table->appendRow(array('characterID', 'name', 'corporationName', 'corporationID'));
		foreach ($this->_getChars($dsnId)->result['result']['characters'] as $key => $value) {
			$table->appendRow(array($value['characterID'], $value['name'], $value['corporationName'], $value['corporationID']));
		}
		echo $table;
	}
	
	public function charInfo($characterID, $dsnId = 'default'){
		if(!is_numeric($characterID)){
			$getCharId = $this->_getCharId($characterID);
			foreach ($getCharId->result['result']['characters'] as $id => $list) {
				if($characterID == strtolower($list['name'])){
					$characterID = $id;
				}
			}
		}
		require_once 'EveLib/Ccp/Api.php';
		$api = new EveLib_Ccp_Api($this->getDsn($dsnId));
		$data = $api->setScope('eve')->CharacterInfo($characterID);
		$table = new Zend_Text_Table(array('columnWidths' => array(25, 30), 'padding' => 1,'decorator' => 'ascii' ));
		foreach ($data->result['result'] as $key => $value) {
			$table->appendRow(array($key, $value));
		}
		echo $table;
	}
	
	
	public function getApis($dsnId = null){
		$evelib = $this->_registry->getConfig ()
			->getConfigInstance()->toArray();
		$table = new Zend_Text_Table(array('columnWidths' => array(10, 60), 'padding' => 1,'decorator' => 'ascii' ));
		if($dsnId === null){
			foreach ($evelib['eve_lib']['dsn'] as $key => $value) {
				$table->appendRow(array($key, $value['dsn']));
			}
			echo $table;
		} else {
			echo (string) $evelib['eve_lib']['dsn'][$dsnId]['dsn'];
		}
	}
	public function getDsn($dsnId = 'default'){
		$evelib = $this->_registry->getConfig ()
			->getConfigInstance()->toArray();
		return  (string) $evelib['eve_lib']['dsn'][$dsnId]['dsn'];
	}
	
	public function charSheet($characterID, $dsnId = 'default'){
		require_once 'EveLib/Ccp/Api.php';
		$api = new EveLib_Ccp_Api($this->getDsn($dsnId));
		$data = $api->setScope('char')->CharacterSheet($characterID);
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
	
	protected function _getCharId($characterName, $dsnId = 'default'){
		require_once 'EveLib/Ccp/Api.php';
		$api = new EveLib_Ccp_Api($this->getDsn($dsnId));
		$characterName = explode (',',$characterName);
		$data = $api->setScope('eve')->CharacterID($characterName);
		return $data;
	}
	
	public function getCharId($characterName){
		$data = $this->_getCharID($characterName);
		$table = new Zend_Text_Table(array('columnWidths' => array(25, 30), 
			'padding' => 1,'decorator' => 'ascii'));
		$table->appendRow(array('characterName', 'characterID'));
		foreach ($data->result['result']['characters'] as $key => $value) {
			$table->appendRow(array($value['name'], $value['characterID']));
		}
		echo $table;
	}
	
	/**
	 * @todo probably next task.
	 * Enter description here ...
	 */
	public function setConnection(){
	}
	
	public function getConfig($dsnId = 'default') {
		$evelib = $this->_registry->getConfig ()
				->getConfigInstance()->toArray();
		echo $dsn = $_api['eve_lib']['dsn'][$dsnId]['dsn'];
	}


    /**
     * @param string $line
     * @param array $decoratorOptions
     */
    protected function _print($line, array $decoratorOptions = array())
    {
        $this->_registry->getResponse()->appendContent("[EveLib] " . $line, $decoratorOptions);
    }
}
