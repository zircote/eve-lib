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
class Zircote_Ccp_Api {
	
	const SERVER_DEFAULT_PORT = '80';
	const SERVER_DEFAULT_HOST = 'api.eve-online.com';
	const SERVER_DEFAULT_PROTOCOL = 'http';
	const CACHE_KEY = 'eve_api';
	
	/**
	 * 
	 * Enter description here ...
	 * @var Zend_Cache
	 */
	protected $cacheManager;
	protected static $_commands = array (
		'account' => array (
			'accountstatus' => 'Zircote_Ccp_Api_Command_Account_AccountStatus',
			'characters' => 'Zircote_Ccp_Api_Command_Account_Characters'
		),
		'char' => array (
			'accountbalance' => 'Zircote_Ccp_Api_Command_Char_AccountBalance',
			'assetlist' => 'Zircote_Ccp_Api_Command_Char_AssetList',
			'calendareventattendees' => 'Zircote_Ccp_Api_Command_Char_CalendarEventAttendees',
			'charactersheet' => 'Zircote_Ccp_Api_Command_Char_CharacterSheet',
			'contactlist' => 'Zircote_Ccp_Api_Command_Char_ContactList',
			'contactnotifications' => 'Zircote_Ccp_Api_Command_Char_ContactNotifications',
			'facwarstats' => 'Zircote_Ccp_Api_Command_Char_FacWarStats',
			'industryjobs' => 'Zircote_Ccp_Api_Command_Char_IndustryJobs',
			'killlog' => 'Zircote_Ccp_Api_Command_Char_Killlog',
			'mailbodies' => 'Zircote_Ccp_Api_Command_Char_MailBodies',
			'mailinglists' => 'Zircote_Ccp_Api_Command_Char_MailingLists',
			'mailmessages' => 'Zircote_Ccp_Api_Command_Char_MailMessages',
			'marketorders' => 'Zircote_Ccp_Api_Command_Char_MarketOrders',
			'medals' => 'Zircote_Ccp_Api_Command_Char_Medals',
			'notifications' => 'Zircote_Ccp_Api_Command_Char_Notifications',
			'research' => 'Zircote_Ccp_Api_Command_Char_Research',
			'skillinqueue' => 'Zircote_Ccp_Api_Command_Char_SkillInQueue',
			'skillintraining' => 'Zircote_Ccp_Api_Command_Char_SkillInTraining',
			'standings' => 'Zircote_Ccp_Api_Command_Char_Standings',
			'upcomingcalendarevents' => 'Zircote_Ccp_Api_Command_Char_UpcomingCalendarEvents',
			'walletjournal' => 'Zircote_Ccp_Api_Command_Char_WalletJournal',
			'wallettransactions' => 'Zircote_Ccp_Api_Command_Char_WalletTransactions'
		),
		'corp' => array (
			'accountbalance' => 'Zircote_Ccp_Api_Command_Corp_AccountBalance',
			'assetlist' => 'Zircote_Ccp_Api_Command_Corp_AssetList',
			'calendareventattendees' => 'Zircote_Ccp_Api_Command_Corp_CalendarEventAttendees',
			'contactlist' => 'Zircote_Ccp_Api_Command_Corp_ContactList',
			'containerlog' => 'Zircote_Ccp_Api_Command_Corp_ContainerLog',
			'corporationsheet' => 'Zircote_Ccp_Api_Command_Corp_CorporationSheet',
			'facwarstats' => 'Zircote_Ccp_Api_Command_Corp_FacWarStats',
			'industryjobs' => 'Zircote_Ccp_Api_Command_Corp_IndustryJobs',
			'killlog' => 'Zircote_Ccp_Api_Command_Corp_Killlog',
			'marketorders' => 'Zircote_Ccp_Api_Command_Corp_MarketOrders',
			'medals' => 'Zircote_Ccp_Api_Command_Corp_Medals',
			'membermedals' => 'Zircote_Ccp_Api_Command_Corp_MemberMedals',
			'membersecurity' => 'Zircote_Ccp_Api_Command_Corp_MemberSecurity',
			'membersecuritylog' => 'Zircote_Ccp_Api_Command_Corp_MemberSecurityLog',
			'membertracking' => 'Zircote_Ccp_Api_Command_Corp_MemberTracking',
			'outpostlist' => 'Zircote_Ccp_Api_Command_Corp_OutpostList',
			'outpostservicedetail' => 'Zircote_Ccp_Api_Command_Corp_OutpostServiceDetail',
			'shareholders' => 'Zircote_Ccp_Api_Command_Corp_Shareholders',
			'standings' => 'Zircote_Ccp_Api_Command_Corp_Standings',
			'starbasedetail' => 'Zircote_Ccp_Api_Command_Corp_StarbaseDetail',
			'starbaselist' => 'Zircote_Ccp_Api_Command_Corp_StarbaseList',
			'titles' => 'Zircote_Ccp_Api_Command_Corp_Titles',
			'walletjournal' => 'Zircote_Ccp_Api_Command_Corp_WalletJournal',
			'wallettransactions' => 'Zircote_Ccp_Api_Command_Corp_WalletTransactions'
		),
		'eve' => array (
			'alliancelist' => 'Zircote_Ccp_Api_Command_Eve_AllianceList',
			'certificatetree' => 'Zircote_Ccp_Api_Command_Eve_CertificateTree',
			'characterinfo' => 'Zircote_Ccp_Api_Command_Eve_CharacterInfo',
			'charactername' => 'Zircote_Ccp_Api_Command_Eve_CharacterName',
			'characterid' => 'Zircote_Ccp_Api_Command_Eve_CharacterID',
			'conquerablestationlist' => 'Zircote_Ccp_Api_Command_Eve_ConquerableStationList',
			'errorlist' => 'Zircote_Ccp_Api_Command_Eve_ErrorList',
			'facwarstats' => 'Zircote_Ccp_Api_Command_Eve_FacWarStats',
			'facwartopstats' => 'Zircote_Ccp_Api_Command_Eve_FacWarTopStats',
			'reftypes' => 'Zircote_Ccp_Api_Command_Eve_RefTypes',
			'skilltree' => 'Zircote_Ccp_Api_Command_Eve_SkillTree'
		),
		'map' => array (
			'facwarsystems' => 'Zircote_Ccp_Api_Command_Map_FacWarSystems',
			'jumps' => 'Zircote_Ccp_Api_Command_Map_Jumps',
			'kills' => 'Zircote_Ccp_Api_Command_Map_Kills',
			'sovereignty' => 'Zircote_Ccp_Api_Command_Map_Sovereignty',
			'sovereigntystatus' => 'Zircote_Ccp_Api_Command_Map_SovereigntyStatus'
		),
		'misc' => array (
			'image' => 'Zircote_Ccp_Api_Command_Misc_Image',
		),
		'server' => array (
			'serverstatus' => 'Zircote_Ccp_Api_Command_Server_ServerStatus',
		)
	);
	
