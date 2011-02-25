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

class EveLib_Tool_EveLibProvider extends Zend_Tool_Project_Provider_Abstract 
	implements Zend_Tool_Framework_Provider_Pretendable {
	protected $_evelibRegistry;
	
	protected $_apiKey;
	protected $_characterID;
	protected $_userID;
	protected $_scope;
	
	private function _loadConfig() {
	
	}
	
	public function setConfig($userID = null, $apiKey = null, $characterID = null) {
		if ($userID === null) {
			$userID = $this->_registry->getClient ()->promptInteractiveInput ( "Enter the EvE Api userID" );
		}
		$this->_registry->getConfig ()->evelib_userid = $userID;
		if ($apiKey === null) {
			$apiKey = $this->_registry->getClient ()->promptInteractiveInput ( "Enter the EvE Api apiKey" );
		}
		$this->_registry->getConfig ()->evelib_apikey = $apiKey;
		if ($characterID === null) {
			$characterID = $this->_registry->getClient ()->promptInteractiveInput ( "Enter the EvE Api characterID" );
		}
		$this->_registry->getConfig ()->evelib_characterid = $characterID;
	}
	
	public function getConfig() {
		$characterID = $this->_registry->getConfig ()->evelib_characterid;
		echo "characterID::{$characterID}", PHP_EOL;
		$userID = $this->_registry->getConfig ()->evelib_userid;
		echo "userID::{$userID}", PHP_EOL;
		$apiKey = $this->_registry->getConfig ()->evelib_apikey;
		echo "apiKey::{$apiKey}", PHP_EOL;
	}
	
	/**
	 * @param  string $dsn
	 * @param  bool $withResourceDirectories
	 * @return void
	 */
	public function createProject($api = 'default') {
		$profile = $this->_loadProfileRequired ();
		
		$applicationConfigResource = $profile->search ( 'ApplicationConfigFile' );
		
		if (! $applicationConfigResource) {
			require_once 'Zend/Tool/Project/Exception.php';
			throw new Zend_Tool_Project_Exception ( 'A project with an application config file is required to use this provider.' );
		}
		
		$zc = $applicationConfigResource->getAsZendConfig ();
		
		if (isset ( $zc->resources ) && isset ( $zf->resources->doctrine )) {
			$this->_registry->getResponse ()->appendContent ( 'A EveLib resource already exists in this project\'s application configuration file.' );
			return;
		}
		
		if ($userID === null) {
			$userID = $this->_registry->getClient ()->promptInteractiveInput ( "Enter the EvE Api userID" );
		}
		if ($apiKey === null) {
			$apiKey = $this->_registry->getClient ()->promptInteractiveInput ( "Enter the EvE Api apiKey" );
		}
		if ($characterID === null) {
			$characterID = $this->_registry->getClient ()->promptInteractiveInput ( "Enter the EvE Api characterID" );
		}
		
		if ($this->_registry->getRequest ()->isPretend ()) {
			$this->_print ( 'Would enable EveLib support by adding resource string.' );
		} else {
			/* @var $applicationConfigResource Zend_Tool_Project_Context_Zf_ApplicationConfigFile */
			$applicationConfigResource->addStringItem ( 'resources.evelib.api.apikey', $apikey, 'production', '"' . $apikey . "'" );
			$applicationConfigResource->create ();
			$applicationConfigResource->addStringItem ( 'resources.evelib.api.characterID', $characterID, 'production', '"' . $characterID . "'" );
			$applicationConfigResource->addStringItem ( 'resources.evelib.api.userID', $userID, 'production', '"' . $userID . "'" );
			$applicationConfigResource->create ();
			$this->_print ( 'Enabled EveLib Zend_Application resource in project.', array ('color' => 'green' ) );
		}
		
		$configsDirectory = $profile->search ( array ('configsDirectory' ) );
		
		if ($configsDirectory == null) {
			require_once 'Zend/Tool/Project/Exception.php';
			throw new Exception ( "No Config directory in Zend Tool Project." );
		}
		
		if ($changes) {
			$profile->storeToFile ();
		}
	}
}