	protected $_options = array(
		'Scope' => array( 'scope' => 'server' ),
		'Api' => array (
			'apiKey' => null,
			'characterID' => null,
			'userID' => null
		),
		'Connection' => array (
			'host' => self::SERVER_DEFAULT_HOST,
			'port' => self::SERVER_DEFAULT_PORT,
			'protocol' => self::SERVER_DEFAULT_PROTOCOL
		),
		'Cache' => array (
		    'backend' => array(
		        'name' => 'File',
		        'options' => array(
		            'cache_dir' => '/tmp'
		        )
		    )
		)
	);
	
	protected $_cache;
	protected $_server;
	public $_api;
	protected $_connection;
	protected $_scope;
	
	public function __construct(array $options = array()){
    	$options = array_change_key_case($options, CASE_LOWER);
        $options = array_merge($this->_options, $options);
        
        $this->setOptions($options);
	}
	
    /**
     * Set options array
     * 
     * @param array $options Options (see $_options description)
     * @return Zircote_Ccp_Api
     */
    public function setOptions(array $options) {
        foreach($options as $name => $value) {
            if (method_exists($this, "set$name")) {
                call_user_func(array($this, "set$name"), $value);
            } else {
                $this->setOption($name, $value);
            }
        }
        return $this;
    }

    public function setOption($name, $value) {
    	$lowerName = '_' . strtolower($name);

        if (!property_exists($this, $lowerName)) {
        	require_once 'Zircote/Ccp/Api/Exception.php';
            throw new Zircote_Ccp_Api_Exception("'{$scope['scope']}' is not a valid Api scope.");
        }
        $this->$lowerName = $value;
        return $this;
    }
    
    public function setConnection($options){
 		require_once 'Zircote/Ccp/Api/Connection.php';
    	$this->_connection = new Zircote_Ccp_Api_Connection($options);
    	return $this;
    }
    
    public function getConnection(){
    	return $this->_connection;
    }
    
    public function setApi(array $options){
    	$this->_api = $options;
    	return $this;
    }
    
    public function getApi(){
    	return $this->_api;
    }
    
    /**
     * 
     * Enter description here ...
     * @return Zend_Cache_Core
     */
    public function getCache(){
    	return $this->cacheManager->getCache(self::CACHE_KEY);
    }
    
    public function setCache(array $options){
    	$frontend = array(
			'frontend' => array(
		        'name' => 'Core',
		        'options' => array(
    				'cache_id_prefix' => 'eve_api',
		            'lifetime' => null,
		            'automatic_serialization' => true
		        )
		    )
	    );
    	$options = array_merge($frontend, $options);
    	require_once 'Zend/Cache/Manager.php';
    	$this->cacheManager = new Zend_Cache_Manager;
    	if(!$this->cacheManager->hasCache(self::CACHE_KEY)){
			$this->cacheManager->setCacheTemplate(self::CACHE_KEY, $options);
    	}
		return $this;
    }

    /**
     * 
     * Enter description here ...
     * @param mixed $options
     * @return Zircote_Ccp_Api
     */
    public function setScope($options){
    	if(is_array($options)){
    		$options = array_change_key_case($options, CASE_LOWER);
    		$scope = $options['scope'];
    	} else {
    		$scope = $options;
    	}
    	$scope = strtolower($scope);
    	if(key_exists($scope, self::$_commands)){
    		$this->_scope = $scope;
    	} else {
        	require_once 'Zircote/Ccp/Api/Exception.php';
            throw new Zircote_Ccp_Api_Exception("'{$scope['scope']}' is not a valid Api scope.");
    	}
    	return $this;
    }

    public function getScope(){
    	return $this->_scope;
    }
    
    /**
     * 
     * @throws Zircote_Ccp_Api_Exception
     * @param string $name      Command name 
     * @param array  $arguments Command arguments
     * @return Zircote_Ccp_Api_Command_Abstract
     */
    public function getCommand($name, $args) {
    	if(!$this->getScope()){
        	require_once 'Zircote/Ccp/Api/Exception.php';
            throw new Zircote_Ccp_Api_Exception("Unable to determine a scope for execution.");
    	}
		$lowerName = strtolower($name);
        if (!isset(self::$_commands[$this->getScope()][$lowerName])) {
        	require_once 'Zircote/Ccp/Api/Exception.php';
            throw new Zircote_Ccp_Api_Exception("Command '$name' not found");
        }
        $classParent = 'Zircote_Ccp_Api_Command_' . ucfirst($this->getScope()) . '_';
        if (strpos(self::$_commands[$this->getScope()][$lowerName],$classParent ) === 0) {
        	require_once $file_path ='Zircote/Ccp/Api/Command/' . ucfirst($this->getScope()) .'/'. 
        		substr(self::$_commands[$this->getScope()][$lowerName], strlen($classParent)) . '.php';
        }
        return new self::$_commands[$this->getScope()][$lowerName]($this, $name, $args);
    }
    
    public function __call($name, $args) {
        $command = $this->getCommand($name, $args);
        $command->write();
        return $command->read();
    }
}